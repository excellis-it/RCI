<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentCategory;
use App\Models\ChequePayment;
use App\Models\ResetVoucher;
use Illuminate\Support\Str;
use App\Models\Member;
use App\Models\Receipt;
use App\Models\ReceiptMember;
use App\Models\ChequePaymentMember;
use App\Models\Designation;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use PDF;

class ChequePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $receipt_nos = Receipt::get();
        $cheque_receipt_nos = Receipt::paginate(10);
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $members = Member::orderBy('id', 'desc')->get();

        $allReceipts = Receipt::get();
        $lastPayment = ChequePayment::orderBy('id', 'desc')->first();
        // $AllPayments = ChequePayment::with('chequePaymentMembers.member')->orderBy('id', 'desc')->paginate(100);

        $limit = $request->get('limit', 10) ?? 10;

        // Fetch the data based on the limit; use paginate if it's not 'All'
        if ($limit === 'All') {
            $AllPayments = ChequePayment::with('chequePaymentMembers.member')->orderBy('id', 'desc')->get();
        } else {
            $AllPayments = ChequePayment::with('chequePaymentMembers.member')->orderBy('id', 'desc')->paginate((int) $limit);
        }

        return view('frontend.public-fund.cheque-payment.list', compact('cheque_receipt_nos', 'paymentCategories', 'members', 'receipt_nos', 'lastPayment', 'allReceipts', 'AllPayments', 'limit'));
    }

    public function getReceiptNoDetail(Request $request)
    {
        $rct_no = $request->rcpt_no;
        $detail = true;
        $receipt = Receipt::where('id', $rct_no)->with('fundVendor', 'category')->first();
        if ($receipt) {
            return response()->json(['view' => view('frontend.public-fund.cheque-payment.details', compact('receipt', 'detail'))->render()]);
        } else {
            return response()->json(['error' => 'Receipt not found']);
        }
    }

    public function getReceipt(Request $request)
    {


        $vr_no = $request->vr_no;
        $vr_date = $request->vr_date;
        $receipt_data = Receipt::where('vr_no', $vr_no)->where('vr_date', $vr_date)->first();
        $members = Member::all();
        if ($receipt_data) {

            $rct_id = $receipt_data->id;

            $rc_amount = $receipt_data->amount;


            $paymentsData = ChequePayment::where('vr_no', $vr_no)
                ->where('vr_date', $vr_date)
                ->orderBy('id', 'desc')
                ->first();

            if ($paymentsData) {

                $paymentsDataBal = ChequePayment::where('vr_no', $vr_no)
                    ->where('vr_date', $vr_date)
                    ->orderBy('id', 'desc')
                    ->sum('amount');

                $balance = $rc_amount - $paymentsDataBal;

                if ($balance <= 0) {
                    $paydone = 1;
                } else {
                    $paydone = 0;
                }
            } else {
                // No records found matching the condition
                $paydone = 0;
                $balance = $rc_amount;
            }




            return response()->json(['view' => view('frontend.public-fund.cheque-payment.receipts', compact('receipt_data', 'members'))->render(), 'receipt_data' => $receipt_data, 'paydone' => $paydone, 'balance' => $balance, 'rct_id' => $rct_id]);
            //  return $receipt;
        } else {
            return response()->json(['error' => 'Receipt not found'], 201);
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.public-fund.cheque-payment.form', compact('paymentCategories'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $limit = 'All';
            $search = 1;
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            if (empty($query)) {
                $search = 0;
            }
            $AllPayments = ChequePayment::with('chequePaymentMembers.member')->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('cheq_no', 'like', '%' . $query . '%')
                    ->orWhere('cheq_date', 'like', '%' . $query . '%');
            })->orderBy($sort_by, $sort_type)
                ->get();

            return response()->json(['data' => view('frontend.public-fund.cheque-payment.table', compact('AllPayments', 'limit', 'search'))->render()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     try {


    //         $request->validate([
    //             'vr_no' => 'required',
    //             'vr_date' => 'required|date',
    //             'amount' => 'required|numeric|min:0',
    //             'bill_ref' => 'required|string|max:255',
    //             'cheq_no' => 'required|string|max:255',
    //             'cheq_date' => 'required|date',
    //         ]);

    //         $chequePayment = new ChequePayment();
    //         $chequePayment->receipt_no = $request->receipt_no;
    //         $chequePayment->vr_no = $request->vr_no;
    //         $chequePayment->vr_date = $request->vr_date;
    //         $chequePayment->amount = $request->amount;
    //         $chequePayment->bill_ref = $request->bill_ref;
    //         $chequePayment->cheq_no = $request->cheq_no;
    //         $chequePayment->cheq_date = $request->cheq_date;


    //         $chequePayment->status = 'pending';
    //         $chequePayment->save();


    //         session()->flash('message', 'Cheque Payment added successfully');
    //         return response()->json(['success' => 'Cheque Payment added successfully']);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500); // General server error
    //     }
    // }

    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            // Loop through each receipt
            foreach ($request->receipt_id as $index => $receiptId) {
                // Create the main cheque payment using the model
                $chequePayment = new ChequePayment();
                $chequePayment->receipt_id = $receiptId;
                $chequePayment->receipt_no = $request['receipt_no'][$index] ?? null;
                $chequePayment->vr_no = $request['vr_no'][$index] ?? null;
                $chequePayment->vr_date = $request['vr_date'][$index] ?? null;
                $chequePayment->category_id = $request['category_id'][$index] ?? null;
                $chequePayment->amount = $request['amount1'][$index] ?? 0;
                $chequePayment->bill_ref = $request['bill_ref1'][$index] ?? null;
                $chequePayment->cheq_no = $request['cheq_no'][$index] ?? null;
                $chequePayment->cheq_date = $request['cheq_date'][$index] ?? null;
                $chequePayment->status = 'pending';
                $chequePayment->save(); // Save the record to the database



                // If there are members for this receipt, process them
                if (isset($request->member_serial[$receiptId])) {

                    foreach ($request->member_serial[$receiptId] as $memberIndex => $serialId) {
                        // Insert member-specific cheque payment details
                        $chequePaymentMember = new ChequePaymentMember();
                        $chequePaymentMember->cheque_payments_id = $chequePayment['id'];
                        $chequePaymentMember->serial_no = $serialId;
                        $chequePaymentMember->member_id = $request['member_id'][$receiptId][$memberIndex] ?? null;;
                        $chequePaymentMember->receipt_id = $receiptId ?? 0;
                        $chequePaymentMember->amount = $request['amount'][$receiptId][$memberIndex] ?? 0;
                        $chequePaymentMember->cheq_no = $request['cheq_no'][$index] ?? null;
                        $chequePaymentMember->cheq_date = $request['cheq_date'][$index] ?? null;
                        $chequePaymentMember->bill_ref = $request['bill_ref'][$receiptId][$memberIndex] ?? null;
                        $chequePaymentMember->save(); // Save the record to the database
                    }
                }
            }
            DB::commit();


            return response()->json(['success' => 'Cheque Payments added successfully'], 202);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function fetchMemberDesig(Request $request)
    {
        $member_id = $request->member;
        $member = Member::findOrFail($member_id);
        $get_designation = Designation::where('designation_type_id', $member->desig)->first();
        return response()->json(['designation' => $get_designation]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function getedit(Request $request)
    // {
    //     $id = $request->id;
    //     $vr_no = $request->vr_no;
    //     $vr_date = $request->vr_date;
    //     $chequePayment = ChequePayment::with('chequePaymentMembers')->where('vr_no', $vr_no)->where('vr_date', $vr_date)->first();
    //     $receipt_data2 = Receipt::where('vr_no', $vr_no)->where('vr_date', $vr_date)->first();
    //     $members = Member::all();

    //     //  dd($chequePayment);

    //     $chequePaymentMembers = ChequePaymentMember::where('cheque_payments_id', $chequePayment->id)->get();

    //     // dd($chequePaymentMembers);

    //     $view = view('frontend.public-fund.cheque-payment.edit', compact('chequePayment', 'receipt_data2', 'members',))->render();

    //     return response()->json(['view' => $view]);
    // }

    public function getedit(Request $request)
    {
        $id = $request->id;
        $vr_no = $request->vr_no;
        $vr_date = $request->vr_date;
        $chequePayment = ChequePayment::with('chequePaymentMembers')->where('id', $id)->first();
        $receipt_data2 = Receipt::where('id', $chequePayment->receipt_id)->first();
        $members = Member::all();

        //  dd($chequePayment);

        $chequePaymentMembers = ChequePaymentMember::where('cheque_payments_id', $chequePayment->id)->get();

        // dd($chequePaymentMembers);

        $view = view('frontend.public-fund.cheque-payment.edit', compact('chequePayment', 'receipt_data2', 'members',))->render();

        return response()->json(['view' => $view]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request)
    // {
    //     $id = $request->chid;

    //     //  return $id;

    //     $request->validate([

    //         'cheq_no' => 'required',
    //         'cheq_date' => 'required',
    //     ]);

    //     $chequePayment = ChequePayment::findOrFail($id);

    //     $chequePayment->bill_ref = $request->bill_ref;
    //     $chequePayment->cheq_no = $request->cheq_no;
    //     $chequePayment->cheq_date = $request->cheq_date;

    //     $chequePayment->save();

    //     session()->flash('message', 'Cheque Payment updated successfully');
    //     return redirect()->back()->with('success', 'Cheque Payment updated successfully.');
    // }

    public function update(Request $request)
    {


        DB::beginTransaction();

        try {
            // Update the main ChequePayment record
            $chequePayment = ChequePayment::findOrFail($request->chid);

            if (isset($request->amount1)) {
                $chequePayment->amount = array_sum($request->amount1);
            }

            $chequePayment->save();

            // Update associated ChequePaymentMember records
            if (isset($request->member_serial[$chequePayment->id])) {
                foreach ($request->member_serial[$chequePayment->id] as $index => $serialId) {
                    $memberData = ChequePaymentMember::where('cheque_payments_id', $chequePayment->id)
                        ->where('member_id', $request->member_id[$chequePayment->id][$index] ?? null)
                        ->where('serial_no', $serialId)
                        ->first();

                    if ($memberData) {
                        $memberData->amount = $request->amount[$chequePayment->id][$index] ?? 0;
                        $memberData->bill_ref = $request->bill_ref[$chequePayment->id][$index] ?? null;
                        $memberData->save();
                    }
                }
            }

            DB::commit();

            session()->flash('message', 'Cheque Payment updated successfully');
            return redirect()->back()->with('success', 'Cheque Payment updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error updating Cheque Payment: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function delete($id)
    {
        $chequePayment = ChequePayment::findOrFail($id);

        $chequePayment->delete();

        return redirect()->back()->with('message', 'Cheque Payment deleted successfully.');
    }



    public function getReceiptReport(Request $request, $vr_no, $vr_date)
    {
        // return "hello";
        // die;
        // Raw SQL query to fetch receipts with category names and amount against each category
        // $receipts = DB::table('receipts')
        //     ->leftJoin('payment_categories', 'receipts.category_id', '=', 'payment_categories.id')
        //     ->select(
        //         'receipts.vr_date',
        //         'receipts.vr_no',
        //         'receipts.narration',
        //         'receipts.amount',
        //         'payment_categories.name as category_name',
        //         'receipts.member_name',
        //         'receipts.category_id'
        //     )
        //     ->where('receipts.vr_no', $vr_no)
        //     ->where('receipts.vr_date', $vr_date)
        //     ->get();

        // $receipts = Receipt::with(['receiptMembers', 'category'])
        //     ->select(
        //         'vr_date',
        //         'vr_no',
        //         'narration',
        //         'amount',
        //         'member_name',
        //         'category_id',
        //         DB::raw('(SELECT name FROM payment_categories WHERE payment_categories.id = category_id) as category_name')
        //     )
        //     ->where('vr_no', $vr_no)
        //     ->where('vr_date', $vr_date)
        //     ->get();

        $members = Member::orderBy('id', 'desc')->get();

        $receipts = DB::table('receipts')
            ->leftJoin('payment_categories', 'receipts.category_id', '=', 'payment_categories.id')
            ->select(
                'receipts.id',
                'receipts.vr_date',
                'receipts.vr_no',
                'receipts.narration',
                'receipts.amount',
                'payment_categories.name as category_name',
                'receipts.dv_no',
                'receipts.member_name',
                'receipts.category_id'
            )
            ->where('receipts.vr_no', $vr_no)
            ->where('receipts.vr_date', $vr_date)
            ->get();

        // Fetch related rows from receipt_members for each receipt
        foreach ($receipts as $receipt) {
            $receipt->receiptMembers = DB::table('receipt_members')
                ->where('receipt_id', $receipt->id)
                ->select(
                    'id',
                    'receipt_id',
                    'vr_no',
                    'serial_no',
                    'member_id',
                    'amount',
                    'bill_ref',
                    'cheq_no',
                    'cheq_date',
                    'created_at',
                    'updated_at'
                )
                ->get();
        }

        $settings = Setting::orderBy('id', 'desc')->first();
        // return view('frontend.public-fund.cheque-payment.receipt_report', compact('members', 'receipts', 'vr_date'));


        $pdf = PDF::loadView('frontend.public-fund.cheque-payment.receipt_report', compact('receipts', 'vr_date', 'members', 'settings'))->setPaper('a3', 'landscape');
        return $pdf->download('receipt-report-' . $vr_no . '-' . $vr_date . '.pdf');
    }


    public function paymentReport()
    {
        $data = 1;
        return view('frontend.public-fund.cheque-payment.payment_report', compact('data'));
    }

    public function paymentReportGenerate(Request $request)
    {

        // $vr_date = $request->date;

        $chq_date = $request->date;
        $pre_vr_date = date('Y-m-d', strtotime($chq_date . ' -1 day'));

        $logo = Helper::logo() ?? '';

        $members = Member::orderBy('id', 'desc')->get();

        $category = PaymentCategory::orderBy('id', 'asc')->get();

        // return $category;

        // $payments = DB::table('cheque_payments')->where('vr_date', $vr_date)->get();
        $payments = ChequePayment::where('cheq_date', $chq_date)->get()->groupBy('cheq_no');

        // dd($payments);
        $settings = Setting::orderBy('id', 'desc')->first();

        $receipts = DB::table('receipts')
            ->leftJoin('payment_categories', 'receipts.category_id', '=', 'payment_categories.id')
            ->select(
                'receipts.id',
                'receipts.vr_date',
                'receipts.vr_no',
                'receipts.narration',
                'receipts.amount',
                'payment_categories.name as category_name',
                'receipts.dv_no',
                'receipts.member_name',
                'receipts.category_id'
            )
            ->where('receipts.vr_date', $chq_date)
            ->get();

        $pdf = PDF::loadView('frontend.public-fund.cheque-payment.payment_report_generate', compact('logo', 'receipts', 'category', 'pre_vr_date', 'payments', 'chq_date', 'settings'))->setPaper('a3', 'landscape');

        return $pdf->download('payment-report-' . $chq_date . '.pdf');

        // return view('frontend.public-fund.cheque-payment.payment_report_generate', compact('members', 'receipts', 'category', 'vr_date', 'balanceCarriedForward', 'totalReceipts'));
    }




    //
}
