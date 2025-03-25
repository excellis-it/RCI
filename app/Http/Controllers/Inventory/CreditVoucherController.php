<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Imports\CreditVoucherImport;
use Illuminate\Http\Request;
use App\Models\CreditVoucher;
use App\Models\ItemCode;
use App\Models\InventoryType;
use App\Models\InventoryNumber;
use App\Models\Member;
use App\Models\SupplyOrder;
use App\Models\User;
use App\Models\CreditVoucherDetail;
use App\Models\GstPercentage;
use App\Models\Rin;
use App\Models\InventoryProject;
use App\Models\Uom;
use App\Models\Vendor;
use Carbon\Carbon;
use App\Models\InventoryItemBalance;
use App\Models\InventoryItemStock;
use Maatwebsite\Excel\Facades\Excel;

class CreditVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemCodes = ItemCode::with('ncStatus')->get();
        $inventoryTypes = InventoryType::all();
        $inventoryNumbers = InventoryNumber::all();
        $creditVouchers = CreditVoucher::orderBy('id', 'desc')->paginate(10);

        foreach ($creditVouchers as $creditVoucher) {
            // check inv item balance have other vouchers then do not show edit button
            $creditVoucher->edit_button = true;
            $creditVoucher_item_balance = InventoryItemBalance::where('voucher_type', '!=', 'credit_voucher')->where('inv_id', $creditVoucher->inv_id)->get();
            if ($creditVoucher_item_balance->count() > 0) {
                $creditVoucher->edit_button = false;
            }
        }

        //return $creditVouchers;

        $members = User::role('MATERIAL-MANAGER')->get();
        $lastVoucher = CreditVoucher::latest()->first();
        $supplyOrders = SupplyOrder::all();
        $rins = Rin::get()->groupBy('rin_no');
        $projects = InventoryProject::all();
        $uoms = Uom::all();
        $gstPercentages = GstPercentage::all();
        $vendors = Vendor::all();
        $gsts = GstPercentage::orderBy('id', 'desc')->get();
        return view('inventory.credit-vouchers.list', compact('creditVouchers', 'gsts', 'itemCodes', 'inventoryTypes', 'inventoryNumbers', 'members', 'lastVoucher', 'supplyOrders', 'rins', 'projects', 'uoms', 'gstPercentages', 'vendors'));
    }


    public function  rinDetail() {}

    public function fetchData(Request $request)
    {

        if ($request->ajax()) {
            $sort_by = $request->get('sortby', 'id'); // Default sort by 'id' if not provided
            $sort_type = $request->get('sorttype', 'asc'); // Default sort type 'asc' if not provided
            $query = $request->get('query');
            $date = $request->get('date_entry');
            $creditVoucherQuery = CreditVoucher::query();

            if ($query) {
                $query = str_replace(" ", "%", $query);
                $creditVoucherQuery->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('voucher_no', 'like', '%' . $query . '%');
                    // ->orWhere('voucher_date', 'like', '%' . $query . '%');
                    // ->orWhere('item_type', 'like', '%' . $query . '%')
                    // ->orWhere('description', 'like', '%' . $query . '%')
                    // ->orWhere('total_price', 'like', '%' . $query . '%')
                    // ->orWhere('quantity', 'like', '%' . $query . '%')
                    // ->orWhere('supply_order_no', 'like', '%' . $query . '%')
                    // ->orWhereHas('itemCode', function ($q) use ($query) {
                    //     $q->where('code', 'like', '%' . $query . '%');
                    // })
                    // ->orWhere('rin', 'like', '%' . $query . '%');
                });
            }

            if ($date) {
                $creditVoucherQuery->whereDate('voucher_date', $date);
            }

            $creditVouchers = $creditVoucherQuery->orderBy($sort_by, $sort_type)->paginate(10);

            foreach ($creditVouchers as $creditVoucher) {
                // check inv item balance have other vouchers then do not show edit button
                $creditVoucher->edit_button = true;
                $creditVoucher_item_balance = InventoryItemBalance::where('voucher_type', '!=', 'credit_voucher')->where('inv_id', $creditVoucher->inv_id)->get();
                if ($creditVoucher_item_balance->count() > 0) {
                    $creditVoucher->edit_button = false;
                }
            }

            $itemCodes = ItemCode::all();
            $inventoryTypes = InventoryType::all();
            $inventoryNumbers = InventoryNumber::all();

            return response()->json([
                'data' => view('inventory.credit-vouchers.table', compact('creditVouchers', 'itemCodes', 'inventoryTypes', 'inventoryNumbers'))->render()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $itemCodes = ItemCode::all();
        $inventoryTypes = InventoryType::all();
        $inventoryNumbers = InventoryNumber::all();

        return view('inventory.credit-vouchers.form', compact('itemCodes', 'inventoryTypes', 'inventoryNumbers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'voucher_number' => 'required|unique:credit_vouchers,voucher_no',
            'rin' => 'required',
            'item_code' => 'required',
            'inv_no' => 'required',
            'supply_order_no' => 'required',
            'order_type' => 'nullable',
            'invoice_no' => 'required',
            'invoice_date' => 'required',
        ]);

        //auto increment 4 digit voucher number
        // Get the current date
        $currentDate = date('Y-m-d');
        $resetDate = date('Y') . '-04-01';
        $resetDateTimestamp = Carbon::createFromFormat('Y-m-d', $resetDate)->subDay()->endOfDay();

        // If the current date is before the reset date, get the reset date for the previous year
        if ($currentDate < $resetDate) {
            $resetDate = (date('Y') - 1) . '-04-01';
            $resetDateTimestamp = Carbon::createFromFormat('Y-m-d', $resetDate)->subDay()->endOfDay();
        }

        // Get the last voucher number that was created before the reset date
        $lastVoucher1 = CreditVoucher::where('created_at', '<', $resetDateTimestamp)
            ->orderBy('voucher_no', 'desc')
            ->first();

        if ($lastVoucher1) {
            $lastVoucher = $lastVoucher1;
        } else {
            $lastVoucher = CreditVoucher::latest()->first();
        }

        // If there are no vouchers yet, or if the last voucher was created before the reset date, start with 0001, otherwise increment the last voucher number
        $voucherNo = $lastVoucher ? ((int) $lastVoucher->voucher_no) + 1 : 1;

        // Pad the voucher number with leading zeros to ensure it's always 4 digits
        $voucherNo = str_pad($voucherNo, 4, '0', STR_PAD_LEFT);


        $creditVoucher = new CreditVoucher();
        // $creditVoucher->voucher_no = strtoupper($request->order_type) . '' . $voucherNo;
        $creditVoucher->voucher_no = $request->voucher_number;
        $creditVoucher->voucher_date = $request->voucher_date;
        $creditVoucher->rin_no = $request->rin;
        $creditVoucher->inv_id = $request->inv_no;
        $creditVoucher->budget_head = $request->cost_debatable;
        $creditVoucher->invoice_no = $request->invoice_no;
        $creditVoucher->invoice_date = $request->invoice_date;
        $creditVoucher->supply_order_id = $request->supply_order_no;
        $inventory_number = InventoryNumber::where('id', '=', $request->inv_no)->first();
        $creditVoucher->remarks = $request->remarks;
        // New fields
        $creditVoucher->store_receipt_date = $request->store_receipt_date ?? null;
        $creditVoucher->demand_no = $request->demand_no ?? null;
        $creditVoucher->icc_no = $request->inv_no ?? null;
        $creditVoucher->division_name = $request->division_name ?? null;
        $creditVoucher->division_group = $request->division_group ?? null;
        //  $creditVoucher->division_date = $request->division_date ?? null;
        if ($creditVoucher->save()) {
            $lastCreditVoucher = CreditVoucher::latest()->first();

            if (count($request->item_code) > 0) {

                foreach ($request->item_code as $key => $value) {

                    $creditVoucherDetail = new CreditVoucherDetail();
                    $creditVoucherDetail->credit_voucher_id = $lastCreditVoucher->id ?? null;
                    $creditVoucherDetail->item_code = $request->item_code_id[$key] ?? null;
                    $creditVoucherDetail->item_code_id = $value ?? null;
                    $creditVoucherDetail->gem_item_code = $request->gem_item_code[$key] ?? null;
                    $creditVoucherDetail->inv_no = $request->inv_no ?? null;
                    $creditVoucherDetail->description = $request->description[$key] ?? null;
                    $creditVoucherDetail->uom = $request->uom_id[$key] ?? null;
                    $creditVoucherDetail->item_type = $request->item_type[$key] ?? null;
                    $creditVoucherDetail->price = $request->price[$key] ?? null;
                    $creditVoucherDetail->quantity = $request->quantity[$key] ?? null;
                    $creditVoucherDetail->initial_quantity = $request->quantity[$key] ?? null;
                    $creditVoucherDetail->supply_order_no = $request->supply_order_no ?? null;
                    $creditVoucherDetail->rin = $request->rin ?? null;
                    $creditVoucherDetail->member_id = $inventory_number->holder_id ?? null;
                    $creditVoucherDetail->order_type = $request->order_type ?? null;
                    $creditVoucherDetail->tax = $request->tax[$key] ?? null;
                    $creditVoucherDetail->tax_amt = $request->tax_amt[$key] ?? null;
                    $creditVoucherDetail->disc_percent = $request->disc_percent[$key] ?? null;
                    $creditVoucherDetail->disc_amt = $request->disc_amt[$key] ?? null;
                    $creditVoucherDetail->gst_percent = $request->gst_percent[$key] ?? null;
                    $creditVoucherDetail->gst_amt = $request->gst_amt[$key] ?? null;
                    $creditVoucherDetail->total_price = $request->total_price[$key] ?? null;
                    $creditVoucherDetail->consigner = $request->consigner[$key] ?? null;
                    $creditVoucherDetail->cost_debatable = $request->cost_debatable ?? null;
                    $creditVoucherDetail->ledger_no = $request->ledger_no[$key] ?? null;
                    $creditVoucherDetail->folio_no = $request->folio_no[$key] ?? null;
                    $creditVoucherDetail->save();

                    $inventoryItem = new InventoryItemBalance();
                    $inventoryItem->voucher_type = 'credit_voucher';
                    $inventoryItem->item_id = $request->item_code_id[$key] ?? null;
                    $inventoryItem->item_code = $request->item_code[$key] ?? null;
                    $inventoryItem->inv_id = $request->inv_no ?? null;
                    $inventoryItem->quantity = $request->quantity[$key] ?? 0;
                    $inventoryItem->unit_cost = $request->price[$key] ?? 0.00;
                    $inventoryItem->total_cost = $request->price[$key] * $request->quantity[$key] ?? 0.00;
                    $inventoryItem->gst_amount = $request->gst_amt[$key] ?? 0.00;
                    $inventoryItem->discount_amount = $request->disc_amt[$key] ?? 0.00;
                    $inventoryItem->total_amount = $request->total_price[$key] ?? 0.00;
                    $inventoryItem->save();

                    // update stock
                    $existingStock = InventoryItemStock::where('inv_id', $request->inv_no)
                        ->where('item_id', $request->item_code_id[$key])
                        ->first();

                    if ($existingStock) {
                        // If stock exists, add to the quantity balance
                        $existingStock->quantity_balance += $request->quantity[$key] ?? 0;
                        // gst and discount
                        $existingStock->gst_percent = $request->gst_percent[$key] ?? 0.00;
                        $existingStock->gst_amount = $request->gst_amt[$key] ?? 0.00;
                        $existingStock->discount_percent = $request->disc_percent[$key] ?? 0.00;
                        $existingStock->discount_amount = $request->disc_amt[$key] ?? 0.00;
                        // unit_price
                        $existingStock->unit_price = $request->price[$key] ?? 0.00;
                        // ledger_no and page_no
                        $existingStock->ledger_no = $request->ledger_no[$key] ?? null;
                        $existingStock->page_no = $request->folio_no[$key] ?? null;
                        $existingStock->save();
                    } else {
                        // Create new stock record
                        $inventoryItemStock = new InventoryItemStock();
                        $inventoryItemStock->inv_id = $request->inv_no ?? null;
                        $inventoryItemStock->item_id = $request->item_code_id[$key] ?? null;
                        $inventoryItemStock->quantity = $request->quantity[$key] ?? 0;
                        $inventoryItemStock->quantity_balance = $request->quantity[$key] ?? 0;
                        // gst and discount
                        $inventoryItemStock->gst_percent = $request->gst_percent[$key] ?? 0.00;
                        $inventoryItemStock->gst_amount = $request->gst_amt[$key] ?? 0.00;
                        $inventoryItemStock->discount_percent = $request->disc_percent[$key] ?? 0.00;
                        $inventoryItemStock->discount_amount = $request->disc_amt[$key] ?? 0.00;
                        // unit_price
                        $inventoryItemStock->unit_price = $request->price[$key] ?? 0.00;
                        // ledger_no and page_no
                        $inventoryItemStock->ledger_no = $request->ledger_no[$key] ?? null;
                        $inventoryItemStock->page_no = $request->folio_no[$key] ?? null;
                        $inventoryItemStock->save();
                    }
                }
            }
        }



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
        $itemCodes = ItemCode::all();
        $inventoryTypes = InventoryType::all();
        $inventoryNumbers = InventoryNumber::all();
        $supplyOrders = SupplyOrder::all();
        $members = User::role('MATERIAL-MANAGER')->get();
        // $rins = Rin::all();
        $projects = InventoryProject::all();
        $uoms = Uom::all();
        $edit = true;
        $rins = Rin::get()->groupBy('rin_no');

        $creditVoucherItems = CreditVoucherDetail::where('credit_voucher_id', $id)->get();

        $gstPercentages = GstPercentage::all();
        return response()->json(['view' => view('inventory.credit-vouchers.form', compact('creditVoucher', 'gstPercentages', 'creditVoucherItems', 'edit', 'itemCodes', 'inventoryTypes', 'inventoryNumbers', 'supplyOrders', 'members', 'uoms', 'rins', 'projects'))->render()]);
        // return view('inventory.credit-vouchers.form', compact('creditVoucher', 'edit', 'itemCodes', 'inventoryTypes', 'inventoryNumbers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'voucher_number' => 'required',
            'rin' => 'required',
            'item_code' => 'required',
            'inv_no' => 'required',
            'supply_order_no' => 'required',
            'order_type' => 'nullable',
            'invoice_no' => 'required',
            'invoice_date' => 'required',
        ]);

        $creditVoucher = CreditVoucher::findOrFail($id);
        $creditVoucher->voucher_no = $request->voucher_number;
        $creditVoucher->voucher_date = $request->voucher_date;
        $creditVoucher->rin_no = $request->rin;
        $creditVoucher->inv_id = $request->inv_no;
        $creditVoucher->budget_head = $request->cost_debatable;
        $creditVoucher->invoice_no = $request->invoice_no;
        $creditVoucher->invoice_date = $request->invoice_date;
        $creditVoucher->supply_order_id = $request->supply_order_no;
        $inventory_number = InventoryNumber::where('id', '=', $request->inv_no)->first();
        $creditVoucher->remarks = $request->remarks;
        // New fields
        $creditVoucher->store_receipt_date = $request->store_receipt_date ?? null;
        $creditVoucher->demand_no = $request->demand_no ?? null;
        $creditVoucher->icc_no = $request->inv_no ?? null;
        $creditVoucher->division_name = $request->division_name ?? null;
        $creditVoucher->division_group = $request->division_group ?? null;
        //   $creditVoucher->division_date = $request->division_date ?? null;
        $creditVoucher->save();

        // Remove old details
        CreditVoucherDetail::where('credit_voucher_id', $id)->delete();

        // Insert updated details
        if ($request->item_code) {
            foreach ($request->item_code as $key => $value) {
                $detail = new CreditVoucherDetail();
                $detail->credit_voucher_id = $creditVoucher->id;
                $detail->item_code_id = $value;
                $detail->item_code = $request->item_code_id[$key] ?? null;
                $detail->gem_item_code = $request->gem_item_code[$key] ?? null;
                $detail->inv_no = $request->inv_no ?? null;
                $detail->description = $request->description[$key] ?? null;
                $detail->uom = $request->uom_id[$key] ?? null;
                $detail->item_type = $request->item_type[$key] ?? null;
                $detail->price = $request->price[$key] ?? null;
                $detail->quantity = $request->quantity[$key] ?? null;
                $detail->initial_quantity = $request->quantity[$key] ?? null;
                $detail->supply_order_no = $request->supply_order_no ?? null;
                $detail->rin = $request->rin ?? null;
                $detail->member_id = $inventory_number->holder_id ?? null;
                $detail->order_type = $request->order_type ?? null;
                $detail->tax = $request->tax[$key] ?? null;
                $detail->tax_amt = $request->tax_amt[$key] ?? null;
                $detail->disc_percent = $request->disc_percent[$key] ?? null;
                $detail->disc_amt = $request->disc_amt[$key] ?? null;
                $detail->gst_percent = $request->gst_percent[$key] ?? null;
                $detail->gst_amt = $request->gst_amt[$key] ?? null;
                $detail->total_price = $request->total_price[$key] ?? null;
                $detail->consigner = $request->consigner[$key] ?? null;
                $detail->cost_debatable = $request->cost_debatable ?? null;
                $detail->ledger_no = $request->ledger_no[$key] ?? null;
                $detail->folio_no = $request->folio_no[$key] ?? null;
                $detail->save();

                $inventoryItem = new InventoryItemBalance();
                $inventoryItem->voucher_type = 'credit_voucher';
                $inventoryItem->item_id = $request->item_code_id[$key] ?? null;
                $inventoryItem->item_code = $request->item_code[$key] ?? null;
                $inventoryItem->inv_id = $request->inv_no ?? null;
                $inventoryItem->quantity = $request->quantity[$key] ?? 0;
                $inventoryItem->unit_cost = $request->price[$key] ?? 0.00;
                $inventoryItem->total_cost = $request->price[$key] * $request->quantity[$key] ?? 0.00;
                $inventoryItem->gst_amount = $request->gst_amt[$key] ?? 0.00;
                $inventoryItem->discount_amount = $request->disc_amt[$key] ?? 0.00;
                $inventoryItem->total_amount = $request->total_price[$key] ?? 0.00;
                $inventoryItem->save();

                // update stock
                $existingStock = InventoryItemStock::where('inv_id', $request->inv_no)
                    ->where('item_id', $request->item_code_id[$key])
                    ->first();

                if ($existingStock) {
                    // If stock exists, add to the quantity balance
                    $existingStock->quantity_balance = $request->quantity[$key] ?? 0;
                    // gst and discount
                    $existingStock->gst_percent = $request->gst_percent[$key] ?? 0.00;
                    $existingStock->gst_amount = $request->gst_amt[$key] ?? 0.00;
                    $existingStock->discount_percent = $request->disc_percent[$key] ?? 0.00;
                    $existingStock->discount_amount = $request->disc_amt[$key] ?? 0.00;
                    // unit_price
                    $existingStock->unit_price = $request->price[$key] ?? 0.00;
                    // ledger_no and page_no
                    $existingStock->ledger_no = $request->ledger_no[$key] ?? null;
                    $existingStock->page_no = $request->folio_no[$key] ?? null;
                    $existingStock->save();
                } else {
                    // Create new stock record
                    $inventoryItemStock = new InventoryItemStock();
                    $inventoryItemStock->inv_id = $request->inv_no ?? null;
                    $inventoryItemStock->item_id = $request->item_code_id[$key] ?? null;
                    $inventoryItemStock->quantity = $request->quantity[$key] ?? 0;
                    $inventoryItemStock->quantity_balance = $request->quantity[$key] ?? 0;
                    // gst and discount
                    $inventoryItemStock->gst_percent = $request->gst_percent[$key] ?? 0.00;
                    $inventoryItemStock->gst_amount = $request->gst_amt[$key] ?? 0.00;
                    $inventoryItemStock->discount_percent = $request->disc_percent[$key] ?? 0.00;
                    $inventoryItemStock->discount_amount = $request->disc_amt[$key] ?? 0.00;
                    // unit_price
                    $inventoryItemStock->unit_price = $request->price[$key] ?? 0.00;
                    // ledger_no and page_no
                    $inventoryItemStock->ledger_no = $request->ledger_no[$key] ?? null;
                    $inventoryItemStock->page_no = $request->folio_no[$key] ?? null;
                    $inventoryItemStock->save();
                }
            }
        }

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

        return redirect()->back()->with('message', 'Credit Voucher deleted successfully.');
    }

    public function getItemType(Request $request)
    {
        // dd($request->all());
        $itemCode = ItemCode::findOrFail($request->item_code_id);
        $uom = Uom::findOrFail($itemCode->uom);
        // $inventoryType = InventoryType::findOrFail($itemCode->inventory_type_id);
        return response()->json(['item_type' => $itemCode->ncStatus()->status ?? '', 'description' => $itemCode->description, 'uom' => $uom->name, 'uom_id' => $uom->id]);
    }

    public function getRinDetails(Request $request)
    {
        $set_rins = true;
        $rins = Rin::with('itemCode', 'itemCode.ncStatus', 'itemCode.uomajorment', 'inventoryNo', 'supplyOrder', 'sirDetails')->where('rin_no', $request->rin)->get();
        $itemCodes = ItemCode::all();
        $inventoryTypes = InventoryType::all();
        $inventoryNumbers = InventoryNumber::all();
        $creditVouchers = CreditVoucher::paginate(10);
        $members = User::role('MATERIAL-MANAGER')->get();
        $lastVoucher = CreditVoucher::latest()->first();
        $supplyOrders = SupplyOrder::all();
        $projects = InventoryProject::all();
        $uoms = Uom::all();
        $gstPercentages = GstPercentage::all();
        $vendors = Vendor::all();
        // return response()->json($rin);
        return response()->json(['rinData' => $rins, 'view' => view('inventory.credit-vouchers.rin', compact('rins', 'set_rins', 'inventoryNumbers', 'gstPercentages', 'itemCodes', 'inventoryTypes', 'creditVouchers', 'members', 'lastVoucher', 'supplyOrders', 'projects', 'uoms', 'vendors'))->render()]);
    }


    public function getInventoryDetails(Request $request)
    {
        $id = $request->input('id'); // Retrieve the inventory ID from the POST data

        $inventoryNumber = InventoryNumber::with(['group', 'project'])->find($id);

        if ($inventoryNumber) {
            return response()->json([
                'inventoryNumber' => $inventoryNumber
            ]);
        }

        return response()->json(['message' => 'Inventory not found'], 404);
    }


    public function downloadSample()
    {
        // return "dsa";
        $pathToFile = public_path('sample_excel/sample.xlsx');
        return response()->download($pathToFile);
    }




    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx',
            'inventory_no' => 'required'
        ]);

        $inventoryNo = $request->input('inventory_no');

        Excel::import(new CreditVoucherImport($inventoryNo), $request->file('excel_file'));

        return redirect()->back()->with('message', 'Candidate imported successfully');
    }
}
