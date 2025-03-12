<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\AuStatus;
use Illuminate\Http\Request;
use App\Models\Rin;
use App\Models\ItemCode;
use App\Models\SupplyOrder;
use App\Models\Vendor;
use App\Models\InventoryNumber;
use App\Models\InventorySir;
use App\Models\GstPercentage;
use App\Models\User;
use App\Models\Designation;
use App\Models\NcStatus;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use App\Helpers\Helper;
use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\Uom;

class RinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rins = Rin::select('rins.rin_no', 'rins.id', 'rins.created_at')
            ->join(DB::raw('(SELECT rin_no, MAX(id) as max_id FROM rins GROUP BY rin_no) as subquery'), function ($join) {
                $join->on('rins.id', '=', 'subquery.max_id');
            })
            ->orderBy('rins.id', 'desc')
            ->paginate(10);

        foreach ($rins as $rin) {
            $rin->have_credit = 0;
            $credit_v = CreditVoucherDetail::where('rin', $rin->rin_no)->first();
            if ($credit_v) {
                $rin->have_credit = 1;
            }
        }

        // return $rins;

        $items = ItemCode::all();
        $vendors = Vendor::orderBy('id', 'desc')->get();
        $supply_orders = SupplyOrder::all();
        $sir_nos = InventorySir::where('status', 1)->orderBy('id', 'desc')->get()->groupBy('sir_no');
        $inventory_nos = InventoryNumber::where('status', 1)->orderBy('id', 'desc')->get();
        $gsts = GstPercentage::orderBy('id', 'desc')->get();
        $authorities = User::role('MATERIAL-MANAGER')->get();
        $designations = Designation::orderBy('id', 'desc')->paginate(10);
        $nc_statuses = NcStatus::orderBy('status', 'asc')->get();
        $au_statuses = AuStatus::orderBy('status', 'asc')->get();
        $all_members = Member::all();
        $financialYears = Helper::getFinancialYears();
        $uoms = Uom::all();
        return view('inventory.rins.list', compact('rins', 'uoms', 'financialYears', 'all_members', 'items', 'vendors', 'supply_orders', 'sir_nos', 'inventory_nos', 'gsts', 'authorities', 'designations', 'nc_statuses', 'au_statuses'));
    }

    public function rinsTotalValue() {}


    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby', 'rins.id');
            $sort_type = $request->get('sorttype', 'desc');
            $query = $request->get('query', '');
            $query = str_replace(" ", "%", $query);

            // Fetching latest unique RIN entries based on rin_no
            $rins = Rin::select('rins.rin_no', 'rins.id', 'rins.created_at')
                ->join(DB::raw('(SELECT rin_no, MAX(id) as max_id FROM rins GROUP BY rin_no) as subquery'), function ($join) {
                    $join->on('rins.id', '=', 'subquery.max_id');
                })
                ->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('rins.id', 'like', '%' . $query . '%')
                        ->orWhere('rins.rin_no', 'like', '%' . $query . '%');
                })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            // Add `have_credit` flag
            foreach ($rins as $rin) {
                $rin->have_credit = CreditVoucherDetail::where('rin', $rin->rin_no)->exists() ? 1 : 0;
            }

            $items = ItemCode::all();
            $supply_orders = SupplyOrder::all();

            return response()->json([
                'data' => view('inventory.rins.table', compact('rins', 'items', 'supply_orders'))->render()
            ]);
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
        // dd($request->all());
        $request->validate([
            'rin_no' => 'required',
            'item_id.*' => 'required',
            'received_quantity.*' => 'required',
            // 'accepted_quantity' => 'required',
            // 'rejected_quantity' => 'required',
            // 'inspection_authority' => 'required',
            // 'supplier_id' => 'required',

            'sir_no' => 'required',
            'inventory_no' => 'required',
            'vendor_id' => 'required',
            'supply_order_no' => 'required',
            'authority_id' => 'required',
            'demand_no' => 'required',
            'demand_date' => 'required',
            'invoice_no' => 'required',
            'invoice_date' => 'required',
        ], [
            'item_id.*.required' => 'Item is required.',
            'received_quantity.*.required' => 'Received Quantity is required.',
            // 'accepted_quantity.required' => 'Accepted Quantity is required.',
            // 'rejected_quantity.required' => 'Rejected Quantity is required.',
            // 'nc_status.required' => 'NC Status is required.',
            // 'au_status.required' => 'AU Status is required.',
            'sir_no.required' => 'SIR No field is required.',
            'inventory_no.required' => 'Inventory No field is required.',
            'vendor_id.required' => 'Vendor field is required.',
            'supply_order_no.required' => 'Supply Order field is required.',
            'authority_id.required' => 'Authority field is required.',
            // 'nc_status.required' => 'Select NC Status.',
        ]);

        $sir = InventorySir::where('sir_no', $request->sir_no)->update([
            'demand_no' => $sir->demand_no ?? $request->demand_no,
            'inventory_no' => $sir->inventory_no ?? $request->inventory_no,
            'supply_order_no' => $sir->supply_order_no ?? $request->supply_order_no,
            'inspection_authority' => $sir->authority_id ?? $request->authority_id,
            'demand_date' => $sir->demand_date ?? $request->demand_date,
            'invoice_no' => $sir->invoice_no ?? $request->invoice_no,
            'invoice_date' => $sir->invoice_date ?? $request->invoice_date,
            'supplier_id' => $sir->vendor_id ?? $request->vendor_id,
        ]);



        // auto generate rin id
        // $sir_no = $request->sir_no;
        // $currentYear = date('Y');
        // $lastRin = Rin::orderBy('id', 'desc')->first();

        // if ($lastRin) {
        //     // Extract the numeric part of rin_no
        //     // $lastNumber = (int) filter_var($lastRin->rin_no, FILTER_SANITIZE_NUMBER_INT);

        //     // Increment the numeric part and format it with leading zeros
        //     $rin_id = 'RIN_' . $currentYear . '_' . $sir_no;
        // } else {
        //     // If no RIN exists, start with RIN_year_$sir_no
        //     $rin_id = 'RIN_' . $currentYear . '_' . $sir_no;
        // }

        $rin_no = $request->rin_no;

        $sir_detail = InventorySir::where('sir_no', $request->sir_no)->first();

        if ($request->item_id) {
            foreach ($request->item_id as $key => $item) {
                $rin = new Rin();
                $rin->sir_no = $request->sir_no;
                $rin->sir_date = $sir_detail->sir_date;
                $rin->inventory_id = $request->inventory_no;
                $rin->authority_id = $request->authority_id;
                $rin->desig_id = $request->authority_designation;
                $rin->budget_head_details = $request->budget_head_details;
                $rin->financial_year = $request->financial_year;
                $rin->member_id = $request->member_id;
                $rin->rin_no = $rin_no;
                $rin->store_received_date = $request->store_received_date;
                $rin->invoice_no = $request->invoice_no;
                $rin->invoice_date = $request->invoice_date;
                $rin->gem_item_code = $request->item_id[$key];
                $rin->description = $request->description[$key];
                $rin->received_quantity = $request->received_quantity[$key];
                // $rin->accepted_quantity = $request->accepted_quantity[$key];
                //$rin->rejected_quantity = $request->rejected_quantity[$key];
                $rin->remarks = $request->remarks[$key];
                $rin->discount = $request->disc_percent[$key];
                $rin->discount_amount = $request->discount_amount[$key];
                $rin->discount_type = $request->discount_type[$key];

                $rin->unit_cost = $request->unit_cost[$key];
                $rin->total_cost = $request->total_cost[$key];
                $rin->nc_status = $request->nc_status[$key];
                $rin->uom = $request->uom[$key] ?? null;
                $rin->au_status = $request->au_status[$key];
                $rin->gst = $request->gst[$key];
                $rin->gst_amount = $request->gst_amount[$key];
                $rin->total_amount = $request->total_amount[$key];
                $rin->round_type = $request->round_type[$key] ?? 0;
                $rin->round_settle_amount = $request->round_settle_amount[$key] ?? 0;
                $rin->round_amount = $request->round_amount[$key];
                $rin->vendor_id = $request->vendor_id;
                $rin->supply_order_no = $request->supply_order_no;
                $rin->damage_status = $request->damage_status[$key];
                $rin->save();
            }
        }

        session()->flash('message', 'RIN Created successfully');
        return response()->json(['success' => 'RIN Created successfully']);
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
        $rin = Rin::find($id);
        $all_rins = Rin::where('rin_no', $rin->rin_no)->get();
        $items = ItemCode::all();
        $vendors = Vendor::orderBy('id', 'desc')->get();
        $supply_orders = SupplyOrder::all();
        $sir_nos = InventorySir::where('status', 1)->orderBy('id', 'desc')->get()->groupBy('sir_no');
        $inventory_nos = InventoryNumber::where('status', 1)->orderBy('id', 'desc')->get();
        $gsts = GstPercentage::orderBy('id', 'desc')->get();
        $authorities = User::role('MATERIAL-MANAGER')->get();
        $designations = Designation::orderBy('id', 'desc')->paginate(10);
        $nc_statuses = NcStatus::orderBy('status', 'asc')->get();
        $au_statuses = AuStatus::orderBy('status', 'asc')->get();
        $all_members = Member::all();
        $financialYears = Helper::getFinancialYears();
        $uoms = Uom::all();
        $edit = true;

        return response()->json(['view' => view('inventory.rins.edit_form', compact(
            'edit',
            'rin',
            'all_rins',
            'uoms',
            'items',
            'vendors',
            'supply_orders',
            'sir_nos',
            'inventory_nos',
            'gsts',
            'authorities',
            'designations',
            'nc_statuses',
            'au_statuses',
            'all_members',
            'financialYears'
        ))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rin_no' => 'required',
            // 'item_id.*' => 'required',
            // 'received_quantity.*' => 'required',
            // 'sir_no' => 'required',
            // 'inventory_no' => 'required',
            // 'vendor_id' => 'required',
            // 'supply_order_no' => 'required',
            // 'authority_id' => 'required',
            // 'demand_no' => 'required',
            // 'demand_date' => 'required',
            // 'invoice_no' => 'required',
            // 'invoice_date' => 'required',
        ], [
            // 'item_id.*.required' => 'Item is required.',
            // 'received_quantity.*.required' => 'Received Quantity is required.',
            // 'sir_no.required' => 'SIR No field is required.',
            // 'inventory_no.required' => 'Inventory No field is required.',
            // 'vendor_id.required' => 'Vendor field is required.',
            // 'supply_order_no.required' => 'Supply Order field is required.',
            // 'authority_id.required' => 'Authority field is required.',
        ]);

        // Get the RIN to update
        $rin = Rin::find($id);
        $rin_no = $rin->rin_no;

        // Update SIR details if needed
        $sir = InventorySir::where('sir_no', $request->sir_no)->first();
        if ($sir) {
            $sir->demand_no = $request->demand_no ?? $sir->demand_no;
            $sir->inventory_no = $request->inventory_no ?? $sir->inventory_no;
            $sir->supply_order_no = $request->supply_order_no ?? $sir->supply_order_no;
            $sir->inspection_authority = $request->authority_id ?? $sir->inspection_authority;
            $sir->demand_date = $request->demand_date ?? $sir->demand_date;
            $sir->invoice_no = $request->invoice_no ?? $sir->invoice_no;
            $sir->invoice_date = $request->invoice_date ?? $sir->invoice_date;
            $sir->supplier_id = $request->vendor_id ?? $sir->supplier_id;
            $sir->save();
        }

        // Delete existing RIN items for this RIN number
        if ($request->update_all_items) {
            Rin::where('rin_no', $rin_no)->delete();
        } else {
            // Delete only the specific RIN being edited
            $rin->delete();
        }

        // Add new RIN items
        if ($request->item_id) {
            foreach ($request->item_id as $key => $item) {
                $newRin = new Rin();
                $newRin->sir_no = $request->sir_no;
                $newRin->sir_date = $sir->sir_date;
                $newRin->inventory_id = $request->inventory_no;
                $newRin->authority_id = $request->authority_id;
                $newRin->desig_id = $request->authority_designation;
                $newRin->budget_head_details = $request->budget_head_details;
                $newRin->financial_year = $request->financial_year;
                $newRin->member_id = $request->member_id;
                $newRin->rin_no = $rin_no;
                $newRin->store_received_date = $request->store_received_date;
                $newRin->invoice_no = $request->invoice_no;
                $newRin->invoice_date = $request->invoice_date;
                $newRin->gem_item_code = $request->item_id[$key];
                $newRin->description = $request->description[$key];
                $newRin->received_quantity = $request->received_quantity[$key];
                $newRin->remarks = $request->remarks[$key] ?? null;
                $newRin->discount = $request->disc_percent[$key] ?? 0;
                $newRin->discount_amount = $request->discount_amount[$key] ?? 0;
                $newRin->discount_type = $request->discount_type[$key] ?? 'percentage';
                $newRin->unit_cost = $request->unit_cost[$key] ?? 0;
                $newRin->total_cost = $request->total_cost[$key] ?? 0;
                $newRin->nc_status = $request->nc_status[$key] ?? null;
                $rin->uom = $request->uom[$key] ?? null;
                $newRin->au_status = $request->au_status[$key] ?? null;
                $newRin->gst = $request->gst[$key] ?? 0;
                $newRin->gst_amount = $request->gst_amount[$key] ?? 0;
                $newRin->total_amount = $request->total_amount[$key] ?? 0;
                $newRin->round_type = $request->round_type[$key] ?? 0;
                $newRin->round_settle_amount = $request->round_settle_amount[$key] ?? 0;
                $newRin->round_amount = $request->round_amount[$key] ?? 0;
                $newRin->vendor_id = $request->vendor_id;
                $newRin->supply_order_no = $request->supply_order_no;
                $newRin->damage_status = $request->damage_status[$key] ?? 0;
                $newRin->save();
            }
        }

        session()->flash('message', 'RIN Updated successfully');
        return response()->json(['success' => 'RIN Updated successfully']);
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
        $rin = Rin::find($id);
        $rin->delete();

        return redirect()->back()->with('message', 'RIN deleted successfully.');
    }

    public function getItemDescription(Request $request)
    {
        $item = ItemCode::find($request->id);
        return response()->json(['description' => $item->description, 'price' => $item->item_price]);
    }

    public function getSirDetails(Request $request)
    {
        $request->validate([
            'sir_id' => 'required|exists:inventory_sirs,sir_no', // Validate the SIR ID exists
        ]);

        // Fetch the SIR details along with related data
        $sirDetails = InventorySir::with([
            'inventoryNumber',
            'supplier',
            'supplyOrder',
            'inspectionAuthority',
            'contractAuthority',
            'inventoryNumber.group',
            'inventoryNumber.project'
        ])->where('sir_no', $request->sir_id)->first();

        // Check if SIR details exist
        if (!$sirDetails) {
            return response()->json(['error' => 'SIR not found'], 404);
        }

        $allSirDetails = InventorySir::with([
            'inventoryNumber',
            'supplier',
            'supplyOrder',
            'inspectionAuthority',
            'contractAuthority',
            'inventoryNumber.group',
            'inventoryNumber.project'
        ])->where('sir_no', $request->sir_id)->get();

        // Fetch additional data for the view
        $items = ItemCode::all();
        $vendors = Vendor::orderBy('id', 'desc')->get();
        $supply_orders = SupplyOrder::all();
        $inventory_nos = InventoryNumber::where('status', 1)->orderBy('id', 'desc')->get();
        $gsts = GstPercentage::orderBy('id', 'desc')->get();
        $authorities = User::role('MATERIAL-MANAGER')->get();
        $designations = Designation::orderBy('id', 'desc')->paginate(10);
        $nc_statuses = NcStatus::orderBy('status', 'asc')->get();
        $au_statuses = AuStatus::orderBy('status', 'asc')->get();
        $uoms = Uom::all();

        // Render the view and return JSON response
        $view = view('inventory.rins.fetch_item_sir', compact(
            'sirDetails',
            'allSirDetails',
            'uoms',
            'items',
            'vendors',
            'supply_orders',
            'inventory_nos',
            'gsts',
            'authorities',
            'designations',
            'nc_statuses',
            'au_statuses'
        ))->render();

        return response()->json(['sirDetails' => $sirDetails, 'view' => $view]);
    }


    public function getSirForm(Request $request)
    {
        $sirs = InventorySir::orderBy('id', 'desc')->paginate(10);
        $vendors = Vendor::orderBy('id', 'desc')->get();
        $supply_orders = SupplyOrder::all();
        $inventory_nos = InventoryNumber::where('status', 1)->orderBy('id', 'desc')->get();
        $authorities = User::role('MATERIAL-MANAGER')->get();
        return view('inventory.rins.sir-form', compact('sirs', 'vendors', 'supply_orders', 'inventory_nos', 'authorities'));
    }
}
