<?php

namespace App\Http\Controllers\Imprest;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CdaBillAuditTeam;
use App\Models\ImprestResetVoucher;
use App\Models\Project;
use App\Models\VariableType;
use App\Models\AdvanceFundToEmployee;
use App\Models\AdvanceSettlement;
use App\Models\CDAReceipt;
use Illuminate\Support\Str;
use App\Models\ImprestBalance;
use App\Http\Controllers\ImprestReportController;

class CdaBillAuditTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $cdaBills = CdaBillAuditTeam::orderBy('id', 'desc')->with('project','variableType')->paginate(10);
        $projects = Project::orderBy('id', 'desc')->where('status', 1)->get();
        $variable_types = VariableType::orderBy('id', 'desc')->where('status', 1)->get();
        $advance_settels = AdvanceSettlement::where('bill_status', 0)->orderBy('id', 'desc')->get();

        if ($advance_settels) {
            $lastSettleDate = AdvanceSettlement::where('bill_status', 0)->orderBy('var_date', 'asc')->first()?->var_date;
            // $lastSettleDate = '';
        } else {
            $lastSettleDate = '';
        }

        $advance_bills = CdaBillAuditTeam::orderBy('id', 'desc')->get();

        // foreach ($advance_bills as $advance_bill) {
        //     // Fetch the related CdaBillAuditTeam based on adv_no and adv_date
        //     $cda_bill = CdaBillAuditTeam::where('adv_no', $advance_bill->adv_no)
        //         ->where('adv_date', $advance_bill->adv_date)
        //         ->first();  // Use first() to get a single match

        //     // If a matching CdaBillAuditTeam is found, assign its values to the advance_bill object
        //     if ($cda_bill) {
        //         $advance_bill->cda_bill_id = $cda_bill->id;
        //         $advance_bill->cda_bill_no = $cda_bill->cda_bill_no;
        //         $advance_bill->cda_bill_date = $cda_bill->cda_bill_date;
        //     } else {
        //         // If no matching CdaBillAuditTeam is found, set to 'N/A' or any default value
        //         $advance_bill->cda_bill_id = 0;
        //         $advance_bill->cda_bill_no = 'N/A';
        //         $advance_bill->cda_bill_date = 'N/A';
        //     }
        // }



        return view('imprest.cda-bills.list', compact('projects', 'lastSettleDate', 'variable_types', 'advance_settels', 'advance_bills'));
    }

    public function getCda(Request $request)
    {
        // $adv_no = $request->adv_no;
        // $adv_date = $request->adv_date;

        // $advance_funds = AdvanceFundToEmployee::where('adv_no', $adv_no)->where('adv_date', $adv_date)->first();
        // $advance_settels = AdvanceSettlement::where('adv_no', $adv_no)->where('adv_date', $adv_date)->get();


        // $balance = 0;

        // $existingBalance = AdvanceSettlement::select('balance')->where('adv_no', $request->adv_no)
        //     ->where('adv_date', $request->adv_date)
        //     ->orderBy('id', 'desc')->first();

        // if ($existingBalance) {
        //     $existingBalanceAmount = $existingBalance->balance;


        //     $balance = $existingBalanceAmount;
        // } else {

        //     $advanceFund = AdvanceFundToEmployee::where('adv_no', $request->adv_no)
        //         ->where('adv_date', $request->adv_date)
        //         ->first();

        //     $balance = $advanceFund->adv_amount;
        // }

        // return response()->json(['view' => view('imprest.cda-bills.form-data', compact('advance_funds', 'advance_settels', 'balance'))->render()]);
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cdaBills = CdaBillAuditTeam::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('adv_no', 'like', '%' . $query . '%')
                    ->orWhere('adv_date', 'like', '%' . $query . '%')
                    ->orWhere('adv_amount', 'like', '%' . $query . '%')
                    ->orWhere('var_no', 'like', '%' . $query . '%')
                    ->orWhere('var_date', 'like', '%' . $query . '%')
                    ->orWhere('var_amount', 'like', '%' . $query . '%')
                    ->orWhere('chq_no', 'like', '%' . $query . '%')
                    ->orWhere('chq_date', 'like', '%' . $query . '%')
                    ->orWhere('crv_no', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('imprest.cda-bills.table', compact('cdaBills'))->render()]);
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
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'bills' => 'required|array',
            'bills.*' => 'integer', // Only validate selected rows
            'settle_id' => 'required|array',
            'adv_no' => 'required|array',
            'adv_date' => 'required|array',
            //  'member_id' => 'required|array',
            'adv_amount' => 'required|array',
            'bill_amount' => 'required|array',
            'project_id' => 'required|array',
            // 'chq_no' => 'required|array',
            // 'chq_date' => 'required|array',
            'variable_id' => 'required|array',
            'cda_bill_no' => 'required|string',
            'cda_bill_date' => 'required|date',
            'bill_voucher_no' => 'required|integer',
        ]);

        // Process only the selected rows from the `bills[]` array
        foreach ($request->bills as $billId) {
            // Find the index of the selected bill in the settle_id array
            $index = array_search($billId, $request->settle_id);

            if ($index !== false) {
                $receiptPayment = new CdaBillAuditTeam();
                $receiptPayment->settle_id = $request->settle_id[$index];
                $receiptPayment->adv_no = $request->adv_no[$index];
                $receiptPayment->adv_date = $request->adv_date[$index];
                $receiptPayment->member_id = $request->member_id[$index];
                $receiptPayment->adv_amount = $request->adv_amount[$index];
                $receiptPayment->bill_amount = $request->bill_amount[$index];
                $receiptPayment->project_id = $request->project_id[$index];
                $receiptPayment->chq_no = $request->chq_no[$index];
                $receiptPayment->chq_date = $request->chq_date[$index];
                $receiptPayment->variable_id = $request->variable_id[$index];
                $receiptPayment->cda_bill_no = $request->cda_bill_no;
                $receiptPayment->cda_bill_date = $request->cda_bill_date;
                $receiptPayment->bill_voucher_no = $request->bill_voucher_no;
                $receiptPayment->created_by = auth()->id();

                $receiptPayment->save();

                // Update bill status in AdvanceSettlement
                $advSettlement = AdvanceSettlement::find($request->settle_id[$index]);
                if ($advSettlement) {
                    $advSettlement->bill_status = 1;
                    $advSettlement->save();
                }


                $lastIMBRecord =  Helper::getLastImprestBalance($request->cda_bill_date);

                $imprestBalanceData = [
                    'cash_in_hand' => $lastIMBRecord->cash_in_hand ?? 0,
                    'opening_cash_in_hand' => $lastIMBRecord->opening_cash_in_hand ?? 0,
                    'cash_in_bank' => $lastIMBRecord->cash_in_bank ?? 0,
                    'opening_cash_in_bank' => $lastIMBRecord->opening_cash_in_bank ?? 0,
                    'adv_fund' => $lastIMBRecord->adv_fund ?? 0,
                    'adv_settle' => $lastIMBRecord->adv_settle ?? 0,
                    'cda_bill' => ($lastIMBRecord->cda_bill ?? 0) + $request->bill_amount[$index],
                    'cda_receipt' => $lastIMBRecord->cda_receipt ?? 0,
                    'adv_fund_outstand' => $lastIMBRecord->adv_fund_outstand ?? 0,
                    'adv_settle_outstand' => ($lastIMBRecord->adv_settle_outstand ?? 0) - $request->bill_amount[$index],
                    'cda_bill_outstand' => ($lastIMBRecord->cda_bill_outstand ?? 0) + $request->bill_amount[$index],
                    'adv_fund_id' => $advSettlement->af_id,
                    'adv_settle_id' => $advSettlement->id,
                    'cda_bill_id' => $receiptPayment->id,
                    'date' => $request->input('cda_bill_date', now()->toDateString()),
                    'time' => now()->toTimeString(),
                ];

                ImprestBalance::create($imprestBalanceData);

                Helper::updateBalancesAfterDate($request->cda_bill_date, [
                    'adv_settle_outstand' => -$request->bill_amount[$index],
                    'cda_bill' => $request->bill_amount[$index],
                    'cda_bill_outstand' => $request->bill_amount[$index],
                ]);
            }
        }

        session()->flash('message', 'CDA bill added successfully');
        return response()->json(['success' => 'CDA bill added successfully']);
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
        $cdaBill = CdaBillAuditTeam::findOrFail($id);
        $variable_types = VariableType::orderBy('id', 'desc')->where('status', 1)->get();

        // Check if the bill is editable
        if (!$cdaBill->isEditable()) {
            return response()->json(['error' => 'This CDA bill cannot be edited because it has associated CDA receipts'], 403);
        }

        return response()->json([
            'view' => view('imprest.cda-bills.edit-form', compact('cdaBill', 'variable_types'))->render()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cdaBill = CdaBillAuditTeam::findOrFail($id);

        // Check if the bill is editable
        if (!$cdaBill->isEditable()) {
            return response()->json(['error' => 'This CDA bill cannot be edited because it has associated CDA receipts'], 403);
        }

        // Validate the request
        $request->validate([
            'cda_bill_no' => 'required|string',
            'cda_bill_date' => 'required|date',
            'variable_id' => 'required|integer',
            'bill_voucher_no' => 'required|integer',
        ]);

        // Update the CDA bill
        $cdaBill->cda_bill_no = $request->cda_bill_no;
        $cdaBill->cda_bill_date = $request->cda_bill_date;
        $cdaBill->variable_id = $request->variable_id;
        $cdaBill->bill_voucher_no = $request->bill_voucher_no;
        $cdaBill->save();

        session()->flash('message', 'CDA bill updated successfully');
        return response()->json(['success' => 'CDA bill updated successfully']);
    }

    public function delete($id)
    {
        $cda_bill = CdaBillAuditTeam::findOrFail($id);

        // First fetch the related settlement
        $advSettlement = AdvanceSettlement::find($cda_bill->settle_id);

        if ($advSettlement) {

            // Update bill status in AdvanceSettlement
            $advSettlement->bill_status = 0;
            $advSettlement->receipt_status = 0;
            $advSettlement->save();
        }

        // Delete related CDA receipts
        CDAReceipt::where('bill_id', $id)->delete();

        // Delete the CDA bill itself
        $cda_bill->delete();

        session()->flash('message', 'CDA bill deleted successfully');
        return redirect()->back()->with('message', 'CDA bill deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Get the last bill voucher number by date
     */
    public function getLastBillVoucherNoByDate(Request $request)
    {
        $date = $request->input('date');

        $lastBill = CdaBillAuditTeam::whereYear('cda_bill_date', date('Y', strtotime($date)))
            ->whereMonth('cda_bill_date', date('m', strtotime($date)))
            ->orderBy('id', 'desc')
            ->first();

        $lastVoucherNo = $lastBill ? $lastBill->bill_voucher_no : 0;
        $nextVoucherNo = $lastVoucherNo + 1;

        return response()->json(['billVoucherNo' => $nextVoucherNo]);
    }
}
