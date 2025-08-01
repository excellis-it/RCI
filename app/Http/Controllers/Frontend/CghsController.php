<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cghs;
use App\Models\Designation;
use App\Models\PmLevel;

class CghsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cghs = Cghs::orderBy('id', 'desc')->paginate(10);
        $pay_levels = PmLevel::get();
        $designations = Designation::orderBy('id', 'desc')->get();
        return view('frontend.cghs.list', compact('cghs', 'pay_levels', 'designations'));
    }

    public function fetchData(Request $request)
    {
        if($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $cghs = Cghs::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('contribution', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
            $pay_levels = PmLevel::get();

            return response()->json(['data' => view('frontend.cghs.table', compact('cghs', 'pay_levels'))->render()]);
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
            // 'designation_id' => 'required',
            'pay_level_id' => 'required',
            'contribution' => 'required',
        ]);

        $cghs = new Cghs();
        // $cghs->designation_id = $request->designation_id;
        $cghs->contribution = $request->contribution;
        $cghs->pay_level_id = $request->pay_level_id;
        $cghs->status = $request->status;
        $cghs->save();

        session()->flash('message', 'CGHS created successfully');
        return response()->json(['success' => 'CGHS created successfully']);
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
        $cghs = Cghs::find($id);
        $pay_levels = PmLevel::get();
        $designations = Designation::orderBy('id', 'desc')->get();
        $edit = true;
        return response()->json(['view' => view('frontend.cghs.form', compact('edit', 'cghs', 'pay_levels', 'designations'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'contribution' => 'required',
            // 'designation_id' => 'required',
            'pay_level_id' => 'required',
        ]);

        $cghs = Cghs::find($id);
        // $cghs->designation_id = $request->designation_id;
        $cghs->contribution = $request->contribution;
        $cghs->pay_level_id = $request->pay_level_id;
        $cghs->status = $request->status;
        $cghs->update();

        session()->flash('message', 'CGHS updated successfully');
        return response()->json(['success' => 'CGHS updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
