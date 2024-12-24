<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amount;
use App\Models\CashInBank;

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
