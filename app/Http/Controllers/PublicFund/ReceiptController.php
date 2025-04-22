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
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use App\Models\TempReceipt;
use App\Models\TempReceiptMember;
use PDF;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $receipts = Receipt::with('receiptMembers.member')->orderBy('id', 'desc')->paginate(10);

        $limit = $request->get('limit', 10) ?? 10;

        // Fetch the data based on the limit; use paginate if it's not 'All'
        if ($limit === 'All') {
            $receipts = Receipt::with('receiptMembers.member')->orderBy('id', 'desc')->get();
        } else {
            $receipts = Receipt::with('receiptMembers.member')->orderBy('id', 'desc')->paginate((int) $limit);
        }


        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'asc')->get();
        $members = Member::where('member_status', 1)->orderBy('id', 'asc')->get();
        $lastReceipt = Receipt::whereYear('vr_date', now()->year)
            ->whereMonth('vr_date', now()->month)
            ->orderBy('id', 'desc')
            ->lockForUpdate()
            ->first();

        $lastReceiptNo = $lastReceipt ? $lastReceipt->receipt_no : 0;

        // dd($lastReceiptNo);
        // die;
        $receiptNo = $lastReceiptNo + 1;
        $vrNo = $receiptNo;

        $vrDate = date('Y-m-d');
        $dvNo = '';
        $narration = '';
        $dvcategory = 0;


        $draft_receipts = TempReceipt::first();
        $draft_rc_members = TempReceiptMember::get();

        if ($draft_receipts) {
            $vrNo = $draft_receipts->vr_no;
            $vrDate = $draft_receipts->vr_date;
            $dvNo = $draft_receipts->dv_no;
            $narration = $draft_receipts->narration;
            $dvcategory = $draft_receipts->category_id;
        }

        return view('public-funds.receipts.list', compact('receipts', 'limit', 'paymentCategories', 'members', 'vrNo', 'vrDate', 'dvNo', 'draft_rc_members', 'narration', 'dvcategory'));
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
            $receipts = Receipt::with('receiptMembers.member')->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('dv_no', 'like', '%' . $query . '%');
                // ->orWhere('id', 'like', '%' . $query . '%')
                // ->orWhere('receipt_no', 'like', '%' . $query . '%')
                // ->orWhere('receipt_type', 'like', '%' . $query . '%')
                // ->orWhere('vr_no', 'like', '%' . $query . '%')
                // ->orWhere('vr_date', 'like', '%' . $query . '%')
                // ->orWhere('amount', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->get();

            return response()->json(['data' => view('public-funds.receipts.table', compact('receipts', 'limit', 'search'))->render()]);
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
                    'desig' => $member->desigs->designation,
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

        if ($request->form_type == 1) {
            return $this->saveDraft($request);
        }

        DB::beginTransaction();

        $request->validate([
            'vr_date' => 'required|date',
            'dv_no' => 'required|string|max:255',
            'narration' => 'nullable|string',
            'category' => 'required|exists:payment_categories,id',
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
            // $receiptCount = Receipt::whereYear('created_at', now()->year)
            //     ->whereMonth('created_at', now()->month)
            //     ->count();

            // $receiptNo = $receiptCount + 1; // Next receipt number
            // $formattedReceiptNo = "$receiptNo";

            $lastReceipt = Receipt::whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->orderBy('id', 'desc')
                ->lockForUpdate()
                ->first();

            $lastReceiptNo = $lastReceipt ? $lastReceipt->receipt_no : 0;
            $receiptNo = $lastReceiptNo + 1;
            $formattedReceiptNo = $receiptNo;

            TempReceipt::query()->delete();
            TempReceiptMember::query()->delete();

            // Create Receipt
            $receipt = Receipt::create([
                'receipt_no' => $request->vr_no,
                'vr_no' => $request->vr_no,
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


    public function saveDraft(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'vr_date' => 'required|date',
            //  'dv_no' => 'required|string|max:255',
            //  'narration' => 'nullable|string',
            //  'category' => 'required|exists:payment_categories,id',
            'sr_no.*' => 'required|numeric',
            'member_id.*' => 'required|exists:members,id',
            //   'amount.*' => 'required|numeric|min:0',
            'bill_ref.*' => 'nullable|string|max:255',
            'cheq_no.*' => 'nullable|string|max:255',
            'cheq_date.*' => 'nullable|date',
        ]);

        try {

            TempReceipt::query()->delete();
            TempReceiptMember::query()->delete();


            // Update or insert into TempReceipt (always row 1)
            $receipt = TempReceipt::updateOrCreate(
                ['id' => 1], // Always target row 1
                [
                    'receipt_no' => $request->vr_no, // Fixed receipt number for drafts
                    'vr_no' => $request->vr_no,
                    'vr_date' => $request->vr_date,
                    'dv_no' => $request->dv_no,
                    'narration' => $request->narration,
                    'category_id' => $request->category,
                    'amount' => array_sum($request->member_amount), // Total amount from receipt_members
                ]
            );

            // Clear existing TempReceiptMembers for row 1
            TempReceiptMember::where('receipt_id', $receipt->id)->delete();

            // Add new TempReceiptMembers
            foreach ($request->sr_no as $index => $serialNo) {
                TempReceiptMember::create([
                    'receipt_id' => $receipt->id,
                    'vr_no' => $receipt->vr_no,
                    'serial_no' => $serialNo,
                    'member_id' => $request->member_id[$index],
                    'amount' => $request->member_amount[$index],
                    'bill_ref' => $request->bill_ref[$index] ?? null,
                    'cheq_no' => $request->cheq_no[$index] ?? null,
                    'cheq_date' => $request->cheq_date[$index] ?? null,
                ]);
            }

            DB::commit();

            session()->flash('message', 'Draft saved successfully');
            return response()->json(['success' => 'Draft saved successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('message', 'Error creating receipt');
            return response()->json(['error' => 'Error saving draft: ' . $e->getMessage()]);
        }
    }


    public function receiptClearDraft()
    {
        TempReceipt::query()->delete();
        TempReceiptMember::query()->delete();
        session()->flash('message', 'Draft cleared successfully');
        return redirect()->back()->with('message', 'Draft cleared successfully');
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
        $receipt = Receipt::with('receiptMembers.member')->findOrFail($id);
        $members = Member::all(); // Assuming you have a Member model for the dropdown
        $paymentCategories = PaymentCategory::where('status', 1)->orderBy('id', 'asc')->get();

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
                //  'narration' => 'required|string|max:1000',
                'category' => 'required|exists:payment_categories,id',
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


    public function delete($id)
    {
        $receipt = Receipt::findOrFail($id);
        ReceiptMember::where('receipt_id', $receipt->id)->delete();

        $receipt->delete();

        return redirect()->back()->with('message', 'Receipt deleted successfully.');
    }



    public function receiptReport()
    {
        $data = 1;
        return view('public-funds.receipts.receipt_report', compact('data'));
    }

    public function receiptReportGenerate(Request $request)
    {

        $vr_date = $request->date;

        $print_date = date('d/m/Y', strtotime($request->print_date));

        $pre_vr_date = date('Y-m-d', strtotime($vr_date . ' -1 day'));

        $logo = Helper::logo() ?? '';

        // return dd($pre_vr_date);

        $members = Member::orderBy('id', 'asc')->get();

        $category = PaymentCategory::orderBy('id', 'asc')->get();


        // Fetch cheque payments up to the requested date
        $payments = DB::table('cheque_payments')->where('vr_date', '<=', $pre_vr_date)->get();

        $receipt_members = ReceiptMember::with(['receipt', 'member'])->whereHas('receipt', function ($query) use ($vr_date) {
            $query->where('vr_date', $vr_date);
        })->orderBy('vr_no', 'asc')->get()->chunk(23);

        // dd($receipt_members->toArray());

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
            ->orderByRaw('CAST(receipts.vr_no AS UNSIGNED)')
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

        // dd($receipts);

        $settings = Setting::orderBy('id', 'desc')->first();

        $pdf = PDF::loadView('public-funds.receipts.receipt_report_generate', compact('members', 'logo', 'print_date', 'receipts', 'category', 'vr_date', 'receipt_members', 'pre_vr_date', 'settings'))->setPaper('a3', 'landscape');
        // $pdf->setOption('margin-top', 0)
        //     ->setOption('margin-right', 0)
        //     ->setOption('margin-bottom', 0)
        //     ->setOption('margin-left', 0);
        return $pdf->download('receipt-report-' . $vr_date . '.pdf');


        //  return view('public-funds.receipts.receipt_report_generate', compact('members', 'logo', 'receipts', 'category', 'vr_date', 'receipt_members','pre_vr_date', 'settings'));
    }

    /**
     * Get the last VR number for a specific date.
     */
    public function getLastVrNo(Request $request)
    {
        $vrDate = $request->input('vr_date');

        if (!$vrDate) {
            return response()->json([
                'success' => false,
                'message' => 'Date is required',
            ], 400);
        }

        // Extract year and month from the provided date
        $date = new \DateTime($vrDate);
        $year = $date->format('Y');
        $month = $date->format('m');

        // Find the last receipt for the specified month and year
        $lastReceipt = Receipt::whereYear('vr_date', $year)
            ->whereMonth('vr_date', $month)
            ->orderBy('id', 'desc')
            ->first();

        // If no receipt exists for that month/year, start with 1
        $lastVrNo = $lastReceipt ? $lastReceipt->receipt_no : 0;
        $nextVrNo = $lastVrNo + 1;

        return response()->json([
            'success' => true,
            'vr_no' => $nextVrNo,
        ]);
    }
}
