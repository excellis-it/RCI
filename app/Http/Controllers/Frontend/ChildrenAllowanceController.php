<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ChildrenAllowanceAmount;
use Illuminate\Http\Request;

class ChildrenAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childrens = ChildrenAllowanceAmount::orderBy('id', 'desc')->paginate(10);
        return view('frontend.childrens.list',compact('childrens'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $childrens = ChildrenAllowanceAmount::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.childrens.table', compact('childrens'))->render()]);
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
            'amount' => 'required|max:255',
            'status' => 'required',
        ]);

        ChildrenAllowanceAmount::where('status', 1)->update(['status' => 0]);

        $children_value = new ChildrenAllowanceAmount();
        $children_value->amount = $request->amount;
        $children_value->status = $request->status;
        $children_value->save();

        session()->flash('message', 'Children added successfully');
        return response()->json(['success' => 'Children added successfully']);
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
        $children = ChildrenAllowanceAmount::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.childrens.form', compact('edit','children'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'amount' => 'required|max:255',
            'status' => 'required',
        ]);

        $children_value = ChildrenAllowanceAmount::find($id);
        $children_value->amount = $request->amount;
        $children_value->status = $request->status;
        $children_value->save();

        session()->flash('message', 'Children updated successfully');
        return response()->json(['success' => 'Children updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
