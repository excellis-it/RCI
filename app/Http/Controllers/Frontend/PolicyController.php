<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $policies = Policy::orderBy('id','desc')->paginate(10);
        return view('frontend.policy.list',compact('policies'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $policies = Policy::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('no', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
                
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
        
            return response()->json(['data' => view('frontend.policy.table', compact('policies'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.policy.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'policy_name' => 'required|unique:pm_levels,value',
            'policy_no' => 'required',
            'status' => 'required',
        ]);

        $policy_add = new Policy();
        $policy_add->policy_name = $request->policy_name;
        $policy_add->policy_no =  $request->policy_no;
        $policy_add->status = $request->status;
        $policy_add->save();

        session()->flash('message', 'Policy added successfully');
        return response()->json(['success' => 'Policy added successfully']);
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
        $policy_edit = Policy::find($id);
        $edit = true;
        return response()->json(['view' => view('frontend.policy.form', compact('edit', 'policy_edit'))->render()]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function deletePolicy(Request $request)
    {
        $policy_delete = Policy::find($id);
        $policy_delete->delete();
        return redirect()->back()->with('message', 'Policy deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
