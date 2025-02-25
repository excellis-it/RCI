<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\ItemCodeName;
use Illuminate\Http\Request;
use App\Models\ItemCode;
use App\Models\NcStatus;
use App\Models\AuStatus;
use App\Models\Uom;
use Illuminate\Support\Str;

class ItemCodeNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uoms = Uom::all();
        $nc_statuses = NcStatus::all();
        $au_statuses = AuStatus::all();
        $ItemCodeNames = ItemCodeName::orderBy('id', 'desc')->paginate(10);

        return view('inventory.item-code-names.list', compact('ItemCodeNames', 'uoms', 'nc_statuses', 'au_statuses'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $ItemCodeNames = ItemCodeName::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('item_code', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('inventory.item-code-names.table', compact('ItemCodeNames'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $uoms = Uom::all();
        $nc_statuses = NcStatus::all();
        $au_statuses = AuStatus::all();
        return view('inventory.item-code-names.form', compact('uoms', 'nc_statuses', 'au_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_code' => 'required',
            'name' => 'required',

        ]);

        // $itemCode = ItemCode::latest()->first();
        // if (isset($itemCode)) {
        //     $serial_no = Str::substr($itemCode->code, -1);
        //     $counter = $serial_no + 1;
        //     // dd($serial_no);
        // } else {
        //     $counter = 1;
        // }

        // $item_code = $request->item_code . str_pad($counter, 4, '0', STR_PAD_LEFT);

        $item_code_name = new ItemCodeName();
        $item_code_name->item_code = $request->item_code;
        $item_code_name->name = $request->name;
        $item_code_name->uom = $request->uom;
        $item_code_name->nc_status = $request->nc_status;
        $item_code_name->au_status = $request->au_status;
        $item_code_name->save();

        session()->flash('message', 'Item Code Type added successfully');
        return response()->json(['success' => 'Item Code Type added successfully']);
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
        $item_code_name = ItemCodeName::find($id);
        $uoms = Uom::all();
        $nc_statuses = NcStatus::all();
        $au_statuses = AuStatus::all();
        $edit = true;

        return response()->json(['view' => view('inventory.item-code-names.form', compact('edit', 'uoms', 'item_code_name', 'nc_statuses', 'au_statuses'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'item_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',

        ]);

        $item_code_name = ItemCodeName::find($id);
        $item_code_name->item_code = $request->item_code;
        $item_code_name->name = $request->name;
        $item_code_name->uom = $request->uom;
        $item_code_name->nc_status = $request->nc_status;
        $item_code_name->au_status = $request->au_status;
        $item_code_name->save();

        session()->flash('message', 'Item Code Name updated successfully');
        return response()->json(['success' => 'Item Code Name updated successfully']);
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
        $item_code_name = ItemCodeName::find($request->id);
        $item_code_name->delete();

        return redirect()->back()->with('message', 'Item Code Type deleted succsessfully');
    }

    public function getItems(Request $request)
    {
        $itemname = $request->itemname;
        $item_codes = ItemCodeName::where('name', 'like', '%' . $itemname . '%')
            ->get(); // Get only the item_code field

        return response()->json($item_codes); // Return JSON response
    }

    public function storeUom(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // return $request;

        $uom = new Uom();
        $uom->name = $request->name;
        $uom->status = 1; // default active
        $uom->save();
        //  session()->flash('message', 'UOM added successfully');

        return response()->json(['success' => 'UOM added successfully', 'uom' => $uom]);
    }

    public function storeNcStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $ncStatus = new NcStatus();
        $ncStatus->status = $request->status;
        $ncStatus->save();
        //  session()->flash('message', 'NC Status added successfully');

        return response()->json(['success' => 'NC Status added successfully', 'nc_status' => $ncStatus]);
    }

    public function storeAuStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $auStatus = new AuStatus();
        $auStatus->status = $request->status;
        $auStatus->save();
        //  session()->flash('message', 'AU Status added successfully');

        return response()->json(['success' => 'AU Status added successfully', 'au_status' => $auStatus]);
    }
}
