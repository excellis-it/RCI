<?php

namespace App\Http\Controllers\Imprest;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CashWithdrawal;
use App\Models\ImprestResetVoucher;
use App\Models\ChequePayment;
use App\Models\CashInBank;
use App\Models\CashInHand;
use Illuminate\Support\Str;
use App\Models\ImprestBalance;

class CashWithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cashWithdrawals = CashWithdrawal::orderBy('id', 'desc')->paginate(10);

        // $bank=CashInBank::orderBy('id', 'desc')->first();

        $bank_credit = CashInBank::orderBy('id', 'desc')->sum('credit');
        $bank_debit = CashInBank::orderBy('id', 'desc')->sum('debit');

        $bank_balance = $bank_credit - $bank_debit;



        $cash_credit = CashInHand::orderBy('id', 'desc')->sum('credit');
        $cash_debit = CashInHand::orderBy('id', 'desc')->sum('debit');

        $cash_balance = $cash_credit - $cash_debit;


        return view('imprest.cash-withdrawals.list', compact('cashWithdrawals', 'bank_balance', 'cash_balance'));
    }

    public function fetchData(Request $request)
    {

        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cashWithdrawals = CashWithdrawal::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('vr_no', 'like', '%' . $query . '%')
                    ->orWhere('vr_date', 'like', '%' . $query . '%')
                    ->orWhere('chq_no', 'like', '%' . $query . '%')
                    ->orWhere('chq_date', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('imprest.cash-withdrawals.table', compact('cashWithdrawals'))->render()]);
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
        $request->validate([
            'vr_no' => 'required',
            'vr_date' => 'required',
            'chq_no' => 'required',
            'chq_date' => 'required',
            'amount' => 'required|numeric',
        ]);

        $voucherText = ImprestResetVoucher::where('status', 1)->first();
        $cashwithdrawal = CashWithdrawal::latest()->first();

        $constantString = $voucherText->voucher_no_text ?? 'RCI-CHESS-IMPRESS-';
        if (isset($cashwithdrawal)) {
            $serial_no = Str::substr($cashwithdrawal->vr_no, -1);
            $counter = $serial_no + 1;
            // dd($serial_no);
        } else {
            $counter = 1;
        }

        $cashwithdrawal = new CashWithdrawal();
        // $cashwithdrawal->vr_no = $constantString . $counter;
        $cashwithdrawal->vr_no = $request->vr_no;
        $cashwithdrawal->vr_date = $request->vr_date;
        $cashwithdrawal->chq_no = $request->chq_no;
        $cashwithdrawal->chq_date = $request->chq_date;
        $cashwithdrawal->amount = $request->amount;
        $cashwithdrawal->save();

        $cashInHand = new CashInHand();
        $cashInHand->credit = $request->amount;
        $cashInHand->save();

        $cashInBank = new CashInBank();
        $cashInBank->debit = $request->amount;
        $cashInBank->save();

        $lastIMBRecord =  Helper::getLastImprestBalance($request->vr_date);

        $imprestBalanceData = [
            'cash_in_hand' => ($lastIMBRecord->cash_in_hand ?? 0) + $request->amount,
            'opening_cash_in_hand' => ($lastIMBRecord->opening_cash_in_hand ?? 0) + $request->amount,
            'cash_in_bank' => ($lastIMBRecord->cash_in_bank ?? 0) - $request->amount,
            'opening_cash_in_bank' => ($lastIMBRecord->opening_cash_in_bank ?? 0) - $request->amount,
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

        ImprestBalance::create($imprestBalanceData);

        Helper::updateBalancesAfterDate($request->vr_date, [
            'cash_in_hand' => $request->amount,
            'cash_in_bank' => -$request->amount,
        ]);


        session()->flash('message', 'Cash Withdrawal updated successfully');
        return response()->json(['success' => 'Cash Withdrawal updated successfully']);
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
        $cashwithdrawal = CashWithdrawal::find($id);
        $edit = true;

        return response()->json(['view' => view('imprest.cash-withdrawals.form', compact('edit', 'cashwithdrawal'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'vr_no' => 'required',
            'vr_date' => 'required',
            'chq_no' => 'required',
            'chq_date' => 'required',
            'amount' => 'required|numeric',
        ]);

        $cashwithdrawal = CashWithdrawal::findOrFail($id);
        $cashwithdrawal->vr_no = $request->vr_no;
        $cashwithdrawal->vr_date = $request->vr_date;
        $cashwithdrawal->chq_no = $request->chq_no;
        $cashwithdrawal->chq_date = $request->chq_date;
        $cashwithdrawal->amount = $request->amount;
        $cashwithdrawal->update();

        session()->flash('message', 'Cashwithdrawal updated successfully');
        return response()->json(['success' => 'Cashwithdrawal updated successfully']);
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
        $cashwithdrawal = CashWithdrawal::find($id);
        $cashwithdrawal->delete();

        return redirect()->back()->with('message', 'Cash Withdrawal deleted successfully');
    }
}
