<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventorySir;
use App\Models\SupplyOrder;
use App\Models\Vendor;
use App\Models\InventoryNumber;
use App\Models\User;
use App\Models\ItemCode;
use App\Models\GstPercentage;
use App\Models\Designation;
use App\Models\NcStatus;
use App\Models\AuStatus;
use App\Models\SirType;
use Illuminate\Support\Facades\DB;

class InventorySirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //  $sirs = InventorySir::orderBy('id', 'desc')->paginate(10);

        $sirs = InventorySir::select('inventory_sirs.sir_no', 'inventory_sirs.id', 'inventory_sirs.created_at', 'inventory_sirs.sir_date', 'inventory_sirs.status')
            ->join(DB::raw('(SELECT sir_no, MAX(id) as max_id FROM inventory_sirs GROUP BY sir_no) as subquery'), function ($join) {
                $join->on('inventory_sirs.id', '=', 'subquery.max_id');
            })
            ->orderBy('inventory_sirs.id', 'desc')
            ->paginate(10);

        $vendors = Vendor::orderBy('id', 'desc')->get();
        $supply_orders = SupplyOrder::all();
        $inventory_nos = InventoryNumber::where('status', 1)->orderBy('id', 'desc')->get();
        $authorities = User::role('MATERIAL-MANAGER')->get();

        $items = ItemCode::all();
        $gsts = GstPercentage::orderBy('id', 'desc')->get();
        $nc_statuses = NcStatus::orderBy('status', 'asc')->get();
        $au_statuses = AuStatus::orderBy('status', 'asc')->get();
        $sir_types = SirType::where('status', 1)->orderBy('id', 'asc')->get();

        return view('inventory.sirs.list', compact('sirs', 'vendors', 'supply_orders', 'inventory_nos', 'authorities', 'items', 'gsts', 'nc_statuses', 'au_statuses', 'sir_types'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $sirs = InventorySir::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('sir_no', 'like', '%' . $query . '%')
                    ->orWhere('sir_date', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('inventory.inventory-types.table', compact('itemTypes'))->render()]);
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
        // validation
        $request->validate([
            'sir_no' => 'required',
            'sir_date' => 'required',
            'demand_no' => 'required',
            'demand_date' => 'required',
            'invoice_no' => 'required',
            'invoice_date' => 'required',
            'inventory_no' => 'required',
            // 'supplier_id' => 'required',
            // 'supply_order_no' => 'required',
            // 'inspection_authority' => 'required',
            'status' => 'required',
        ]);

        // $sir_save = InventorySir::create([
        //     'sir_no' => $request->sir_no,
        //     'sir_date' => $request->sir_date,
        //     'demand_no' => $request->demand_no,
        //     'demand_date' => $request->demand_date,
        //     'invoice_no' => $request->invoice_no,
        //     'invoice_date' => $request->invoice_date,
        //     'inventory_no' => $request->inventory_no,
        //     'supplier_id' => $request->supplier_id,
        //     'supply_order_no' => $request->supply_order_no,
        //     'inspection_authority' => $request->inspection_authority,
        //     'status' => $request->status,
        // ]);

        if ($request->item_id) {
            foreach ($request->item_id as $key => $item) {
                $sir = new InventorySir();

                $sir->sir_no = $request->sir_no;
                $sir->sir_date = $request->sir_date;
                $sir->demand_no = $request->demand_no;
                $sir->demand_date = $request->demand_date;
                $sir->invoice_no = $request->invoice_no;
                $sir->invoice_date = $request->invoice_date;
                $sir->inventory_no = $request->inventory_no;
                $sir->supplier_id = $request->supplier_id ?? null;
                $sir->supply_order_no = $request->supply_order_no ?? null;
                $sir->inspection_authority = $request->inspection_authority ?? null;
                $sir->sir_type_id = $request->sir_type ?? null;
                $sir->status = $request->status;


                // $sir->item_id = $request->item_id[$key] ?? null;
                $sir->gem_item_code = $request->item_id[$key] ?? null;
                $sir->description = $request->description[$key] ?? null;
                $sir->received_quantity = $request->received_quantity[$key] ?? null;
                $sir->remarks = $request->remarks[$key] ?? null;
                $sir->discount = $request->disc_percent[$key] ?? null;
                $sir->discount_amount = $request->discount_amount[$key] ?? null;
                $sir->discount_type = $request->discount_type[$key] ?? null;

                $sir->unit_cost = $request->unit_cost[$key] ?? null;
                $sir->total_cost = $request->total_cost[$key] ?? null;
                $sir->nc_status = $request->nc_status[$key] ?? null;
                $sir->au_status = $request->au_status[$key] ?? null;
                $sir->gst = $request->gst[$key] ?? null;
                $sir->gst_amount = $request->gst_amount[$key] ?? null;
                $sir->total_amount = $request->total_amount[$key] ?? null;
                $sir->save();
            }
        } else {
            $sir = new InventorySir();

            $sir->sir_no = $request->sir_no;
            $sir->sir_date = $request->sir_date;
            $sir->demand_no = $request->demand_no;
            $sir->demand_date = $request->demand_date;
            $sir->invoice_no = $request->invoice_no;
            $sir->invoice_date = $request->invoice_date;
            $sir->inventory_no = $request->inventory_no;
            $sir->supplier_id = $request->supplier_id ?? null;
            $sir->supply_order_no = $request->supply_order_no ?? null;
            $sir->inspection_authority = $request->inspection_authority ?? null;
            $sir->sir_type_id = $request->sir_type ?? null;
            $sir->status = $request->status;
            $sir->save();
        }

        session()->flash('message', 'Sir added successfully');
        return response()->json(['success' => 'Sir added successfully', 'sirData' => $sir]);
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
        $sir = InventorySir::where('id', $id)->first();
        $edit = true;
        $vendors = Vendor::orderBy('id', 'desc')->get();
        $supply_orders = SupplyOrder::all();
        $inventory_nos = InventoryNumber::where('status', 1)->orderBy('id', 'desc')->get();
        $authorities = User::role('MATERIAL-MANAGER')->get();
        $items = ItemCode::all();
        $gsts = GstPercentage::orderBy('id', 'desc')->get();
        $nc_statuses = NcStatus::orderBy('status', 'asc')->get();
        $au_statuses = AuStatus::orderBy('status', 'asc')->get();
        $sirItems = InventorySir::where('sir_no', $sir->sir_no)->get();
        $sir_types = SirType::orderBy('id', 'asc')->get();
        return response()->json(['view' => view('inventory.sirs.form', compact('edit', 'sir', 'vendors', 'supply_orders', 'inventory_nos', 'authorities', 'items', 'gsts', 'nc_statuses', 'au_statuses', 'sirItems', 'sir_types'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validation
        $request->validate([
            'sir_no' => 'required',
            'sir_date' => 'required',
            'status' => 'required',
            'demand_no' => 'required',
            'demand_date' => 'required',
            'invoice_no' => 'required',
            'invoice_date' => 'required',
            'inventory_no' => 'required',
        ]);

        $sir = InventorySir::find($id);

        if ($sir) {
            $sir->sir_no = $request->sir_no;
            $sir->sir_date = $request->sir_date;
            $sir->demand_no = $request->demand_no;
            $sir->demand_date = $request->demand_date;
            $sir->invoice_no = $request->invoice_no;
            $sir->invoice_date = $request->invoice_date;
            $sir->inventory_no = $request->inventory_no;
            $sir->supplier_id = $request->supplier_id ?? null;
            $sir->supply_order_no = $request->supply_order_no ?? null;
            $sir->inspection_authority = $request->inspection_authority ?? null;
            $sir->sir_type_id = $request->sir_type ?? null;
            $sir->status = $request->status;
            $sir->save();

            // Update existing items
            if ($request->item_id) {
                foreach ($request->item_id as $key => $item) {
                    $sirItem = InventorySir::where('sir_no', $sir->sir_no)
                        ->where('item_id', $item)
                        ->first();
                    if ($sirItem) {
                        $sirItem->sir_no = $request->sir_no;
                        $sirItem->sir_date = $request->sir_date;
                        $sirItem->demand_no = $request->demand_no;
                        $sirItem->demand_date = $request->demand_date;
                        $sirItem->invoice_no = $request->invoice_no;
                        $sirItem->invoice_date = $request->invoice_date;
                        $sirItem->inventory_no = $request->inventory_no;
                        $sirItem->supplier_id = $request->supplier_id ?? null;
                        $sirItem->supply_order_no = $request->supply_order_no ?? null;
                        $sirItem->inspection_authority = $request->inspection_authority ?? null;
                        $sirItem->sir_type_id = $request->sir_type ?? null;
                        $sirItem->status = $request->status;

                        $sirItem->gem_item_code = $request->item_id[$key] ?? null;
                        $sirItem->description = $request->description[$key] ?? null;
                        $sirItem->received_quantity = $request->received_quantity[$key] ?? null;
                        $sirItem->remarks = $request->remarks[$key] ?? null;
                        $sirItem->discount = $request->disc_percent[$key] ?? null;
                        $sirItem->discount_amount = $request->discount_amount[$key] ?? null;
                        $sirItem->discount_type = $request->discount_type[$key] ?? null;

                        $sirItem->unit_cost = $request->unit_cost[$key] ?? null;
                        $sirItem->total_cost = $request->total_cost[$key] ?? null;
                        $sirItem->nc_status = $request->nc_status[$key] ?? null;
                        $sirItem->au_status = $request->au_status[$key] ?? null;
                        $sirItem->gst = $request->gst[$key] ?? null;
                        $sirItem->gst_amount = $request->gst_amount[$key] ?? null;
                        $sirItem->total_amount = $request->total_amount[$key] ?? null;

                        $sirItem->save();
                    }
                }
            }
        }

        session()->flash('message', 'Sir updated successfully');
        return response()->json(['success' => 'Sir updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // sir type

    public function sirType()
    {
        $sirtypes = SirType::orderBy('id', 'asc')->paginate(10);
        return view('inventory.sir-types.list', compact('sirtypes'));
    }

    public function sirTypeStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $sir_type = SirType::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        session()->flash('message', 'Sir Type added successfully');
        return response()->json(['success' => 'Sir Type added successfully', 'sirTypeData' => $sir_type]);
    }

    public function sirTypeEdit(string $id)
    {
        $sir_type = SirType::where('id', $id)->first();
        $edit = true;
        return response()->json(['view' => view('inventory.sir-types.form', compact('edit', 'sir_type'))->render()]);
    }

    public function sirTypeUpdate(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $sir_type = SirType::where('id', $id)->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        session()->flash('message', 'Sir Type updated successfully');
        return response()->json(['success' => 'Sir Type updated successfully']);
    }

    public function getItemDescription(Request $request)
    {
        $item = ItemCode::find($request->id);
        $nc_status = NcStatus::where('id', $item->nc_status)->first();
        $au_status = AuStatus::where('id', $item->au_status)->first();
        $nc_status_name = $nc_status ? $nc_status->status : '';
        $au_status_name = $au_status ? $au_status->status : '';

        return response()->json(['description' => $item->description, 'price' => $item->item_price, 'nc_status' => $nc_status_name, 'au_status' => $au_status_name]);
    }
}
