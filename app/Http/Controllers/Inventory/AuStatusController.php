<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\AuStatus;
use Illuminate\Http\Request;

class AuStatusController extends Controller
{
    public function index()
    {
        $au_statuses = AuStatus::orderBy('id', 'desc')->paginate(10);
        return view('inventory.au-status.list', compact('au_statuses'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $au_statuses = AuStatus::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('status', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('inventory.au-status.table', compact('au_statuses'))->render()]);
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
            'status' => 'required|unique:au_statuses,status',
        ]);

        $au_status = new AuStatus();
        $au_status->status = $request->status;
        $au_status->save();

        session()->flash('message', 'AU Status added successfully');
        return response()->json(['success' => 'AU Status added successfully']);
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
        $au_status = AuStatus::find($id);
        $edit = true;
        return response()->json(['view' => view('inventory.au-status.form', compact('edit', 'au_status'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|max:255|unique:au_statuses,status,' . $id,
        ]);

        $au_status = AuStatus::find($id);
        $au_status->status = $request->status;
        $au_status->save();

        session()->flash('message', 'AU Status updated successfully');
        return response()->json(['success' => 'AU Status updated successfully']);
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
        $au_status = AuStatus::find($id);
        $au_status->delete();
        session()->flash('message', 'AU Status deleted successfully');
        return back();
    }
}
