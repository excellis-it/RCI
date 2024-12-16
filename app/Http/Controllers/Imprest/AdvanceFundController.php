<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvanceFundToEmployee;
use App\Models\VariableType;
use App\Models\Project;
use App\Models\Group;
use App\Models\DesignationType;
use App\Models\Division;
use App\Models\Member;
use App\Models\MemberCoreInfo;
use App\Models\MemberPersonalInfo;
use App\Models\Bank;

class AdvanceFundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advance_funds = AdvanceFundToEmployee::orderBy('id', 'desc')->paginate(10);
        $variable_types = VariableType::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->get();
        $designations = DesignationType::orderBy('id', 'desc')->get();
        $groups = Group::orderBy('id', 'desc')->get();
        $divisions = Division::orderBy('id', 'desc')->get();
        $employees = Member::orderBy('id', 'desc')->get();
        $members = Member::where('member_status', 1)->orderBy('name', 'asc')->get();

        return view('imprest.advance-fund.list', compact('advance_funds', 'variable_types', 'projects', 'designations', 'groups', 'divisions', 'employees', 'members'));
    }

    public function fetchData(Request $request)
    {

        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $advance_funds = AdvanceFundToEmployee::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('adv_no', 'like', '%' . $query . '%')
                    ->orWhere('adv_date', 'like', '%' . $query . '%')
                    ->orWhere('adv_amount', 'like', '%' . $query . '%')
                    ->orWhere('chq_no', 'like', '%' . $query . '%')
                    ->orWhere('chq_date', 'like', '%' . $query . '%');
            })
                ->orderBy($sort_by, $sort_type)
                ->paginate(10);

            $variable_types = VariableType::orderBy('id', 'desc')->get();
            $projects = Project::orderBy('id', 'desc')->get();
            $designations = DesignationType::orderBy('id', 'desc')->get();
            $groups = Group::orderBy('id', 'desc')->get();
            $divisions = Division::orderBy('id', 'desc')->get();
            $employees = Member::orderBy('id', 'desc')->get();

            return response()->json(['data' => view('imprest.advance-fund.table', compact('advance_funds', 'employees', 'variable_types', 'projects', 'designations', 'groups', 'divisions'))->render()]);
        }
    }


    public function getMemberDetails(Request $request)
    {

        $member = Member::where('id', $request->member_id)->first();

        $member_core = MemberCoreInfo::where('member_id', $request->member_id)->orderBy('id', 'desc')->first() ?? '';

        if ($member) {
            return response()->json([
                'data' => [
                    'member_data' => $member,
                    'name' => $member->name,
                    'desig' => $member->designation->designation_type,
                    'bank_account' => $member_core,
                    'personal_info' => $member->memberPersonalInfo,
                    'divisions' => $member->divisions,
                    'groups' => $member->groups,
                ]
            ]);
        } else {
            return response()->json(['error' => 'Vendor not found'], 404);
        }
    }

    public function getMemberFunds(Request $request)
    {

        $member_id = $request->member_id;
        $member_funds = AdvanceFundToEmployee::where('member_id', $member_id)->orderBy('id', 'desc')->get();

        return response()->json(['view' => view('imprest.advance-fund.member-table', compact('member_funds'))->render()]);
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
            //  'pc_no' => 'required',
            'member_id' => 'required',
            'emp_id' => 'required',
            // 'name' => 'required',
            // 'desig' => 'required',
            // 'basic' => 'required',
            // 'group' => 'required',
            // 'division' => 'required',
            'adv_no' => 'required',
            'adv_date' => 'required',
            'adv_amount' => 'required|numeric',
            'project_id' => 'required',
            'var_type_id' => 'required',
            'chq_no' => 'required',
            'chq_date' => 'required',
        ]);


        $advance_fund = new AdvanceFundToEmployee();
        // $advance_fund->pc_no = $request->pc_no;
        $advance_fund->member_id = $request->member_id;
        $advance_fund->emp_id = $request->emp_id;
        // $advance_fund->name = $request->name;
        // $advance_fund->desig = $request->desig;
        // $advance_fund->basic = $request->basic;
        // $advance_fund->group = $request->group;
        // $advance_fund->division = $request->division;
        $advance_fund->adv_no = $request->adv_no;
        $advance_fund->adv_date = $request->adv_date;
        $advance_fund->adv_amount = $request->adv_amount;
        $advance_fund->project_id = $request->project_id;
        $advance_fund->var_type_id = $request->var_type_id;
        $advance_fund->chq_no = $request->chq_no;
        $advance_fund->chq_date = $request->chq_date;
        $advance_fund->save();

        session()->flash('message', 'Advance fund added successfully');
        return response()->json(['success' => 'Advance fund added successfully']);
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
        $advance_fund = AdvanceFundToEmployee::find($id);
        $variable_types = VariableType::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->get();
        $designations = DesignationType::orderBy('id', 'desc')->get();
        $groups = Group::orderBy('id', 'desc')->get();
        $divisions = Division::orderBy('id', 'desc')->get();
        $employees = Member::orderBy('id', 'desc')->get();
        $edit = true;

        return response()->json(['view' => view('imprest.advance-fund.edit', compact('edit', 'advance_fund', 'variable_types', 'projects', 'designations', 'groups', 'divisions', 'employees'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'member_id' => 'required',
            // 'pc_no' => 'required',
            'emp_id' => 'required',
            // 'name' => 'required',
            // 'desig' => 'required',
            // 'basic' => 'required',
            // 'group' => 'required',
            // 'division' => 'required',
            'adv_no' => 'required',
            'adv_date' => 'required',
            'adv_amount' => 'required|numeric',
            'project_id' => 'required',
            'var_type_id' => 'required',
        ]);


        $advance_fund = AdvanceFundToEmployee::findOrFail($id);
        // $advance_fund->pc_no = $request->pc_no;
        // $advance_fund->emp_id = $request->emp_id;
        // $advance_fund->name = $request->name;
        // $advance_fund->desig = $request->desig;
        // $advance_fund->basic = $request->basic;
        // $advance_fund->group = $request->group;
        // $advance_fund->division = $request->division;
        $advance_fund->adv_no = $request->adv_no;
        $advance_fund->adv_date = $request->adv_date;
        $advance_fund->adv_amount = $request->adv_amount;
        $advance_fund->project_id = $request->project_id;
        $advance_fund->var_type_id = $request->var_type_id;
        $advance_fund->update();

        session()->flash('message', 'Advance fund updated successfully');
        return response()->json(['success' => 'Advance fund updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchEmployeeData(Request $request)
    {
        if ($request->ajax()) {
            $member = Member::where('id', $request->memb_id)->first() ?? '';
            $member['designation'] = $member->desigs->designation ?? '';
            $member['group'] = $member->groups->value ?? '';
            $member['division'] = $member->divisions->value ?? '';

            return response()->json(['data' => $member]);
        }
    }

    public function delete($id)
    {
        $advance_fund = AdvanceFundToEmployee::findOrFail($id);
        $advance_fund->delete();

        return redirect()->back()->with('message', 'Advance fund deleted successfully.');
    }
}
