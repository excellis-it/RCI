<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreditVoucher;
use App\Models\ItemCode;
use App\Models\InventoryType;
use App\Models\InventoryNumber;
use App\Models\Member;
use App\Models\SupplyOrder;

class CreditVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemCodes = ItemCode::all();
        $inventoryTypes = InventoryType::all();
        $inventoryNumbers = InventoryNumber::all();
        $creditVouchers = CreditVoucher::paginate(10);
        $members = Member::all();
        $lastVoucher = CreditVoucher::latest()->first();
        $supplyOrders = SupplyOrder::all();
        return view('inventory.credit-vouchers.list', compact('creditVouchers', 'itemCodes', 'inventoryTypes', 'inventoryNumbers', 'members', 'lastVoucher', 'supplyOrders'));
    }

    public function fetchData(Request $request)
    {
      
        if ($request->ajax()) {
            $sort_by = $request->get('sortby', 'id'); // Default sort by 'id' if not provided
            $sort_type = $request->get('sorttype', 'asc'); // Default sort type 'asc' if not provided
            $query = $request->get('query');
            $date = $request->get('date_entry');
            $creditVoucherQuery = CreditVoucher::query();

            if($query){
                $query = str_replace(" ", "%", $query);
                $creditVoucherQuery->where(function($queryBuilder) use ($query) {
                    $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                        ->orWhere('voucher_date', 'like', '%' . $query . '%')
                        ->orWhere('item_type', 'like', '%' . $query . '%')
                        ->orWhere('description', 'like', '%' . $query . '%')
                        ->orWhere('total_price', 'like', '%' . $query . '%')
                        ->orWhere('quantity', 'like', '%' . $query . '%')
                        ->orWhere('supply_order_no', 'like', '%' . $query . '%')
                        ->orWhereHas('itemCode', function ($q) use ($query) {
                            $q->where('code', 'like', '%' . $query . '%');
                        })
                        ->orWhere('rin', 'like', '%' . $query . '%');
                });
            }

            if ($date) {
                $creditVoucherQuery->whereDate('voucher_date', $date);
            }

            $creditVouchers = $creditVoucherQuery->orderBy($sort_by, $sort_type)->paginate(10);

            $itemCodes = ItemCode::all();
            $inventoryTypes = InventoryType::all();
            $inventoryNumbers = InventoryNumber::all();

            return response()->json([
                'data' => view('inventory.credit-vouchers.table', compact('creditVouchers','itemCodes','inventoryTypes','inventoryNumbers'))->render()
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $itemCodes = ItemCode::all();
        $inventoryTypes = InventoryType::all();
        $inventoryNumbers = InventoryNumber::all();

        return view('inventory.credit-vouchers.form', compact('itemCodes', 'inventoryTypes', 'inventoryNumbers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_code_id' => 'required',
            'inv_no' => 'required',
            'supply_order_no' => 'required',
            'order_type' => 'required',
        ]);

        //auto increment 4 digit voucher number
        // Get the current date
        $currentDate = date('Y-m-d');

        // Get the date for 1st April of the current year
        $resetDate = date('Y') . '-04-01';

        // If the current date is before the reset date, get the reset date for the previous year
        if ($currentDate < $resetDate) {
            $resetDate = (date('Y') - 1) . '-04-01';
        }

        // Get the last voucher number that was created before the reset date
        $lastVoucher = CreditVoucher::where('created_at', '<', $resetDate)
            ->orderBy('voucher_no', 'desc')
            ->first();

        // If there are no vouchers yet, or if the last voucher was created before the reset date, start with 0001, otherwise increment the last voucher number
        $voucherNo = $lastVoucher ? ((int) $lastVoucher->voucher_no) + 1 : 1;

        // Pad the voucher number with leading zeros to ensure it's always 4 digits
        $voucherNo = str_pad($voucherNo, 4, '0', STR_PAD_LEFT);


        $creditVoucher = new CreditVoucher();
        $creditVoucher->item_code_id = $request->item_code_id;
        $creditVoucher->voucher_no = $voucherNo;
        $creditVoucher->voucher_date = $request->voucher_date;
        $creditVoucher->inv_no = $request->inv_no;
        $creditVoucher->description = $request->description;
        $creditVoucher->uom = $request->uom;
        $creditVoucher->item_type = $request->item_type;
        $creditVoucher->tax = intval($request->tax);
        $creditVoucher->price = $request->price;
        $creditVoucher->total_price = $request->total_price;
        $creditVoucher->quantity = $request->quantity;
        $creditVoucher->supply_order_no = $request->supply_order_no;
        $creditVoucher->rin = $request->rin;
        $creditVoucher->member_id = $request->member_id;
        $creditVoucher->order_type = $request->order_type;
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
        $itemCodes = ItemCode::all();
        $inventoryTypes = InventoryType::all();
        $inventoryNumbers = InventoryNumber::all();
        $supplyOrders = SupplyOrder::all();
        $members = Member::all();
        $edit = true;

        return response()->json(['view' => view('inventory.credit-vouchers.form', compact('creditVoucher', 'edit', 'itemCodes', 'inventoryTypes', 'inventoryNumbers', 'supplyOrders', 'members'))->render()]);
        // return view('inventory.credit-vouchers.form', compact('creditVoucher', 'edit', 'itemCodes', 'inventoryTypes', 'inventoryNumbers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'item_code_id' => 'required',
            // 'inv_no' => 'required',
            
        ]);

        $creditVoucher = CreditVoucher::findOrFail($id);
        // $creditVoucher->item_code_id = $request->item_code_id;
        // $creditVoucher->voucher_no = $request->voucher_no;
        $creditVoucher->voucher_date = $request->voucher_date;
        // $creditVoucher->inv_no = $request->inv_no;
        // $creditVoucher->description = $request->description;
        $creditVoucher->uom = $request->uom;
        // $creditVoucher->item_type = $request->item_type;
        $creditVoucher->tax = intval($request->tax);
        $creditVoucher->price = $request->price;
        $creditVoucher->total_price = $request->total_price;
        $creditVoucher->quantity = $request->quantity;
        $creditVoucher->supply_order_no = $request->supply_order_no;
        $creditVoucher->rin = $request->rin;
        // $creditVoucher->member_id = $request->member_id;
        $creditVoucher->order_type = $request->order_type;
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

    public function getItemType(Request $request)
    {
        $itemCode = ItemCode::findOrFail($request->item_code_id);
        // $inventoryType = InventoryType::findOrFail($itemCode->inventory_type_id);
        return response()->json(['item_type' => $itemCode->item_type, 'description' => $itemCode->description]);
    }
}
