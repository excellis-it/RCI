<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImprestResetVoucher;

class ImprestResetVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = ImprestResetVoucher::all();
        return view('imprest.vouchers.list', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('imprest.vouchers.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'voucher_no' => 'required|string',
        //     'amount' => 'required|numeric',
        //     'date' => 'required|date',
        //     'description' => 'required|string',
        // ]);

        $voucher = new ImprestResetVoucher();
        $voucher->voucher_no_text = $request->voucher_no_text;
        $voucher->status = $request->status;
        $voucher->save();

        return response()->json(['message' => 'Voucher created successfully.']);
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
