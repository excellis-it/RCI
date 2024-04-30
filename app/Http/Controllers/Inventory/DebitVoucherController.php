<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\CreditVoucher;
use Illuminate\Http\Request;
use App\Models\DebitVoucher;
use App\Models\ItemCode;
use App\Models\InventoryType;
use App\Models\InventoryNumber;

class DebitVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $debitVouchers = DebitVoucher::paginate(10);
        $itemCodes = ItemCode::all();
        $inventoryTypes = InventoryType::all();
        $inventoryNumbers = InventoryNumber::all();
        $creditVouchers = CreditVoucher::where('item_type', 'consumable')->groupBy('item_code_id')->select('item_code_id', \DB::raw('SUM(quantity) as total_quantity'))->get();
        
        return view('inventory.debit-vouchers.list', compact('debitVouchers', 'itemCodes', 'inventoryTypes', 'inventoryNumbers', 'creditVouchers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $creditVouchers = DebitVoucher::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('voucher_date', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.debit-vouchers.table', compact('debitVouchers'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventoryNumbers = InventoryNumber::all();
        $creditVouchers = CreditVoucher::where('item_type', 'consumable')->get();
        return view('inventory.debit-vouchers.form', compact('inventoryNumbers', 'creditVouchers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'debit_voucher_no' => 'required | unique:debit_vouchers,debit_voucher_no',
        //     'debit_voucher_date' => 'required',
        //     'debit_voucher_amount' => 'required',
        //     'debit_voucher_description' => 'required',
        // ]);

        $debitVoucher = new DebitVoucher();
        $debitVoucher->inv_no = $request->inv_no;
        $debitVoucher->item_id = $request->item_id;
        $debitVoucher->quantity = $request->quantity;
        $debitVoucher->voucher_no = $request->voucher_no;
        $debitVoucher->voucher_date = $request->voucher_date;
        $debitVoucher->remarks = $request->remarks;
        $debitVoucher->save();

        session()->flash('message', 'Debit Voucher added successfully');
        return response()->json(['success' => 'Debit Voucher added successfully']);
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
        $debitVoucher = DebitVoucher::findOrFail($id);
        $creditVouchers = CreditVoucher::where('item_type', 'consumable')->get();
        $inventoryNumbers = InventoryNumber::all();
        $itemCodes = ItemCode::all();
        $edit = true;

        return response()->json(['view' => view('inventory.debit-vouchers.form', compact('creditVouchers', 'edit', 'debitVoucher', 'inventoryNumbers', 'itemCodes'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $debitVoucher = DebitVoucher::find($id);

        $debitVoucher->inv_no = $request->inv_no;
        $debitVoucher->item_id = $request->item_id;
        $debitVoucher->quantity = $request->quantity;
        $debitVoucher->voucher_no = $request->voucher_no;
        $debitVoucher->voucher_date = $request->voucher_date;
        $debitVoucher->remarks = $request->remarks;
        $debitVoucher->save();

        session()->flash('message', 'Debit Voucher updated successfully');
        return response()->json(['success' => 'Debit Voucher updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(Request $request)
    {
        $debitVoucher = DebitVoucher::findOrFail($request->id);
        $debitVoucher->delete();

        return redirect()->back()->with('message', 'Debit Voucher deleted successfully.');
    }
}
