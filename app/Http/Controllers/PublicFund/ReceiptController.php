<?php

namespace App\Http\Controllers\PublicFund;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\Member;
use App\Models\PaymentCategory;
use App\Models\PublicFundVendor;
use App\Models\ResetVoucher;
use Illuminate\Support\Str;
use App\Models\MemberCoreInfo;
use App\Models\MemberPersonalInfo;
use App\Models\Bank;
use App\Models\ReceiptMember;
use App\Models\ChequePayment;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipts = Receipt::orderBy('id', 'desc')->paginate(10);
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $members = Member::where('member_status', 1)->orderBy('id', 'desc')->get();
        $receiptCount = Receipt::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();
        $receiptNo = $receiptCount + 1;
        $vrNo = $receiptNo;
        return view('public-funds.receipts.list', compact('receipts', 'paymentCategories', 'members', 'vrNo'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $receipts = Receipt::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('receipt_no', 'like', '%' . $query . '%')
                    ->orWhere('receipt_type', 'like', '%' . $query . '%')
                    ->orWhere('vr_no', 'like', '%' . $query . '%')
                    ->orWhere('vr_date', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('public-funds.receipts.table', compact('receipts'))->render()]);
        }
    }

    public function getVendorDesig(Request $request)
    {

        $member = Member::where('id', $request->member_id)->first();

        $member_core = MemberCoreInfo::where('member_id', $request->member_id)->orderBy('id', 'desc')->first() ?? '';

        if ($member) {
            return response()->json([
                'data' => [
                    'name' => $member->name,
                    'desig' => $member->designation->designation_type,
                    'bank_account' => $member_core,
                ]
            ]);
        } else {
            return response()->json(['error' => 'Vendor not found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // validation
    //     $request->validate([
    //         'mode' => 'required',
    //         'vr_date' => 'required',
    //         'amount' => 'required',
    //         'vendor_id' => 'required'
    //     ]);

    //     if ($request->mode == 'cash') {
    //         $request->validate([
    //             'vendor_id' => 'required'
    //         ]);
    //     } else {
    //         $request->validate([
    //             'bank_acc' => 'required',
    //             'cheque_no' => 'required',
    //             'cheque_date' => 'required'
    //         ]);
    //     }

    //     //receipt no generation
    //     $last_receipt = Receipt::latest()->first();
    //     $currentDate = date('Y-m-d');
    //     $constantString = 'RV-' . $currentDate . '-';

    //     if (isset($last_receipt) && Str::substr($last_receipt->receipt_no, 3, 10) === $currentDate) {
    //         // Extract the last 4 digits (counter) from the last receipt_no
    //         $serial_no = (int) Str::substr($last_receipt->receipt_no, -4);
    //         $counter = $serial_no + 1;
    //     } else {
    //         // Start with 0001 if no receipt exists for today
    //         $counter = 1;
    //     }

    //     // Pad the counter with leading zeros to ensure it is 4 digits long
    //     $formattedCounter = str_pad($counter, 4, '0', STR_PAD_LEFT);

    //     // Combine everything to form the new receipt number
    //     $new_receipt_no = $constantString . $formattedCounter;


    //     //vr no generation
    //     $voucherText = ResetVoucher::where('status', 1)->first();
    //     $last_vr_no = Receipt::latest()->first();
    //     $constString = $voucherText->voucher_no_text ?? 'RCI-CHESS-';
    //     if (isset($last_vr_no)) {
    //         $serial_no = Str::substr($last_vr_no->vr_no, -1);
    //         $count = $serial_no + 1;
    //     } else {
    //         $count = 1;
    //     }

    //     $receipt = new Receipt();
    //     $receipt->receipt_no = $new_receipt_no;
    //     $receipt->receipt_type = $request->mode;
    //     $receipt->vr_no = $constString . $count++;
    //     $receipt->vr_date = $request->vr_date;
    //     $receipt->amount = $request->amount;
    //     $receipt->form = $request->form;
    //     $receipt->details = $request->details;
    //     $receipt->fund_vendors_id = $request->vendor_id;
    //     $receipt->vendor_name = $request->vendor_name;
    //     $receipt->category_id = $request->category;
    //     $receipt->sr_no = $request->sr_no;
    //     $receipt->desig = $request->desig;
    //     $receipt->bill_ref = $request->bill_ref;
    //     $receipt->bank_acc_no = $request->bank_acc;
    //     $receipt->dv_no = $request->dv_no;
    //     $receipt->cheque_no = $request->cheque_no;
    //     $receipt->cheque_date = $request->cheque_date;
    //     $receipt->narration = $request->narration;
    //     $receipt->save();

    //     session()->flash('message', 'Receipt added successfully');
    //     return response()->json(['success' => 'Receipt added successfully']);
    // }


    public function store(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'vr_date' => 'required|date',
            'dv_no' => 'nullable|string|max:255',
            'narration' => 'nullable|string|max:1000',
            'category' => 'required|exists:categories,id',
            'sr_no.*' => 'required|numeric',
            'member_id.*' => 'required|exists:members,id',
            'amount.*' => 'required|numeric|min:0',
            'bill_ref.*' => 'nullable|string|max:255',
            'cheq_no.*' => 'nullable|string|max:255',
            'cheq_date.*' => 'nullable|date',
        ]);

        try {
            // Generate receipt_no and vr_no with monthly reset
            $currentMonth = now()->format('Y-m');
            $receiptCount = Receipt::whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->count();

            $receiptNo = $receiptCount + 1; // Next receipt number
            $formattedReceiptNo = "$receiptNo";

            // Create Receipt
            $receipt = Receipt::create([
                'receipt_no' => $formattedReceiptNo,
                'vr_no' => $formattedReceiptNo,
                'vr_date' => $request->vr_date,
                'dv_no' => $request->dv_no,
                'narration' => $request->narration,
                'category_id' => $request->category,
                'amount' => array_sum($request->member_amount), // Total amount from receipt_members
            ]);

            // Add Receipt Members
            foreach ($request->sr_no as $index => $serialNo) {
                ReceiptMember::create([
                    'receipt_id' => $receipt->id,
                    'vr_no' => $receipt->vr_no,
                    'serial_no' => $serialNo,
                    'member_id' => $request->member_id[$index],
                    'amount' => $request->member_amount[$index],
                    'bill_ref' => $request->bill_ref[$index],
                    'cheq_no' => $request->cheq_no[$index],
                    'cheq_date' => $request->cheq_date[$index],
                ]);
            }

            DB::commit();

            //  return redirect()->back()->with('success', 'Receipt created successfully.');
            session()->flash('message', 'Receipt added successfully');
            return response()->json(['success' => 'Receipt added successfully']);
        } catch (\Exception $e) {
            DB::rollBack();

            //  return redirect()->back()->with('error', 'Error creating receipt: ' . $e->getMessage());
            session()->flash('message', 'Error creating receipt');
            return response()->json(['error' => $e->getMessage()]);
        }
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     $receipt_edit = Receipt::where('id', $id)->first();
    //     $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'desc')->get();
    //     $vendors = PublicFundVendor::where('status', 1)->orderBy('id', 'desc')->get();
    //     $edit = true;
    //     return response()->json(['view' => view('public-funds.receipts.form', compact('edit', 'receipt_edit', 'paymentCategories', 'vendors'))->render()]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     $find_receipt = Receipt::where('id', $id)->first();
    //     $find_receipt->vr_date = $request->vr_date;
    //     $find_receipt->amount = $request->amount;
    //     $find_receipt->form = $request->form;
    //     $find_receipt->details = $request->details;
    //     $find_receipt->category_id = $request->category;
    //     $find_receipt->sr_no = $request->sr_no;
    //     $find_receipt->vendor_name = $request->vendor_name;
    //     $find_receipt->desig = $request->desig;
    //     $find_receipt->bill_ref = $request->bill_ref;
    //     $find_receipt->bank_acc_no = $request->bank_acc;
    //     $find_receipt->dv_no = $request->dv_no;
    //     $find_receipt->cheque_no = $request->cheque_no;
    //     $find_receipt->cheque_date = $request->cheque_date;
    //     $find_receipt->narration = $request->narration;
    //     $find_receipt->update();

    //     session()->flash('message', 'Receipt updated successfully');
    //     return response()->json(['success' => 'Receipt updated successfully']);
    // }


    public function getedit(Request $request)
    {
        $id = $request->receipt_id;
        // return $id;
        $receipt = Receipt::with('receiptMembers')->findOrFail($id);
        $members = Member::all(); // Assuming you have a Member model for the dropdown
        $paymentCategories = PaymentCategory::all(); // Assuming payment categories are needed

        $view = view('public-funds.receipts.edit', compact('receipt', 'members', 'paymentCategories'))->render();

        return response()->json(['view' => $view]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            // Validate input
            $request->validate([
                'vr_date' => 'required|date',
                'dv_no' => 'required|string|max:255',
                'narration' => 'nullable|string|max:1000',
                'category' => 'required|exists:categories,id',
                'sr_no.*' => 'required|numeric',
                'member_id.*' => 'required|exists:members,id',
                'amount.*' => 'required|numeric|min:0',
                'bill_ref.*' => 'nullable|string|max:255',
                'cheq_no.*' => 'nullable|string|max:255',
                'cheq_date.*' => 'nullable|date',
            ]);

            // Update receipt
            $receipt = Receipt::findOrFail($id);
            $receipt->update([
                'vr_date' => $request->vr_date,
                'dv_no' => $request->dv_no,
                'narration' => $request->narration,
                'category_id' => $request->category,
                'amount' => array_sum($request->member_amount),

            ]);

            // Update receipt members
            // First, delete existing members
            ReceiptMember::where('receipt_id', $id)->delete();

            // Then, add the updated members
            foreach ($request->sr_no as $index => $serialNo) {
                ReceiptMember::create([
                    'receipt_id' => $receipt->id,
                    'vr_no' => $receipt->vr_no,
                    'serial_no' => $serialNo,
                    'member_id' => $request->member_id[$index],
                    'amount' => $request->member_amount[$index],
                    'bill_ref' => $request->bill_ref[$index],
                    'cheq_no' => $request->cheq_no[$index],
                    'cheq_date' => $request->cheq_date[$index],
                ]);
            }

            DB::commit();
            session()->flash('message', 'Receipt updated successfully');
            return redirect()->route('receipts.index')->with('success', 'Receipt updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Error updating receipt: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}

    public function delete($vr_no, $vr_date)
    {
        DB::beginTransaction(); // Begin a database transaction
        try {
            // Find the receipt based on vr_no and vr_date
            $receipt = Receipt::where('vr_no', $vr_no)
                              ->where('vr_date', $vr_date)
                              ->firstOrFail();

            // Delete associated receipt members
            ReceiptMember::where('receipt_id', $receipt->id)->delete();

            // Delete all matching chequepayment records
            ChequePayment::where('vr_no', $vr_no)
                         ->where('vr_date', $vr_date)
                         ->delete();

            // Delete the receipt
            $receipt->delete();

            DB::commit(); // Commit the transaction

            // Flash success message and redirect
            session()->flash('message', 'Receipt deleted successfully');
            return redirect()->route('receipts.index')->with('success', 'Receipt deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of error

            // Redirect back with error message
            return redirect()->back()->with('error', 'Error deleting receipt: ' . $e->getMessage());
        }
    }



    public function receiptReport()
    {
        $data = 1;
        return view('public-funds.receipts.receipt_report', compact('data'));
    }

    public function receiptReportGenerate(Request $request)
    {

        $vr_date = $request->date;

        $members = Member::orderBy('id', 'desc')->get();

        $category = PaymentCategory::orderBy('id', 'asc')->get();


        // Fetch cheque payments up to the requested date
        $payments = DB::table('cheque_payments')->where('vr_date', '<=', $vr_date)->get();

        // Prepare arrays for vr_no and vr_date from cheque payments
        $vrNos = $payments->pluck('vr_no')->toArray();

        // Calculate opening balance for each category for past dates
        $openingBalance = [];
        foreach ($category as $cat) {
            $openingBalance[$cat->id] = DB::table('receipts')
                ->where('vr_date', '<', $vr_date) // Filter by past dates
                ->where('category_id', $cat->id) // Match category
                ->whereNotIn('vr_no', $vrNos) // Exclude cheque payments
                ->sum('amount'); // Sum amounts
        }

        // return $category;

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


        // return view('frontend.public-fund.cheque-payment.receipt_report', compact('members', 'receipts', 'vr_date'));


        //  $pdf = PDF::loadView('frontend.public-fund.cheque-payment.receipt_report', compact('receipts', 'vr_date', 'members'))->setPaper('a3', 'landscape');
        //   return $pdf->download('receipt-report-' . $vr_no . '-' . $vr_date . '.pdf');

        return view('public-funds.receipts.receipt_report_generate', compact('members', 'receipts', 'category', 'vr_date', 'openingBalance'));
    }





    //

}
