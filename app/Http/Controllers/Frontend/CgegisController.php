<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cgegis;

class CgegisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cgeGis = Cgegis::orderBy('id', 'desc')->paginate(10);
        return view('frontend.cgegis.list',compact('cgeGis'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cgeGis = Cgegis::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('value', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.cgegis.table', compact('cgeGis'))->render()]);
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
            'value' => 'required',
            'status' => 'required',
        ]);

        $cgegis_value = new Cgegis();
        $cgegis_value->value = $request->value;
        $cgegis_value->status = $request->status;
        $cgegis_value->save();

        session()->flash('message', 'Cgegis added successfully');
        return response()->json(['success' => 'Cgegis added successfully']);
        
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
        $cgegis = Cgegis::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.cgegis.form', compact('edit','cgegis'))->render()]);
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

        $cgegis_update = Cgegis::find($id);
        $cgegis_update->value = $request->value;
        $cgegis_update->status = $request->status;
        $cgegis_update->save();

        session()->flash('message', 'Cgegis updated successfully');
        return response()->json(['success' => 'Cgegis updated successfully']);
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
        $cgegis_delete = Cgegis::find($id);
        $cgegis_delete->delete();
        return redirect()->back()->with('message', 'Cgegis deleted successfully');
    }
}