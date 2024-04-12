<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quater;

class QuaterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quarters = Quater::orderBy('id', 'desc')->paginate(10);
        return view('frontend.quarter.list',compact('quarters'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $quarters = Quater::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('value', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.quarter.table', compact('quarters'))->render()]);
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
            'value' => 'required|unique:quaters,value',
            'status' => 'required',
        ]);

        $quarter_value = new Quater();
        $quarter_value->value = $request->value;
        $quarter_value->status = $request->status;
        $quarter_value->save();

        session()->flash('message', 'Quarter added successfully');
        return response()->json(['success' => 'Quarter added successfully']);
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
        $quarter = Quater::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.quarter.form', compact('edit','quarter'))->render()]);
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

        $quarter = Quater::find($id);
        $quarter->value = $request->value;
        $quarter->status = $request->status;
        $quarter->save();

        session()->flash('message', 'Quarter updated successfully');
        return response()->json(['success' => 'Quarter updated successfully']);
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
        $quarter = Quater::find($id);
        $quarter->delete();
        return redirect()->back()->with('message', 'Quarter deleted successfully');
    }
}
