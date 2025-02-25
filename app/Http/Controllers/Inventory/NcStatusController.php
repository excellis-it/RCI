<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\NcStatus;
use Illuminate\Http\Request;

class NcStatusController extends Controller
{
    public function index()
    {
        $nc_statuses = NcStatus::orderBy('id', 'desc')->paginate(10);
        return view('inventory.nc-status.list', compact('nc_statuses'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $nc_statuses = NcStatus::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('status', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('inventory.nc-status.table', compact('nc_statuses'))->render()]);
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
            'status' => 'required|unique:nc_statuses,status',
        ]);

        $nc_status = new NcStatus();
        $nc_status->status = $request->status;
        $nc_status->save();

        session()->flash('message', 'NC Status added successfully');
        return response()->json(['success' => 'NC Status added successfully']);
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
        $nc_status = NcStatus::find($id);
        $edit = true;
        return response()->json(['view' => view('inventory.nc-status.form', compact('edit', 'nc_status'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|max:255|unique:nc_statuses,status,' . $id,
        ]);

        $nc_status = NcStatus::find($id);
        $nc_status->status = $request->status;
        $nc_status->save();

        session()->flash('message', 'NC Status updated successfully');
        return response()->json(['success' => 'NC Status updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // deleteNcStatus
    public function deleteNcStatus($id)
    {
        $nc_status = NcStatus::find($id);
        $nc_status->delete();
        session()->flash('message', 'NC Status deleted successfully');
        return back();
    }

}

