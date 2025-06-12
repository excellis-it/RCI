<?php

namespace App\Http\Controllers\Frontend\MemberInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberLandline;
use App\Models\Designation;
use Illuminate\Validation\Rule;
use App\Models\LandlineAllowance;
class MobileAllowanceController extends Controller
{
    public function index()
    {
        //
        $members = Member::with('designation')->where('member_status', 1)->get();
        $designations = Designation::orderBy('id', 'desc')->get();
        $landline_allowances = MemberLandline::paginate(10);
        return view('frontend.member-info.landline-allowance.list', compact('members','landline_allowances','designations'));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $landline_allowances = MemberLandline::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('amount', 'like', '%' . $query . '%')
                    ->orWhere('year', 'like', '%' . $query . '%')
                    ->orWhereHas('member', function($queryBuilder) use ($query) {
                        $queryBuilder->where('name', 'like', '%' . $query . '%');

                    });

            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.member-info.landline-allowance.table', compact('landline_allowances'))->render()]);
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
        'member_id' => 'required|exists:members,id',
        'landline_amount' => 'required|numeric',
        'mobile_amount' => 'required|numeric',
        'broadband_amount' => 'required|numeric',
        'entitle_amount' => 'required|numeric',
        'month' => 'required|string',
        'year' => 'required|digits:4|integer',
        // Enforce uniqueness
        'member_id' => [
            'required',
            Rule::unique('member_landlines')->where(fn ($query) =>
                $query->where('month', $request->month)
                      ->where('year', $request->year)
            ),
        ],
    ]);

    MemberLandline::create($request->all());
session()->flash('message', 'Member Newspaper Amount added successfully');
    return response()->json(['message' => 'Member landline added successfully.']);
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
        $member_newspaper = MemberLandline::findOrFail($id);
        $members = Member::with('designation')->orderBy('id','asc')->get();
        $edit = true;

        return response()->json(['view' => view('frontend.member-info.landline-allowance.form', compact('member_newspaper', 'edit','members'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, MemberLandline $memberLandline)
{
    $request->validate([
        'member_id' => 'required|exists:members,id',
        'landline_amount' => 'required|numeric',
        'mobile_amount' => 'required|numeric',
        'broadband_amount' => 'required|numeric',
        'entitle_amount' => 'required|numeric',
        'month' => 'required|string',
        'year' => 'required|digits:4|integer',
        'member_id' => [
            'required',
            Rule::unique('member_landlines')
                ->where(fn ($query) =>
                    $query->where('month', $request->month)
                          ->where('year', $request->year)
                )
                ->ignore($memberLandline->id),
        ],
    ]);

    $memberLandline->update($request->all());

    session()->flash('message', 'Member Newspaper Allowance updated successfully!');
        return redirect()->route('member-mobile-allowance.index')->with('message', 'Member Newspaper Allowance updated successfully!');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getEntitleAmount(Request $request)
{
    $memberId = $request->member_id;

    // Assuming you can get designation_id from Member model
    $member = Member::find($memberId);
    // dd($member);
    if (!$member || !$member->desig) {
        return response()->json(['entitle_amount' => '0']);
    }

    $allowance = LandlineAllowance::where('designation_id', $member->desig)->first();

    return response()->json([
        'entitle_amount' => $allowance ? $allowance->total_amount_allo : '0'
    ]);
}

}
