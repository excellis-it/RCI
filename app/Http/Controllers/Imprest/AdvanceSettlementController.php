<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvanceSettlement;

class AdvanceSettlementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advance_settlements = AdvanceSettlement::orderBy('id', 'desc')->paginate(10);
        return view('imprest.advance-settlement.list', compact('advance_settlements'));
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
            $advance_settlements = AdvanceSettlement::where(function($queryBuilder) use ($query) {
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

            return view('imprest.advance-settlement.list', compact('advance_settlements'));
        }
    }

    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vr_date' => 'required',
            'chq_no' => 'required',
            'chq_date' => 'required',
            'amount' => 'required',
        ]);

        $voucherText = ImprestResetVoucher::where('status', 1)->first();
        $cashwithdrawal = CashWithdrawal::latest()->first();

        $constantString = $voucherText->voucher_no_text ?? 'RCI-CHESS-IMPRESS-';
        if(isset($cashwithdrawal))
        {
            $serial_no = Str::substr($cashwithdrawal->vr_no, -1);
            $counter = $serial_no + 1;
            // dd($serial_no);
        } else {
            $counter = 1;
        }
        
        $cashwithdrawal = new CashWithdrawal();
        $cashwithdrawal->vr_no = $constantString . $counter;
        $cashwithdrawal->vr_date = $request->vr_date;
        $cashwithdrawal->chq_no = $request->chq_no;
        $cashwithdrawal->chq_date = $request->chq_date;
        $cashwithdrawal->amount = $request->amount;
        $cashwithdrawal->save();

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
