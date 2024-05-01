<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemCode;
use App\Models\InventoryNumber;
use App\Models\ConversionVoucher;

class ConversionVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $itemCodes = ItemCode::all();
        $inventoryNumbers = InventoryNumber::all();
        $conversionVouchers = ConversionVoucher::paginate(10);
        return view('inventory.conversion-vouchers.list', compact('conversionVouchers', 'itemCodes', 'inventoryNumbers'));
    }

    public function fetchData(Request $request)
    {
        $conversionVouchers = CreditVoucher::paginate(10);
        return view('inventory.conversion-vouchers.table', compact('conversionVouchers'));
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
        //
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
