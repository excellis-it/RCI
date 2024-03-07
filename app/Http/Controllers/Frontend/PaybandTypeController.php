<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PaybandType;
use Illuminate\Http\Request;

class PaybandTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payband_types = PaybandType::orderBy('id', 'desc')->paginate(10);
        return view('frontend.payband-types.list', compact('payband_types'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $categories = PaybandType::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('payband_type', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            return response()->json(['data' => view('frontend.payband-types.table', compact('categories'))->render()]);
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
            'category' => 'required|unique:categories',
            'designation_type' => 'required',
            'gazetted' => 'required',
            'status' => 'required',
        ]);

        $category = new PaybandType();
        $category->category = $request->category;
        $category->designation_type = $request->designation_type;
        $category->gazetted = $request->gazetted;
        $category->status = $request->status;
        $category->save();

        session()->flash('message', 'PaybandType added successfully');
        return response()->json(['success' => 'PaybandType added successfully']);
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
        $category = PaybandType::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.categories.form', compact('edit', 'category'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required|unique:categories,category,' . $id,
            'designation_type' => 'required',
            'gazetted' => 'required',
            'status' => 'required',
        ]);

        $category = PaybandType::find($id);
        $category->category = $request->category;
        $category->designation_type = $request->designation_type;
        $category->gazetted = $request->gazetted;
        $category->status = $request->status;
        $category->save();

        session()->flash('message', 'PaybandType updated successfully');
        return response()->json(['success' => 'PaybandType updated successfully']);
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
        $category = PaybandType::find($id);
        $category->delete();
        return redirect()->back()->with('message', 'PaybandType deleted successfully');
    }
}
