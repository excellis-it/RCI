<?php

namespace App\Http\Controllers\Imprest;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvanceSettlement;
use App\Models\Project;
use App\Models\VariableType;
use App\Models\AdvanceSettlementBill;
use App\Models\AdvanceFundToEmployee;
use App\Models\CdaBillAuditTeam;
use App\Models\CDAReceipt;
use Illuminate\Support\Facades\DB;
use App\Models\CashInBank;
use App\Models\CashInHand;
use App\Models\ImprestBalance;
use App\Http\Controllers\ImprestReportController;

class AdvanceSettlementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advance_settlements = AdvanceSettlement::orderBy('id', 'desc')->paginate(10);
        $projects = Project::orderBy('id', 'desc')->get();
        return view('imprest.advance-settlement.list', compact('advance_settlements', 'projects'));
    }

    public function getAdv(Request $request)
    {
        $adv_no = $request->adv_no;
        $adv_date = $request->adv_date;
        $balance = 0;
        $isdata = 0;

        $lastvr = AdvanceSettlement::whereYear('var_date', now()->year)
            ->whereMonth('var_date', now()->month)
            ->orderBy('id', 'desc')
            ->lockForUpdate()
            ->first();

        $lastVarNo = $lastvr ? $lastvr->var_no : 0;
        $varNo = $lastVarNo + 1;

        $advance_funds = AdvanceFundToEmployee::where('adv_no', $adv_no)->where('adv_date', $adv_date)->first();
        $advance_settels = AdvanceSettlement::where('adv_no', $adv_no)->where('adv_date', $adv_date)->get();


        if ($advance_funds) {



            $existingBalance = AdvanceSettlement::select('balance')->where('adv_no', $request->adv_no)
                ->where('adv_date', $request->adv_date)
                ->orderBy('id', 'desc')->first();

            if ($existingBalance) {
                $existingBalanceAmount = $existingBalance->balance;


                $balance = $existingBalanceAmount;
            } else {

                $advanceFund = AdvanceFundToEmployee::where('adv_no', $request->adv_no)
                    ->where('adv_date', $request->adv_date)
                    ->first();

                $balance = $advanceFund->adv_amount;
            }

            $isdata = 1;
        }

        // dd($advance_settels);
        // die;

        return response()->json(['view' => view('imprest.advance-settlement.form-data', compact('advance_funds', 'advance_settels', 'balance', 'varNo'))->render(), 'isdata' => $isdata]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function fetchData(Request $request)
    {

        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $advance_settlements = AdvanceSettlement::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('adv_no', 'like', '%' . $query . '%')
                    ->orWhere('adv_date', 'like', '%' . $query . '%')
                    ->orWhere('adv_amount', 'like', '%' . $query . '%')
                    ->orWhere('var_no', 'like', '%' . $query . '%')
                    ->orWhere('var_date', 'like', '%' . $query . '%')
                    ->orWhere('var_amount', 'like', '%' . $query . '%')
                    ->orWhere('chq_no', 'like', '%' . $query . '%')
                    ->orWhere('chq_date', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('imprest.advance-settlement.table', compact('advance_settlements'))->render()]);
        }
    }

    public function create()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        $variable_types = VariableType::orderBy('id', 'desc')->get();

        return view('imprest.advance-settlement.form', compact('projects', 'variable_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'adv_no' => 'required',
            'adv_date' => 'required',
            'adv_amount' => 'required|numeric',
            'project_id' => 'required',
            'var_no' => 'required',
            'var_date' => 'required',
            'var_amount' => 'required',
            //   'var_type_id' => 'required',
            // 'chq_no' => 'required',
            // 'chq_date' => 'required',
            'bill_amount' => 'required',
            'firm' => 'required',
            'balance' => 'required',
            'member_id' => 'required',
            'af_id' => 'required|unique:advance_settlements,af_id',
        ]);

        $newBalance = 0;

        $existingBalance = AdvanceSettlement::select('balance')->where('adv_no', $request->adv_no)
            ->where('adv_date', $request->adv_date)
            ->orderBy('id', 'desc')->first();

        if ($existingBalance) {
            $existingBalanceAmount = $existingBalance->balance;


            $newBalance = $existingBalanceAmount - $request->bill_amount;
        } else {

            $advanceFund = AdvanceFundToEmployee::where('adv_no', $request->adv_no)
                ->where('adv_date', $request->adv_date)
                ->first();

            $newBalance = $advanceFund->adv_amount - $request->bill_amount;
        }


        // New balance calculation




        $advance_settlement = new AdvanceSettlement();
        $advance_settlement->af_id = $request->af_id;
        $advance_settlement->adv_no = $request->adv_no;
        $advance_settlement->adv_date = $request->adv_date;
        $advance_settlement->adv_amount = $request->adv_amount;
        $advance_settlement->project_id = $request->project_id;
        $advance_settlement->var_no = $request->var_no;
        $advance_settlement->var_date = $request->var_date;
        $advance_settlement->var_amount = $request->var_amount;
        $advance_settlement->var_type_id = $request->var_type_id;
        $advance_settlement->chq_no = $request->chq_no;
        $advance_settlement->chq_date = $request->chq_date;
        $advance_settlement->bill_amount = $request->bill_amount;
        $advance_settlement->firm = $request->firm;
        $advance_settlement->balance = $newBalance;
        $advance_settlement->member_id = $request->member_id;
        $advance_settlement->bill_status = 0;
        $advance_settlement->receipt_status = 0;
        $advance_settlement->created_by = auth()->id();
        $advance_settlement->save();


        // $cashInHand = new CashInHand();
        // $cashInHand->debit = $request->bill_amount;
        // $cashInHand->cheque_no = $request->chq_no;
        // $cashInHand->cheque_date = $request->chq_date;
        // $cashInHand->save();
        $lastIMBRecord =  Helper::getLastImprestBalance($request->var_date);

        $imprestBalanceData = [
            'cash_in_hand' => ($lastIMBRecord->cash_in_hand ?? 0) + $request->balance,
            'opening_cash_in_hand' => $lastIMBRecord->opening_cash_in_hand ?? 0,
            'cash_in_bank' => $lastIMBRecord->cash_in_bank ?? 0,
            'opening_cash_in_bank' => $lastIMBRecord->opening_cash_in_bank ?? 0,
            'adv_fund' => $lastIMBRecord->adv_fund ?? 0,
            'adv_settle' => ($lastIMBRecord->adv_settle ?? 0) + $request->bill_amount,
            'cda_bill' => $lastIMBRecord->cda_bill ?? 0,
            'cda_receipt' => $lastIMBRecord->cda_receipt ?? 0,
            'adv_fund_outstand' => (($lastIMBRecord->adv_fund_outstand ?? 0) - $request->bill_amount) - $request->balance,
            'adv_settle_outstand' => ($lastIMBRecord->adv_settle_outstand ?? 0) + $request->bill_amount,
            'cda_bill_outstand' => $lastIMBRecord->cda_bill_outstand ?? 0,
            'adv_fund_id' => $request->af_id,
            'adv_settle_id' => $advance_settlement->id,
            'date' => $request->input('var_date', now()->toDateString()),
            'time' => now()->toTimeString(),
        ];

        ImprestBalance::create($imprestBalanceData);

        Helper::updateBalancesAfterDate($request->var_date, [
            'adv_fund_outstand' => -$request->bill_amount,
            'adv_settle_outstand' => $request->bill_amount,
        ]);

        session()->flash('message', 'Advance Settlement added successfully');
        return response()->json(['success' => 'Advance Settlement added successfully']);
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
        $advance_settlement = AdvanceSettlement::find($id);
        $advance_funds = AdvanceFundToEmployee::where('adv_no', $advance_settlement->adv_no)->where('adv_date', $advance_settlement->adv_date)->first();
        $edit = true;
        return response()->json(['view' => view('imprest.advance-settlement.form', compact('advance_settlement', 'advance_funds', 'edit'))->render()]);
    }

    public function storeAdvanceSettleBill(Request $request)
    {
        $request->validate([
            'firm' => 'required',
            'bill_amount' => 'required|numeric',
            'balance' => 'required|numeric',
        ]);

        $advance_settlement_bill = new AdvanceSettlementBill();
        $advance_settlement_bill->advance_settlement_id = $request->advance_settlement_id;
        $advance_settlement_bill->firm = $request->firm;
        $advance_settlement_bill->bill_amount = $request->bill_amount;
        $advance_settlement_bill->balance = $request->balance;
        $advance_settlement_bill->save();

        return response()->json(['message' => 'Advance settlement bill added successfully', 'data' => $advance_settlement_bill]);
    }

    public function editAdvanceSettlementBill($id)
    {
        $advance_settlement_bill = AdvanceSettlementBill::find($id);
        $edit = true;
        return response()->json(['view' => view('imprest.advance-settlement.bill-form', compact('edit', 'advance_settlement_bill'))->render()]);
    }

    public function updateAdvanceSettleBill(Request $request)
    {

        $request->validate([
            'firm' => 'required',
            'bill_amount' => 'required|numeric',
            'balance' => 'required|numeric',
        ]);

        $advance_settlement_bill = AdvanceSettlementBill::find($request->advance_settlement_bill_id);
        $advance_settlement_bill->firm = $request->firm;
        $advance_settlement_bill->bill_amount = $request->bill_amount;
        $advance_settlement_bill->balance = $request->balance;
        $advance_settlement_bill->update();

        return response()->json(['message' => 'Advance settlement bill updated successfully', 'data' => $advance_settlement_bill]);
    }

    public function deleteAdvanceSettleBill($id)
    {

        $adv_stlmnt_bill_delete = AdvanceSettlementBill::find($id);
        $adv_stlmnt_bill_delete->delete();

        session()->flash('message', 'Advance settlement bill deleted successfully');
        return response()->json(['message' => 'Advance settlement bill deleted successfully']);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'adv_date' => 'required',
            'var_amount' => 'required',
            'bill_amount' => 'required',
            'balance' => 'required',
            'chq_date' => 'required',
        ]);


        $advance_settlement = AdvanceSettlement::find($id);

        // $newBalance = 0;

        // $existingBalance = AdvanceSettlement::select('balance')->where('adv_no', $advance_settlement->adv_no)
        //     ->where('adv_date', $advance_settlement->adv_date)
        //     ->orderBy('id', 'desc')->first();
        // // dd( $existingBalance->balance , $advance_settlement->balance);
        // if ($existingBalance) {
        //     $existingBalanceAmount = $existingBalance->balance + $advance_settlement->balance;


        //     $newBalance = $existingBalanceAmount - $request->bill_amount;
        // } else {

        //     $advanceFund = AdvanceFundToEmployee::where('adv_no', $request->adv_no)
        //         ->where('adv_date', $advance_settlement->adv_date)
        //         ->first();

        //     $newBalance = $advanceFund->adv_amount - $request->bill_amount;
        // }


        // $advance_settlement->adv_date = $request->adv_date;
        $advance_settlement->var_amount = $request->var_amount;
        $advance_settlement->bill_amount = $request->bill_amount;
        $advance_settlement->balance = $request->balance;
        $advance_settlement->chq_date = $request->chq_date;
        $advance_settlement->chq_no = $request->chq_no;
        $advance_settlement->firm = $request->firm;
        $advance_settlement->save();

        return response()->json(['success' => 'Advance Settlement updated successfully']);
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
        try {
            // $advance_settlement = AdvanceSettlement::findOrFail($id);

            // $bill = CdaBillAuditTeam::where('settle_id', $advance_settlement->id)->get();
            // if ($bill) {
            //     CDAReceipt::where('bill_id', $bill->id)->delete();
            //     $bill->delete();
            // }

            // $advance_settlement->delete();
            $advance_settlement = AdvanceSettlement::findOrFail($id);

            // Get all related bills for the settlement
            $bills = CdaBillAuditTeam::where('settle_id', $advance_settlement->id)->get();

            // Loop through each bill to delete associated receipts
            foreach ($bills as $bill) {
                // Delete all receipts for the current bill
                CDAReceipt::where('bill_id', $bill->id)->delete();

                // Delete the bill itself
                $bill->delete();
            }

            // Finally, delete the advance settlement
            $advance_settlement->delete();



            session()->flash('message', 'Advance Settlement deleted successfully.');
            return redirect()->back()->with('success', 'Advance Settlement deleted successfully.');
        } catch (\Exception $e) {


            return redirect()->back()->with('error', 'Error deleting Advance Settlement: ' . $e->getMessage());
        }
    }
}
