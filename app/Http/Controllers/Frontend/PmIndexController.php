<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PmIndex;

class PmIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pm_indices = PmIndex::orderBy('id', 'desc')->paginate(10);
        return view('frontend.pm-index.list', compact('pm_indices'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $pm_indices = PmIndex::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('value', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
        
            return response()->json(['data' => view('frontend.pm-index.table', compact('pm_indices'))->render()]);
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
            'value' => 'required|unique:pm_indices,value',
            'status' => 'required',
        ]);

        $pm_index_value = new PmIndex();
        $pm_index_value->value = $request->value;
        $pm_index_value->status = $request->status;
        $pm_index_value->save();

        session()->flash('message', 'PM Index added successfully');
        return response()->json(['success' => 'PM Index added successfully']);
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
        $pm_index = PmIndex::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.pm-index.form', compact('edit','pm_index'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'value' => 'required',
            'status' => 'required',
        ]);

        $pm_index = PmIndex::find($id);
        $pm_index->value = $request->value;
        $pm_index->status = $request->status;
        $pm_index->save();

        session()->flash('message', 'PM Index updated successfully');
        return response()->json(['success' => 'PM Index updated successfully']);
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
        $pm_index = PmIndex::find($id);
        $pm_index->delete();
        return redirect()->back()->with('message', 'PM Index deleted successfully');
    }
}
