<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberFamily;
use App\Models\Member;

class MemberFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member_familys = MemberFamily::paginate(10);
        $members = Member::where('member_status', true)->orderBy('id','desc')->get();

        return view('frontend.member-info.family.list', compact('member_familys','members'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $member_familys = MemberFamily::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('wife_hus_name', 'like', '%' . $query . '%')
                    ->orWhere('dob', 'like', '%' . $query . '%')
                    ->orWhere('work_status', 'like', '%' . $query . '%')
                    //member details
                    ->orWhereHas('member', function($queryBuilder) use ($query) {
                        $queryBuilder->where('name', 'like', '%' . $query . '%');
                            
                    });
                    
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.member-info.family.table', compact('member_familys'))->render()]);
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
        //validation
        $request->validate([
            'member_id' => 'required',
        ]);

        $member_family = new MemberFamily();
        $member_family->member_id = $request->member_id;
        $member_family->father_mother_name = $request->father_mother_name;
        $member_family->wife_hus_name = $request->wife_hus_name;
        $member_family->dob = $request->dob;
        $member_family->work_status = $request->work_status;
        $member_family->child1_name = $request->child1_name;
        $member_family->child1_dob = $request->child1_dob;
        $member_family->child1_scll_name = $request->child1_scll_name;
        $member_family->child2_name = $request->child2_name;
        $member_family->child2_dob = $request->child2_dob;
        $member_family->child2_scll_name = $request->child2_scll_name;
        $member_family->save();

        session()->flash('success', 'Member family details added successfully');
        return response()->json(['success' => 'Member family details added successfully']);

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
        $member_fam_edit =  MemberFamily::find($id);
        $members = Member::where('member_status', true)->orderBy('id','desc')->get();
        $edit = true;
        return response()->json(['view' => view('frontend.member-info.family.form', compact('member_fam_edit','members','edit'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update_member_family = MemberFamily::find($id);
        $update_member_family->member_id = $request->member_id;
        $update_member_family->father_mother_name = $request->father_mother_name;
        $update_member_family->wife_hus_name = $request->wife_hus_name;
        $update_member_family->dob = $request->dob;
        $update_member_family->work_status = $request->work_status;
        $update_member_family->child1_name = $request->child1_name;
        $update_member_family->child1_dob = $request->child1_dob;
        $update_member_family->child1_scll_name = $request->child1_scll_name;
        $update_member_family->child2_name = $request->child2_name;
        $update_member_family->child2_dob = $request->child2_dob;
        $update_member_family->child2_scll_name = $request->child2_scll_name;
        $update_member_family->update();

        session()->flash('message', 'Member family updated successfully');
        return response()->json(['message' => 'Member family updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
