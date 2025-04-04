<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use Illuminate\Http\Request;
use App\Models\DebitVoucher;
use App\Models\ItemCode;
use App\Models\InventoryType;
use App\Models\InventoryNumber;
use App\Models\DebitVoucherDetail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\InventoryItemBalance;
use App\Helpers\Helper;
use App\Models\InventoryItemStock;
use App\Models\GstPercentage;

class DebitVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $debitVouchers = DebitVoucher::orderBy('id', 'desc')->paginate(10);
        $itemCodes = ItemCode::all();
        $inventoryTypes = InventoryType::all();
        $inventoryNumbers = InventoryNumber::with('creditVoucherDetails.voucherDetail')->get();
        $gstPercentages = GstPercentage::all();
        $creditVouchers = CreditVoucherDetail::where('item_type', 'consumable')->groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();

        return view('inventory.debit-vouchers.list', compact('debitVouchers', 'gstPercentages', 'itemCodes', 'inventoryTypes', 'inventoryNumbers', 'creditVouchers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $date = $request->get('date_entry');
            $debitVoucherQuery = DebitVoucher::query();


            if ($query) {
                $query = str_replace(" ", "%", $query);
                $debitVoucherQuery->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                        // ->orWhere('voucher_date', 'like', '%' . $query . '%')
                        ->orWhere('voucher_type', 'like', '%' . $query . '%')
                        // inventory number
                        ->orWhereHas('inventoryNumbers', function ($queryBuilder) use ($query) {
                            $queryBuilder->where('inv_no', 'like', '%' . $query . '%');
                        });
                });
            }

            if ($date) {
                $debitVoucherQuery->whereDate('voucher_date', $date);
            }

            $debitVouchers = $debitVoucherQuery->orderBy($sort_by, $sort_type)->paginate(10);

            $inventoryNumbers = InventoryNumber::all();
            $itemCodes = ItemCode::all();
            $inventoryTypes = InventoryType::all();
            $creditVouchers = CreditVoucherDetail::where('item_type', 'consumable')->groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();

            return response()->json(['data' => view('inventory.debit-vouchers.table', compact('debitVouchers', 'inventoryNumbers', 'itemCodes', 'inventoryTypes', 'creditVouchers'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventoryNumbers = InventoryNumber::all();
        $creditVouchers = CreditVoucherDetail::where('item_type', 'consumable')->get();
        return view('inventory.debit-vouchers.form', compact('inventoryNumbers', 'creditVouchers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $itemQuantity = CreditVoucherDetail::where('item_code_id', $request->item_code_id)->get()->sum('quantity');
        $request->validate([
            'inv_no' => 'required',
            'voucher_date' => 'required',
            'voucher_type' => 'required',
        ]);

        //voucher no
        $currentDate = date('Y-m-d');
        $resetDate = date('Y') . '-04-01';
        $resetDateTimestamp = Carbon::createFromFormat('Y-m-d', $resetDate)->subDay()->endOfDay();

        // If the current date is before the reset date, get the reset date for the previous year
        if ($currentDate < $resetDate) {
            $resetDate = (date('Y') - 1) . '-04-01';
            $resetDateTimestamp = Carbon::createFromFormat('Y-m-d', $resetDate)->subDay()->endOfDay();
        }

        // Get the last voucher number that was created before the reset date
        $lastVoucher1 = DebitVoucher::where('created_at', '<', $resetDateTimestamp)
            ->orderBy('voucher_no', 'desc')
            ->first();

        if ($lastVoucher1) {
            $lastVoucher = $lastVoucher1;
        } else {
            $lastVoucher = DebitVoucher::latest()->first();
        }

        // If there are no vouchers yet, or if the last voucher was created before the reset date, start with 0001, otherwise increment the last voucher number
        $voucherNo = $lastVoucher ? ((int) $lastVoucher->voucher_no) + 1 : 1;

        // Pad the voucher number with leading zeros to ensure it's always 4 digits
        $voucherNo = str_pad($voucherNo, 4, '0', STR_PAD_LEFT);


        $debitVoucher = new DebitVoucher();
        $debitVoucher->inv_no = $request->inv_no;
        $debitVoucher->voucher_no = $voucherNo;
        $debitVoucher->voucher_date = $request->voucher_date;
        $debitVoucher->group = $request->group;
        $debitVoucher->division = $request->division;
        $debitVoucher->voucher_type = 'debit';

        if ($debitVoucher->save()) {
            $latestVoucher = DebitVoucher::latest()->first();

            // Group items by item code for easier processing
            $itemsByCode = [];
            foreach ($request->item_code_id as $key => $itemCode) {
                $itemsByCode[$itemCode][] = [
                    'quantity' => $request->quantity[$key],
                    'price' => $request->price[$key],
                    'item_type' => $request->item_type[$key],
                    'item_desc' => $request->item_desc[$key],
                    'remarks' => $request->remarks[$key]
                ];
            }

            // Process each group of items by item code
            foreach ($itemsByCode as $itemCode => $items) {
                $creditVouchers = CreditVoucherDetail::where('item_code', $itemCode)
                    ->where('inv_no', $request->inv_no)
                    ->orderBy('id', 'asc') // Assuming you want to reduce from the oldest records first
                    ->get();

                // Group credit vouchers by item code
                $creditVouchersByCode = $creditVouchers->groupBy('item_code');

                foreach ($items as $item) {
                    // Create DebitVoucherDetail for each item
                    $debitVoucherDetail = new DebitVoucherDetail();
                    $debitVoucherDetail->debit_voucher_id = $latestVoucher->id;
                    $debitVoucherDetail->item_id = $itemCode; // Assuming item_id corresponds to item code
                    $debitVoucherDetail->quantity = $item['quantity'];
                    $debitVoucherDetail->price = $item['price'];
                    $debitVoucherDetail->item_type = $item['item_type'];
                    $debitVoucherDetail->item_desc = $item['item_desc'];
                    $debitVoucherDetail->remarks = $item['remarks'];
                    $debitVoucherDetail->save();

                    // Reduce quantity from credit vouchers
                    $remainingQuantity = $item['quantity'];
                    // foreach ($creditVouchersByCode[$itemCode] as $credit) {
                    //     if ($credit->quantity >= $remainingQuantity) {
                    //         $credit->quantity -= $remainingQuantity;
                    //         $credit->save();
                    //         break; // Exit the loop once quantity is reduced
                    //     } else {
                    //         $remainingQuantity -= $credit->quantity;
                    //         $credit->quantity = 0;
                    //         $credit->save();
                    //     }
                    // }

                    // $creditV = CreditVoucherDetail::where('item_code', $itemCode)->where('inv_no', $request->inv_no)->first();
                    // if ($creditV->quantity >= $item['quantity']) {
                    //     $creditV->quantity -= $item['quantity'];
                    //     $creditV->save();
                    // }


                    $inventoryItem = new InventoryItemBalance();
                    $inventoryItem->voucher_type = 'debit_voucher';
                    $inventoryItem->item_id = $itemCode ?? null;
                    $inventoryItem->item_code = Helper::getItemCode($itemCode) ?? null;
                    $inventoryItem->inv_id = $request->inv_no ?? null;
                    $inventoryItem->quantity = $item['quantity'] ?? 0;
                    $inventoryItem->unit_cost = $item['unit_price'] ?? 0.00;
                    $inventoryItem->total_cost = $item['price'] ?? 0.00;
                    $inventoryItem->gst_amount = 0.00;
                    $inventoryItem->discount_amount = 0.00;
                    $inventoryItem->total_amount = $item['price'] ?? 0.00;
                    $inventoryItem->save();


                    // update stock
                    $existingStock = InventoryItemStock::where('inv_id', $request->inv_no)
                        ->where('item_id', $itemCode)
                        ->first();

                    if ($existingStock) {
                        // If stock exists, add to the quantity balance
                        $existingStock->quantity_balance -= $item['quantity'] ?? 0;
                        $existingStock->updated_at = Carbon::now();
                        $existingStock->save();
                    }
                }
            }
        }

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
        $creditVouchers = CreditVoucherDetail::where('item_type', 'consumable')->groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
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

        // $itemQuantity = CreditVoucher::where('item_code_id', $debitVoucher->item_id)->get()->sum('quantity');
        // $totalQuantity = $itemQuantity + $request->quantity;

        $request->validate([
            'inv_no' => 'required',
            // 'quantity' => 'required|numeric|min:1|max:'.$totalQuantity,
        ], [
            // 'quantity.max' => 'The quantity must not be greater than the available quantity ('.$totalQuantity.')',

        ]);

        $debitVoucher = DebitVoucher::find($id);
        $debitVoucher->inv_no = $request->inv_no;
        // $debitVoucher->item_id = $request->item_code_id;
        // $debitVoucher->quantity = $request->quantity;
        $debitVoucher->voucher_date = $request->voucher_date;
        $debitVoucher->voucher_type = $request->voucher_type;
        $debitVoucher->remarks = $request->remarks;
        $debitVoucher->group = $request->group;
        $debitVoucher->division = $request->division;
        $debitVoucher->voucher_type = 'debit';
        $debitVoucher->update();

        // //credit voucher quantity reduce and increase
        // $creditVoucher = CreditVoucher::where('item_code_id', $debitVoucher->item_id)->get();

        // //add or reduce quantity as per the request
        // foreach ($creditVoucher as $credit) {
        //     if ($credit->quantity >= $request->quantity) {
        //         $credit->quantity -= $request->quantity;
        //         $credit->save();
        //         $request->quantity = 0; // Optionally set to 0, if you want to stop further reductions
        //         break; // Exit the loop once a single credit voucher's quantity is reduced
        //     } else if ($credit->quantity < $request->quantity) {
        //         $difference = $request->quantity - $credit->quantity;
        //         $credit->quantity += $difference;
        //         $credit->save();
        //         $request->quantity -= $difference;
        //     } else {
        //         $request->quantity -= $credit->quantity;
        //         $credit->quantity = 0;
        //         $credit->save();
        //     }
        // }





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

    public function getItemQuantity(Request $request)
    {
        $creditVoucher = CreditVoucherDetail::where('item_code_id', $request->item_code_id)->get()->sum('quantity');
        // $items = CreditVoucher::where('item_type', 'consumable')->groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();

        return response()->json(['quantity' => $creditVoucher]);
    }

    public function getItemsByInvNo(Request $request)
    {


        //  $creditVouchers = CreditVoucherDetail::where('item_type', 'Consumable')->where('inv_no', $request->inv_no)->groupBy('item_code')->select('item_code', DB::raw('price as unit_rate',), DB::raw('SUM(quantity) as total_quantity',), DB::raw('SUM(total_price) as total_price'))->with('itemCodes')->get();
        // $creditVouchers = CreditVoucherDetail::where('item_type', 'Consumable')
        //     ->where('inv_no', $request->inv_no)
        //     ->with(['itemCodes', 'itemCodes.ncStatus'])
        //     ->get();
        // foreach ($creditVouchers as $creditVoucher) {
        //     foreach ($creditVoucher->itemCodes as $itemCode) {
        //         if (is_object($itemCode)) {
        //             $itemCode->nc_status_name = $itemCode->ncStatus->status ?? '';
        //         }
        //     }
        // }

        $invStocks = InventoryItemStock::with('itemCode.ncStatus')->where('inv_id', $request->inv_no)->get();
        // return $invStocks;
        // dd($creditVouchers);
        return response()->json(['invStocks' => $invStocks]);
    }

    public function getItemDetails(Request $request)
    {
        $item = ItemCode::where('id', $request->item_code_id)->first();
        if ($item) {
            return response()->json([
                'item' => $item
            ]);
        }

        return response()->json(['error' => 'Item not found'], 404);
    }
}
