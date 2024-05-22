<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExternalIssueVoucher;
use App\Models\CreditVoucher;
use App\Models\InventoryNumber;
use App\Models\ItemCode;
use App\Models\GatePass;
use Illuminate\Support\Facades\DB;

class ExternalIssueVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $externalIssueVouchers = ExternalIssueVoucher::paginate(10);
        $inventoryNumbers = InventoryNumber::all();
        $itemCodes = ItemCode::all();
        $gatePasses = GatePass::all();
        $creditVouchers = CreditVoucher::groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
        return view('inventory.external-issue-vouchers.list', compact('externalIssueVouchers', 'creditVouchers', 'inventoryNumbers', 'itemCodes', 'gatePasses'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $date = $request->get('date_entry');

            $externalIssueVoucherQuery = ExternalIssueVoucher::query();
            if($query){
                $query = str_replace(" ", "%", $query);
                $externalIssueVoucherQuery->where(function($queryBuilder) use ($query) {
                    $queryBuilder->where('voucher_no', 'like', '%' . $query . '%')
                    ->orWhere('voucher_date', 'like', '%' . $query . '%')
                    ->orWhere('inv_no', 'like', '%' . $query . '%')
                    ->orWhere('item_id', 'like', '%' . $query . '%')
                    ->orWhereHas('itemCode', function ($q) use ($query) {
                        $q->where('code', 'like', '%' . $query . '%');
                    })
                    
                    ->orWhereHas('gatePass', function ($q) use ($query) {
                        $q->where('gate_pass_no', 'like', '%' . $query . '%');
                    })
                    ->orWhere('gate_pass_id', 'like', '%' . $query . '%');
                });
            }

            if ($date) {
                $externalIssueVoucherQuery->whereDate('voucher_date', $date);
            }

            $externalIssueVouchers = $externalIssueVoucherQuery->orderBy($sort_by, $sort_type)->paginate(10);
            $inventoryNumbers = InventoryNumber::all();
            $itemCodes = ItemCode::all();
            $gatePasses = GatePass::all();
            $creditVouchers = CreditVoucher::groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();

            return response()->json(['data' => view('inventory.external-issue-vouchers.table', compact('externalIssueVouchers', 'inventoryNumbers', 'itemCodes', 'gatePasses', 'creditVouchers'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.external-issue-vouchers.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'voucher_no' => 'required',
            'voucher_date' => 'required',
            'inv_no' => 'required',
            'item_code_id' => 'required',
            'gate_pass_id' => 'required',
        ]);

        $externalIssueVoucher = new ExternalIssueVoucher();
        $externalIssueVoucher->voucher_no = $request->voucher_no;
        $externalIssueVoucher->voucher_date = $request->voucher_date;
        $externalIssueVoucher->inv_no = $request->inv_no;
        $externalIssueVoucher->item_id = $request->item_code_id;
        $externalIssueVoucher->gate_pass_id = $request->gate_pass_id;
        $externalIssueVoucher->remarks = $request->remarks;
        $externalIssueVoucher->save();

        session()->flash('message', 'External Issue Voucher added successfully');
        return response()->json(['success' => 'External Issue Voucher added successfully']);
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
        $externalIssueVoucher = ExternalIssueVoucher::findOrFail($id);
        $inventoryNumbers = InventoryNumber::all();
        $itemCodes = ItemCode::all();
        $gatePasses = GatePass::all();
        $creditVouchers = CreditVoucher::groupBy('item_code_id')->select('item_code_id', DB::raw('SUM(quantity) as total_quantity'))->get();
        $edit = true;
        return response()->json(['view' => view('inventory.external-issue-vouchers.form', compact('externalIssueVoucher', 'edit', 'itemCodes', 'gatePasses', 'creditVouchers', 'inventoryNumbers'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'voucher_date' => 'required',
        ]);

        $externalIssueVoucher = ExternalIssueVoucher::findOrFail($id);
        $externalIssueVoucher->voucher_date = $request->voucher_date;
        $externalIssueVoucher->remarks = $request->remarks;
        $externalIssueVoucher->update();

        session()->flash('message', 'External Issue Voucher updated successfully');
        return response()->json(['success' => 'External Issue Voucher updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $externalIssueVoucher = ExternalIssueVoucher::findOrFail($id);
        $externalIssueVoucher->delete();

        return redirect()->back()->with('message', 'External Issue Voucher deleted successfully.');
    }
}
