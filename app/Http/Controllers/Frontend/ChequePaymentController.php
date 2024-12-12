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
use App\Models\Designation;
use Illuminate\Support\Facades\DB;
use PDF;

class ChequePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipt_nos = Receipt::get();
        $cheque_receipt_nos = Receipt::paginate(10);
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $members = Member::orderBy('id', 'desc')->get();

        $allReceipts = Receipt::get();
        $lastPayment = ChequePayment::orderBy('id', 'desc')->first();
        $AllPayments = ChequePayment::orderBy('id', 'desc')->paginate(10);
        return view('frontend.public-fund.cheque-payment.list', compact('cheque_receipt_nos', 'paymentCategories', 'members', 'receipt_nos', 'lastPayment', 'allReceipts', 'AllPayments'));
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

            return response()->json(['view' => view('frontend.public-fund.cheque-payment.receipts', compact('receipt_data', 'members'))->render(), 'receipt_data' => $receipt_data]);
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
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $chequePayments = ChequePayment::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('vr_no', 'like', '%' . $query . '%')
                    ->orWhere('vr_date', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%')
                    ->orWhere('receipt_no', 'like', '%' . $query . '%')
                    // ->orWhereHas('member', function ($q) use ($query) {
                    //     $q->where('name', 'like', '%' . $query . '%');
                    // })
                    // ->orWhere('designation', 'like', '%' . $query . '%')
                    ->orWhere('bill_ref', 'like', '%' . $query . '%')
                    //  ->orWhere('bank_account', 'like', '%' . $query . '%')
                    //  ->orWhere('vr_no', 'like', '%' . $query . '%')
                    ->orWhere('cheq_no', 'like', '%' . $query . '%')
                    ->orWhere('cheq_date', 'like', '%' . $query . '%');
                //  ->orWhere('narration', 'like', '%' . $query . '%')

            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('frontend.public-fund.cheque-payment.table', compact('chequePayments'))->render()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {


            $request->validate([
                'vr_no' => 'required',
                'vr_date' => 'required|date',
                'amount' => 'required|numeric|min:0',
                'bill_ref' => 'nullable|string|max:255',
                'cheq_no' => 'nullable|string|max:255',
                'cheq_date' => 'nullable|date',
            ]);

            $chequePayment = new ChequePayment();
            $chequePayment->receipt_no = $request->receipt_no;
            $chequePayment->vr_no = $request->vr_no;
            $chequePayment->vr_date = $request->vr_date;
            $chequePayment->amount = $request->amount;
            $chequePayment->bill_ref = $request->bill_ref;
            $chequePayment->cheq_no = $request->cheq_no;
            $chequePayment->cheq_date = $request->cheq_date;


            $chequePayment->status = 'pending';
            $chequePayment->save();


            session()->flash('message', 'Cheque Payment added successfully');
            return response()->json(['success' => 'Cheque Payment added successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // General server error
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
    public function edit(string $id)
    {

        $receipt_nos = Receipt::where('receipt_type', 'cheque')->get();
        $receipt = Receipt::where('id', $id)->first();
        $chequePayments = ChequePayment::where('rct_no', $id)->get();
        $members = Member::orderBy('id', 'desc')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.public-fund.cheque-payment.form', compact('edit', 'receipt_nos', 'receipt', 'chequePayments', 'members'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'vr_date' => 'required',
            'sr_no' => 'required',
            'amount' => 'required|numeric',
            'member_id' => 'required',
        ]);

        $chequePayment = ChequePayment::findOrFail($id);
        $chequePayment->vr_no = $request->vr_no;
        $chequePayment->vr_date = $request->vr_date;
        $chequePayment->sr_no = $request->sr_no;
        $chequePayment->amount = $request->amount;
        $chequePayment->member_id = $request->member_id;
        $chequePayment->designation = $request->designation;
        $chequePayment->bill_ref = $request->bill_ref;
        $chequePayment->bank_account = $request->bank_account;
        $chequePayment->dv_no = $request->dv_no;
        $chequePayment->cheque_no = $request->cheque_no;
        $chequePayment->cheque_date = $request->cheque_date;
        $chequePayment->narration = $request->narration;
        $chequePayment->category = $request->category;
        $chequePayment->save();

        session()->flash('message', 'Cheque Payment updated successfully');
        return response()->json(['success' => 'Cheque Payment updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $chequePayment = ChequePayment::findOrFail($id);
        $chequePayment->delete();
        return redirect()->route('cheque-payments.index')->with('message', 'Cheque Payment deleted successfully.');
    }


    public function getReceiptReport(Request $request, $vr_no, $vr_date)
    {
        // return "hello";
        // die;
        // Raw SQL query to fetch receipts with category names and amount against each category
        $receipts = DB::table('receipts')
            ->leftJoin('payment_categories', 'receipts.category_id', '=', 'payment_categories.id')
            ->select(
                'receipts.vr_date',
                'receipts.vr_no',
                'receipts.narration',
                'receipts.amount',
                'payment_categories.name as category_name',
                'receipts.member_name',
                'receipts.category_id'
            )
            ->where('receipts.vr_no', $vr_no)
            ->where('receipts.vr_date', $vr_date)
            ->get();

        //  return view('frontend.public-fund.cheque-payment.receipt_report', compact('receipts'));





        $pdf = PDF::loadView('frontend.public-fund.cheque-payment.receipt_report', compact('receipts', 'vr_date'))->setPaper('a3', 'landscape');

        // Return the PDF directly for download
        return $pdf->download('receipt-report.pdf');
    }
}
