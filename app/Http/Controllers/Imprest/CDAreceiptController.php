<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use App\Models\CDAReceipt;
use Illuminate\Http\Request;
use App\Models\CdaReceiptDetail;
use App\Models\ImprestResetVoucher;
use Illuminate\Support\Str;
use App\Models\AdvanceFundToEmployee;
use App\Models\AdvanceSettlement;
use App\Models\CdaBillAuditTeam;

class CdaReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cdaReceipts = CDAReceipt::orderBy('id', 'desc')->with('cdaReceiptDetails')->paginate(10);
        $cdaReceiptDetails = CdaReceiptDetail::all();

        $lastcdaReceipt = CDAReceipt::orderBy('id', 'desc')->first();

        // $advance_bills = CdaBillAuditTeam::orderBy('id', 'desc')->get();

        $advance_bills = CdaBillAuditTeam::orderBy('id', 'desc')
            ->whereDoesntHave('advanceSettlement', function ($query) {
                $query->where('bill_status', 1)->Where('receipt_status', 1);
            })
            ->get();



        // return dd($advance_bills);


        $receipt_bills = CDAReceipt::orderBy('id', 'desc')->get();


        $lastrctvr = CDAReceipt::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->orderBy('id', 'desc')
            ->lockForUpdate()
            ->first();

        $lastrctVarNo = $lastrctvr ? $lastrctvr->rct_vr_no : 0;
        $rctNo = $lastrctVarNo + 1;




        return view('imprest.cda-receipts.list', compact('rctNo', 'cdaReceipts', 'cdaReceiptDetails', 'advance_bills', 'receipt_bills', 'lastcdaReceipt'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cdaReceipts = CDAReceipt::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('voucher_date', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('imprest.cda-receipts.table', compact('cdaReceipts'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cdaReceiptDetails = CdaReceiptDetail::all();
        return view('imprest.cda-receipts.form', compact('cdaReceiptDetails'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {

    //     $request->validate([
    //         'rct_no' => 'required',
    //         'rct_date' => 'required',
    //         'vr_no' => 'required',
    //         'vr_date' => 'required',
    //         'vr_amount' =>'required|numeric',
    //         'details' => 'required',
    //     ]);

    //     $voucherText = ImprestResetVoucher::where('status', 1)->first();
    //     $cdaReceipt = CDAReceipt::latest()->first();

    //     $constantString = $voucherText->voucher_no_text ?? 'RCI-CHESS-';
    //     if(isset($cdaReceipt))
    //     {
    //         $serial_no = Str::substr($cdaReceipt->voucher_no, -1);
    //         $counter = $serial_no + 1;
    //         // dd($serial_no);
    //     } else {
    //         $counter = 1;
    //     }

    //     $cdaReceipt = new CDAReceipt();
    //     // $cdaReceipt->voucher_no = $constantString . $counter;
    //     // $cdaReceipt->voucher_date = $request->voucher_date;
    //     // $cdaReceipt->cheq_no = $request->cheq_no;
    //     // $cdaReceipt->cheq_date = $request->cheq_date;

    //     $cdaReceipt->rct_no = $request->rct_no;
    //     $cdaReceipt->rct_date = $request->rct_date;
    //     $cdaReceipt->vr_no = $request->vr_no;
    //     $cdaReceipt->vr_date = $request->vr_date;
    //     $cdaReceipt->amount = $request->vr_amount;
    //     $cdaReceipt->details = $request->details;
    //     $cdaReceipt->save();

    //     session()->flash('message', 'CDA receipt added successfully');
    //     return response()->json(['success' => 'CDA receipt added successfully']);
    // }

    // public function store(Request $request)
    // {
    //     // Validate the incoming data
    //     $validated = $request->validate([
    //         'rct_vr_no' => 'required|string|max:255',
    //         'rct_vr_date' => 'required|date',
    //         'dv_no' => 'required|string|max:255',
    //         'dv_date' => 'required|date',
    //         'rct_vr_amount' => 'required|numeric',
    //         'remark' => 'nullable|string|max:255',
    //         'bill_id' => 'required|array', // Assuming 'bill_id' is an array of bill IDs
    //         'bill_id.*' => 'required', // Validate each bill_id exists in the advance_settlements table
    //     ]);

    //     // Insert CDAReceipt for each bill
    //     foreach ($request->bill_id as $key => $billId) {
    //         CDAReceipt::create([
    //             'bill_id' => $billId,
    //             'rct_vr_no' => $request->rct_vr_no,
    //             'rct_vr_date' => $request->rct_vr_date,
    //             'dv_no' => $request->dv_no,
    //             'dv_date' => $request->dv_date,
    //             'rct_vr_amount' => $request->rct_vr_amount,
    //             'remark' => $request->remark,
    //         ]);
    //     }

    //     $advanceSettlements = AdvanceSettlement::where('balance', '<=', 0)->where('bill_status', 1)->get();

    //     foreach ($advanceSettlements as $advanceSettlement) {

    //         $advanceSettlement->receipt_status = 1;
    //         $advanceSettlement->save();
    //     }

    //     // Redirect back or to a specific route with a success message
    //     // return redirect()->route('cda-receipts.index')->with('success', 'CDA Receipt(s) added successfully.');
    //     session()->flash('message', 'CDA receipt added successfully');
    //     return response()->json(['success' => 'CDA receipt added successfully']);
    // }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'rct_vr_no' => 'required|string|max:255',
            'rct_vr_date' => 'required|date',
            'dv_no' => 'required|string|max:255',
            'dv_date' => 'required|date',
            'rct_vr_amount' => 'required|numeric',
            'remark' => 'nullable|string|max:255',
            'bill_id' => 'required',
        ]);



        CDAReceipt::create([
            'bill_id' => $request->bill_id,
            'rct_vr_no' => $request->rct_vr_no,
            'rct_vr_date' => $request->rct_vr_date,
            'dv_no' => $request->dv_no,
            'dv_date' => $request->dv_date,
            'rct_vr_amount' => $request->rct_vr_amount,
            'remark' => $request->remark,
            'created_by' => auth()->id(),
        ]);


        // $advanceSettlements = AdvanceSettlement::where('balance', '<=', 0)->where('bill_status', 1)->get();

        // foreach ($advanceSettlements as $advanceSettlement) {

        //     $advanceSettlement->receipt_status = 1;
        //     $advanceSettlement->save();
        // }
        $advbill = CdaBillAuditTeam::find($request->bill_id);
        $advSettlement = AdvanceSettlement::find($advbill->settle_id);
        if ($advSettlement) {
            $advSettlement->receipt_status = 1;
            $advSettlement->save();
        }

        // Redirect back or to a specific route with a success message
        // return redirect()->route('cda-receipts.index')->with('success', 'CDA Receipt(s) added successfully.');
        session()->flash('message', 'CDA receipt added successfully');
        return response()->json(['success' => 'CDA receipt added successfully']);
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

        $cdaReceipt = CDAReceipt::findOrFail($id);
        $cdaReceiptDetails = CdaReceiptDetail::all();
        $edit = true;

        return response()->json(['view' => view('imprest.cda-receipts.form', compact('edit', 'cdaReceipt', 'cdaReceiptDetails'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'voucher_date' => 'required',
            'amount' => 'required|numeric',
            'details' => 'required',
        ]);

        $cdaReceipt = CDAReceipt::findOrFail($id);
        // $cdaReceipt->voucher_date = $request->voucher_date;
        // $cdaReceipt->cheq_no = $request->chq_no;
        // $cdaReceipt->cheq_date = $request->cheq_date;
        // $cdaReceipt->amount = $request->amount;
        $cdaReceipt->rct_no = $request->rct_no;
        $cdaReceipt->rct_date = $request->rct_date;
        $cdaReceipt->vr_no = $request->vr_no;
        $cdaReceipt->vr_date = $request->vr_date;
        $cdaReceipt->amount = $request->vr_amount;
        $cdaReceipt->details = $request->details;
        $cdaReceipt->update();

        session()->flash('message', 'CDA receipt updated successfully');
        return response()->json(['success' => 'CDA receipt updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Delete record
     */
    // public function delete($bill_id)
    // {

    //     $cdaReceipt = CDAReceipt::findOrFail($bill_id);
    //     $cdaReceipt->delete();

    //     return redirect()->back()->with('message', 'CDA Receipt deleted successfully.');
    // }
}
