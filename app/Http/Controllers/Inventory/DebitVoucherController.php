<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DebitVoucher;

class DebitVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $debitVouchers = DebitVoucher::paginate(10);
        return view('inventory.debit-vouchers.list', compact('debitVouchers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $creditVouchers = DebitVoucher::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('credit_voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('credit_voucher_date', 'like', '%' . $query . '%')
                    ->orWhere('credit_voucher_amount', 'like', '%' . $query . '%');
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
        return view('inventory.debit-vouchers.form');
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
        $debitVoucher->debit_voucher_no = $request->debit_voucher_no;
        $debitVoucher->debit_voucher_date = $request->debit_voucher_date;
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
        $edit = true;
        return view('inventory.debit-vouchers.form', compact('debitVoucher', 'edit'));
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
        $debitVoucher->debit_voucher_no = $request->debit_voucher_no;
        $debitVoucher->debit_voucher_date = $request->debit_voucher_date;
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

        session()->flash('message', 'Debit Voucher deleted successfully');
        return response()->json(['success' => 'Debit Voucher deleted successfully']);
    }
}
