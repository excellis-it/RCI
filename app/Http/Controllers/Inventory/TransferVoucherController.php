<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferVoucher;
use App\Models\InventoryNumber;
use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\ItemCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\TransferVoucherDetail;
use App\Models\InventoryItemBalance;
use App\Helpers\Helper;



class TransferVoucherController extends Controller
{
    public function index()
    {
        $transferVouchers = TransferVoucher::orderBy('id', 'desc')->paginate(10);
        $inventoryNumbers = InventoryNumber::with('creditVoucherDetails.voucherDetail')->get();
        // foreach ($inventoryNumbers as $inv) {
        //     $inv['crv_voucher_no'] = $inv->creditVoucherDetails->voucherDetail->voucher_no;
        // }
        // return $inventoryNumbers;
        $creditVouchers = CreditVoucherDetail::groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
        return view('inventory.transfer-vouchers.list', compact('transferVouchers', 'inventoryNumbers', 'creditVouchers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $date = $request->get('date_entry');

            $transferVoucherQuery = TransferVoucher::query();
            if ($query) {
                $query = str_replace(" ", "%", $query);
                $transferVoucherQuery->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                        ->orWhere('voucher_no', 'like', '%' . $query . '%');
                     //   ->orWhere('voucher_date', 'like', '%' . $query . '%');
                });
            }

            if ($date) {
                $transferVoucherQuery->whereDate('voucher_date', $date);
            }

            $transferVouchers = $transferVoucherQuery->orderBy($sort_by, $sort_type)->paginate(10);

            return response()->json(['data' => view('inventory.transfer-vouchers.table', compact('transferVouchers'))->render()]);
        }
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
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'voucher_date' => 'required|date',
    //         'from_inv_number' => 'required',
    //         'to_inv_number' => 'required',
    //         'item_code_id' => 'required',
    //         'quantity' => 'required',
    //     ]);

    //     $currentDate = Carbon::today();
    //     $resetDate = Carbon::createFromFormat('Y-m-d', date('Y') . '-04-01')->subDay()->endOfDay();

    //     if ($currentDate < $resetDate) {
    //         $resetDate = Carbon::createFromFormat('Y-m-d', (date('Y') - 1) . '-04-01')->subDay()->endOfDay();
    //     }

    //     $lastVoucher = TransferVoucher::where('created_at', '<', $resetDate)
    //         ->orderBy('voucher_no', 'desc')
    //         ->first() ?? TransferVoucher::latest()->first();

    //     $voucherNo = str_pad($lastVoucher ? ((int) $lastVoucher->voucher_no) + 1 : 1, 4, '0', STR_PAD_LEFT);


    //     $transfer_voucher = new TransferVoucher();
    //     $transfer_voucher->voucher_no = $voucherNo;
    //     $transfer_voucher->voucher_date = $request->voucher_date;
    //     $transfer_voucher->from_inv_number = $request->from_inv_number;
    //     $transfer_voucher->to_inv_number = $request->to_inv_number;
    //     $transfer_voucher->item_id = $request->item_code_id;
    //     $transfer_voucher->quantity = $request->quantity;
    //     $transfer_voucher->remarks = $request->remarks;
    //     $transfer_voucher->save();

    //     $creditVouchers = CreditVoucherDetail::where('item_code_id', $request->item_code_id)->get();

    //     foreach ($creditVouchers as $credit) {
    //         if ($credit->quantity >= $request->quantity) {
    //             $credit->quantity -= $request->quantity;
    //             $credit->save();
    //             $request->quantity = 0;
    //             break;
    //         } else {
    //             $request->quantity -= $credit->quantity;
    //             $credit->quantity = 0;
    //             $credit->save();
    //         }
    //     }

    //     session()->flash('message', 'Transfer Voucher added successfully');
    //     return response()->json(['success' => 'Transfer Voucher added successfully']);
    // }

    public function store(Request $request)
    {
        $request->validate([
            // 'voucher_date' => 'required|date',
            'issuing_inv_no' => 'required',
            'receiving_inv_no' => 'required',
            // 'item_code_id' => 'required',
            // 'quantity' => 'required',
        ]);

        $currentDate = Carbon::today();
        $resetDate = Carbon::createFromFormat('Y-m-d', date('Y') . '-04-01')->subDay()->endOfDay();

        if ($currentDate < $resetDate) {
            $resetDate = Carbon::createFromFormat('Y-m-d', (date('Y') - 1) . '-04-01')->subDay()->endOfDay();
        }

        $lastVoucher = TransferVoucher::where('created_at', '<', $resetDate)
            ->orderBy('voucher_no', 'desc')
            ->first() ?? TransferVoucher::latest()->first();

        $voucherNo = str_pad($lastVoucher ? ((int) $lastVoucher->voucher_no) + 1 : 1, 4, '0', STR_PAD_LEFT);


        $transfer_voucher = new TransferVoucher();
        $transfer_voucher->voucher_no = $voucherNo;
        $transfer_voucher->voucher_date = date('Y-m-d');
        $transfer_voucher->from_inv_number = $request->issuing_inv_no;
        $transfer_voucher->to_inv_number = $request->receiving_inv_no;
        // $transfer_voucher->item_id = $request->item_code_id;
        // $transfer_voucher->quantity = $request->quantity;
        // $transfer_voucher->remarks = $request->remarks;
        $transfer_voucher->save();

        $validatedData = $request->validate([
            'issuing_inv_no' => 'required',
            'issuing_division' => 'required',
            'receiving_inv_no' => 'required',
            'receiving_division' => 'required',
            'strike_ledger_no' => 'required',
            'strike_nomenclature' => 'required',
            'strike_quantity' => 'required',
            'strike_rate' => 'required',
            'brought_ledger_no' => 'required',
            'brought_nomenclature' => 'required',
            'brought_quantity' => 'required',
        ]);

        $strikeDetails = [];
        foreach ($validatedData['strike_ledger_no'] as $index => $ledgerNo) {
            $strikeDetails[] = [
                'transfer_voucher_id' => $transfer_voucher->id,
                'issuing_inv_no' => $validatedData['issuing_inv_no'],
                'issuing_division' => $validatedData['issuing_division'],
                'receiving_inv_no' => $validatedData['receiving_inv_no'],
                'receiving_division' => $validatedData['receiving_division'],
                'strike_ledger_no' => $ledgerNo,
                'strike_nomenclature' => $validatedData['strike_nomenclature'][$index],
                'strike_quantity' => $validatedData['strike_quantity'][$index],
                'strike_rate' => $validatedData['strike_rate'][$index],
                'brought_ledger_no' => $ledgerNo,
                'brought_nomenclature' => $validatedData['brought_nomenclature'][$index],
                'brought_quantity' => $validatedData['brought_quantity'][$index],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $creditV = CreditVoucherDetail::where('id', $ledgerNo)->where('inv_no', $validatedData['issuing_inv_no'])->first();
            if ($creditV->quantity >= $validatedData['strike_quantity'][$index]) {
                $creditV->quantity -= $validatedData['strike_quantity'][$index];
                $creditV->save();
            }
        }

        TransferVoucherDetail::insert($strikeDetails);



        session()->flash('message', 'Transfer Voucher added successfully');
        return response()->json(['success' => 'Transfer Voucher added successfully']);
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
        $transfer_voucher = TransferVoucher::find($id);
        $inventoryNumbers = InventoryNumber::all();
        $creditVouchers = CreditVoucherDetail::groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
        $edit = true;
        return response()->json(['view' => view('inventory.transfer-vouchers.form', compact('edit', 'transfer_voucher', 'creditVouchers', 'inventoryNumbers'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'voucher_date' => 'required|date',
        ]);

        $transfer_voucher = TransferVoucher::find($id);
        $transfer_voucher->voucher_date = $request->voucher_date;
        // $transfer_voucher->from_inv_number = $request->from_inv_number;
        // $transfer_voucher->to_inv_number = $request->to_inv_number;
        // $transfer_voucher->item_id = $request->item_code_id;
        // $transfer_voucher->quantity = $request->quantity;
        $transfer_voucher->remarks = $request->remarks;
        $transfer_voucher->update();

        session()->flash('message', 'Transfer Voucher updated successfully');
        return response()->json(['success' => 'Transfer Voucher updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id)
    {
        $transferVoucher = TransferVoucher::find($id);
        $transferVoucher->delete();

        return back()->with('message', 'Transfer Voucher deleted successfully');
    }
}
