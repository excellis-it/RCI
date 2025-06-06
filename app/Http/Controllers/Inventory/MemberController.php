<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Imports\MembersImport;
use App\Models\Cadre;
use App\Models\Category;
use App\Models\Cgegis;
use App\Models\City;
use App\Models\DearnessAllowancePercentage;
use App\Models\Designation;
use App\Models\Division;
use App\Models\ExService;
use App\Models\FundType;
use App\Models\Group;
use App\Models\Hra;
use App\Models\Member;
use App\Models\MemberAllotedLeave;
use App\Models\MemberBagPurse;
use App\Models\MemberChildAllowance;
use App\Models\MemberChildrenDetail;
use App\Models\MemberCoreInfo;
use App\Models\MemberCredit;
use App\Models\MemberDebit;
use App\Models\MemberExpectation;
use App\Models\MemberFamily;
use App\Models\MemberGpf;
use App\Models\MemberIncomeTax;
use App\Models\MemberLeave;
use App\Models\MemberLoan;
use App\Models\MemberLoanInfo;
use App\Models\MemberMonthlyDataCredit;
use App\Models\MemberMonthlyDataDebit;
use App\Models\MemberMonthlyDataRecovery;
use App\Models\MemberNewspaperAllowance;
use App\Models\MemberOriginalRecovery;
use App\Models\MemberPersonalInfo;
use App\Models\MemberPolicyInfo;
use App\Models\MemberRecovery;
use App\Models\MemberRetirementInfo;
use App\Models\PaybandType;
use App\Models\Pg;
use App\Models\PmIndex;
use App\Models\PmLevel;
use App\Models\Quater;
use App\Models\ResetEmployeeId;
use App\Models\Tpta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Str;

class MemberController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventory_members = Member::orderBy('id', 'asc')->where('name', '!=', 'The Director, CHESS')->with('designation')->paginate(15);

        foreach ($inventory_members as $member) {
            $member->member_credit_info = MemberCredit::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
            $member->member_debit_info = MemberDebit::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
            $member->member_recovery_info = MemberOriginalRecovery::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
            $member->member_core_info = MemberCoreInfo::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
            $member->member_personal_info = MemberPersonalInfo::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
        }


        return view('inventory.inventory_members.list', compact('inventory_members'));
    }

    public function fetchData(Request $request)
    {

        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $inventory_members = Member::where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('pers_no', 'like', '%' . $query . '%')
                    ->orWhere('emp_id', 'like', '%' . $query . '%')
                    ->orWhere('gender', 'like', '%' . $query . '%')
                    ->orWhere('name', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
                ->orderBy('id', 'asc')
                ->orderBy($sort_by, $sort_type)
                ->paginate(15);

            foreach ($inventory_members as $member) {
                $member->member_credit_info = MemberCredit::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
                $member->member_debit_info = MemberDebit::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
                $member->member_recovery_info = MemberOriginalRecovery::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
                $member->member_core_info = MemberCoreInfo::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
                $member->member_personal_info = MemberPersonalInfo::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
            }

            return response()->json(['data' => view('inventory.inventory_members.table', compact('inventory_members'))->render()]);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $paybands = PaybandType::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $pmLevels = PmLevel::orderBy('id', 'desc')->where('status', 1)->get();
        $pmIndexes = PmIndex::orderBy('id', 'desc')->where('status', 1)->get();
        $divisions = Division::orderBy('id', 'desc')->where('status', 1)->get();
        $groups = Group::orderBy('id', 'desc')->where('status', 1)->get();
        $cadres = Cadre::orderBy('id', 'desc')->where('status', 1)->get();
        // $designations = DesignationType::orderBy('id', 'desc')->get();
        $designations = Designation::orderBy('id', 'desc')->get();
        $fundTypes = FundType::orderBy('id', 'desc')->where('status', 1)->get();
        $quaters = Quater::orderBy('id', 'desc')->where('status', 1)->get();
        $exServices = ExService::orderBy('id', 'desc')->where('status', 1)->get();
        $pgs = Pg::orderBy('id', 'asc')->where('status', 1)->get();
        $cgegises = Cgegis::orderBy('id', 'asc')->where('status', 1)->get();
        $cities = City::orderBy('id', 'desc')->get();

        return view('inventory.inventory_members.form', compact('paybands', 'cities', 'categories', 'pmLevels', 'pmIndexes', 'divisions', 'groups', 'cadres', 'designations', 'fundTypes', 'quaters', 'exServices', 'pgs', 'cgegises'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pers_no' => 'required|max:255',
            'gender' => 'required',
            'name' => 'required|max:255',
            'desig' => 'required',
            'division' => 'required',
            'group' => 'required',
            'cadre' => 'required',
            'category_id' => 'required',
            'fund_type' => 'required',
            'dob' => 'required|date',
            'doj_lab' => 'required|date',
            'e_status' => 'required',
        ]);

        $member = Member::find($id);
        $member->e_status = $request->e_status;
        $member->pers_no = $request->pers_no;
        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->desig = $request->desig;
        $member->division = $request->division;
        $member->group = $request->group;
        $member->cadre = $request->cadre;
        $member->category = $request->category_id;
        $member->old_bp = $request->old_bp;
        $member->g_pay = $request->g_pay_val;
        $member->pay_band = $request->pay_band_id;
        $member->fund_type = $request->fund_type;
        $member->dob = $request->dob;
        $member->doj_lab = $request->doj_lab;
        $member->doj_service1 = $request->doj_service1;
        $member->adhar_number = $request->adhar_number;
        $member->gpf_number = $request->gpf_number;
        $member->app_date = $request->app_date;
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
        $member->member_city = $request->member_city;
        $member->rent_or_not = $request->rent_or_not;
        $member->pran_number = $request->pran_number;
        $member->save();

        session()->flash('message', 'Member updated successfully');
        return response()->json(['success' => 'Member updated successfully']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'pers_no' => 'required|max:255',
            'gender' => 'required',
            'name' => 'required|max:255',
            'desig' => 'required',
            'division' => 'required',
            'group' => 'required',
            'cadre' => 'required',
            'category_id' => 'required',
            'fund_type' => 'required',
            'dob' => 'required|date',
            'doj_lab' => 'required|date',
            'e_status' => 'required',
        ]);

        //check employee id
        $employeeIdText = ResetEmployeeId::where('status', 1)->first();
        $latest_member = Member::latest()->first();

        $constantString = $employeeIdText->employee_id_text ?? 'RCI-CHESS-EMP-';
        if (isset($latest_member) && !empty($latest_member->emp_id)) {
            $serial_no = Str::substr($latest_member->emp_id, -1);
            $counter = $serial_no + 1;
        } else {
            $counter = 1;
        }

        // store data
        $member = new Member();
        $member->e_status = $request->e_status;
        $member->pers_no = $request->pers_no;
        $member->name = $request->name;
        $member->emp_id = $constantString . $counter++;
        $member->gender = $request->gender;
        $member->desig = $request->desig;
        $member->division = $request->division;
        $member->group = $request->group;
        $member->cadre = $request->cadre;
        $member->category = $request->category_id;
        $member->old_bp = $request->old_bp;
        $member->g_pay = $request->g_pay_val;
        $member->pay_band = $request->pay_band_id;
        $member->fund_type = $request->fund_type;
        $member->dob = $request->dob;
        $member->doj_lab = $request->doj_lab;
        $member->doj_service1 = $request->doj_service1;
        $member->adhar_number = $request->adhar_number;
        $member->gpf_number = $request->gpf_number;
        $member->app_date = $request->app_date;
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
        $member->member_city = $request->member_city;
        $member->rent_or_not = $request->rent_or_not;
        $member->pran_number = $request->pran_number;
        $member->member_status = 1;
        $member->save();

        $this->memberStoreAllData($member->id);

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
        $member = Member::with('designation', 'divisions', 'groups')->where('id', $id)->with('cgegisVal', 'gPay')->first();
        $paybands = PaybandType::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->where('status', 1)->get();
        $pmLevels = PmLevel::orderBy('id', 'desc')->where('status', 1)->get();
        $pmIndexes = PmIndex::orderBy('id', 'desc')->where('status', 1)->get();
        $divisions = Division::orderBy('id', 'desc')->where('status', 1)->get();
        $groups = Group::orderBy('id', 'desc')->where('status', 1)->get();
        $cadres = Cadre::orderBy('id', 'desc')->where('status', 1)->get();
        // $designations = DesignationType::orderBy('id', 'desc')->get();
        $designations = Designation::orderBy('id', 'desc')->get();
        $fundTypes = FundType::orderBy('id', 'desc')->where('status', 1)->get();
        $quaters = Quater::orderBy('id', 'desc')->where('status', 1)->get();
        $exServices = ExService::orderBy('id', 'desc')->where('status', 1)->get();
        $pgs = Pg::orderBy('id', 'asc')->where('status', 1)->get();
        $cgegises = Cgegis::orderBy('id', 'asc')->where('status', 1)->get();
        $cities = City::orderBy('id', 'desc')->get();


        return view('inventory.inventory_members.edit', compact('member', 'paybands', 'cities', 'categories', 'pmLevels', 'pmIndexes', 'divisions', 'groups', 'cadres', 'designations', 'fundTypes', 'quaters', 'exServices', 'pgs', 'cgegises'));
    }


    public function deleteMember($id)
    {
        // Find the member
        $member = Member::find($id);

        if ($member) {
            // Delete associated data
            if (Schema::hasColumn('member_credits', 'member_id')) {
                MemberCredit::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_debits', 'member_id')) {
                MemberDebit::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_recoveries', 'member_id')) {
                MemberRecovery::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_original_recoveries', 'member_id')) {
                MemberOriginalRecovery::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_core_infos', 'member_id')) {
                MemberCoreInfo::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_personal_infos', 'member_id')) {
                MemberPersonalInfo::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_policy_infos', 'member_id')) {
                MemberPolicyInfo::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_expectations', 'member_id')) {
                MemberExpectation::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_loan_infos', 'member_id')) {
                MemberLoanInfo::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_loans', 'member_id')) {
                MemberLoan::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_gpfs', 'member_id')) {
                MemberGpf::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_leaves', 'member_id')) {
                MemberLeave::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_alloted_leaves', 'member_id')) {
                MemberAllotedLeave::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_families', 'member_id')) {
                MemberFamily::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_children_details', 'member_id')) {
                MemberChildrenDetail::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_retirement_infos', 'member_id')) {
                MemberRetirementInfo::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_monthly_data_credits', 'member_id')) {
                MemberMonthlyDataCredit::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_monthly_data_debits', 'member_id')) {
                MemberMonthlyDataDebit::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_monthly_data_recoveries', 'member_id')) {
                MemberMonthlyDataRecovery::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_income_taxes', 'member_id')) {
                MemberIncomeTax::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_newspaper_allowances', 'member_id')) {
                MemberNewspaperAllowance::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_child_allowances', 'member_id')) {
                MemberChildAllowance::where('member_id', $id)->delete();
            }
            if (Schema::hasColumn('member_bag_purses', 'member_id')) {
                MemberBagPurse::where('member_id', $id)->delete();
            }

            // Delete the member
            $member->delete();

            // return response()->json(['message' => 'Member and associated data deleted successfully']);
            return redirect()
                ->route('inventory-members.index')
                ->with('message', 'Member deleted successfully');
        } else {
            return response()->json(['message' => 'Member not found'], 404);
        }
    }

    public function memberStoreAllData($id)
    {
        $member = Member::where('id', $id)->first();
        if (!$member) {
            return redirect()->route('inventory-members.index')->with('error', 'Member not found');
        }

        // 1. Credit data update - Calculate various allowances
        $da_percentage = DearnessAllowancePercentage::where('is_active', 1)->first();
        $basicPay = $member->basic;
        $daAmount = $da_percentage ? ($basicPay * $da_percentage->percentage) / 100 : 0;

        // HRA calculation based on city category
        $hraAmount = 0;
        if ($member->member_city) {
            $city = City::find($member->member_city);
            if ($city) {
                $hraPercentage = Hra::where('city_category', $city->city_type)
                    ->where('status', 1)
                    ->first();
                $hraAmount = $hraPercentage ? ($basicPay * $hraPercentage->percentage) / 100 : 0;
            }
        }

        // TPT calculation
        $tptAmount = 0;
        $tptDa = 0;
        if ($member->member_city) {
            $city = City::find($member->member_city);
            if ($city && $city->tpt_type) {
                $tptData = Tpta::where('tpt_type', $city->tpt_type)
                    ->where('pay_level_id', $member->pm_level)
                    ->where('status', 1)
                    ->first();
                if ($tptData) {
                    $tptAmount = $tptData->tpt_allowance;
                    $tptDa = ($tptAmount) / 2;
                }
            }
        }
        $npsc = (($basicPay + $daAmount) * 14) / 100;
        $npg_arrs = 0;
        $npg_adj = 0;

        $member_credit_data = [
            'member_id' => $member->id,
            'pay' => $member->basic,
            'da' => $daAmount,
            'tpt' => $tptAmount,
            'cr_rent' => 0,
            'g_pay' => $member->g_pay,
            'hra' => $hraAmount,
            'da_on_tpt' => $tptDa,
            'npsc' => $npsc,
            'npg_arrs' => $npg_arrs,
            'npg_adj' =>$npg_adj,
            'cr_elec' => 0,
            'fpa' => 0,
            's_pay' => 0,
            'pua' => 0,
            'hindi' => 0,
            'cr_water' => 0,
            'add_inc2' => 0,
            'npa' => 0,
            'deptn_alw' => 0,
            'misc1' => 0,
            'var_incr' => 0,
            'wash_alw' => 0,
            'dis_alw' => 0,
            'misc2' => 0,
            'risk_alw' => 0,
            'spl_incentive' => 0,
            'incentive' => 0,
            'variable_amount' => 0,
            'arrs_pay_alw' => 0,
            'tot_credits' => $basicPay + $daAmount + $tptAmount + $tptDa + $hraAmount + $member->g_pay,
            'remarks' => 'Initial credit data created'
        ];

        $member_credit = MemberCredit::updateOrCreate(
            ['member_id' => $member->id],
            $member_credit_data
        );

        // 2. Debit data update - Calculate various deductions
        $deductionsTotal = 0;

        // NPS calculations if applicable
        $npsDeduction = 0;
        $npsDeductionGovt = 0;
        $npsSubTotal = 0;
        if ($member->fund_type == 'NPS') {
            $npsDeduction = ($basicPay + $daAmount) * 10 / 100;
            $npsDeductionGovt = ($basicPay + $daAmount) * 14 / 100;
            $npsSubTotal = $npsDeduction + $npsDeductionGovt;
            $deductionsTotal += $npsSubTotal;
        }

        // GPF calculations if applicable
        $gpfDeduction = 0;
        if ($member->fund_type == 'GPF') {
            $gpfDeduction = ($basicPay + $daAmount) * 10 / 100;
            $deductionsTotal += $gpfDeduction;
        }

        // CGEGIS calculation
        $cgegisDeduction = 0;
        if ($member->cgegis) {
            $cgegisData = Cgegis::find($member->cgegis);
            if ($cgegisData) {
                $cgegisDeduction = $cgegisData->value;
                $deductionsTotal += $cgegisDeduction;
            }
        }

        $npsg = (($basicPay + $daAmount) * 14) / 100;
        $npsg_arr = 0;
        $npsg_adj = 0;

        $member_debit_data = [
            'member_id' => $member->id,
            'gpa_sub' => $gpfDeduction,
            'nps_sub' => $npsSubTotal,
            'eol' => 0,
            'ccl' => 0,
            'rent' => 0,
            'lf_arr' => 0,
            'tada' => 0,
            'hba' => 0,
            'misc1' => 0,
            'gpf_rec' => 0,
            'i_tax' => 0,
            'elec' => 0,
            'elec_arr' => 0,
            'medi' => 0,
            'pc' => 0,
            'misc2' => 0,
            'gpf_arr' => 0,
            'ecess' => 0,
            'water' => 0,
            'water_arr' => 0,
            'ltc' => 0,
            'fadv' => 0,
            'misc3' => 0,
            'cgegis' => $cgegisDeduction,
            'cda' => 0,
            'furn' => 0,
            'furn_arr' => 0,
            'car' => 0,
            'hra_rec' => 0,
            'cghs' => 0,
            'ptax' => 0,
            'cmg' => 0,
            'pli' => 0,
            'scooter' => 0,
            'tpt_rec' => 0,
            'tot_debits' => $deductionsTotal,
            'net_pay' => ($basicPay + $daAmount + $tptAmount + $tptDa + $hraAmount + $member->g_pay) - $deductionsTotal,
            'basic' => $basicPay,
            'gpf_adv' => 0,
            'hba_int' => 0,
            'comp_adv' => 0,
            'comp_int' => 0,
            'leave_rec' => 0,
            'pension_rec' => 0,
            'car_int' => 0,
            'sco_int' => 0,
            'quarter_charges' => 0,
            'cgeis_arr' => 0,
            'cghs_arr' => 0,
            'penal_intr' => 0,
            'society' => 0,
            'arrear_pay' => 0,
            'npsg' => $npsg,
            'npsg_arr' => $npsg_arr,
            'npsg_adj' => $npsg_adj,
            'hba_cur_instl' => 0,
            'hba_total_instl' => 0,
            'hba_int_cur_instl' => 0,
            'hba_int_total_instl' => 0,
            'car_adv_prin_instl' => 0,
            'car_adv_total_instl' => 0,
            'scot_adv_prin_instl' => 0,
            'sco_adv_int_curr_instl' => 0,
            'sco_adv_int_total_instl' => 0,
            'comp_prin_curr_instl' => 0,
            'comp_prin_total_instl' => 0,
            'comp_adv_int' => 0,
            'comp_int_curr_instl' => 0,
            'comp_int_total_instl' => 0,
            'fest_adv_prin_cur' => 0,
            'fest_adv_total_cur' => 0,
            'ltc_rec' => 0,
            'medical_rec' => 0,
            'tada_rec' => 0,
            'remarks' => 'Initial debit data created'
        ];

        $member_debit = MemberDebit::updateOrCreate(
            ['member_id' => $member->id],
            $member_debit_data
        );

        // 3. Recovery data - variable increments
        $pmLevelData = PmLevel::find($member->pm_level);
        if ($pmLevelData && $pmLevelData->var_incr > 0 && $pmLevelData->noi > 0) {
            $recovery_data = [
                'member_id' => $member->id,
                'v_incr' => $pmLevelData->var_incr,
                'noi' => $pmLevelData->noi,
                'noi_pending' => $pmLevelData->noi,
                'total' => $pmLevelData->var_incr * $pmLevelData->noi,
                'stop' => 'No'
            ];

            $member_recovery = MemberRecovery::updateOrCreate(
                ['member_id' => $member->id],
                $recovery_data
            );
        }

        // 4. Original recovery data
        $member_org_recovery_data = [
            'member_id' => $member->id,
            'ccs_sub' => 0,
            'mess' => 0,
            'security' => 0,
            'misc1' => 0,
            'ccs_rec' => 0,
            'asso_fee' => 0,
            'dbf' => 0,
            'misc2' => 0,
            'wel_sub' => 0,
            'ben' => 0,
            'med_ins' => 0,
            'tot_rec' => 0,
            'wel_rec' => 200,
            'hdfc' => 0,
            'maf' => 0,
            'final_pay' => 0,
            'lic' => 0,
            'cort_atch' => 0,
            'ogpf' => 0,
            'ntp' => 0,
            'ptax' => 0,
            'remarks' => 'Initial recovery data created'
        ];

        $member_org_recovery = MemberOriginalRecovery::updateOrCreate(
            ['member_id' => $member->id],
            $member_org_recovery_data
        );

        // 5. Core info data
        $member_core_data = [
            'member_id' => $member->id,
            'bank_acc_no' => '',
            'ccs_mem_no' => '',
            'fpa' => 0,
            'bank' => null,
            'gpf_sub' => $member->fund_type == 'GPF' ? ($basicPay * 10 / 100) : 0,
            'add2' => 0,
            'gpf_acc_no' => $member->gpf_number ?? '',
            'i_tax' => 0,
            'pran_no' => $member->pran_number ?? '',
            'pan_no' => '',
            'ecess' => 0,
            'ben_acc_no' => '',
            'dcmaf_no' => '',
            's_pay' => 0,
            'ifsc' => ''
        ];

        $member_core = MemberCoreInfo::updateOrCreate(
            ['member_id' => $member->id],
            $member_core_data
        );

        // 6. Personal info data
        $member_personal_data = [
            'member_id' => $member->id,
            'basic' => $member->basic,
            'emp_id' => $member->emp_id,
            'name' => $member->name,
            'g_pay' => $member->g_pay,
            'cadre' => $member->cadre,
            'dob' => $member->dob,
            'next_inr' => $member->next_inr,
            'ex_service' => $member->ex_service,
            'payband' => $member->pay_band,
            'pm_level' => $member->pm_level,
            'gender' => $member->gender,
            'status' => $member->status,
            'doj_lab' => $member->doj_lab,
            'quater' => $member->quater,
            'ph' => null,
            'old_basic' => $member->old_bp,
            'pm_index' => $member->pm_index,
            'desig' => $member->desig,
            'category' => $member->category,
            'doj_service' => $member->doj_service1,
            'quater_no' => $member->quater_no,
            'dop' => $member->dop,
            'fund_type' => $member->fund_type,
            'cgegis' => $member->cgegis,
            'cgegis_text' => '',
            'pay_stop' => $member->pay_stop,
            'landline_no' => '',
            'mobile_no' => '',
            'mobile_allowance' => 0,
            'broadband_allowance' => 0,
            'landline_allowance' => 0,
            'cr_water' => 0,
            'e_status' => $member->e_status
        ];

        $member_personal = MemberPersonalInfo::updateOrCreate(
            ['member_id' => $member->id],
            $member_personal_data
        );
    }
}
