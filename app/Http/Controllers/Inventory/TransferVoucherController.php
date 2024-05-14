<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferVoucher;
use App\Models\InventoryNumber;


class TransferVoucherController extends Controller
{  
    public function index()
    {
        $transferVouchers = TransferVoucher::all();
        $inventoryNumbers = InventoryNumber::all();
        return view('inventory.transfer-vouchers.list',compact('transferVouchers','inventoryNumbers'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $transferVouchers = TransferVoucher::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('project_name', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

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
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|unique:inventory_projects,project_name',
            'sanction_amount' => 'required|numeric',
            'sanction_authority' => 'required',
            'pdc' => 'required',
            'project_director' => 'required',
            'end_date' => 'required|date',
            'status' => 'required',
        ]);

        $transfer_voucher = new TransferVoucher();
        $transfer_voucher->project_name = $request->project_name;
        $transfer_voucher->sanction_amount = $request->sanction_amount;
        $transfer_voucher->sanction_authority = $request->sanction_authority;
        $transfer_voucher->pdc = $request->pdc;
        $transfer_voucher->project_director = $request->project_director;
        $transfer_voucher->entry_date = date('Y-m-d');
        $transfer_voucher->end_date = $request->end_date;
        $inventory_project->save();

        session()->flash('message', 'Inventory Project added successfully');
        return response()->json(['success' => 'Inventory Project added successfully']);
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
        $itemCodes = ItemCode::all();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
