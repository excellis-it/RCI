<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\BagPurse;
use App\Models\Designation;

class BagPurseAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $designations = Designation::orderBy('id', 'desc')->get();
        $bag_purse_allowances = BagPurse::orderBy('id', 'desc')->paginate(10);

        return view('frontend.bag-purse-allowance.list', compact('designations', 'bag_purse_allowances'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $bag_purse_allowances = BagPurse::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('entitle_amount', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);
            return response()->json(['data' => view('frontend.bag-purse-allowance.table', compact('bag_purse_allowances'))->render()]);
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
            'designation_id' => 'required|unique:bag_purses,designation_id',
            'entitle_amount' => 'required|numeric',
            // 'year' => 'required',
        ]);

        $bag_purse_allow = new BagPurse();
        $bag_purse_allow->designation_id = $request->designation_id;
        $bag_purse_allow->entitle_amount = $request->entitle_amount;
        // $bag_purse_allow->year = $request->year;
        $bag_purse_allow->save();

        session()->flash('message', 'Bag Purse allowance added successfully');
        return response()->json(['success' => 'Bag Purse allowance added successfully']);
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
        $bag_purse_allowance = BagPurse::findOrFail($id);
        $designations = Designation::orderBy('id', 'desc')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.bag-purse-allowance.form', compact('bag_purse_allowance', 'designations', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'designation_id' => 'required|unique:bag_purses,designation_id,' . $id,
            'entitle_amount' => 'required|numeric',
            // 'year' => 'required',
        ]);

        $bag_purse_allow = BagPurse::where('id', $id)->first();
        $bag_purse_allow->designation_id = $request->designation_id;
        $bag_purse_allow->entitle_amount = $request->entitle_amount;
        // $bag_purse_allow->year = $request->year;
        $bag_purse_allow->save();

        session()->flash('message', 'Bag Purse allowance updated successfully');
        return response()->json(['success' => 'Bag Purse allowance updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
