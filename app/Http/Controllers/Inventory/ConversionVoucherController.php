<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemCode;
use App\Models\InventoryNumber;
use App\Models\ConversionVoucher;
use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\InventoryType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConversionVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemCodes = CreditVoucherDetail::groupBy('item_code','item_code_id')->select('item_code','item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
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

            $date = $request->get('date_entry');
            $conversionVoucherQuery = ConversionVoucher::query();

            if($query){
                $query = str_replace(" ", "%", $query);
                $conversionVoucherQuery->where(function($queryBuilder) use ($query) {
                    $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('voucher_date', 'like', '%' . $query . '%')
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

            return response()->json(['data' => view('inventory.conversion-vouchers.table', compact('conversionVouchers','itemCodes','inventoryTypes','inventoryNumbers'))->render()]);
        }
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
        
        Validator::extend('available_quantity', function ($attribute, $value, $parameters, $validator) {
            $creditVoucherQuant = CreditVoucherDetail::where('item_code', $validator->getData()['item_code'])->sum('quantity');
            return $value <= $creditVoucherQuant;
        });

        $sumQuant = CreditVoucherDetail::where('item_code_id', $request->item_code_id)->sum('quantity');
        
        $request->validate([
            'voucher_date' => 'required',
            'quantity' => ['required', 'numeric', 'min:1', 'available_quantity'],
        ], [
            'quantity.available_quantity' => 'Quantity is less than or equal to '.$sumQuant.'',
        ]);


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
        $conversionVoucher->item_id = $request->item_code_id;
        $conversionVoucher->inv_no = $request->inv_no;
        $conversionVoucher->quantity = $request->quantity;
        $conversionVoucher->voucher_no = $voucherNo;
        $conversionVoucher->voucher_date = $request->voucher_date;
        $conversionVoucher->remarks = $request->remark;
        $conversionVoucher->save();

        // credit voucher quantity reduce

        $creditVouchers = CreditVoucherDetail::where('item_code', $request->item_code_id)->where('quantity', '!=', 0)->get();
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
