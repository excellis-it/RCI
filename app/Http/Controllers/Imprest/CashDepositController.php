<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use App\Models\CashDeposit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashDepositController extends Controller
{
    public function index()
    {
        $cashDeposits = CashDeposit::latest()->paginate(10);
        $currentMonth = Carbon::now()->format('Y-m');
        $lastVrNo = CashDeposit::where(DB::raw("DATE_FORMAT(vr_date, '%Y-%m')"), $currentMonth)
            ->max('vr_no');

        $newVrNo = 1;
        if ($lastVrNo) {
            // Extract the numeric part and increment
            $newVrNo = (int)$lastVrNo + 1;
        }
        return view('imprest.cash-deposits.index', compact('cashDeposits','newVrNo'));
    }

    public function create()
    {
        // Generate VR No (auto-incremented for each month)
        $currentMonth = Carbon::now()->format('Y-m');
        $lastVrNo = CashDeposit::where(DB::raw("DATE_FORMAT(vr_date, '%Y-%m')"), $currentMonth)
            ->max('vr_no');

        $newVrNo = 1;
        if ($lastVrNo) {
            // Extract the numeric part and increment
            $newVrNo = (int)$lastVrNo + 1;
        }

        return view('imprest.cash-deposits.create', compact('newVrNo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vr_no' => 'required',
            'vr_date' => 'required|date',
            'rct_no' => 'required',
            'rct_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        CashDeposit::create($request->all());

        return redirect()->route('cash-deposits.index')
            ->with('success', 'Cash Deposit created successfully.');
    }
}
