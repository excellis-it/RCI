<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DesignationType;
use Illuminate\Http\Request;

class DesignationTypeController extends Controller
{
    public function index()
    {
        $designation_types = DesignationType::orderBy('id', 'desc')->paginate(10);
        return view('frontend.designation-types.list', compact('designation_types'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $designation_types = DesignationType::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('designation_type', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('frontend.designation-types.table', compact('designation_types'))->render()]);
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
            'designation_type' => 'required|unique:designation_types,designation_type',
        ]);

        $designation_type = new DesignationType();
        $designation_type->designation_type = $request->designation_type;
        $designation_type->save();

        session()->flash('message', 'Designation Type added successfully');
        return response()->json(['success' => 'Designation Type added successfully']);
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
        $designation_type = DesignationType::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.designation-types.form', compact('edit', 'designation_type'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'designation_type' => 'required|unique:designation_types,designation_type,' . $id,
        ]);

        $designation_type = DesignationType::find($id);
        $designation_type->designation_type = $request->designation_type;
        $designation_type->save();

        session()->flash('message', 'Designation Type updated successfully');
        return response()->json(['success' => 'Designation Type updated successfully']);
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
        $designation_type = DesignationType::find($id);
        $designation_type->delete();
        return redirect()->back()->with('message', 'Designation Type deleted successfully');
    }
}
