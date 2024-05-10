<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\CreditVoucher;
use Illuminate\Http\Request;
use App\Models\DebitVoucher;
use App\Models\ItemCode;
use App\Models\InventoryType;
use App\Models\InventoryNumber;
use Illuminate\Support\Facades\DB;

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
        $creditVouchers = CreditVoucher::where('item_type', 'consumable')->groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
        
        return view('inventory.debit-vouchers.list', compact('debitVouchers', 'itemCodes', 'inventoryTypes', 'inventoryNumbers', 'creditVouchers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $inventoryNumbers = InventoryNumber::all();
            $itemCodes = ItemCode::all();
            $inventoryTypes = InventoryType::all();
            $creditVouchers = CreditVoucher::where('item_type', 'consumable')->groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
            $debitVouchers = DebitVoucher::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('voucher_date', 'like', '%' . $query . '%')
                    ->orWhere('quantity', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.debit-vouchers.table', compact('debitVouchers', 'inventoryNumbers', 'itemCodes', 'inventoryTypes', 'creditVouchers'))->render()]);
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
        $itemQuantity = CreditVoucher::where('item_code_id', $request->item_code_id)->get()->sum('quantity');
        $request->validate([
            'inv_no' => 'required',
            'item_code_id' => 'required',
            'voucher_no' => 'required|unique:debit_vouchers,voucher_no',
            'quantity' => 'required|numeric|min:1|max:'.$itemQuantity,
        ], [
            'quantity.max' => 'The quantity must not be greater than the available quantity ('.$itemQuantity.')',
        ]);

        $debitVoucher = new DebitVoucher();
        $debitVoucher->inv_no = $request->inv_no;
        $debitVoucher->item_id = $request->item_code_id;
        $debitVoucher->quantity = $request->quantity;
        $debitVoucher->voucher_no = $request->voucher_no;
        $debitVoucher->voucher_date = $request->voucher_date;
        $debitVoucher->voucher_type = $request->voucher_type;
        $debitVoucher->remarks = $request->remarks;
        $debitVoucher->save();

        //credit voucher quantity reduce
        $creditVoucher = CreditVoucher::where('item_code_id', $request->item_code_id)->get();

        foreach ($creditVoucher as $credit) {
            
            if ($credit->quantity >= $request->quantity) {
                $credit->quantity -= $request->quantity;
                $credit->save();
                $request->quantity = 0; // Optionally set to 0, if you want to stop further reductions
                break; // Exit the loop once a single credit voucher's quantity is reduced
            } else {
                
                $request->quantity -= $credit->quantity;
                $credit->quantity = 0;
                $credit->save();
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
        $creditVouchers = CreditVoucher::where('item_type', 'consumable')->groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
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
        ],[
            // 'quantity.max' => 'The quantity must not be greater than the available quantity ('.$totalQuantity.')',
        
        ]);

        $debitVoucher = DebitVoucher::find($id);
        $debitVoucher->inv_no = $request->inv_no;
        // $debitVoucher->item_id = $request->item_code_id;
        // $debitVoucher->quantity = $request->quantity;
        $debitVoucher->voucher_date = $request->voucher_date;
        $debitVoucher->voucher_type = $request->voucher_type;
        $debitVoucher->remarks = $request->remarks;
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
        $creditVoucher = CreditVoucher::where('item_code_id', $request->item_code_id)->get()->sum('quantity');
        // $items = CreditVoucher::where('item_type', 'consumable')->groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get(); 
        
        return response()->json(['quantity' => $creditVoucher]);
    }
}
