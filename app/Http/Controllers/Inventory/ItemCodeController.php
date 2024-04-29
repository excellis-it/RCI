<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemCode;
use Illuminate\Support\Str;

class ItemCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ItemCode::orderBy('id','desc')->paginate(10);
        return view('inventory.items.list',compact('items'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $items = ItemCode::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('item_code', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.items.table', compact('items'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'item_code' => 'required',
        ]);

        $itemCode = ItemCode::latest()->first();
        if(isset($itemCode))
        {
            $serial_no = Str::substr($itemCode->code, -1);
            $counter = $serial_no + 1;
            // dd($serial_no);
        } else {
            $counter = 1;
        }

        $item_code = $request->item_code . str_pad($counter, 4, '0', STR_PAD_LEFT);

        $item_code_gen = new ItemCode();
        $item_code_gen->code = $item_code;
        $item_code_gen->description = $request->description;
        $item_code_gen->uom = $request->uom;
        $item_code_gen->item_type = $request->item_type;
        $item_code_gen->save();

        session()->flash('message', 'Item Code added successfully');
        return response()->json(['success' => 'Item Code added successfully']);
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
        
        $edit_item_code = ItemCode::find($id);
        $edit = true;
        return response()->json(['view' => view('inventory.items.form', compact('edit','edit_item_code'))->render()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'item_code' => 'required',
            
        ]);

        $item_code = ItemCode::find($id);
        $item_code->description = $request->description;
        $item_code->uom = $request->uom;
        $item_code->item_type = $request->item_type;
        $item_code->update();

        session()->flash('message', 'Item Code updated successfully');
        return response()->json(['success' => 'Item Code updated successfully']);
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
       
        $item_code = ItemCode::find($id);
        $item_code->delete();
        
        return redirect()->back()->with('message', 'Item Code deleted successfully');
    }
}
