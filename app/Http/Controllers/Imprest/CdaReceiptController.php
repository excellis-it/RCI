<?php

namespace App\Http\Controllers\Imprest;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CDAReceipt;
use Illuminate\Http\Request;
use App\Models\CdaReceiptDetail;
use App\Models\ImprestResetVoucher;
use Illuminate\Support\Str;
use App\Models\AdvanceFundToEmployee;
use App\Models\AdvanceSettlement;
use App\Models\CdaBillAuditTeam;
use App\Models\CashInBank;
use App\Models\CashInHand;
use Illuminate\Support\Facades\DB;
use App\Models\ImprestBalance;
use App\Http\Controllers\ImprestReportController;

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

        $advance_bills = CdaBillAuditTeam::whereDoesntHave('advanceSettlement', function ($query) {
            $query->where('bill_status', 1)->where('receipt_status', 1);
        })
            ->select('cda_bill_no', DB::raw('SUM(bill_amount) as total_bill_amount'))
            ->groupBy('cda_bill_no')
            ->get();

        foreach ($advance_bills as $advance_bill) {
            $bill_details = CdaBillAuditTeam::where('cda_bill_no', $advance_bill->cda_bill_no)->first();
            $advance_bill->bill_id = $bill_details->id;
            $advance_bill->bill_date = $bill_details->cda_bill_date;
        }

        $receipt_bills = CDAReceipt::orderBy('id', 'desc')->get();

        $lastrctvr = CDAReceipt::whereYear('rct_vr_date', now()->year)
            ->whereMonth('rct_vr_date', now()->month)
            ->orderBy('rct_vr_no', 'desc')
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
            'bill_no' => 'required',
        ]);

        // Insert new records into CDAReceipt based on cda_bill_no
        $advBills = CdaBillAuditTeam::where('cda_bill_no', $request->bill_no)->get();

        foreach ($advBills as $advBill) {
            $cdreceipt = CDAReceipt::create([
                'bill_id' => $advBill->id, // Use the current bill ID from CdaBillAuditTeam
                'rct_vr_no' => $request->rct_vr_no,
                'rct_vr_date' => $request->rct_vr_date,
                'dv_no' => $request->dv_no,
                'dv_date' => $request->dv_date,
                'rct_vr_amount' => $advBill->bill_amount,
                'remark' => $request->remark,
                'created_by' => auth()->id(),
            ]);

            // Update related AdvanceSettlement
            $advSettlement = AdvanceSettlement::find($advBill->settle_id);
            if ($advSettlement) {
                $advSettlement->receipt_status = 1;
                $advSettlement->save();
            }

            $lastIMBRecord = Helper::getLastImprestBalance($request->rct_vr_date);

            $imprestBalanceData = [
                'cash_in_hand' => $lastIMBRecord->cash_in_hand ?? 0,
                'opening_cash_in_hand' => $lastIMBRecord->opening_cash_in_hand ?? 0,
                'cash_in_bank' => ($lastIMBRecord->cash_in_bank ?? 0) + $advBill->bill_amount,
                'opening_cash_in_bank' => ($lastIMBRecord->opening_cash_in_bank ?? 0) + $advBill->bill_amount,
                'adv_fund' => $lastIMBRecord->adv_fund ?? 0,
                'adv_settle' => $lastIMBRecord->adv_settle ?? 0,
                'cda_bill' => $lastIMBRecord->cda_bill ?? 0,
                'cda_receipt' => ($lastIMBRecord->cda_receipt ?? 0) + $advBill->bill_amount,
                'adv_fund_outstand' => $lastIMBRecord->adv_fund_outstand ?? 0,
                'adv_settle_outstand' => $lastIMBRecord->adv_settle_outstand ?? 0,
                'cda_bill_outstand' => ($lastIMBRecord->cda_bill_outstand ?? 0) - $advBill->bill_amount,
                'adv_fund_id' => $advSettlement->af_id,
                'adv_settle_id' => $advSettlement->id,
                'cda_bill_id' => $advBill->id,
                'cda_receipt_id' => $cdreceipt->id,
                'date' => $request->input('rct_vr_date', now()->toDateString()),
                'time' => now()->toTimeString(),
            ];

            ImprestBalance::create($imprestBalanceData);

            Helper::updateBalancesAfterDate($request->rct_vr_date, [
                'cda_receipt' => $advBill->bill_amount,
                'cda_bill_outstand' => -$advBill->bill_amount,
            ]);
        }

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
        $cdaBill = CdaBillAuditTeam::find($cdaReceipt->bill_id);

        if (request()->ajax()) {
            return view('imprest.cda-receipts.edit-form', compact('cdaReceipt', 'cdaBill'))->render();
        }

        return view('imprest.cda-receipts.edit', compact('cdaReceipt', 'cdaBill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validate the incoming data
            $validated = $request->validate([
                'rct_vr_date' => 'required|date',
                'dv_no' => 'required|string|max:255',
                'dv_date' => 'required|date',
            ]);

            // Find the receipt
            $receipt = CDAReceipt::findOrFail($id);

            // Check if bill date is after receipt date
            $advBill = CdaBillAuditTeam::find($receipt->bill_id);
            if ($advBill && $advBill->cda_bill_date > $request->rct_vr_date) {
                return response()->json([
                    'success' => false,
                    'errors' => [
                        'rct_vr_date' => ['Receipt date must be after Bill date']
                    ]
                ], 422);
            }

            // Update receipt
            $receipt->rct_vr_date = $request->rct_vr_date;
            $receipt->dv_no = $request->dv_no;
            $receipt->dv_date = $request->dv_date;
            $receipt->save();

            session()->flash('message', 'CDA receipt updated successfully');

            return response()->json([
                'success' => true,
                'message' => 'CDA receipt updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update receipt: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get the last VR No based on the selected date's month and year.
     */
    public function getLastVrNoByDate(Request $request)
    {
        $date = $request->date;
        if (!$date) {
            return response()->json(['error' => 'Date is required'], 400);
        }

        $date = $request->input('date');

        $lastVrNo = CDAReceipt::whereYear('rct_vr_date', date('Y', strtotime($date)))
            ->whereMonth('rct_vr_date', date('m', strtotime($date)))
            ->orderBy('id', 'desc')
            ->lockForUpdate()
            ->first();

        $lastVrNo = $lastVrNo ? $lastVrNo->rct_vr_no : 0;
        $nextVrNo = $lastVrNo + 1;

        return response()->json(['next_vr_no' => $nextVrNo]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
