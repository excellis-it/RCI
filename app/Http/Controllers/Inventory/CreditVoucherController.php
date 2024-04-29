<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreditVoucher;
use App\Models\Item;
use App\Models\ItemType;
use App\Models\InventoryNumber;

class CreditVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemCodes = Item::all();
        $inventoryTypes = ItemType::all();
        $inventoryNumbers = InventoryNumber::all();
        $creditVouchers = CreditVoucher::paginate(10);
        return view('inventory.credit-vouchers.list', compact('creditVouchers', 'itemCodes', 'inventoryTypes', 'inventoryNumbers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $creditVouchers = CreditVoucher::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('voucher_date', 'like', '%' . $query . '%')
                    ->orWhere('item_type', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('price', 'like', '%' . $query . '%')
                    ->orWhere('quantity', 'like', '%' . $query . '%')
                    ->orWhere('supply_order_no', 'like', '%' . $query . '%')
                    ->orWhere('rin', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.credit-vouchers.table', compact('creditVouchers'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $itemCodes = Item::all();
        $inventoryTypes = ItemType::all();
        $inventoryNumbers = InventoryNumber::all();

        return view('inventory.credit-vouchers.form', compact('itemCodes', 'inventoryTypes', 'inventoryNumbers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'credit_voucher_no' => 'required | unique:credit_vouchers,credit_voucher_no',
        //     'credit_voucher_date' => 'required',
        //     'credit_voucher_amount' => 'required',
        //     'credit_voucher_description' => 'required',
        // ]);

        $creditVoucher = new CreditVoucher();
        $creditVoucher->item_code_id = $request->item_code_id;
        $creditVoucher->voucher_no = $request->voucher_no;
        $creditVoucher->voucher_date = $request->voucher_date;
        $creditVoucher->inv_no = $request->inv_no;
        $creditVoucher->description = $request->description;
        $creditVoucher->uom = $request->uom;
        $creditVoucher->item_type = $request->item_type;
        $creditVoucher->price = $request->price;
        $creditVoucher->quantity = $request->quantity;
        $creditVoucher->supply_order_no = $request->supply_order_no;
        $creditVoucher->rin = $request->rin;
        $creditVoucher->save();

        session()->flash('message', 'Credit Voucher added successfully');
        return response()->json(['success' => 'Credit Voucher added successfully']);
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
        $creditVoucher = CreditVoucher::findOrFail($id);
        $itemCodes = Item::all();
        $inventoryTypes = ItemType::all();
        $inventoryNumbers = InventoryNumber::all();
        $edit = true;

        return response()->json(['view' => view('inventory.credit-vouchers.form', compact('creditVoucher', 'edit', 'itemCodes', 'inventoryTypes', 'inventoryNumbers'))->render()]);
        // return view('inventory.credit-vouchers.form', compact('creditVoucher', 'edit', 'itemCodes', 'inventoryTypes', 'inventoryNumbers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'credit_voucher_no' => 'required | unique:credit_vouchers,credit_voucher_no,' . $id,
        //     'credit_voucher_date' => 'required',
        //     'credit_voucher_amount' => 'required',
        //     'credit_voucher_description' => 'required',
        // ]);

        $creditVoucher = CreditVoucher::findOrFail($id);
        $creditVoucher->item_code_id = $request->item_code_id;
        $creditVoucher->voucher_no = $request->voucher_no;
        $creditVoucher->voucher_date = $request->voucher_date;
        $creditVoucher->inv_no = $request->inv_no;
        $creditVoucher->description = $request->description;
        $creditVoucher->uom = $request->uom;
        $creditVoucher->item_type = $request->item_type;
        $creditVoucher->price = $request->price;
        $creditVoucher->quantity = $request->quantity;
        $creditVoucher->supply_order_no = $request->supply_order_no;
        $creditVoucher->rin = $request->rin;
        $creditVoucher->update();

        session()->flash('message', 'Credit Voucher updated successfully');
        return response()->json(['success' => 'Credit Voucher updated successfully']);
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
        $creditVoucher = CreditVoucher::findOrFail($request->id);
        $creditVoucher->delete();

        return redirect()->back()->with('message', 'Credit Voucher deleted successfully.');
    }
}
