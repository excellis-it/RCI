<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\LandlineAllowance;
use Illuminate\Validation\Rule;

class LandlineAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $designations = Designation::orderBy('id', 'desc')->get();
        $landline_allowances = LandlineAllowance::orderBy('id','desc')->paginate(10);

        return view('frontend.landline-allowance.list',compact('designations','landline_allowances'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $landline_allowances = LandlineAllowance::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    // ->orWhere('mobile_max_allo', 'like', '%' . $query . '%')
                    // ->orWhere('landline_max_allo', 'like', '%' . $query . '%')
                    // ->orWhere('broad_band_max_allo', 'like', '%' . $query . '%')
                    ->orWhere('total_amount_allo', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);
            return response()->json(['data' => view('frontend.landline-allowance.table', compact('landline_allowances'))->render()]);
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
            'designation_id' => 'required|unique:landline_allowances',
            // 'mobile_max_allo' => 'required|numeric',
            // 'landline_max_allo' => 'required|numeric',
            // 'broad_band_max_allo' => 'required|numeric',
            'total_amount_allo' => 'required|numeric',
        ]);

        $landline_allow = new LandlineAllowance();
        $landline_allow->designation_id = $request->designation_id;
        // $landline_allow->mobile_max_allo = $request->mobile_max_allo;
        // $landline_allow->landline_max_allo = $request->landline_max_allo;
        // $landline_allow->broad_band_max_allo = $request->broad_band_max_allo;
        $landline_allow->total_amount_allo = $request->total_amount_allo;
        $landline_allow->save();

        session()->flash('message', 'Landline added successfully');
        return response()->json(['success' => 'Landline added successfully']);
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
        $landline_allowance = LandlineAllowance::findOrFail($id);
        $designations = Designation::orderBy('id', 'desc')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.landline-allowance.form', compact('landline_allowance', 'designations', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
            'designation_id' => 'required|unique:landline_allowances,designation_id,' . $id,
            'total_amount_allo' => 'required|numeric',
        ]);


        $landline_allow =  LandlineAllowance::where('id',$id)->first();
        // dd($landline_allow);
        $landline_allow->designation_id = $request->designation_id;
        // $landline_allow->mobile_max_allo = $request->mobile_max_allo;
        // $landline_allow->landline_max_allo = $request->landline_max_allo;
        // $landline_allow->broad_band_max_allo = $request->broad_band_max_allo;
        $landline_allow->total_amount_allo = $request->total_amount_allo;
        $landline_allow->update();

        session()->flash('message', 'Landline updated successfully');
        return response()->json(['message' => 'Landline updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
