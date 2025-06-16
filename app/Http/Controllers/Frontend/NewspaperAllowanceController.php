<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\NewspaperAllowance;
use App\Models\MemberNewspaperAllowance;
use App\Models\Member;
use App\Models\Group;
use App\Models\Designation;

class NewspaperAllowanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::where('status', 1)->get();
        $designations = Designation::orderBy('id', 'desc')->get();
        $newspaper_allows = NewspaperAllowance::orderBy('id','desc')->paginate(10);
        return view('frontend.newspaper-allowance.list', compact('designations', 'newspaper_allows', 'groups'));
    }

    public function newspaperGroupDesignation(Request $request)
    {
        $group_id = $request->group_id;
        $designations = Designation::where('group_id', $group_id)->get();
        return response()->json(['designations' => $designations]);
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $newspaper_allows = NewspaperAllowance::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('max_allocation_amount', 'like', '%' . $query . '%')
                    ->orWhere('remarks', 'like', '%' . $query . '%')
                    ->orWhereHas('designation', function ($queryBuilder) use ($query) {
                        $queryBuilder->where('designation', 'like', '%' . $query . '%');
                    });
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);
            return response()->json(['data' => view('frontend.newspaper-allowance.table', compact('newspaper_allows'))->render()]);
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
        // Validate input
        $request->validate([
            'designation_id' => 'required|exists:designations,id',
            'duration' => 'required|string', // or required|in:monthly,quarterly,... depending on your options
             'max_allocation_amount' => 'required|numeric|min:1',
            'remarks' => 'nullable|string',
        ]);

        // Check if a similar record already exists
        $exists = NewspaperAllowance::where('designation_id', $request->designation_id)
            ->where('duration', $request->duration)
            ->first();

        if ($exists) {
            session()->flash('error', 'A newspaper allowance for the specified category and duration already exists.');
            return response()->json(['error' => 'A newspaper allowance for the specified category and duration already exists.']);
        }

        // Save new record
        $newspaper_allow = new NewspaperAllowance();
        $newspaper_allow->designation_id = $request->designation_id;
        $newspaper_allow->duration = $request->duration;
        $newspaper_allow->max_allocation_amount = $request->max_allocation_amount;
        $newspaper_allow->remarks = $request->remarks;
        $newspaper_allow->save();

        session()->flash('message', 'Newspaper allowance added successfully');
        return response()->json(['success' => 'Newspaper allowance added successfully']);
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
        $newspaper_allowance = NewspaperAllowance::findOrFail($id);
        $designations = Designation::orderBy('id', 'desc')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.newspaper-allowance.form', compact('newspaper_allowance', 'designations', 'edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'designation_id' => 'required|exists:designations,id',
            'duration' => 'required|string', // You can specify valid options using in:monthly,yearly, etc.
            'max_allocation_amount' => 'required|numeric|min:1',
            'remarks' => 'nullable|string',
        ]);

        // Find the record by ID
        $newspaper_allow = NewspaperAllowance::findOrFail($id);

        // Check for duplicate designation_id + duration (excluding current record)
        $exists = NewspaperAllowance::where('designation_id', $request->designation_id)
            ->where('duration', $request->duration)
            ->where('id', '!=', $id)
            ->first();

        if ($exists) {
            session()->flash('error', 'A newspaper allowance for the specified category and duration already exists.');
            return response()->json(['error' => 'A newspaper allowance for the specified category and duration already exists.']);
        }

        // Update the record
        $newspaper_allow->designation_id = $request->designation_id;
        $newspaper_allow->duration = $request->duration;
        $newspaper_allow->max_allocation_amount = $request->max_allocation_amount;
        $newspaper_allow->remarks = $request->remarks;
        $newspaper_allow->save();

        session()->flash('message', 'Newspaper allowance updated successfully');
        return response()->json(['success' => 'Newspaper allowance updated successfully']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
