<?php

namespace App\Http\Controllers\Imprest;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amount;
use App\Models\CashInBank;
use App\Models\ImprestBalance;

class AmountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amt = Amount::orderBy('id', 'desc')->get();
        return view('imprest.amount.form', compact('amt'));
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
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        // Store the amount in the Amount model
        $amt = new Amount();
        $amt->amount = $request->amount;
        $amt->save();

        $cashInBank = new CashInBank();
        $cashInBank->credit = $request->amount;
        $cashInBank->save();

        $lastIMBRecord = Helper::getLastImprestBalance($request->vr_date);
        $imprestBalanceData = [
            'cash_in_hand' => $lastIMBRecord->cash_in_hand ?? 0,
            'opening_cash_in_hand' => $lastIMBRecord->opening_cash_in_hand ?? 0,
            'cash_in_bank' => ($lastIMBRecord->cash_in_bank ?? 0) + $request->amount,
            'opening_cash_in_bank' => ($lastIMBRecord->opening_cash_in_bank ?? 0) + $request->amount,
            'adv_fund' => $lastIMBRecord->adv_fund ?? 0,
            'adv_settle' => $lastIMBRecord->adv_settle ?? 0,
            'cda_bill' => $lastIMBRecord->cda_bill ?? 0,
            'cda_receipt' => $lastIMBRecord->cda_receipt ?? 0,
            'adv_fund_outstand' => $lastIMBRecord->adv_fund_outstand ?? 0,
            'adv_settle_outstand' => $lastIMBRecord->adv_settle_outstand ?? 0,
            'cda_bill_outstand' => $lastIMBRecord->cda_bill_outstand ?? 0,
            'date' => $request->input('vr_date', now()->toDateString()),
            'time' => now()->toTimeString(),
        ];

        $imprestBalance = ImprestBalance::create($imprestBalanceData);

        // Update subsequent records
        Helper::updateBalancesAfterDate($request->vr_date, [
            'cash_in_bank' => $request->amount,
            'opening_cash_in_bank' => $request->amount,
        ]);



        return redirect()->route('amount.index')->with('success', 'Amount Added Successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
