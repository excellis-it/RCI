<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemCode;
use App\Models\InventoryNumber;
use App\Models\ConversionVoucher;
use App\Models\CreditVoucher;
use Illuminate\Support\Facades\Validator;

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
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $conversionVouchers = ConversionVoucher::where(function($queryBuilder) use ($query) {
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

            $itemCodes = ItemCode::all();
            $inventoryTypes = InventoryType::all();
            $inventoryNumbers = InventoryNumber::all();

            return response()->json(['data' => view('inventory.conversion-vouchers.table', compact('creditVouchers','itemCodes','inventoryTypes','inventoryNumbers'))->render()]);
        }
    }

    public function getItemQuantity(Request $request)
    {
        $creditVoucher = CreditVoucher::where('item_code_id', $request->item_code_id)->get()->sum('quantity');
        return response()->json(['quantity' => $creditVoucher]);
    }

    public function getItemQuantityValidation(Request $request)
    {
        $creditVoucher = CreditVoucher::where('item_code_id', $request->item_code_id)->get()->sum('quantity');
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
        
        Validator::extend('available_quantity', function ($attribute, $value, $parameters, $validator) {
            $creditVoucherQuant = CreditVoucher::where('item_code_id', $validator->getData()['item_code_id'])->sum('quantity');
            return $value <= $creditVoucherQuant;
        });

        $sumQuant = CreditVoucher::where('item_code_id', $request->item_code_id)->sum('quantity');
        
        $request->validate([
            'item_code_id' => 'required',
            'voucher_no' => 'required|unique:conversion_vouchers,voucher_no',
            'voucher_date' => 'required',
            'quantity' => ['required', 'numeric', 'min:1', 'available_quantity'],
        ], [
            'quantity.available_quantity' => 'Quantity is less than or equal to '.$sumQuant.'',
        ]);

        $conversionVoucher = new ConversionVoucher();
        $conversionVoucher->item_id = $request->item_code_id;
        $conversionVoucher->inv_no = $request->inv_no;
        $conversionVoucher->quantity = $request->quantity;
        $conversionVoucher->voucher_no = $request->voucher_no;
        $conversionVoucher->voucher_date = $request->voucher_date;
        $conversionVoucher->remarks = $request->remark;
        $conversionVoucher->save();

        // credit voucher quantity reduce

        $creditVouchers = CreditVoucher::where('item_code_id', $request->item_code_id)->where('quantity', '!=', 0)->get();
        $quantity = $request->quantity;
        foreach ($creditVouchers as $creditVoucher) {
            $deductedQuantity = min($creditVoucher->quantity, $quantity);
            $creditVoucher->quantity -= $deductedQuantity;
            $creditVoucher->save();
            
            $quantity -= $deductedQuantity;
            
            if ($quantity <= 0) {
                break;
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
       
        $conversionVoucher = ConversionVoucher::find($id);
        $itemCodes = ItemCode::all();
        $inventoryNumbers = InventoryNumber::all();
        $edit = true;

        return response()->json(['view' => view('inventory.conversion-vouchers.form', compact('conversionVoucher','itemCodes','inventoryNumbers','edit'))->render()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         
        $conversionVoucherUpdate =  ConversionVoucher::where('id', $id)->first();
        $conversionVoucherUpdate->remarks = $request->remark;
        $conversionVoucherUpdate->update();

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
