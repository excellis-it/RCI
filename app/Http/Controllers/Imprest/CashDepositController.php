<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use App\Models\CashDeposit;
use App\Models\ImprestResetVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;

class CashDepositController extends Controller
{
    public function index()
    {
        $cashDeposits = CashDeposit::orderBy('created_at', 'desc')->paginate(10);
        $newVrNo = $this->generateVrNo();

        return view('imprest.cash-deposits.index', compact('cashDeposits', 'newVrNo'));
    }

    private function generateVrNo()
    {

        $latestVr = CashDeposit::orderBy('id', 'desc')->first();

        if (!$latestVr) {
            return 1;
        }

        $latestVrNo = $latestVr->vr_no;
        $newNumber = $latestVrNo + 1;

        return $newNumber;
    }

    public function store(Request $request)
    {
        $request->validate([
            'vr_no' => 'required|unique:cash_deposits,vr_no',
            'vr_date' => 'required|date',
            'rct_no' => 'required',
            'rct_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        // Check if amount exceeds cash in hand
        $cashInHand = Helper::getImprestCashInHand();
        if ($request->amount > $cashInHand) {
            return back()->withErrors(['amount' => 'Amount cannot exceed cash in hand (' . $cashInHand . ')'])->withInput();
        }

        CashDeposit::create([
            'vr_no' => $request->vr_no,
            'vr_date' => $request->vr_date,
            'rct_no' => $request->rct_no,
            'rct_date' => $request->rct_date,
            'amount' => $request->amount,
        ]);

        return redirect()->route('cash-deposits.index')->with('success', 'Cash deposit created successfully.');
    }

    public function edit($id)
    {
        $deposit = CashDeposit::findOrFail($id);
        return response()->json($deposit);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vr_date' => 'required|date',
            'rct_no' => 'required',
            'rct_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $deposit = CashDeposit::findOrFail($id);

        // Check if amount exceeds cash in hand
        // $cashInHand = Helper::getImprestCashInHand();
        // if ($request->amount > $cashInHand) {
        //     return response()->json([
        //         'errors' => ['amount' => ['Amount cannot exceed cash in hand (' . $cashInHand . ')']]
        //     ], 422);
        // }

        $deposit->update([
            'vr_date' => $request->vr_date,
            'rct_no' => $request->rct_no,
            'rct_date' => $request->rct_date,
            'amount' => $request->amount,
        ]);

        session()->flash('message', 'Cash deposit updated successfully');
        return response()->json(['success' => true, 'message' => 'Cash deposit updated successfully']);
    }
}
