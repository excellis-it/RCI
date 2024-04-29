<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreditVoucher;

class CreditVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creditVouchers = CreditVoucher::paginate(10);
        return view('inventory.credit-vouchers.list', compact('creditVouchers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $creditVouchers = CreditVoucher::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('credit_voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('credit_voucher_date', 'like', '%' . $query . '%')
                    ->orWhere('credit_voucher_amount', 'like', '%' . $query . '%');
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
        return view('inventory.credit-vouchers.form');
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
        $creditVoucher->credit_voucher_no = $request->credit_voucher_no;
        $creditVoucher->credit_voucher_date = $request->credit_voucher_date;
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
        $edit = true;
        return view('inventory.credit-vouchers.form', compact('creditVoucher', 'edit'));
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
        $creditVoucher->credit_voucher_no = $request->credit_voucher_no;
        $creditVoucher->credit_voucher_date = $request->credit_voucher_date;
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

        session()->flash('message', 'Credit Voucher deleted successfully');
        return response()->json(['success' => 'Credit Voucher deleted successfully']);
    }
}
