<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payband;
use App\Models\Category;
use App\Models\Member;
use App\Models\PmLevel;
use App\Models\PmIndex;
use App\Models\Division;
use App\Models\Group;
use App\Models\Cadre;
use App\Models\DesignationType;
use App\Models\FundType;
use App\Models\Quater;
use App\Models\ExService;
use App\Models\Pg;
use App\Models\Cgegis;
use App\Models\PaybandType;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $members = Member::orderBy('id', 'desc')->paginate(10);
        return view('frontend.members.list',compact('members'));
    }

    public function fetchData(Request $request)
    {

        
        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $members = Member::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('pers_no', 'like', '%' . $query . '%')
                    ->orWhere('emp_id', 'like', '%' . $query . '%')
                    ->orWhere('gender', 'like', '%' . $query . '%')
                    ->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('frontend.members.table', compact('members'))->render()]);
        }
    }

    public function editMember()
    {
        return view('frontend.members.edit');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $paybands = PaybandType::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->where('status',1)->get();
        $pmLevels = PmLevel::orderBy('id', 'desc')->where('status',1)->get();
        $pmIndexes = PmIndex::orderBy('id', 'desc')->where('status',1)->get();
        $divisions = Division::orderBy('id', 'desc')->where('status',1)->get();
        $groups = Group::orderBy('id', 'desc')->where('status',1)->get();
        $cadres = Cadre::orderBy('id', 'desc')->where('status',1)->get();
        $designations = DesignationType::orderBy('id', 'desc')->get();
        $fundTypes = FundType::orderBy('id', 'desc')->where('status',1)->get();
        $quaters = Quater::orderBy('id', 'desc')->where('status',1)->get();
        $exServices = ExService::orderBy('id', 'desc')->where('status',1)->get();
        $pgs = Pg::orderBy('id', 'desc')->where('status',1)->get();
        $cgegises = Cgegis::orderBy('id', 'desc')->where('status',1)->get();

        return view('frontend.members.form',compact('paybands','categories','pmLevels','pmIndexes','divisions','groups','cadres','designations','fundTypes','quaters','exServices','pgs','cgegises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'pers_no' => 'required',
            'emp_id' => 'required',
            'gender' => 'required',
            'name' => 'required',
            'pm_level' => 'required',
            'pm_index' => 'required',
            'basic' => 'required',
            'desig' => 'required',
            'division' => 'required',
            'group' => 'required',
            'cadre' => 'required',
            'category' => 'required',
            'status' => 'required',
            'old_bp' => 'required',
            'g_pay' => 'required',
            'pay_band' => 'required',
            'fund_type' => 'required',
            'dob' => 'required',
            'doj_lab' => 'required',
            'doj_service1' => 'required',
            'dop' => 'required',
            'next_inr' => 'required',
            'quater' => 'required',
            'quater_no' => 'required',
            'doj_service2' => 'required',
            'cgeis' => 'required',
            'ex_service' => 'required',
            'pg' => 'required',
            'cgegis' => 'required',
            'pay_stop' => 'required',
            'pis' => 'required',
            'pis_address' => 'required',
            'sos' => 'required',
            'sos_address' => 'required',
        ]);

        // store data
        $member = new Member();
        $member->pers_no = $request->pers_no;
        $member->emp_id = $request->emp_id;
        $member->gender = $request->gender;
        $member->name = $request->name;
        $member->pm_level = $request->pm_level;
        $member->pm_index = $request->pm_index;
        $member->basic = $request->basic;
        $member->desig = $request->desig;
        $member->division = $request->division;
        $member->group = $request->group;
        $member->cadre = $request->cadre;
        $member->category = $request->category;
        $member->status = $request->status;
        $member->old_bp = $request->old_bp;
        $member->g_pay = $request->g_pay;
        $member->pay_band = $request->pay_band;
        $member->fund_type = $request->fund_type;
        $member->dob = $request->dob;
        $member->doj_lab = $request->doj_lab;
        $member->doj_service1 = $request->doj_service1;
        $member->dop = $request->dop;
        $member->next_inr = $request->next_inr;
        $member->quater = $request->quater;
        $member->quater_no = $request->quater_no;
        $member->doj_service2 = $request->doj_service2;
        $member->cgeis = $request->cgeis;
        $member->ex_service = $request->ex_service;
        $member->pg = $request->pg;
        $member->cgegis = $request->cgegis;
        $member->pay_stop = $request->pay_stop;
        $member->pis = $request->pis;
        $member->pis_address = $request->pis_address;
        $member->sos = $request->sos;
        $member->sos_address = $request->sos_address;
        $member->save();

        session()->flash('message', 'Member added successfully');
        return response()->json(['success' => 'Member added successfully']);
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
        $member = Member::with('designation','divisions','groups')->find(1);
        return view('frontend.members.edit',compact('member'));
    }

    public function memberCreditUpdate(Request $request)
    {
        return $request;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $id;
    }

    public function deleteMember($id)
    {
        return $id;
    }
}
