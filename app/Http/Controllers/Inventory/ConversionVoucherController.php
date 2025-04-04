<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemCode;
use App\Models\InventoryNumber;
use App\Models\ConversionVoucher;
use App\Models\CreditVoucher;
use  App\Models\TransferVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\InventoryType;
use App\Models\ConversionVoucherDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Helpers\Helper;
use App\Models\InventoryItemBalance;
use App\Models\InventoryItemStock;

class ConversionVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $itemCodes = CreditVoucherDetail::groupBy('item_code', 'item_code_id')->select('item_code', 'item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
        // $inventoryNumbers = InventoryNumber::all();
        $itemCodes = ItemCode::all();
        $conversionVouchers = ConversionVoucher::orderBy('id', 'desc')->paginate(10);
        $transferVouchers = TransferVoucher::orderBy('id', 'desc')->get();
        $crvitems = CreditVoucherDetail::pluck('inv_no');
        $inventoryNumbers = InventoryNumber::whereIn('id', $crvitems)->with('creditVoucherDetails.voucherDetail')->get();
        $inventoryNumbersTo = InventoryNumber::with('creditVoucherDetails.voucherDetail')->get();
        return view('inventory.conversion-vouchers.list', compact('conversionVouchers', 'itemCodes', 'inventoryNumbers', 'inventoryNumbersTo', 'transferVouchers'));
    }

    public function getItemsByInvNo(Request $request)
    {



        $invStocks = InventoryItemStock::with('itemCode.ncStatus')->where('inv_id', $request->inv_no)->get();
        return response()->json(['invStocks' => $invStocks]);
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);

            $date = $request->get('date_entry');
            $conversionVoucherQuery = ConversionVoucher::query();

            if ($query) {
                $query = str_replace(" ", "%", $query);
                $conversionVoucherQuery->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                        //   ->orWhere('voucher_date', 'like', '%' . $query . '%')
                        ->orWhereHas('itemCode', function ($q) use ($query) {
                            $q->where('code', 'like', '%' . $query . '%');
                        })
                        ->orWhere('quantity', 'like', '%' . $query . '%');
                });
            }

            if ($date) {
                $conversionVoucherQuery->whereDate('voucher_date', $date);
            }

            $conversionVouchers = $conversionVoucherQuery->orderBy($sort_by, $sort_type)->paginate(10);

            $itemCodes = CreditVoucherDetail::groupBy('item_code')->select('item_code', DB::raw('SUM(quantity) as total_quantity'))->get();
            $inventoryTypes = InventoryType::all();
            $inventoryNumbers = InventoryNumber::all();

            return response()->json(['data' => view('inventory.conversion-vouchers.table', compact('conversionVouchers', 'itemCodes', 'inventoryTypes', 'inventoryNumbers'))->render()]);
        }
    }

    public function conversionGetItemDetails(Request $request)
    {

        $item_quantity = CreditVoucherDetail::where('item_code_id', $request->item_id)->sum('quantity');
        $item_details = ItemCode::where('code', $request->item_id)->first();
        $inventory_number = CreditVoucherDetail::where('item_code_id', $request->item_id)->with('inventoryNumber')->first();

        return response()->json(['success' => true, 'quantity' => $item_quantity, 'item_details' => $item_details, 'inventory_number' => $inventory_number]);
    }

    public function getItemQuantity(Request $request)
    {
        $creditVoucher = CreditVoucherDetail::where('item_code_id', $request->item_code_id)->get()->sum('quantity');
        return response()->json(['quantity' => $creditVoucher]);
    }

    public function getItemQuantityValidation(Request $request)
    {
        $creditVoucher = CreditVoucherDetail::where('item_code_id', $request->item_code_id)->get()->sum('quantity');
        if ($creditVoucher < $request->quantity) {
            return response()->json(['error' => 'Quantity is greater than available quantity']);
        }
        return response()->json(['success' => 'Quantity is valid']);
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

        // Validator::extend('available_quantity', function ($attribute, $value, $parameters, $validator) {
        //     $creditVoucherQuant = CreditVoucherDetail::where('item_code', $validator->getData()['item_code'])->sum('quantity');
        //     return $value <= $creditVoucherQuant;
        // });

        // $sumQuant = CreditVoucherDetail::where('item_code_id', $request->item_code_id)->sum('quantity');

        // $request->validate([
        //     'voucher_date' => 'required',
        //     'quantity' => ['required', 'numeric', 'min:1', 'available_quantity'],
        // ], [
        //     'quantity.available_quantity' => 'Quantity is less than or equal to '.$sumQuant.'',
        // ]);


        // voucher no generate

        $currentDate = Carbon::today();
        $resetDate = Carbon::createFromFormat('Y-m-d', date('Y') . '-04-01')->subDay()->endOfDay();

        if ($currentDate < $resetDate) {
            $resetDate = Carbon::createFromFormat('Y-m-d', (date('Y') - 1) . '-04-01')->subDay()->endOfDay();
        }

        $lastVoucher = ConversionVoucher::where('created_at', '<', $resetDate)
            ->orderBy('voucher_no', 'desc')
            ->first() ?? ConversionVoucher::latest()->first();

        $voucherNo = str_pad($lastVoucher ? ((int) $lastVoucher->voucher_no) + 1 : 1, 4, '0', STR_PAD_LEFT);


        $conversionVoucher = new ConversionVoucher();
        $conversionVoucher->voucher_no = $voucherNo;
        $conversionVoucher->voucher_type = $request->voucher_type;
        $conversionVoucher->voucher_date = $request->voucher_date;
        //  $conversionVoucher->transfer_voucher_number = $request->transfer_voucher_number;
        $conversionVoucher->save();

        foreach ($request->strike_inv_id as $key => $val) {
            // return Helper::getItemCode($request->strike_item_id[$key]);
            $conversionVoucherDetail = new ConversionVoucherDetail;
            $conversionVoucherDetail->conversion_voucher_id = $conversionVoucher->id;
            $conversionVoucherDetail->strike_inv_id = $request->strike_inv_id[$key] ?? null;
            $conversionVoucherDetail->strike_item_id = $request->strike_item_id[$key] ?? null;
            $conversionVoucherDetail->strike_item_code = Helper::getItemCode($request->strike_item_id[$key]) ?? null;
            $conversionVoucherDetail->strike_ledger = $request->strike_ledger[$key] ?? null;
            $conversionVoucherDetail->strike_description = $request->strike_description[$key] ?? null;
            $conversionVoucherDetail->strike_c_nc = $request->strike_c_nc[$key] ?? null;
            $conversionVoucherDetail->strike_quantity = $request->strike_quantity[$key] ?? null;
            $conversionVoucherDetail->strike_rate = $request->strike_rate[$key] ?? null;
            $conversionVoucherDetail->strike_price = $request->strike_price[$key] ?? null;

            $conversionVoucherDetail->reason = $request->reason[$key] ?? null;
            $conversionVoucherDetail->save();

            // update stock
            $existingStockFrom = InventoryItemStock::where('inv_id', $request->strike_inv_id[$key])
                ->where('item_id', $request->strike_item_id[$key])
                ->first();

            if ($existingStockFrom) {

                $existingStockFrom->quantity_balance = $existingStockFrom->quantity_balance - $request->strike_quantity[$key];
                $existingStockFrom->save();
            }
        }

        foreach ($request->brought_inv_id as $key => $val) {
            $conversionVoucherDetail = new ConversionVoucherDetail;
            $conversionVoucherDetail->conversion_voucher_id = $conversionVoucher->id;
            $conversionVoucherDetail->brought_inv_id = $request->brought_inv_id[$key] ?? null;
            $conversionVoucherDetail->brought_item_id = $request->brought_item_id[$key] ?? null;
            $conversionVoucherDetail->brought_item_code = $request->brought_item_id[$key]
                ? Helper::getItemCode($request->brought_item_id[$key])
                : null;
            $conversionVoucherDetail->brought_ledger = $request->brought_ledger[$key] ?? null;
            $conversionVoucherDetail->brought_description = $request->brought_description[$key] ?? null;
            $conversionVoucherDetail->brought_c_nc = $request->brought_c_nc[$key] ?? null;
            $conversionVoucherDetail->brought_quantity = $request->brought_quantity[$key] ?? null;
            $conversionVoucherDetail->brought_rate = $request->brought_rate[$key] ?? null;
            $conversionVoucherDetail->brought_price = $request->brought_price[$key] ?? null;
            $conversionVoucherDetail->reason = $request->reason[$key] ?? null;
            $conversionVoucherDetail->save();


            // update stock

            $existingStockTo = InventoryItemStock::where('inv_id', $request->brought_inv_id[$key])
                ->where('item_id', $request->brought_item_id[$key])
                ->first();

            if ($existingStockTo) {
                // If stock exists, add to the quantity balance
                $existingStockTo->quantity_balance += $request->brought_quantity[$key] ?? 0;
                $existingStockTo->save();
            } else {
                // Create new stock record
                $inventoryItemStock = new InventoryItemStock();
                $inventoryItemStock->inv_id = $request->brought_inv_id[$key] ?? null;
                $inventoryItemStock->item_id = $request->brought_item_id[$key] ?? null;
                $inventoryItemStock->quantity = $request->brought_quantity[$key] ?? 0;
                $inventoryItemStock->quantity_balance = $request->brought_quantity[$key] ?? 0;
                $inventoryItemStock->unit_price = $request->brought_rate[$key] ?? 0;
                $inventoryItemStock->save();
            }
        }

        session()->flash('message', 'Conversion Voucher added successfully');
        return response()->json(['success' => 'Conversion Voucher added successfully']);
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
        $conversionVoucher = ConversionVoucher::with('conversionVoucherDetails')->find($id);
        $itemCodes = ItemCode::all();
        $crvitems = CreditVoucherDetail::pluck('inv_no');
        $inventoryNumbers = InventoryNumber::whereIn('id', $crvitems)->get();
        $transferVouchers = TransferVoucher::orderBy('id', 'desc')->get();
        $edit = true;

        return response()->json(['view' => view('inventory.conversion-vouchers.form', compact('conversionVoucher', 'itemCodes', 'inventoryNumbers', 'edit', 'transferVouchers'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $conversionVoucherUpdate = ConversionVoucher::findOrFail($id);
        $conversionVoucherUpdate->voucher_type = $request->voucher_type;
        $conversionVoucherUpdate->voucher_date = $request->voucher_date;
        $conversionVoucherUpdate->update();

        // Delete existing details to replace with new ones
        $conversionVoucherDetails = ConversionVoucherDetail::where('conversion_voucher_id', $id)->get();

        // Revert stock changes from original details
        foreach ($conversionVoucherDetails as $detail) {
            if (!empty($detail->strike_item_id) && !empty($detail->strike_inv_id)) {
                // Add back to inventory what was previously removed
                $existingStockFrom = InventoryItemStock::where('inv_id', $detail->strike_inv_id)
                    ->where('item_id', $detail->strike_item_id)
                    ->first();

                if ($existingStockFrom) {
                    $existingStockFrom->quantity_balance = $existingStockFrom->quantity_balance + $detail->strike_quantity;
                    $existingStockFrom->save();
                }
            }

            if (!empty($detail->brought_item_id) && !empty($detail->brought_inv_id)) {
                // Remove from inventory what was previously added
                $existingStockTo = InventoryItemStock::where('inv_id', $detail->brought_inv_id)
                    ->where('item_id', $detail->brought_item_id)
                    ->first();

                if ($existingStockTo) {
                    $existingStockTo->quantity_balance -= $detail->brought_quantity;
                    $existingStockTo->save();
                }
            }
        }

        // Delete old details
        ConversionVoucherDetail::where('conversion_voucher_id', $id)->delete();

        // Create new Strike Off entries
        if ($request->strike_inv_id) {
            foreach ($request->strike_inv_id as $key => $val) {
                if (!empty($val) && !empty($request->strike_item_id[$key])) {
                    $conversionVoucherDetail = new ConversionVoucherDetail;
                    $conversionVoucherDetail->conversion_voucher_id = $id;
                    $conversionVoucherDetail->strike_inv_id = $request->strike_inv_id[$key] ?? null;
                    $conversionVoucherDetail->strike_item_id = $request->strike_item_id[$key] ?? null;
                    $conversionVoucherDetail->strike_item_code = Helper::getItemCode($request->strike_item_id[$key]) ?? null;
                    $conversionVoucherDetail->strike_ledger = $request->strike_ledger[$key] ?? null;
                    $conversionVoucherDetail->strike_description = $request->strike_description[$key] ?? null;
                    $conversionVoucherDetail->strike_c_nc = $request->strike_c_nc[$key] ?? null;
                    $conversionVoucherDetail->strike_quantity = $request->strike_quantity[$key] ?? null;
                    $conversionVoucherDetail->strike_rate = $request->strike_rate[$key] ?? null;
                    $conversionVoucherDetail->strike_price = $request->strike_price[$key] ?? null;
                    $conversionVoucherDetail->reason = $request->reason[$key] ?? null;
                    $conversionVoucherDetail->save();

                    // Update stock
                    $existingStockFrom = InventoryItemStock::where('inv_id', $request->strike_inv_id[$key])
                        ->where('item_id', $request->strike_item_id[$key])
                        ->first();

                    if ($existingStockFrom) {
                        $existingStockFrom->quantity_balance = $existingStockFrom->quantity_balance - $request->strike_quantity[$key];
                        $existingStockFrom->save();
                    }
                }
            }
        }

        // Create new Brought On entries
        if ($request->brought_inv_id) {
            foreach ($request->brought_inv_id as $key => $val) {
                if (!empty($val) && !empty($request->brought_item_id[$key])) {
                    $conversionVoucherDetail = new ConversionVoucherDetail;
                    $conversionVoucherDetail->conversion_voucher_id = $id;
                    $conversionVoucherDetail->brought_inv_id = $request->brought_inv_id[$key] ?? null;
                    $conversionVoucherDetail->brought_item_id = $request->brought_item_id[$key] ?? null;
                    $conversionVoucherDetail->brought_item_code = $request->brought_item_id[$key]
                        ? Helper::getItemCode($request->brought_item_id[$key])
                        : null;
                    $conversionVoucherDetail->brought_ledger = $request->brought_ledger[$key] ?? null;
                    $conversionVoucherDetail->brought_description = $request->brought_description[$key] ?? null;
                    $conversionVoucherDetail->brought_c_nc = $request->brought_c_nc[$key] ?? null;
                    $conversionVoucherDetail->brought_quantity = $request->brought_quantity[$key] ?? null;
                    $conversionVoucherDetail->brought_rate = $request->brought_rate[$key] ?? null;
                    $conversionVoucherDetail->brought_price = $request->brought_price[$key] ?? null;
                    $conversionVoucherDetail->reason = $request->reason[$key] ?? null;
                    $conversionVoucherDetail->save();

                    // Update stock
                    $existingStockTo = InventoryItemStock::where('inv_id', $request->brought_inv_id[$key])
                        ->where('item_id', $request->brought_item_id[$key])
                        ->first();

                    if ($existingStockTo) {
                        // If stock exists, add to the quantity balance
                        $existingStockTo->quantity_balance += $request->brought_quantity[$key] ?? 0;
                        $existingStockTo->save();
                    } else {
                        // Create new stock record
                        $inventoryItemStock = new InventoryItemStock();
                        $inventoryItemStock->inv_id = $request->brought_inv_id[$key] ?? null;
                        $inventoryItemStock->item_id = $request->brought_item_id[$key] ?? null;
                        $inventoryItemStock->quantity = $request->brought_quantity[$key] ?? 0;
                        $inventoryItemStock->quantity_balance = $request->brought_quantity[$key] ?? 0;
                        $inventoryItemStock->save();
                    }
                }
            }
        }

        session()->flash('message', 'Conversion Voucher updated successfully');
        return response()->json(['success' => 'Conversion Voucher updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function deleteConversionVoucher(Request $request)
    {

        $conversionVoucher = ConversionVoucher::find($request->id);
        $conversionVoucher->delete();

        return redirect()->back()->with('error', 'Conversion Voucher deleted successfully');
    }
}
