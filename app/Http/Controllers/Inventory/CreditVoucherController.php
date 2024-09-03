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
use App\Models\CreditVoucherDetail;
use App\Models\Rin;
use App\Models\InventoryProject;
use App\Models\Uom;
use Carbon\Carbon;

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
        $rins = Rin::all();
        $projects = InventoryProject::all();
        $uoms = Uom::all();
        return view('inventory.credit-vouchers.list', compact('creditVouchers', 'itemCodes', 'inventoryTypes', 'inventoryNumbers', 'members', 'lastVoucher', 'supplyOrders', 'rins', 'projects', 'uoms'));
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
        // dd($request->all());
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
        $resetDateTimestamp = Carbon::createFromFormat('Y-m-d', $resetDate)->subDay()->endOfDay();

        // If the current date is before the reset date, get the reset date for the previous year
        if ($currentDate < $resetDate) {
            $resetDate = (date('Y') - 1) . '-04-01';
            $resetDateTimestamp = Carbon::createFromFormat('Y-m-d', $resetDate)->subDay()->endOfDay();
        }

        // Get the last voucher number that was created before the reset date
        $lastVoucher1 = CreditVoucher::where('created_at', '<', $resetDateTimestamp)
            ->orderBy('voucher_no', 'desc')
            ->first();

        if($lastVoucher1) {
            $lastVoucher = $lastVoucher1;
        } else {
            $lastVoucher = CreditVoucher::latest()->first();
        }

        // If there are no vouchers yet, or if the last voucher was created before the reset date, start with 0001, otherwise increment the last voucher number
        $voucherNo = $lastVoucher ? ((int) $lastVoucher->voucher_no) + 1 : 1;

        // Pad the voucher number with leading zeros to ensure it's always 4 digits
        $voucherNo = str_pad($voucherNo, 4, '0', STR_PAD_LEFT);


        $creditVoucher = new CreditVoucher();
        $creditVoucher->voucher_no = $voucherNo;
        $creditVoucher->voucher_date = $request->voucher_date;
        if($creditVoucher->save()) {
            $lastCreditVoucher = CreditVoucher::latest()->first();

            if(count($request->item_code_id) > 0) {
                foreach ($request->item_code_id as $key => $value) {
                    $creditVoucherDetail = new CreditVoucherDetail();
                    $creditVoucherDetail->credit_voucher_id = $lastCreditVoucher->id ?? null;
                    $creditVoucherDetail->item_code_id = $request->item_code_id[$key] ?? null;
                    $creditVoucherDetail->inv_no = $request->inv_no[$key] ?? null;
                    $creditVoucherDetail->description = $request->description[$key] ?? null;
                    $creditVoucherDetail->uom = $request->uom_id[$key] ?? null;
                    $creditVoucherDetail->item_type = $request->item_type[$key] ?? null;
                    $creditVoucherDetail->price = $request->price[$key] ?? null;
                    $creditVoucherDetail->quantity = $request->quantity[$key] ?? null;
                    $creditVoucherDetail->supply_order_no = $request->supply_order_no[$key] ?? null;
                    $creditVoucherDetail->rin = $request->rin[$key] ?? null;
                    $creditVoucherDetail->member_id = $request->member_id[$key] ?? null;
                    $creditVoucherDetail->order_type = $request->order_type[$key] ?? null;
                    $creditVoucherDetail->tax = $request->tax[$key] ?? null;
                    $creditVoucherDetail->tax_amt = $request->tax_amt[$key] ?? null;
                    $creditVoucherDetail->total_price = $request->total_price[$key] ?? null;
                    $creditVoucherDetail->consigner = $request->consigner[$key] ?? null;
                    $creditVoucherDetail->save();
                }
            }
            
        }

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
        $rins = Rin::all();
        $projects = InventoryProject::all();
        $uoms = Uom::all();
        $edit = true;

        return response()->json(['view' => view('inventory.credit-vouchers.form', compact('creditVoucher', 'edit', 'itemCodes', 'inventoryTypes', 'inventoryNumbers', 'supplyOrders', 'members', 'uoms', 'rins', 'projects'))->render()]);
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
        $creditVoucher->uom = $request->uom_id;
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
        // dd($request->all());
        $itemCode = ItemCode::findOrFail($request->item_code_id);
        $uom = Uom::findOrFail($itemCode->uom);
        // $inventoryType = InventoryType::findOrFail($itemCode->inventory_type_id);
        return response()->json(['item_type' => $itemCode->item_type, 'description' => $itemCode->description, 'uom' => $uom->name, 'uom_id' => $uom->id]);
    }
}
