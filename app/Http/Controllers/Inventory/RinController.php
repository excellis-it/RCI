<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rin;
use App\Models\ItemCode;

class RinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rins = Rin::orderBy('id','desc')->paginate(10);
        $items = ItemCode::all();

        return view('inventory.rins.list',compact('rins', 'items'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $rins = Rin::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('item_id', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%')
                    ->orWhere('received_quantity', 'like', '%' . $query . '%')
                    ->orWhere('accepted_quantity', 'like', '%' . $query . '%')
                    ->orWhere('rejected_quantity', 'like', '%' . $query . '%')
                    ->orWhere('remarks', 'like', '%' . $query . '%')
                    ->orWhere('nc_status', 'like', '%' . $query . '%')
                    ->orWhere('au_status', 'like', '%' . $query . '%');
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
            $items = ItemCode::all();

            return response()->json(['data' => view('inventory.rins.table', compact('rins', 'items'))->render()]);
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
            'item_id' => 'required',
            'received_quantity' => 'required',
            'accepted_quantity' => 'required',
            'rejected_quantity' => 'required',
            'nc_status' => 'required',
            'au_status' => 'required',
        ]);

        $rin = new Rin();
        $rin->item_id = $request->item_id;
        $rin->description = $request->description;
        $rin->received_quantity = $request->received_quantity;
        $rin->accepted_quantity = $request->accepted_quantity;
        $rin->rejected_quantity = $request->rejected_quantity;
        $rin->remarks = $request->remarks;
        $rin->nc_status = $request->nc_status;
        $rin->au_status = $request->au_status;
        $rin->save();

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
        $items = ItemCode::all();
        $edit = true;
        return response()->json(['view' => view('inventory.rins.form', compact('edit','rin', 'items'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'item_id' => 'required',
            'received_quantity' => 'required',
            'accepted_quantity' => 'required',
            'rejected_quantity' => 'required',
            'nc_status' => 'required',
            'au_status' => 'required',
        ]);

        $rin = Rin::find($id);
        $rin->item_id = $request->item_id;
        $rin->description = $request->description;
        $rin->received_quantity = $request->received_quantity;
        $rin->accepted_quantity = $request->accepted_quantity;
        $rin->rejected_quantity = $request->rejected_quantity;
        $rin->remarks = $request->remarks;
        $rin->nc_status = $request->nc_status;
        $rin->au_status = $request->au_status;
        $rin->update();

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
        return response()->json(['description' => $item->description]);
    }
    
}
