<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
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
use App\Models\MemberCredit;
use App\Models\MemberDebit;
use App\Models\MemberRecovery;
use App\Models\PayMatrixBasic;
use App\Models\MemberCoreInfo;
use App\Models\MemberPersonalInfo;
use App\Models\Bank;
use App\Models\Loan;
use App\Models\MemberLoanInfo;
use App\Models\Policy;
use App\Models\MemberPolicyInfo;
use App\Models\MemberExpectation;
use App\Models\MemberOriginalRecovery;
use App\Models\ResetEmployeeId;
use App\Models\City;
use App\Models\DearnessAllowancePercentage;
use App\Models\GradePay;
use App\Models\Designation;
use App\Models\Hra;
use App\Models\Tpta;
use App\Models\IncomeTax;
use App\Models\MemberLeave;
use App\Models\MemberLoan;
use App\Models\LeaveType;
use App\Models\MemberGpf;
use App\Models\Cghs;
use App\Models\Rule;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MembersImport;
use App\Models\MemberAllotedLeave;
use App\Models\MemberFamily;
use App\Models\MemberChildrenDetail;
use App\Models\MemberRetirementInfo;
use App\Models\MemberMonthlyDataCredit;
use App\Models\MemberMonthlyDataDebit;
use App\Models\MemberMonthlyDataRecovery;
use App\Models\MemberIncomeTax;
use App\Models\MemberNewspaperAllowance;
use App\Models\MemberChildAllowance;
use App\Models\MemberBagPurse;
use App\Models\MemberMonthlyData;
use App\Models\MemberMonthlyDataCoreInfo;
use App\Models\MemberMonthlyDataExpectation;
use App\Models\MemberMonthlyDataLoanInfo;
use App\Models\MemberMonthlyDataPolicyInfo;
use App\Models\MemberMonthlyDataVarInfo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;






class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('id', 'asc')
            ->where('name', '!=', 'The Director, CHESS')
            ->with('designation')
            ->paginate(15)
            ->through(function ($member) {
                $member->member_credit_info = MemberCredit::where('member_id', $member->id)->latest('id')->first() ?? '';
                $member->member_debit_info = MemberDebit::where('member_id', $member->id)->latest('id')->first() ?? '';
                $member->member_recovery_info = MemberOriginalRecovery::where('member_id', $member->id)->latest('id')->first() ?? '';
                $member->member_core_info = MemberCoreInfo::where('member_id', $member->id)->latest('id')->first() ?? '';
                $member->member_personal_info = MemberPersonalInfo::where('member_id', $member->id)->latest('id')->first() ?? '';
                return $member;
            });

        return view('frontend.members.list', compact('members'));
    }

    public function fetchData(Request $request)
    {

        if ($request->ajax()) {

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $members = Member::where(function ($queryBuilder) use ($query) {
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

            foreach ($members as $member) {
                $member->member_credit_info = MemberCredit::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
                $member->member_debit_info = MemberDebit::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
                $member->member_recovery_info = MemberOriginalRecovery::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
                $member->member_core_info = MemberCoreInfo::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
                $member->member_personal_info = MemberPersonalInfo::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
            }

            return response()->json(['data' => view('frontend.members.table', compact('members'))->render(), 'data1' => view('income-tax.members.table', compact('members'))->render()]);
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
        $cgegises = Cgegis::orderBy('group_name', 'asc')->where('status', 1)->get();
        $cities = City::orderBy('id', 'desc')->get();

        return view('frontend.members.form', compact('paybands', 'cities', 'categories', 'pmLevels', 'pmIndexes', 'divisions', 'groups', 'cadres', 'designations', 'fundTypes', 'quaters', 'exServices', 'pgs', 'cgegises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'pers_no' => 'required|max:255',
            'gender' => 'required',
            'name' => 'required|max:255',
            'pm_level' => 'required',
            'pm_index' => 'required',
            'basic' => 'required',
            'desig' => 'required',
            'division' => 'required',
            'group' => 'required',
            'cadre' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'old_bp' => 'required',
            'g_pay_val' => 'required',
            'emp_id' => 'required|unique:members,emp_id',
            'dob' => 'required|date',
            'doj_lab' => 'required|date',
            // 'adhar_number' => 'required',
            //  'app_date' => 'required',
            // 'pran_number' => 'required',
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

        // fund_type set
        $fundtype = '';
        $category_fund_type = Category::where('id', $request->category_id)->first()->fund_type;
        // dd( $category_fund_type);
        $fundtype = $category_fund_type ?? '';
        // store data
        $member = new Member();
        $member->e_status = $request->e_status;
        $member->pers_no = $request->pers_no;
        $member->emp_id = $request->emp_id;

        $member->name = $request->name;
        $member->gender = $request->gender;
        $member->pm_level = $request->pm_level;
        $member->pm_index = $request->pm_index;
        $member->basic = $request->basic;
        $member->desig = $request->desig;
        $member->division = $request->division;
        $member->group = $request->group;
        $member->cadre = $request->cadre;
        $member->category = $request->category_id;
        $member->status = $request->status;
        $member->old_bp = $request->old_bp;
        $member->g_pay = $request->g_pay_val;
        $member->pay_band = $request->pay_band_id;
        $member->fund_type = $fundtype;
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
    public function edit(string $id, Request $request)
    {
        $member = Member::with('designation', 'divisions', 'groups')->where('id', $id)->with('cgegisVal', 'gPay')->first();

        $currentMonth = $request->month ?? date('m');
        $currentYear = $request->year ?? date('Y'); // Updated to use $request->year for currentYear


        //checks
        $member->member_credit_info = MemberMonthlyDataCredit::where('member_id', $member->id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member->member_debit_info = MemberMonthlyDataDebit::where('member_id', $member->id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member->member_recovery_info = MemberMonthlyDataRecovery::where('member_id', $member->id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member->member_core_info_data = MemberMonthlyDataCoreInfo::where('member_id', $member->id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';

        $member->member_personal_info = MemberPersonalInfo::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';
        // dd( $member->member_personal_info);


        $member_credit = MemberMonthlyDataCredit::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member_debit = MemberMonthlyDataDebit::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member_core = MemberMonthlyDataCoreInfo::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member_policies = MemberMonthlyDataPolicyInfo::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->get() ?? '';
        $member_expectations = MemberMonthlyDataExpectation::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->get() ?? '';
        // dd($member_expectations, $id, $currentMonth, $currentYear);
        $members_loans_info = MemberMonthlyDataLoanInfo::with('loanInfoFirst')->where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->get();

        $member_original_recovery = MemberMonthlyDataRecovery::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->latest()->first() ?? '';
        $member_recovery = MemberMonthlyDataVarInfo::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';

        $member_var_info = PmLevel::where('id', $member->pm_level)->select('var_incr', 'noi')->first() ?? '';
        $member_personal = MemberPersonalInfo::where('member_id', $id)->orderBy('id', 'desc')->first() ?? '';
        $member_cghs = Cghs::where('designation_id', $member->desig)->orderBy('id', 'desc')->first() ?? '';

        $paybands = PaybandType::orderBy('id', 'desc')->get() ?? '';
        $categories = Category::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $pmLevels = PmLevel::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $pmIndexes = PmIndex::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $divisions = Division::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $groups = Group::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $cadres = Cadre::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $designations = Designation::orderBy('id', 'desc')->get() ?? '';
        $fundTypes = FundType::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $quaters = Quater::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $exServices = ExService::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $pgs = Pg::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $cgegises = Cgegis::orderBy('group_name', 'asc')->where('status', 1)->get() ?? '';
        $banks = Bank::orderBy('id', 'desc')->get() ?? '';
        if ($member->memberCategory->fund_type === 'GPF') {
            // Show all loans
            $loans = Loan::orderBy('id', 'desc')->get();
        } else {
            // Exclude loan with ID 10
            $loans = Loan::where('id', '!=', 10)->orderBy('id', 'desc')->get();
        }
        $policies = Policy::orderBy('id', 'desc')->get() ?? '';
        $daPercentage = DearnessAllowancePercentage::where('is_active', 1)->get() ?? '';
        $memberGpf = MemberGpf::where('member_id', $id)->orderBy('id', 'desc')->first() ?? '';
        $rules = Rule::orderBy('id', 'asc')->get() ?? '';



        $check_hba = MemberLoanInfo::where('member_id', $id)->first() ?? '';


        // $noi_amount = 0;
        // $var_inc_amount = 0;
        // $var_noi = MemberRecovery::where('member_id', $member->id)->first();
        // if ($var_noi) {
        //     if ($var_noi->noi_pending > 0 && $var_noi->stop == 'No') {
        //         $noi_amount = $var_noi->v_incr;
        //         $var_inc_amount = $var_noi->v_incr;
        //     }
        // }
        // $member->var_inc_amount = $var_inc_amount;
        // $member->basic_with_noi = $member->basic + $noi_amount;

        $noi_amount = 0;
        $var_inc_amount = 0;
        $var_noi = MemberMonthlyDataRecovery::where('month', $currentMonth)->where('year', $currentYear)->latest()->first() ?? '';
        if ($var_noi) {
            if ($var_noi->stop == 'No') {
                $noi_amount = $var_noi->total;
                $var_inc_amount = $var_noi->total;
            }
        }
        $member->var_inc_amount = $var_inc_amount;
        $member->basic_with_noi = $member->basic + $noi_amount;

        // nps sub val if member fund type nps
        $nps_sub_val = 0;
        if ($member->memberCategory->fund_type == 'NPS') {
            $da_percentage_val = DearnessAllowancePercentage::where('is_active', 1)->first();
            $basicPay = $member->basic;
            $daAmount = $da_percentage_val ? round(($basicPay * $da_percentage_val->percentage) / 100) : 0;
            $nsv1 = round(($daAmount + $member->basic) * 10 / 100);
            $nsv2 = round(($daAmount + $member->basic) * 14 / 100);
            $nps_sub_val = $nsv1 + $nsv2;
        }
        $da_percentage_val = DearnessAllowancePercentage::where('is_active', 1)->first();
        $basicPay = $member->basic;
        $member_expectation_da = MemberMonthlyDataExpectation::where('member_id', $member->id)->where('month', $currentMonth)->where('year', $currentYear)->where('rule_name', 'DA')->first();
        if ($member_expectation_da) {
            $daAmount = $member_expectation_da->amount;
        } else {
            $daAmount = $da_percentage_val ? round(($basicPay * $da_percentage_val->percentage) / 100) : 0;
        }


        // return $member;

        return view('frontend.members.edit', compact(
            'member',
            'member_credit',
            'member_debit',
            'member_recovery',
            'banks',
            'member_core',
            'member_personal',
            'nps_sub_val',
            'cadres',
            'exServices',
            'paybands',
            'quaters',
            'pgs',
            'pmLevels',
            'designations',
            'pmIndexes',
            'cgegises',
            'categories',
            'loans',
            'members_loans_info',
            'policies',
            'member_policies',
            'member_expectations',
            'member_original_recovery',
            'member_cghs',
            'memberGpf',
            'daPercentage',
            'check_hba',
            'member_var_info',
            'rules',
            'currentMonth',
            'currentYear',
            'divisions',
            'groups'
        ));
    }



    public function filterData(Request $request)
    {
        $currentYear = $request->year;
        $currentMonth = $request->month;
        $id = $request->member_id;

        $member = Member::with('designation', 'divisions', 'groups')->where('id', $id)->with('cgegisVal', 'gPay')->first();


        //checks
        $member->member_credit_info = MemberMonthlyDataCredit::where('member_id', $member->id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member->member_debit_info = MemberMonthlyDataDebit::where('member_id', $member->id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member->member_recovery_info = MemberMonthlyDataRecovery::where('member_id', $member->id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member->member_core_info_data = MemberMonthlyDataCoreInfo::where('member_id', $member->id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';

        $member->member_personal_info = MemberPersonalInfo::where('member_id', $member->id)->orderBy('id', 'desc')->first() ?? '';



        $member_credit = MemberMonthlyDataCredit::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member_debit = MemberMonthlyDataDebit::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member_core = MemberMonthlyDataCoreInfo::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';
        $member_policies = MemberMonthlyDataPolicyInfo::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->get() ?? '';
        $member_expectations = MemberMonthlyDataExpectation::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->get() ?? '';

        $members_loans_info = MemberMonthlyDataLoanInfo::with('loanInfoFirst')->where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->get();
        $member_original_recovery = MemberMonthlyDataRecovery::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->latest()->first() ?? '';
        $member_recovery = MemberMonthlyDataVarInfo::where('member_id', $id)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->first() ?? '';

        $member_var_info = PmLevel::where('id', $member->pm_level)->select('var_incr', 'noi')->first() ?? '';
        $member_personal = MemberPersonalInfo::where('member_id', $id)->orderBy('id', 'desc')->first() ?? '';
        $member_cghs = Cghs::where('designation_id', $member->desig)->orderBy('id', 'desc')->first() ?? '';

        $paybands = PaybandType::orderBy('id', 'desc')->get() ?? '';
        $categories = Category::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $pmLevels = PmLevel::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $pmIndexes = PmIndex::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $divisions = Division::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $groups = Group::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $cadres = Cadre::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $designations = Designation::orderBy('id', 'desc')->get() ?? '';
        $fundTypes = FundType::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $quaters = Quater::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $exServices = ExService::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $pgs = Pg::orderBy('id', 'desc')->where('status', 1)->get() ?? '';
        $cgegises = Cgegis::orderBy('group_name', 'asc')->where('status', 1)->get() ?? '';
        $banks = Bank::orderBy('id', 'desc')->get() ?? '';
        if ($member->memberCategory->fund_type === 'GPF') {
            // Show all loans
            $loans = Loan::orderBy('id', 'desc')->get();
        } else {
            // Exclude loan with ID 10
            $loans = Loan::where('id', '!=', 10)->orderBy('id', 'desc')->get();
        }
        $policies = Policy::orderBy('id', 'desc')->get() ?? '';
        $daPercentage = DearnessAllowancePercentage::where('is_active', 1)->get() ?? '';
        $memberGpf = MemberGpf::where('member_id', $id)->orderBy('id', 'desc')->first() ?? '';
        $rules = Rule::orderBy('id', 'asc')->get() ?? '';



        $check_hba = MemberLoanInfo::where('member_id', $id)->first() ?? '';


        // $noi_amount = 0;
        // $var_inc_amount = 0;
        // $var_noi = MemberRecovery::where('member_id', $member->id)->first();
        // if ($var_noi) {
        //     if ($var_noi->noi_pending > 0 && $var_noi->stop == 'No') {
        //         $noi_amount = $var_noi->v_incr;
        //         $var_inc_amount = $var_noi->v_incr;
        //     }
        // }
        // $member->var_inc_amount = $var_inc_amount;
        // $member->basic_with_noi = $member->basic + $noi_amount;

        $noi_amount = 0;
        $var_inc_amount = 0;
        $var_noi = MemberRecovery::where('member_id', $member->id)->first();
        if ($var_noi) {
            if ($var_noi->stop == 'No') {
                $noi_amount = $var_noi->total;
                $var_inc_amount = $var_noi->total;
            }
        }
        $member->var_inc_amount = $var_inc_amount;
        $member->basic_with_noi = $member->basic + $noi_amount;

        // nps sub val if member fund type nps
        $nps_sub_val = 0;
        if ($member->memberCategory->fund_type == 'NPS') {
            $da_percentage_val = DearnessAllowancePercentage::where('is_active', 1)->first();
            $basicPay = $member->basic ?? 0;
            $daAmount = $da_percentage_val ? round(($basicPay * $da_percentage_val->percentage) / 100) : 0;

            $basic = $member->basic ?? 0;

            $nsv1 = round(($daAmount + $basic) * 10 / 100);
            $nsv2 = round(($daAmount + $basic) * 14 / 100);
            $nps_sub_val = $nsv1 + $nsv2;
        }
        $da_percentage_val = DearnessAllowancePercentage::where('is_active', 1)->first();
        $basicPay = $member->basic;
        $member_expectation_da = MemberExpectation::where('member_id', $member->id)->where('rule_name', 'DA')->first();
        if ($member_expectation_da) {
            $daAmount = $member_expectation_da->amount;
        } else {
            $daAmount = $da_percentage_val ? round(($basicPay * $da_percentage_val->percentage) / 100) : 0;
        }

        return view('frontend.members.filter-year-month', compact(
            'member',
            'member_credit',
            'member_debit',
            'member_recovery',
            'banks',
            'member_core',
            'member_personal',
            'nps_sub_val',
            'cadres',
            'exServices',
            'paybands',
            'quaters',
            'pgs',
            'pmLevels',
            'designations',
            'pmIndexes',
            'cgegises',
            'categories',
            'loans',
            'members_loans_info',
            'policies',
            'member_policies',
            'member_expectations',
            'member_original_recovery',
            'member_cghs',
            'memberGpf',
            'daPercentage',
            'check_hba',
            'member_var_info',
            'rules',
            'currentYear',
            'currentMonth',
            'divisions',
            'groups'
        ));
    }


    public function memberCreditUpdate(Request $request)
    {
        //validation
        // $validated = $request->validate([
        //     'pay' => 'required',
        //     // 'da' => 'required',
        //     // 'tpt' => 'required',
        //     // 'cr_rent' => 'required',
        //     // 'g_pay' => 'required',
        //     // 'hra' => 'required',
        //     // 'da_on_tpt' => 'required',
        //     // 'cr_elec' => 'required',
        //     // 'fpa' => 'required',
        //     // 's_pay' => 'required',
        //     // 'hindi' => 'required',
        //     // 'cr_water' => 'required',
        //     // 'add_inc2' => 'required',
        //     // 'npa' => 'required',
        //     // 'deptn_alw' => 'required',
        //     // 'misc_1' => 'required',
        //     // 'var_incr' => 'required',
        //     // 'wash_alw' => 'required',
        //     // 'dis_alw' => 'required',
        //     // 'misc_2' => 'required',
        //     // 'risk_alw' => 'required',
        //     // 'tot_credits' => 'required',
        //     // 'remarks' => 'required',
        // ]);
        $inputs = $request->all();
        $rules = [];
        $requiredField = 'pay';
        $nonNumericField = 'remarks';

        // if (array_key_exists($requiredField, $inputs)) {
        //     $rules[$requiredField] = 'required|numeric';
        // }

        foreach ($inputs as $field => $value) {
            if ($field === $nonNumericField) {
                $rules[$field] = 'string';
            } elseif ($field !== $requiredField) {
                $rules[$field] = 'numeric';
            }
        }


        $check_credit_member = MemberCredit::where('member_id', $request->member_id)
            ->whereMonth('created_at', $request->current_month)
            ->whereYear('created_at', $request->current_year)
            ->get();

        $check_credit_member_monthly = MemberMonthlyDataCredit::where('member_id', $request->member_id)
            ->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->first();

        // $check_recovery_member = MemberRecovery::where('member_id', $request->member_id)->get();
        // if (count($check_recovery_member) > 0) {
        //     $update_recovery_member = MemberRecovery::where('member_id', $request->member_id)->first();
        //     if ($update_recovery_member->noi_pending > 0 && $update_recovery_member->stop == 'No') {
        //         $update_recovery_member->noi_pending = $update_recovery_member->noi_pending - 1;
        //         $update_recovery_member->update();
        //     }
        // }

        if ($check_credit_member_monthly) {
            $credit_member_monthly = MemberMonthlyDataCredit::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->first();
        } else {
            $credit_member_monthly = new MemberMonthlyDataCredit();
        }
        $credit_member_monthly->apply_date = now();
        $credit_member_monthly->month = $request->current_month;
        $credit_member_monthly->year = $request->current_year;
        $credit_member_monthly->member_id = $request->member_id;
        $credit_member_monthly->pay = $request->pay;
        $credit_member_monthly->da = $request->da;
        $credit_member_monthly->tpt = $request->tpt;
        $credit_member_monthly->cr_rent = $request->cr_rent;
        $credit_member_monthly->g_pay = $request->g_pay;
        $credit_member_monthly->hra = $request->hra;
        $credit_member_monthly->da_on_tpt = $request->da_on_tpt;
        $credit_member_monthly->cr_elec = $request->cr_elec;
        $credit_member_monthly->fpa = $request->fpa;
        $credit_member_monthly->s_pay = $request->s_pay;
        $credit_member_monthly->pua = $request->pua;
        $credit_member_monthly->hindi = $request->hindi;
        $credit_member_monthly->cr_water = $request->cr_water;
        $credit_member_monthly->add_inc2 = $request->add_inc2;
        $credit_member_monthly->npa = $request->npa;
        $credit_member_monthly->deptn_alw = $request->deptn_alw;
        $credit_member_monthly->misc1 = $request->misc_1;
        $credit_member_monthly->var_incr = $request->var_incr;
        $credit_member_monthly->wash_alw = $request->wash_alw;
        $credit_member_monthly->dis_alw = $request->dis_alw;
        $credit_member_monthly->misc2 = $request->misc_2;
        $credit_member_monthly->risk_alw = $request->risk_alw;
        $credit_member_monthly->spl_incentive = $request->spl_incentive;
        $credit_member_monthly->incentive = $request->incentive;
        $credit_member_monthly->variable_amount = $request->var_amount;
        $credit_member_monthly->arrs_pay_alw = $request->arrs_pay_allowance;

        $credit_member_monthly->npsc = $request->npsc;
        $credit_member_monthly->npg_arrs = $request->npg_arrs;
        $credit_member_monthly->npg_adj = $request->npg_adj;

        $credit_member_monthly->upsc_10 = $request->upsc_10;
        $credit_member_monthly->upsg_arrs_10 = $request->upsg_arrs_10;
        $credit_member_monthly->upsgcr_adj_10 = $request->upsgcr_adj_10;






        $credit_member_monthly->tot_credits = $request->tot_credits;
        $credit_member_monthly->remarks = $request->remarks;
        $credit_member_monthly->save();

        Helper::updateTotalDebit($request->member_id, $request->current_month, $request->current_year);


        if (count($check_credit_member) > 0) {
            $update_credit_member = MemberCredit::where('member_id', $request->member_id)->whereMonth('created_at', $request->current_month)->whereYear('created_at', $request->current_year)->first();
            $update_credit_member->pay = $request->pay;
            $update_credit_member->da = $request->da;
            $update_credit_member->tpt = $request->tpt;
            $update_credit_member->cr_rent = $request->cr_rent;
            $update_credit_member->g_pay = $request->g_pay;
            $update_credit_member->hra = $request->hra;
            $update_credit_member->da_on_tpt = $request->da_on_tpt;
            $update_credit_member->cr_elec = $request->cr_elec;
            $update_credit_member->fpa = $request->fpa;
            $update_credit_member->s_pay = $request->s_pay;
            $update_credit_member->pua = $request->pua;
            $update_credit_member->hindi = $request->hindi;
            $update_credit_member->cr_water = $request->cr_water;
            $update_credit_member->add_inc2 = $request->add_inc2;
            $update_credit_member->npa = $request->npa;
            $update_credit_member->deptn_alw = $request->deptn_alw;
            $update_credit_member->misc1 = $request->misc_1;
            $update_credit_member->var_incr = $request->var_incr;
            $update_credit_member->wash_alw = $request->wash_alw;
            $update_credit_member->dis_alw = $request->dis_alw;
            $update_credit_member->misc2 = $request->misc_2;
            $update_credit_member->risk_alw = $request->risk_alw;
            $update_credit_member->spl_incentive = $request->spl_incentive;
            $update_credit_member->incentive = $request->incentive;
            $update_credit_member->variable_amount = $request->var_amount;
            $update_credit_member->arrs_pay_alw = $request->arrs_pay_allowance;
            $update_credit_member->tot_credits = $request->tot_credits;
            $update_credit_member->remarks = $request->remarks;
            $update_credit_member->update();



            // session()->flash('message', 'Member credit updated successfully');
            return response()->json(['message' => 'Member credit updated successfully']);
        } else {
            $member_credit = new MemberCredit();
            $member_credit->member_id = $request->member_id;
            $member_credit->pay = $request->pay;
            $member_credit->da = $request->da;
            $member_credit->tpt = $request->tpt;
            $member_credit->cr_rent = $request->cr_rent;
            $member_credit->g_pay = $request->g_pay;
            $member_credit->hra = $request->hra;
            $member_credit->da_on_tpt = $request->da_on_tpt;
            $member_credit->cr_elec = $request->cr_elec;
            $member_credit->fpa = $request->fpa;
            $member_credit->s_pay = $request->s_pay;
            $member_credit->pua = $request->pua;
            $member_credit->hindi = $request->hindi;
            $member_credit->cr_water = $request->cr_water;
            $member_credit->add_inc2 = $request->add_inc2;
            $member_credit->npa = $request->npa;
            $member_credit->deptn_alw = $request->deptn_alw;
            $member_credit->misc1 = $request->misc_1;
            $member_credit->var_incr = $request->var_incr;
            $member_credit->wash_alw = $request->wash_alw;
            $member_credit->dis_alw = $request->dis_alw;
            $member_credit->misc2 = $request->misc_2;
            $member_credit->risk_alw = $request->risk_alw;
            $member_credit->spl_incentive = $request->spl_incentive;
            $member_credit->incentive = $request->incentive;
            $member_credit->variable_amount = $request->var_amount;
            $member_credit->arrs_pay_alw = $request->arrs_pay_allowance;
            $member_credit->tot_credits = $request->tot_credits;
            $member_credit->remarks = $request->remarks;
            $member_credit->save();


            // session()->flash('message', 'Member credit added successfully');
            return response()->json(['message' => 'Member credit added successfully']);
        }
    }

    public function memberCheckCreditAvailability(Request $request)
    {
        $currentMonth = $request->current_month;
        $currentYear = $request->current_year;
        $check_credit_member = MemberMonthlyDataCredit::where('member_id', $request->memberID)->where('month', $currentMonth)->where('year', $currentYear)->orderBy('id', 'desc')->get();
        if (count($check_credit_member) > 0) {
            return response()->json(['message' => 'Member credit already added', 'status' => 'success']);
        } else {
            return response()->json(['message' => 'Credit member addition is required.', 'status' => 'error']);
        }
    }



    public function memberDebitUpdate(Request $request)
    {
        //validation
        // $validated = $request->validate([
        //     'gpa_sub' => 'required',
        //     'eol' => 'required',
        //     'rent' => 'required',
        //     'lf_arr' => 'required',
        //     'tada' => 'required',
        //     'hba' => 'required',
        //     'misc1' => 'required',
        //     'gpf_rec' => 'required',
        //     'i_tax' => 'required',
        //     'elec' => 'required',
        //     'elec_arr' => 'required',
        //     'medi' => 'required',
        //     'pc' => 'required',
        //     'misc2' => 'required',
        //     'gpf_arr' => 'required',
        //     'ecess' => 'required',
        //     'water' => 'required',
        //     'water_arr' => 'required',
        //     'ltc' => 'required',
        //     'fadv' => 'required',
        //     'misc3' => 'required',
        //     'cgegis' => 'required',
        //     'cda' => 'required',
        //     'furn' => 'required',
        //     'furn_arr' => 'required',
        //     'car' => 'required',
        //     'hra_rec' => 'required',
        //     'tot_debits' => 'required',
        //     'cghs' => 'required',
        //     'ptax' => 'required',
        //     'cmg' => 'required',
        //     'pli' => 'required',
        //     'scooter' => 'required',
        //     'tpt_rec' => 'required',
        //     'net_pay' => 'required',
        //     'basics' => 'required',
        //     'remarks' => 'required',
        // ]);

        // $inputs = $request->all();
        // $rules = [];

        // foreach ($inputs as $field => $value) {
        //     // Apply numeric validation to each field
        //     $rules[$field] = 'numeric';
        // }
        // $request->validate($rules);


        $check_debit_member = MemberDebit::where('member_id', $request->member_id)->whereMonth('created_at', $request->current_month)->whereYear('created_at', $request->current_year)->get();

        $check_debit_member_monthly_check = MemberMonthlyDataDebit::where('member_id', $request->member_id)->where('month', $request->current_month)->orderBy('id', 'desc')->where('year', $request->current_year)->first();

        if ($check_debit_member_monthly_check) {
            $check_debit_member_monthly = MemberMonthlyDataDebit::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->first();
        } else {
            $check_debit_member_monthly = new MemberMonthlyDataDebit();
        }

        // dd($request->gpf_arr);

        $check_debit_member_monthly->month = $request->current_month;
        $check_debit_member_monthly->year = $request->current_year;
        $check_debit_member_monthly->apply_date = now();

        $check_debit_member_monthly->member_id = $request->member_id;
        $check_debit_member_monthly->gpa_sub = $request->gpa_sub ?? 0;
        // $check_debit_member_monthly->nps_sub = $request->nps_sub ?? 0;

        $check_debit_member_monthly->eol = $request->eol;
        $check_debit_member_monthly->ccl = $request->ccl;
        $check_debit_member_monthly->rent = $request->rent;
        $check_debit_member_monthly->lf_arr = $request->lf_arr;
        $check_debit_member_monthly->tada = $request->tada;
        $check_debit_member_monthly->hba = $request->hba;
        $check_debit_member_monthly->misc1 = $request->misc1;
        $check_debit_member_monthly->gpf_rec = $request->gpf_rec;
        $check_debit_member_monthly->i_tax = $request->i_tax;
        $check_debit_member_monthly->elec = $request->elec;
        $check_debit_member_monthly->elec_arr = $request->elec_arr;
        $check_debit_member_monthly->medi = $request->medi;
        $check_debit_member_monthly->pc = $request->pc;
        $check_debit_member_monthly->misc2 = $request->misc2;
        $check_debit_member_monthly->gpf_arr = $request->gpf_arr;
        $check_debit_member_monthly->ecess = $request->ecess;
        $check_debit_member_monthly->water = $request->water;
        $check_debit_member_monthly->water_arr = $request->water_arr;
        $check_debit_member_monthly->ltc = $request->ltc;
        $check_debit_member_monthly->fadv = $request->fadv;
        $check_debit_member_monthly->misc3 = $request->misc3;
        $check_debit_member_monthly->cgegis = $request->cgegis;
        $check_debit_member_monthly->cda = $request->cda;
        $check_debit_member_monthly->furn = $request->furn;
        $check_debit_member_monthly->furn_arr = $request->furn_arr;
        $check_debit_member_monthly->car = $request->car;
        $check_debit_member_monthly->hra_rec = $request->hra_rec;
        $check_debit_member_monthly->tot_debits = $request->tot_debits;
        $check_debit_member_monthly->cghs = $request->cghs;
        // $check_debit_member_monthly->ptax = $request->ptax;
        // $check_debit_member_monthly->cmg = $request->cmg ?? 0;
        $check_debit_member_monthly->pli = $request->pli;
        $check_debit_member_monthly->scooter = $request->scooter;

        $check_debit_member_monthly->licence_fee = $request->licence_fee;
        $check_debit_member_monthly->tpt_rec = $request->tpt_rec;
        $check_debit_member_monthly->net_pay = $request->net_pay;
        $check_debit_member_monthly->basic = $request->basic;
        // $check_debit_member_monthly->gpf_adv = $request->gpa_adv;
        $check_debit_member_monthly->hba_int = $request->hba_interest;
        $check_debit_member_monthly->comp_adv = $request->comp_adv;
        $check_debit_member_monthly->comp_int = $request->comp_int;
        $check_debit_member_monthly->leave_rec = $request->leave_rec;
        $check_debit_member_monthly->pension_rec = $request->pension_rec;
        $check_debit_member_monthly->car_int = $request->car_interest;
        $check_debit_member_monthly->sco_int = $request->scooter_interest;
        $check_debit_member_monthly->quarter_charges = $request->quarter_charge;
        $check_debit_member_monthly->cgeis_arr = $request->cgeis_arr;
        $check_debit_member_monthly->cghs_arr = $request->cghs_arr;
        $check_debit_member_monthly->penal_intr = $request->penal_interest;
        // $check_debit_member_monthly->society = $request->society;
        $check_debit_member_monthly->arrear_pay = $request->arrear_pay;

        $check_debit_member_monthly->npsg = $request->npsg;
        $check_debit_member_monthly->npsg_arr = $request->npsg_arr;
        $check_debit_member_monthly->npsg_adj = $request->npsg_adj;
        $check_debit_member_monthly->nps_10_rec = $request->nps_10_rec ?? 0;
        $check_debit_member_monthly->nps_10_arr = $request->nps_10_arr ?? 0;
        $check_debit_member_monthly->nps_14_adj = $request->nps_14_adj ?? 0;


        $check_debit_member_monthly->ups_10_per_rec = $request->ups_10_per_rec;
        $check_debit_member_monthly->upsg_10_per = $request->upsg_10_per;
        $check_debit_member_monthly->upsg_arr_10_per = $request->upsg_arr_10_per;
        $check_debit_member_monthly->ups_adj_10_per = $request->ups_adj_10_per ?? 0;
        $check_debit_member_monthly->upsg_adj_10_per = $request->upsg_adj_10_per ?? 0;
        $check_debit_member_monthly->ups_arr_10_per = $request->ups_arr_10_per ?? 0;


        $check_debit_member_monthly->hba_cur_instl = $request->hba_cur_instl;
        $check_debit_member_monthly->hba_total_instl = $request->hba_total_instl;
        $check_debit_member_monthly->hba_int_cur_instl = $request->hba_int_cur_instl;
        $check_debit_member_monthly->hba_int_total_instl = $request->hba_int_total_instl;
        $check_debit_member_monthly->car_adv_prin_instl = $request->car_adv_prin_instl;
        $check_debit_member_monthly->car_adv_total_instl = $request->car_adv_total_instl;
        $check_debit_member_monthly->scot_adv_prin_instl = $request->scot_adv_prin_instl;
        $check_debit_member_monthly->sco_adv_int_curr_instl = $request->sco_adv_int_curr_instl;
        $check_debit_member_monthly->sco_adv_int_total_instl = $request->sco_adv_int_total_instl;
        $check_debit_member_monthly->comp_prin_curr_instl = $request->comp_prin_curr_instl;
        $check_debit_member_monthly->comp_prin_total_instl = $request->comp_prin_total_instl;
        $check_debit_member_monthly->comp_adv_int = $request->comp_adv_int;
        $check_debit_member_monthly->comp_int_curr_instl = $request->comp_int_curr_instl;
        $check_debit_member_monthly->comp_int_total_instl = $request->comp_int_total_instl;
        $check_debit_member_monthly->fest_adv_prin_cur = $request->fest_adv_prin_cur;
        $check_debit_member_monthly->fest_adv_total_cur = $request->fest_adv_total_cur;
        // $check_debit_member_monthly->ltc_rec = $request->ltc_rec;
        // $check_debit_member_monthly->medical_rec = $request->medical_rec;
        // $check_debit_member_monthly->tada_rec = $request->tada_rec;
        $check_debit_member_monthly->remarks = $request->remarks;

        $check_debit_member_monthly->save();

        $credit_member_monthly = MemberMonthlyDataCredit::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->first();
        if ($request->nps_14_adj && $request->nps_14_adj > 0 && $credit_member_monthly) {
            $credit_member_monthly->npg_adj = $request->nps_14_adj;
        }
        $credit_member_monthly->save();

        if ($request->ups_adj_10_per && $request->ups_adj_10_per > 0 && $credit_member_monthly) {
            $credit_member_monthly->upsgcr_adj_10 = $request->ups_adj_10_per;
        }
        $credit_member_monthly->save();

        Helper::updateTotalCredit($request->member_id, $request->current_month, $request->current_year);
        Helper::updateTotalDebit($request->member_id, $request->current_month, $request->current_year);
    }

    public function memberRecoveryOriginalUpdate(Request $request)
    {

        $check_original_recovery_member = MemberOriginalRecovery::where('member_id', $request->member_id)->whereMonth('created_at', $request->current_month)->whereYear('created_at', $request->current_year)->get();

        $check_original_recovery_member_monthly = MemberMonthlyDataRecovery::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->first();

        if ($check_original_recovery_member_monthly) {
            $original_recovery_member_monthly = MemberMonthlyDataRecovery::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->first();
        } else {
            $original_recovery_member_monthly = new MemberMonthlyDataRecovery();
        }

        $original_recovery_member_monthly->month = $request->current_month;
        $original_recovery_member_monthly->year = $request->current_year;
        $original_recovery_member_monthly->apply_date = now();

        $original_recovery_member_monthly->member_id = $request->member_id;
        $original_recovery_member_monthly->ccs_sub = $request->ccs_sub ?? null;
        $original_recovery_member_monthly->mess = $request->mess;
        $original_recovery_member_monthly->security = $request->security;
        $original_recovery_member_monthly->misc1 = $request->misc1;
        $original_recovery_member_monthly->ccs_rec = $request->ccs_rec;
        $original_recovery_member_monthly->asso_fee = $request->asso_fee;
        $original_recovery_member_monthly->dbf = $request->dbf;
        $original_recovery_member_monthly->misc2 = $request->misc2;
        $original_recovery_member_monthly->wel_sub = $request->wel_sub;
        $original_recovery_member_monthly->ben = $request->ben;
        $original_recovery_member_monthly->med_ins = $request->med_ins;
        $original_recovery_member_monthly->tot_rec = $request->tot_rec;
        $original_recovery_member_monthly->wel_rec = $request->wel_rec;
        $original_recovery_member_monthly->hdfc = $request->hdfc;
        $original_recovery_member_monthly->maf = $request->maf;
        $original_recovery_member_monthly->final_pay = $request->final_pay;
        $original_recovery_member_monthly->lic = $request->lic;
        $original_recovery_member_monthly->cort_atch = $request->cort_atch;
        $original_recovery_member_monthly->ogpf = $request->ogpf;
        $original_recovery_member_monthly->ntp = $request->ntp;
        $original_recovery_member_monthly->ptax = $request->ptax;
        $original_recovery_member_monthly->remarks = $request->remarks;
        $original_recovery_member_monthly->save();


        return response()->json(['message' => 'Member recovery updated successfully']);
    }

    public function memberRecoveryUpdate(Request $request)
    {
        // validation
        $validated = $request->validate([
            'v_incr' => 'required',
            'noi' => 'required',
            'total' => 'required',
            'stop' => 'required',

        ]);

        $check_recovery_member = MemberRecovery::where('member_id', $request->member_id)->get();
        $check_recovery_member_monthly = MemberMonthlyDataVarInfo::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->first();
        if ($check_recovery_member_monthly) {
            $recovery_member_monthly = MemberMonthlyDataVarInfo::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->first();
        } else {
            $recovery_member_monthly = new MemberMonthlyDataVarInfo();
        }
        $recovery_member_monthly->month = $request->current_month;
        $recovery_member_monthly->year = $request->current_year;
        $recovery_member_monthly->apply_date = now();
        $recovery_member_monthly->member_id = $request->member_id;
        $recovery_member_monthly->v_incr = $request->v_incr;
        $recovery_member_monthly->noi = $request->noi;
        $recovery_member_monthly->total = $request->total;
        $recovery_member_monthly->stop = $request->stop;
        $recovery_member_monthly->save();


        $member_credit_monthly = MemberMonthlyDataCredit::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $request->current_month)->where('year', $request->current_year)->first() ?? '';

        // if ($member_credit_monthly) {
        //     if ($request->stop == 'No') {
        //         $member_credit_monthly->var_incr = $request->total;
        //     } else {
        //         $member_credit_monthly->var_incr = 0;
        //     }

        //     $member_credit_monthly->save();
        // }

        if ($member_credit_monthly) {
            $shouldIncrement = true;

            if ($request->stop) {
                // Convert stop date and current month/year to comparable dates
                $stopDate = Carbon::parse($request->stop)->startOfDay(); // e.g., 2025-07-01
                $currentDate = Carbon::createFromDate($request->current_year, $request->current_month, 1)->startOfDay();

                // If stopDate is less than current month, do not increment
                $shouldIncrement = $stopDate->greaterThan($currentDate);
            }

            $member_credit_monthly->var_incr = $shouldIncrement ? $request->total : 0;
            $member_credit_monthly->save();
        }


        Helper::updateTotalCredit($request->member_id, $request->current_month, $request->current_year);
        Helper::updateTotalDebit($request->member_id, $request->current_month, $request->current_year);



        if (count($check_recovery_member) > 0) {
            $update_recovery_member = MemberRecovery::where('member_id', $request->member_id)->first();
            $update_recovery_member->v_incr = $request->v_incr;
            $update_recovery_member->noi = $request->noi;
            $update_recovery_member->total = $request->total;
            $update_recovery_member->stop = $request->stop;
            $update_recovery_member->update();
        } else {
            $update_recovery_member = new MemberRecovery();
            $update_recovery_member->member_id = $request->member_id;
            $update_recovery_member->v_incr = $request->v_incr;
            $update_recovery_member->noi = $request->noi;
            $update_recovery_member->noi_pending = $request->noi;
            $update_recovery_member->total = $request->total;
            $update_recovery_member->stop = $request->stop;
            $update_recovery_member->save();
        }

        // $member_details = Member::where('id', $request->member_id)->first();
        // $member_details->basic = $member_details->basic + $request->v_incr;
        // $member_details->update();


        // $personal_member = MemberPersonalInfo::where('member_id', $request->member_id)->first();
        // $personal_member->basic = $personal_member->basic + $request->v_incr;
        // $personal_member->update();

        // session()->flash('message', 'Member recovery updated successfully');

        return response()->json(['message' => 'Member Var Info updated successfully', 'data' => $update_recovery_member]);
    }
    public function memberRecoveryDelete($id)
    {

        $delete_recovery = MemberMonthlyDataVarInfo::where('id', $id)->first();
        $delete_recovery->delete();

        return response()->json(['message' => 'Member recovery deleted successfully']);
    }

    public function memberCoreInfoUpdate(Request $request)
    {
        //validation
        // $validated = $request->validate([
        //     'bank_acc_no' => 'required',
        //     'ccs_mem_no' => 'required',
        //     'fpa' => 'required',
        //     'bank' => 'required',
        //     'gpf_sub' => 'required',
        //     'add2' => 'required',
        //     'gpf_acc_no' => 'required',
        //     'i_tax' => 'required',
        //     'pran_no' => 'required',
        //     'pan_no' => 'required',
        //     'ecess' => 'required',
        //     'ben_acc_no' => 'required',
        //     'dcmaf_no' => 'required',
        //     's_pay' => 'required',

        // ]);

        $check_core_member = MemberCoreInfo::where('member_id', $request->member_id)->get();
        $check_core_member_monthly = MemberMonthlyDataCoreInfo::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->first();
        if ($check_core_member_monthly) {
            $core_member_monthly = MemberMonthlyDataCoreInfo::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->first();
        } else {
            $core_member_monthly = new MemberMonthlyDataCoreInfo();
        }
        $core_member_monthly->month = $request->current_month;
        $core_member_monthly->year = $request->current_year;
        $core_member_monthly->apply_date = now();
        $core_member_monthly->member_id = $request->member_id;
        $core_member_monthly->bank_acc_no = $request->bank_acc_no;
        $core_member_monthly->ccs_mem_no = $request->ccs_mem_no;
        $core_member_monthly->fpa = $request->fpa;
        $core_member_monthly->bank = $request->bank;
        $core_member_monthly->gpf_sub = $request->gpf_sub;
        $core_member_monthly->add2 = $request->add2;
        $core_member_monthly->gpf_acc_no = $request->gpf_acc_no;
        $core_member_monthly->i_tax = $request->i_tax;
        $core_member_monthly->pran_no = $request->pran_no;
        $core_member_monthly->pan_no = $request->pan_no;
        $core_member_monthly->ecess = $request->ecess;
        $core_member_monthly->ben_acc_no = $request->ben_acc_no;
        $core_member_monthly->dcmaf_no = $request->dcmaf_no;
        $core_member_monthly->s_pay = $request->s_pay;
        $core_member_monthly->ifsc = $request->ifsc;
        $core_member_monthly->save();

        $member_infos = Member::findOrFail($request->member_id);
        $member_infos->pran_number = $request->pran_no;
        $member_infos->pan_no = $request->pan_no;
        $member_infos->gpf_number = $request->gpf_acc_no;
        $member_infos->bank_name = $request->bank;
        $member_infos->ifsc_code = $request->ifsc;
        $member_infos->bank_account = $request->bank_acc_no;
        $member_infos->save();


        $member_debit_monthly = MemberMonthlyDataDebit::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $request->current_month)->where('year', $request->current_year)->first() ?? '';

        if ($member_debit_monthly) {
            $member_debit_monthly->gpa_sub = $request->gpf_sub;
            $member_debit_monthly->i_tax = $request->i_tax;
            $member_debit_monthly->ecess = $request->ecess;
            $member_debit_monthly->save();
        }

        $member_credit_monthly = MemberMonthlyDataCredit::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $request->current_month)->where('year', $request->current_year)->first() ?? '';

        if ($member_credit_monthly) {
            $member_credit_monthly->fpa = $request->fpa;
            $member_credit_monthly->add_inc2 = $request->add2;
            $member_credit_monthly->s_pay = $request->s_pay;
            $member_credit_monthly->save();
        }

        Helper::updateTotalCredit($request->member_id, $request->current_month, $request->current_year);
        Helper::updateTotalDebit($request->member_id, $request->current_month, $request->current_year);

        if (count($check_core_member) > 0) {
            $update_core_member = MemberCoreInfo::where('member_id', $request->member_id)->first();
            $update_core_member->bank_acc_no = $request->bank_acc_no;
            $update_core_member->ccs_mem_no = $request->ccs_mem_no;
            $update_core_member->fpa = $request->fpa;
            $update_core_member->bank = $request->bank;
            $update_core_member->gpf_sub = $request->gpf_sub;
            $update_core_member->add2 = $request->add2;
            $update_core_member->gpf_acc_no = $request->gpf_acc_no;
            $update_core_member->i_tax = $request->i_tax;
            $update_core_member->pran_no = $request->pran_no;
            $update_core_member->pan_no = $request->pan_no;
            $update_core_member->ecess = $request->ecess;
            $update_core_member->ben_acc_no = $request->ben_acc_no;
            $update_core_member->dcmaf_no = $request->dcmaf_no;
            $update_core_member->s_pay = $request->s_pay;
            $update_core_member->ifsc = $request->ifsc;
            $update_core_member->update();
        } else {
            $core_member = new MemberCoreInfo();
            $core_member->member_id = $request->member_id;
            $core_member->bank_acc_no = $request->bank_acc_no;
            $core_member->ccs_mem_no = $request->ccs_mem_no;
            $core_member->fpa = $request->fpa;
            $core_member->bank = $request->bank;
            $core_member->gpf_sub = $request->gpf_sub;
            $core_member->add2 = $request->add2;
            $core_member->gpf_acc_no = $request->gpf_acc_no;
            $core_member->i_tax = $request->i_tax;
            $core_member->pran_no = $request->pran_no;
            $core_member->pan_no = $request->pan_no;
            $core_member->ecess = $request->ecess;
            $core_member->ben_acc_no = $request->ben_acc_no;
            $core_member->dcmaf_no = $request->dcmaf_no;
            $core_member->s_pay = $request->s_pay;
            $core_member->ifsc = $request->ifsc;
            $core_member->save();
        }

        // update member debit if exist, and update this cols : gpa_sub, i_tax and ecess
        $member_debit = MemberDebit::where('member_id', $request->member_id)->orderBy('id', 'desc')->first() ?? '';
        if ($member_debit) {
            $member_debit->gpa_sub = $request->gpf_sub;
            $member_debit->i_tax = $request->i_tax;
            $member_debit->ecess = $request->ecess;
            $member_debit->save();
        }

        // session()->flash('message', 'Member recovery updated successfully');
        return response()->json(['message' => 'Member recovery updated successfully']);
    }

    public function memberPersonalUpdate(Request $request)
    {
        //validation
        // $validated = $request->validate([
        //     'basic' => 'required',
        //     'emp_id' => 'required',
        //     'g_pay' => 'required',
        //     'cadre' => 'required',
        //     'dob' => 'required',
        //     'next_inr' => 'required',
        //     'ex_service' => 'required',
        //     'payband' => 'required',
        //     'pm_level' => 'required',
        //     'gender' => 'required',
        //     'status' => 'required',
        //     'doj_lab' => 'required',
        //     'quater' => 'required',
        //     'ph' => 'required',
        //     'old_basic' => 'required',
        //     'pm_index' => 'required',
        //     'name' => 'required',
        //     'desig' => 'required',
        //     'category' => 'required',
        //     'doj_service' => 'required',
        //     'quater_no' => 'required',
        //     'dop' => 'required',
        //     'fund_type' => 'required',
        //     'cgegis' => 'required',
        //     'cgegis_text' => 'required',
        //     'pay_stop' => 'required'
        // ]);

        $current_month = $request->current_month ?? date('m');
        $current_year = $request->current_year ?? date('Y');
        //memebers details update
        $member_details = Member::where('id', $request->member_id)->first();
        $member_category = Category::findOrFail($request->category);
        $member_details->emp_id = $request->emp_id;
        $member_details->gender = $request->gender;
        $member_details->name = $request->name;
        $member_details->pm_level = $request->pm_level;
        $member_details->pm_index = $request->pm_index;
        $member_details->basic = $request->basic;
        $member_details->desig = $request->desig;

        $member_details->cadre = $request->cadre;
        $member_details->category = $request->category;
        $member_details->group = $request->group;
        $member_details->division = $request->division;

        $member_details->status = $request->status;
        $member_details->g_pay = $request->g_pay;
        $member_details->fund_type = $member_category->fund_type;
        $member_details->dob = $request->dob;
        $member_details->doj_lab = $request->doj_lab;
        $member_details->dop = $request->dop;
        $member_details->next_inr = $request->next_inr;
        $member_details->quater = $request->quater;
        $member_details->quater_no = $request->quater_no;
        $member_details->ex_service = $request->ex_service;
        $member_details->cgegis = $request->cgegis;
        $member_details->doj_service1 = $request->doj_service;

        $member_details->pay_stop = $request->pay_stop;
        if ($request->pay_stop && $request->pay_stop === 'Yes') {
            $member_details->pay_stop_date = $request->pay_stop_date;
        } else {
            $member_details->pay_stop_date = null;
        }
        $member_details->e_status = $request->e_status;
        $member_details->update();

        // dd($request->e_status);

        $check_personal_member = MemberPersonalInfo::where('member_id', $request->member_id)->get();

        $exceptions_this_month = MemberMonthlyDataExpectation::where('member_id', $request->member_id)->where('amount_year', $current_year)->where('amount_month', $current_month)->get();
        $da_percentage = DearnessAllowancePercentage::where('is_active', 1)->first();
        // dd($exceptions_this_month);
        if (count($check_personal_member) > 0) {
            $update_personal_member = MemberPersonalInfo::where('member_id', $request->member_id)->first();

            $member_credit_monthly = MemberMonthlyDataCredit::where('member_id', $request->member_id)->where('month', $current_month)->where('year', $current_year)->orderBy('id', 'desc')->first() ?? '';

            $member_debit_monthly = MemberMonthlyDataDebit::where('member_id', $request->member_id)->where('month', $current_month)->where('year', $current_year)->orderBy('id', 'desc')->first() ?? '';

            // dd($member_credit_monthly);

            if ($update_personal_member->basic != $request->basic) {
                $member = Member::where('id', $request->member_id)->first();


                $basicPay = $request->basic;
                $daAmount = $da_percentage ? round(($basicPay * $da_percentage->percentage) / 100) : 0;

                // HRA calculation based on city category
                $hraAmount = 0;
                if ($member->member_city) {
                    $city = City::find($member->member_city);
                    if ($city) {
                        $hraPercentage = Hra::where('city_category', $city->city_type)
                            ->where('status', 1)
                            ->first();
                        $hraAmount = $hraPercentage ? round(($basicPay * $hraPercentage->percentage) / 100) : 0;
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
                $npsc = 0;
                if (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'NPS') {
                    $npsc = round((($basicPay + $daAmount) * 14) / 100);
                }

                $upsc_10 = 0;
                if (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'UPS') {
                    $upsc_10 = round((($basicPay + $daAmount) * 10) / 100);
                }

                if ($member_credit_monthly) {
                    $member_credit_monthly->pay = $basicPay;
                    $member_credit_monthly->da = $daAmount;
                    $member_credit_monthly->tpt = $tptAmount;
                    $member_credit_monthly->hra = $hraAmount;
                    $member_credit_monthly->da_on_tpt = $tptDa;
                    $member_credit_monthly->npsc = $npsc;
                    $member_credit_monthly->upsc_10 = $upsc_10;


                    foreach ($exceptions_this_month as $exception) {
                        if ($exception->rule_name == 'TPT') {
                            $member_credit_monthly->tpt = $exception->amount ?? 0;
                            if ($member_credit_monthly->tpt == 0) {
                                $member_credit_monthly->da_on_tpt = 0;
                            } else {
                                $total = round($exception->amount * $da_percentage->percentage / 100);
                                $member_credit_monthly->da_on_tpt = $total;
                            }
                        }

                        if ($exception->rule_name == 'DA') {
                            $member_credit_monthly->da = $exception->amount ?? 0;
                            if ($member_credit_monthly->da == 0) {
                                $member_credit_monthly->da_on_tpt = 0;
                                $member_credit_monthly->tpt = 0;
                            } else {
                                $total = round($exception->amount * $da_percentage->percentage / 100);
                                $member_credit_monthly->tpt = $tptAmount;
                                $member_credit_monthly->da_on_tpt = $total;
                            }
                        }

                        if ($exception->rule_name == 'HRA') {
                            $member_credit_monthly->hra = $exception->amount ?? 0;
                        }
                    }
                    $member_credit_monthly->save();
                }



                // GPF calculations if applicable
                $gpfDeduction = 0;
                if ($member->memberCategory->fund_type == 'GPF') {
                    $gpfDeduction = round(($basicPay + $daAmount) * 10 / 100);
                }

                $npsg = 0;
                $nps_10_rec = 0;
                if (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'NPS') {
                    $npsg = round((($basicPay + $daAmount) * 14) / 100);
                    $nps_10_rec = round((($basicPay + $daAmount) * 10) / 100);
                }

                $ups_10_per_rec = 0;
                $upsg_10_per = 0;
                if (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'UPS') {
                    $ups_10_per_rec = round((($basicPay + $daAmount) * 10) / 100);
                    $upsg_10_per = round((($basicPay + $daAmount) * 10) / 100);
                }

                if ($member_debit_monthly) {



                    $member_debit_monthly->gpa_sub = $gpfDeduction;
                    // $member_debit_monthly->nps_sub = $npsSubTotal;
                    // $member_debit_monthly->cmg = $npsGMCTotal;
                    $member_debit_monthly->basic = $basicPay;
                    $member_debit_monthly->npsg = $npsg;
                    $member_debit_monthly->nps_10_rec = $nps_10_rec;

                    $member_debit_monthly->ups_10_per_rec = $ups_10_per_rec;
                    $member_debit_monthly->upsg_10_per = $upsg_10_per;

                    if ($exceptions_this_month) {
                        foreach ($exceptions_this_month as $exception) {
                            if ($exception->rule_name == 'GPF') {
                                $member_debit_monthly->gpa_sub = $exception->amount ?? 0;
                            }

                            if ($exception->rule_name == 'NPSG') {
                                $member_debit_monthly->npsg = $exception->amount ?? 0;
                            }

                            if ($exception->rule_name == 'UPSG') {
                                $member_debit_monthly->upsg_10_per = $exception->amount ?? 0;
                            }
                        }
                    }
                    $member_debit_monthly->save();
                }
            }

            $update_personal_member->basic = $request->basic;
            $update_personal_member->emp_id = $request->emp_id;
            $update_personal_member->name = $request->name;
            $update_personal_member->g_pay = $request->g_pay;
            $update_personal_member->cadre = $request->cadre;
            $update_personal_member->dob = $request->dob;
            $update_personal_member->next_inr = $request->next_inr;
            $update_personal_member->ex_service = $request->ex_service;
            $update_personal_member->payband = $request->payband;
            $update_personal_member->pm_level = $request->pm_level;
            $update_personal_member->gender = $request->gender;
            $update_personal_member->status = $request->status;
            $update_personal_member->doj_lab = $request->doj_lab;
            $update_personal_member->quater = $request->quater;
            $update_personal_member->ph = $request->ph;
            $update_personal_member->old_basic = $request->old_basic;
            $update_personal_member->pm_index = $request->pm_index;
            $update_personal_member->desig = $request->desig;
            $update_personal_member->category = $request->category;
            $update_personal_member->group = $request->group;
            $update_personal_member->division = $request->division;


            $update_personal_member->doj_service = $request->doj_service;
            $update_personal_member->quater_no = $request->quater_no;
            $update_personal_member->dop = $request->dop;
            $update_personal_member->fund_type = $request->fund_type;
            $update_personal_member->cgegis = $request->cgegis;
            $update_personal_member->cgegis_text = $request->cgegis_text;
            $update_personal_member->pay_stop = $request->pay_stop;

            if ($request->pay_stop && $request->pay_stop === 'Yes') {
                $update_personal_member->pay_stop_date = $request->pay_stop_date;
            } else {
                $update_personal_member->pay_stop_date = null;
            }

            $update_personal_member->landline_no = $request->landline_no;
            $update_personal_member->mobile_no = $request->mobile_no;
            $update_personal_member->mobile_allowance = $request->mobile_allowance;
            $update_personal_member->broadband_allowance = $request->broadband_allowance;
            $update_personal_member->landline_allowance = $request->landline_allowance;
            $update_personal_member->cr_water = $request->cr_water;
            $update_personal_member->e_status = $request->e_status;
            $update_personal_member->update();



            if ($member_credit_monthly) {
                if ($request->g_pay) {
                    $member_credit_monthly->g_pay = $request->g_pay;
                }
                $member_credit_monthly->save();
            }



            // dd($member_debit_monthly, $current_month);
            if ($member_debit_monthly) {
                $cgegis_amount = Cgegis::where('id', $request->cgegis)->first() ?? '';
                $cgegis_amount = $cgegis_amount->value ?? 0;
                $member_debit_monthly->cgegis = $cgegis_amount;

                $cgaData = Cghs::where('pay_level_id', $request->pm_level)->first();

                if ($cgaData) {
                    $member_debit_monthly->cghs =  $cgaData->contribution;
                }

                if ($exceptions_this_month) {
                    foreach ($exceptions_this_month as $exception) {

                        if ($exception->rule_name == 'CGHS') {
                            $member_debit_monthly->cghs = $exception->amount ?? 0;
                        }

                        if ($exception->rule_name == 'CGEGIS') {
                            $member_debit_monthly->cgegis = $exception->amount ?? 0;
                        }
                    }
                }
                $member_debit_monthly->save();
            }

            // update pg in memeber
            $member_details = Member::where('id', $request->member_id)->first();
            $member_details->pg = $request->pg;
            $member_details->update();

            // if pg = 1 then update member recovery med_ins set 0
            if ($request->pg == 1) {
                $member_recovery = MemberMonthlyDataRecovery::where('member_id', $request->member_id)->first();
                if ($member_recovery) {
                    $member_recovery->med_ins = 0;
                    $member_recovery->save();
                }

                $member_recovery_monthly = MemberMonthlyDataRecovery::where('member_id', $request->member_id)->where('month', $current_month)->where('year', $current_year)->orderBy('id', 'desc')->first();
                if ($member_recovery_monthly) {
                    $member_recovery_monthly->med_ins = 0;
                    $member_recovery_monthly->save();
                }
            } else {
                $member_recovery = MemberOriginalRecovery::where('member_id', $request->member_id)->first();
                if ($member_recovery) {
                    //get med_ins amount from category
                    $med_ins_amount = Category::where('id', $request->category)->first() ?? '';
                    $med_ins_amount = $med_ins_amount->med_ins ?? 0;
                    $member_recovery->med_ins = $med_ins_amount;
                    $member_recovery->save();
                }
                $member_recovery_monthly = MemberMonthlyDataRecovery::where('member_id', $request->member_id)->where('month', $current_month)->where('year', $current_year)->orderBy('id', 'desc')->first();
                if ($member_recovery_monthly) {
                    //get med_ins amount from category
                    $med_ins_amount = Category::where('id', $request->category)->first() ?? '';
                    $med_ins_amount = $med_ins_amount->med_ins ?? 0;
                    $member_recovery_monthly->med_ins = $med_ins_amount;
                    $member_recovery_monthly->save();
                }
            }

            $records = MemberMonthlyDataCredit::where('member_id', $request->member_id)->whereHas('member', function ($query) use ($request) {
                $query->where('pm_level', $request->pm_level);
            })
                ->where(function ($query) use ($current_month, $current_year) {
                    $query->where('year', '>', $current_year)
                        ->orWhere(function ($q) use ($current_month, $current_year) {
                            $q->where('year', $current_year)
                                ->where('month', '>=', $current_month);
                        });
                })
                ->get();
            // dd($records->toArray());
            $tpt = Tpta::where('pay_level_id', $request->pm_level)->where('status', 1)->first();
            //  dd($tpt);
            if ($tpt) {
                foreach ($records as $record) {
                    $record->tpt = $tpt->tpt_allowance;
                    $record->da_on_tpt = $tpt->tpt_da; // da_on_tpt set based on TPT value
                    foreach ($exceptions_this_month as $exception) {
                        if ($exception->rule_name == 'TPT') {
                            $record->tpt = $exception->amount ?? 0;
                            if ($record->tpt == 0) {
                                $record->da_on_tpt = 0;
                            } else {
                                $total = round($exception->amount * $da_percentage->percentage / 100);
                                $record->da_on_tpt = $total;
                            }
                        }
                    }
                    $record->save();

                    // dd($records->toArray(), $exceptions_this_month);
                }
            }


            $wel_rec = 0;
            $category = Category::where('id', $request->category)->first();

            if ($category) {

                $member_pg = Member::where('id', $request->member_id)->first()->pg;
                if ($member_pg == 1) {
                    $medIns = 0;
                } else {
                    $medIns = $category->med_ins ?? 0;;
                }

                $welSub = $category->wel_sub ?? 0;
            }


            MemberMonthlyDataRecovery::where('member_id', $request->member_id)->where(function ($query) use ($current_month, $current_year) {
                $query->where('year', '>', $current_year)
                    ->orWhere(function ($q) use ($current_month, $current_year) {
                        $q->where('year', $current_year)
                            ->where('month', '>=', $current_month);
                    });
            })
                ->update(['wel_sub' => $welSub, 'med_ins' => $medIns]);

            Helper::updateTotalCredit($request->member_id, $current_month, $current_year);
            Helper::updateTotalDebit($request->member_id, $current_month, $current_year);
            Helper::updateTotalRecovery($request->member_id, $current_month, $current_year);

            $meassage = 'Member personal info updated successfully';
        } else {

            $personal_member = new MemberPersonalInfo();
            $personal_member->member_id = $request->member_id;
            $personal_member->basic = $request->basic;
            $personal_member->emp_id = $request->emp_id;
            $personal_member->name = $request->name;
            $personal_member->g_pay = $request->g_pay;
            $personal_member->cadre = $request->cadre;
            $personal_member->dob = $request->dob;
            $personal_member->next_inr = $request->next_inr;
            $personal_member->ex_service = $request->ex_service;
            $personal_member->payband = $request->payband;
            $personal_member->pm_level = $request->pm_level;
            $personal_member->gender = $request->gender;
            $personal_member->status = $request->status;
            $personal_member->doj_lab = $request->doj_lab;
            $personal_member->quater = $request->quater;
            $personal_member->ph = $request->ph;
            $personal_member->old_basic = $request->old_basic;
            $personal_member->pm_index = $request->pm_index;
            $personal_member->desig = $request->desig;
            $personal_member->category = $request->category;
            $personal_member->group = $request->group;
            $personal_member->division = $request->division;

            $personal_member->doj_service1 = $request->doj_service;
            $personal_member->quater_no = $request->quater_no;
            $personal_member->dop = $request->dop;
            $personal_member->fund_type = $request->fund_type;
            $personal_member->cgegis = $request->cgegis;
            $personal_member->cgegis_text = $request->cgegis_text;
            $personal_member->pay_stop = $request->pay_stop;

            if ($request->pay_stop && $request->pay_stop === 'Yes') {
                $personal_member->pay_stop_date = $request->pay_stop_date;
            } else {
                $personal_member->pay_stop_date = null;
            }
            $personal_member->landline_no = $request->landline_no;
            $personal_member->mobile_no = $request->mobile_no;
            $personal_member->mobile_allowance = $request->mobile_allowance;
            $personal_member->broadband_allowance = $request->broadband_allowance;
            $personal_member->landline_allowance = $request->landline_allowance;
            $personal_member->cr_water = $request->cr_water;
            $personal_member->e_status = $request->e_status;
            $personal_member->save();


            // session()->flash('message', 'Member personal info added successfully');
            $meassage = 'Member personal info added successfully';
        }

        return response()->json(['message' => $meassage]);
    }

    public function memberLoanInfoStore(Request $request)
    {
        $validated = $request->validate([
            'loan_name' => 'required',
            'present_inst_no' => 'required',
            'tot_no_of_inst' => 'required',
            'total_amount' => 'required',
            'balance' => 'required'
        ]);

        $loan_detail = Loan::where('id', $request->loan_name)->first() ?? '';


        $member_loan_monthly = new MemberMonthlyDataLoanInfo();

        $member_loan_monthly->month = $request->current_month;
        $member_loan_monthly->year = $request->current_year;
        $member_loan_monthly->apply_date = now();
        $member_loan_monthly->member_id = $request->member_id;
        $member_loan_monthly->loan_name = $loan_detail->loan_name;
        $member_loan_monthly->loan_id = $request->loan_name;
        $member_loan_monthly->present_inst_no = $request->present_inst_no;
        $member_loan_monthly->tot_no_of_inst = $request->tot_no_of_inst;

        // $member_loan_monthly->interst_percentage = $request->interst_percentage;
        $member_loan_monthly->total_interest = $request->total_interest;


        $member_loan_monthly->inst_amount = $request->inst_amount;
        $member_loan_monthly->inst_rate = $request->inst_rate;
        $member_loan_monthly->total_amount = $request->total_amount;
        $member_loan_monthly->balance = $request->balance;
        // $member_loan_monthly->recovery_type = $request->recovery_type;
        $member_loan_monthly->penal_inst_rate = $request->penal_inst_rate;
        $member_loan_monthly->start_date = $request->start_date ?? now()->format('Y-m-d');
        $member_loan_monthly->end_date = $request->end_date ?? null;
        $member_loan_monthly->remark = $request->remark;
        $member_loan_monthly->save();

        // $loan_info = new MemberLoanInfo;
        // $loan_info->member_id = $request->member_id;
        // $loan_info->loan_id = $request->loan_name;
        // $loan_info->loan_name = $loan_detail->loan_name;
        // $loan_info->present_inst_no = $request->present_inst_no;
        // $loan_info->tot_no_of_inst = $request->tot_no_of_inst;
        // $loan_info->inst_amount = $request->inst_amount;
        // $loan_info->inst_rate = $request->inst_rate;
        // $loan_info->total_amount = $request->total_amount;
        // $loan_info->balance = $request->balance;
        // $loan_info->recovery_type = $request->recovery_type;
        // $loan_info->penal_inst_rate = $request->penal_inst_rate;
        // $loan_info->start_date = $request->start_date ?? now()->format('Y-m-d');
        // $loan_info->end_date = $request->end_date ?? null;
        // $loan_info->remark = $request->remark;
        // $loan_info->save();

        // Start from current month
        $startDate = new \DateTime(now()->format('Y-m-01'));
        $totalInstallments = $request->tot_no_of_inst ?? 0;

        // Calculate EMI amount from total amount and number of installments
        $emiAmount = $request->inst_amount;

        // Create installments for the specified number of months
        for ($i = 0; $i < $totalInstallments; $i++) {
            $currentDate = clone $startDate;
            $currentDate->modify("+{$i} month");

            $loanInstallment = new MemberLoan();
            $loanInstallment->member_id = $request->member_id;
            $loanInstallment->loan_id = $request->loan_name;
            $loanInstallment->loan_info_id = $member_loan_monthly->id;
            $loanInstallment->interest_rate = $request->inst_rate ?? 0;
            $loanInstallment->emi_amount = $emiAmount;
            $loanInstallment->interest_amount = $emiAmount;
            $loanInstallment->emi_month = $currentDate->format('F Y');
            $loanInstallment->emi_date = $currentDate->format('Y-m-d');
            $loanInstallment->penal_interest = '';
            $loanInstallment->save();
        }

        Helper::updateTotalDebit($request->member_id, $request->current_month, $request->current_year);

        // If end_date is not provided, calculate it based on the last installment
        if (!$request->end_date) {
            $endDate = clone $startDate;
            $endDate->modify("+" . ($totalInstallments - 1) . " month");
            $member_loan_monthly->end_date = $endDate->format('Y-m-d');
            $member_loan_monthly->save();
        }

        return response()->json(['message' => 'Member loan info added successfully', 'data' => $member_loan_monthly]);
    }

    public function memberLoanEdit($id)
    {
        $member_loan = MemberMonthlyDataLoanInfo::find($id);
        $currentMonth = $member_loan->month;
        $currentYear = $member_loan->year;
        $edit = true;
        $member = Member::findOrFail($member_loan->member_id);

        if ($member->memberCategory->fund_type === 'GPF') {
            $loans = Loan::orderBy('id', 'desc')->get();
        } else {
            // Exclude loan with ID 10
            $loans = Loan::where('id', '!=', 10)->orderBy('id', 'desc')->get();
        }

        return response()->json(['view' => view('frontend.members.loan.form', compact('edit', 'member_loan', 'loans', 'currentMonth', 'currentYear'))->render()]);
    }

    public function memberLoanUpdate(Request $request)
    {
        $validated = $request->validate([
            // 'loan_name' => 'required',
            'present_inst_no' => 'required',
            'tot_no_of_inst' => 'required',
            'total_amount' => 'required',
            'balance' => 'required'
        ]);

        if (!isset($request->member_loan_id)) {
            // This is actually a new loan record, use store method instead
            return $this->memberLoanInfoStore($request);
        }

        // Get the existing loan info
        $loan_info = MemberMonthlyDataLoanInfo::where('id', $request->member_loan_id)->first();
        if (!$loan_info) {
            return response()->json(['message' => 'Member loan info not found'], 404);
        }

        // Get loan details
        // $loan_detail = Loan::where('id', $request->loan_name)->first() ?? '';

        // Update the loan information
        $loan_info->month = $request->current_month;
        $loan_info->year = $request->current_year;
        // $loan_info->loan_id = $request->loan_name;
        // $loan_info->loan_name = $loan_detail->loan_name;
        $loan_info->present_inst_no = $request->present_inst_no;
        $loan_info->tot_no_of_inst = $request->tot_no_of_inst;
        $loan_info->inst_amount = $request->inst_amount;
        $loan_info->inst_rate = $request->inst_rate;
        $loan_info->total_amount = $request->total_amount;

        // $loan_info->interst_percentage = $request->interst_percentage;
        $loan_info->total_interest = $request->total_interest;


        $loan_info->balance = $request->balance;
        // $loan_info->recovery_type = $request->recovery_type;
        $loan_info->penal_inst_rate = $request->penal_inst_rate;
        $loan_info->start_date = $request->start_date ?? $loan_info->start_date;
        $loan_info->end_date = $request->end_date ?? $loan_info->end_date;
        $loan_info->remark = $request->remark;
        $loan_info->update();

        // Delete existing installments
        MemberLoan::where('loan_info_id', $loan_info->id)->delete();

        // Re-create installments
        $startDate = new \DateTime($loan_info->start_date ?? now()->format('Y-m-01'));
        $totalInstallments = $request->tot_no_of_inst ?? 0;
        $emiAmount = $request->inst_amount;

        // Create installments for the specified number of months
        for ($i = 0; $i < $totalInstallments; $i++) {
            $currentDate = clone $startDate;
            $currentDate->modify("+{$i} month");

            $loanInstallment = new MemberLoan();
            $loanInstallment->member_id = $loan_info->member_id;
            $loanInstallment->loan_id = $loan_info->loan_id;
            $loanInstallment->loan_info_id = $loan_info->id;
            $loanInstallment->interest_rate = $request->inst_rate ?? 0;
            $loanInstallment->emi_amount = $emiAmount;
            $loanInstallment->interest_amount = $emiAmount;
            $loanInstallment->emi_month = $currentDate->format('F Y');
            $loanInstallment->emi_date = $currentDate->format('Y-m-d');
            $loanInstallment->penal_interest = '';
            $loanInstallment->save();
        }

        Helper::updateTotalDebit($request->member_id, $request->current_month, $request->current_year);

        // If end_date is not provided, calculate it based on the last installment
        if (!$request->end_date) {
            $endDate = clone $startDate;
            $endDate->modify("+" . ($totalInstallments - 1) . " month");
            $loan_info->end_date = $endDate->format('Y-m-d');
            $loan_info->save();
        }

        return response()->json(['message' => 'Member loan info updated successfully', 'data' => $loan_info]);
    }

    public function memberLoanDelete($id)
    {
        $loanInfo = MemberMonthlyDataLoanInfo::find($id);

        if (!$loanInfo) {
            return response()->json(['message' => 'Member loan not found'], 404);
        }

        // Delete all associated installments first
        MemberLoan::where('loan_info_id', $id)->delete();

        Helper::updateTotalDebit($loanInfo->member_id, $loanInfo->month, $loanInfo->year);

        // Then delete the loan info
        $loanInfo->delete();



        return response()->json(['message' => 'Member loan and all installments deleted successfully']);
    }

    public function memberPolicyInfoStore(Request $request)
    {
        $policy_store = new MemberMonthlyDataPolicyInfo();
        $policy_store->month = $request->current_month;
        $policy_store->year = $request->current_year;
        $policy_store->apply_date = now();
        $policy_store->member_id = $request->member_id;
        $policy_store->policy_name = $request->policy_name;
        $policy_store->policy_no = $request->policy_no;
        $policy_store->amount = $request->amount;
        $policy_store->rec_stop = $request->rec_stop;
        $policy_store->save();

        // $policy_store = new MemberPolicyInfo;
        // $policy_store->member_id = $request->member_id;
        // $policy_store->policy_name = $request->policy_name;
        // $policy_store->policy_no = $request->policy_no;
        // $policy_store->amount = $request->amount;
        // $policy_store->rec_stop = $request->rec_stop;
        // $policy_store->save();

        $member_recovery = MemberMonthlyDataRecovery::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->latest()->first();
        // dd($member_recovery, $request->current_month, $request->current_year);
        if ($member_recovery) {

            if ($request->policy_name == 'LIC' && $request->rec_stop == 'No') {
                $total_lic = MemberMonthlyDataPolicyInfo::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->where('policy_name', 'LIC')->where('rec_stop', 'No')->sum('amount');


                $member_recovery->lic = $total_lic;
            }
            $member_recovery->save();
        }
        return response()->json(['message' => 'Member policy info added successfully', 'data' => $policy_store]);
    }

    public function memberPolicyInfoEdit($id)
    {

        $member_policy = MemberMonthlyDataPolicyInfo::find($id);

        $currentYear = $member_policy->year;
        $currentMonth = $member_policy->month;
        $edit = true;
        $policies = Policy::orderBy('id', 'desc')->get();
        return response()->json(['view' => view('frontend.members.policy-info.form', compact('edit', 'member_policy', 'policies', 'currentYear', 'currentMonth'))->render()]);
    }

    public function memberPolicyInfoUpdate(Request $request)
    {
        $validated = $request->validate([
            'policy_name' => 'required',
            'policy_no' => 'required',
            'amount' => 'required',
        ]);

        if (!isset($request->member_policy_id)) {

            $member_policy_monthly = new MemberMonthlyDataPolicyInfo();
            $member_policy_monthly->month = $request->current_month;
            $member_policy_monthly->year = $request->current_year;
            $member_policy_monthly->apply_date = now();
            $member_policy_monthly->member_id = $request->member_id;
            $member_policy_monthly->policy_name = $request->policy_name;
            $member_policy_monthly->policy_no = $request->policy_no;
            $member_policy_monthly->amount = $request->amount;
            $member_policy_monthly->rec_stop = $request->rec_stop;
            $member_policy_monthly->save();

            // $policy_info = new MemberPolicyInfo;
            // $policy_info->member_id = $request->member_id;
            // $policy_info->policy_name = $request->policy_name;
            // $policy_info->policy_no = $request->policy_no;
            // $policy_info->amount = $request->amount;
            // $policy_info->rec_stop = $request->rec_stop;
            // $policy_info->save();

            return response()->json(['message' => 'Member policy info added successfully', 'data' => $member_policy_monthly, 'save' => true]);
        }

        $member_policy_monthly = MemberMonthlyDataPolicyInfo::where('id', $request->member_policy_id)->first();
        $member_policy_monthly->month = $request->current_month;
        $member_policy_monthly->year = $request->current_year;
        $member_policy_monthly->apply_date = now();
        $member_policy_monthly->member_id = $request->member_id;
        $member_policy_monthly->policy_name = $request->policy_name;
        $member_policy_monthly->policy_no = $request->policy_no;
        $member_policy_monthly->amount = $request->amount;
        $member_policy_monthly->rec_stop = $request->rec_stop;
        $member_policy_monthly->save();


        $member_recovery = MemberMonthlyDataRecovery::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->latest()->first();

        if ($request->policy_name == 'LIC' && $request->rec_stop == 'No') {
            $total_lic = MemberMonthlyDataPolicyInfo::where('member_id', $request->member_id)->where('month', $request->current_month)->where('year', $request->current_year)->where('policy_name', 'LIC')->where('rec_stop', 'No')->sum('amount');
            // dd($total_lic);

            $member_recovery->lic = $total_lic;
        }
        $member_recovery->save();

        Helper::updateTotalRecovery($request->member_id, $request->current_month, $request->current_year);

        // $policy_info = MemberPolicyInfo::where('id', $request->member_policy_id)->first();
        // $policy_info->policy_name = $request->policy_name;
        // $policy_info->policy_no = $request->policy_no;
        // $policy_info->amount = $request->amount;
        // $policy_info->rec_stop = $request->rec_stop;
        // $policy_info->update();

        return response()->json(['message' => 'Member policy info updated successfully', 'data' => $member_policy_monthly]);
    }

    public function memberPolicyInfoDelete($id)
    {

        $delete_policy = MemberMonthlyDataPolicyInfo::where('id', $id)->first();
        $delete_policy->delete();

        return response()->json(['message' => 'Member policy deleted successfully']);
    }

    public function memberExpectationStore(Request $request)
    {
        $validated = $request->validate([
            'rule_name' => 'required',
            // 'percent' => 'required',
            'amount' => 'required',
        ]);

        $memberId = $request->member_id;
        $month = $request->current_month;
        $year = $request->current_year;
        $amount = $request->amount;
        $amount_year = $request->year;
        $amount_month = $request->month;

        $selectedValue = $request->rule_name;
        $data = explode(',', $selectedValue);
        $rule_name = $data[0];

        $monthy_expectation_store = new MemberMonthlyDataExpectation();
        $monthy_expectation_store->month = $request->current_month;
        $monthy_expectation_store->year = $request->current_year;
        $monthy_expectation_store->apply_date = now();
        $monthy_expectation_store->member_id = $request->member_id;
        $monthy_expectation_store->rule_name = $rule_name;
        $monthy_expectation_store->percent = $request->percent;
        $monthy_expectation_store->amount = $request->amount;
        $monthy_expectation_store->amount_year = $request->year;
        $monthy_expectation_store->amount_month = $request->month;
        $monthy_expectation_store->remark = $request->remark;
        $monthy_expectation_store->save();


        // $expectation_store = new MemberExpectation;
        // $expectation_store->member_id = $request->member_id;
        // $expectation_store->rule_name = $rule_name;
        // $expectation_store->percent = $request->percent;
        // $expectation_store->amount = $request->amount;
        // $expectation_store->year = $request->year;
        // $expectation_store->month = $request->month;
        // $expectation_store->remark = $request->remark;
        // $expectation_store->save();



        switch ($rule_name) {
            case 'GPF':
                $member_debit = MemberMonthlyDataDebit::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_debit) {
                    $member_debit->gpa_sub = $amount;
                    $member_debit->save();
                }

                $member_core = MemberMonthlyDataCoreInfo::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_core) {
                    $member_core->gpf_sub = $amount;
                    $member_core->save();
                }
                break;

            case 'NPSG':
                $member_debit = MemberMonthlyDataDebit::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_debit) {
                    $member_debit->npsg = $amount;
                    $member_debit->save();
                }
                break;

            case 'UPSG':
                $member_debit = MemberMonthlyDataDebit::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_debit) {
                    $member_debit->upsg_10_per = $amount;
                    $member_debit->save();
                }
                break;

            case 'TPT':
                $member_credit = MemberMonthlyDataCredit::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_credit) {
                    $member_credit->tpt = $amount;
                    if ($member_credit->tpt == 0) {
                        $member_credit->da_on_tpt = 0;
                    } else {
                        $da_percentage_val = DearnessAllowancePercentage::where('is_active', 1)->first();
                        $percentage = $da_percentage_val->percentage;
                        $total = round($amount * $percentage / 100);
                        $member_credit->da_on_tpt = $total;
                    }

                    $member_credit->save();
                }
                break;

            case 'DA':
                $member_credit = MemberMonthlyDataCredit::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_credit) {
                    $member_credit->da = $amount;
                    $member_credit->save();
                }
                break;

            case 'HRA':
                $member_credit = MemberMonthlyDataCredit::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_credit) {
                    $member_credit->hra = $amount;
                    $member_credit->save();
                }
                break;

            case 'CGHS':
                $member_debit = MemberMonthlyDataDebit::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_debit) {
                    $member_debit->cghs = $amount;
                    $member_debit->save();
                }
                break;

            case 'CGEGIS':
                $member_debit = MemberMonthlyDataDebit::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_debit) {
                    $member_debit->cgegis = $amount;
                    $member_debit->save();
                }
                break;

            case 'Wellfare':
                $member_recovery = MemberMonthlyDataRecovery::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_recovery) {
                    $member_recovery->wel_sub = $amount;
                    $member_recovery->save();
                }
                break;

            case 'MESS':
                $member_recovery = MemberMonthlyDataRecovery::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_recovery) {
                    $member_recovery->mess = $amount;
                    $member_recovery->save();
                }
                break;

            case 'Prof TAX':
                $member_recovery = MemberMonthlyDataRecovery::where('member_id', $memberId)->where('month', $amount_month)->where('year', $amount_year)->latest()->first();
                if ($member_recovery) {
                    $member_recovery->ptax = $amount;
                    $member_recovery->save();
                }
                break;

            default:
                // Optional: handle unknown rule names
                break;
        }

        if ($month == $amount_month && $year == $amount_year) {
            Helper::updateTotalCredit($request->member_id, $month, $year);
            Helper::updateTotalDebit($request->member_id, $month, $year);
            Helper::updateTotalRecovery($request->member_id, $month, $year);
        }




        return response()->json(['message' => 'Member expectation added successfully', 'data' => $monthy_expectation_store]);
    }

    public function memberExpectationEdit($id)
    {
        $member_expectation = MemberMonthlyDataExpectation::find($id);
        $rules = Rule::orderBy('id', 'desc')->get() ?? '';
        $edit = true;
        $currentMonth = $member_expectation->month;
        $currentYear = $member_expectation->year;
        return response()->json(['view' => view('frontend.members.expectation.form', compact('edit', 'member_expectation', 'rules', 'currentMonth', 'currentYear'))->render()]);
    }

    public function memberExpectationUpdate(Request $request)
    {
        $validated = $request->validate([
            'rule_name' => 'required',
            //  'percent' => 'required',
            'amount' => 'required',
        ]);



        $selectedValue = $request->rule_name;
        $data = explode(',', $selectedValue);
        $rule_name = $data[0];

        $expectation_info = MemberMonthlyDataExpectation::where('id', $request->member_expectation_id)->first();
        $expectation_info->percent = $request->percent;
        $expectation_info->amount = $request->amount;
        $expectation_info->remark = $request->remark;
        $expectation_info->update();

        $month = $expectation_info->amount_month;
        $year = $expectation_info->amount_year;

        $current_month = date('m');
        $current_year = date('Y');

        if ($rule_name == 'GPF') {
            $member_debit = MemberMonthlyDataDebit::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_debit) {
                $member_debit->gpa_sub = $request->amount;
                $member_debit->update();
            }
            $member_core = MemberMonthlyDataCoreInfo::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_core) {
                $member_core->gpf_sub = $request->amount;
                $member_core->update();
            }
        }
        if ($rule_name == 'NPSG') {

            $member_debit = MemberMonthlyDataDebit::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_debit) {
                $member_debit->npsg = $request->amount;
                $member_debit->update();
            }
        }

         if ($rule_name == 'UPSG') {

            $member_debit = MemberMonthlyDataDebit::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_debit) {
                $member_debit->upsg_10_per = $request->amount;
                $member_debit->update();
            }
        }

        // TPT on credit
        if ($rule_name == 'TPT') {
            $member_credit = MemberMonthlyDataCredit::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_credit) {
                $member_credit->tpt = $request->amount;
                $member_credit->da_on_tpt = $request->amount / 2;
                $member_credit->update();
            }
        }

        if ($rule_name == 'Wellfare') {
            $member_recovery = MemberMonthlyDataRecovery::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_recovery) {
                $member_recovery->wel_sub = $request->amount;
                $member_recovery->update();
            }
        }

        if ($rule_name == 'MESS') {
            $member_recovery = MemberMonthlyDataRecovery::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_recovery) {
                $member_recovery->mess = $request->amount;
                $member_recovery->update();
            }
        }

        if ($rule_name == 'Prof TAX') {
            $member_recovery = MemberMonthlyDataRecovery::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_recovery) {
                $member_recovery->ptax = $request->amount;
                $member_recovery->update();
            }
        }

        if ($rule_name == 'DA') {
            $member_credit = MemberMonthlyDataCredit::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_credit) {
                $member_credit->da = $request->amount;
                $member_credit->update();
            }
        }

        // HRA in credit
        if ($rule_name == 'HRA') {
            $member_credit = MemberMonthlyDataCredit::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_credit) {
                $member_credit->hra = $request->amount;
                $member_credit->update();
            }
        }

        // CGHS in debit
        if ($rule_name == 'CGHS') {
            $member_debit = MemberMonthlyDataDebit::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_debit) {
                $member_debit->cghs = $request->amount;
                $member_debit->update();
            }
        }

        // CGEGIS in debit
        if ($rule_name == 'CGEGIS') {
            $member_debit = MemberMonthlyDataDebit::where('member_id', $request->member_id)->orderBy('id', 'desc')->where('month', $month)->where('year', $year)->first() ?? '';
            if ($member_debit) {
                $member_debit->cgegis = $request->amount;
                $member_debit->update();
            }
        }


        if ($current_month == $month && $year == $current_year) {
            Helper::updateTotalCredit($request->member_id, $month, $year);
            Helper::updateTotalDebit($request->member_id, $month, $year);
            Helper::updateTotalRecovery($request->member_id, $month, $year);
        }


        session()->flash('message', 'Member expectation updated successfully');
        return response()->json(['message' => 'Member expectation updated successfully', 'data' => $expectation_info]);
    }

    public function memberExpectationDelete($id)
    {
        $delete_expectation = MemberMonthlyDataExpectation::where('id', $id)->first();
        $delete_expectation->delete();

        return response()->json(['message' => 'Member expectation deleted successfully']);
    }

    public function memberLoanEmiInfo()
    {
        $members = Member::orderBy('id', 'asc')->get();
        $loans = Loan::where('status', 1)->get();
        return view('frontend.members.loan.emi-info', compact('loans', 'members'));
    }

    public function memberLoanList(Request $request)
    {

        $members_loans_info = MemberLoanInfo::where('member_id', $request->member_id)->orderBy('id', 'desc')->get();
        $loans = Loan::where('status', 1)->get();

        return response()->json(['message' => 'Member loan found successfully', 'data' => $members_loans_info]);
    }

    public function memberLoanEmiSubmit(Request $request)
    {

        $validated = $request->validate([
            'member_id' => 'required',
            'loan_id' => 'required',
        ]);
        $members = Member::orderBy('id', 'asc')->get();
        $loans = Loan::where('status', 1)->get();
        $loan_emi_list = MemberLoan::where('member_id', $request->member_id)->where('loan_id', $request->loan_id)->paginate(10);
        $emiInfo = true;

        return response()->json(['view' => view('frontend.members.loan.emi-info-table', compact('members', 'loans', 'loan_emi_list', 'emiInfo'))->render()]);
    }

    public function fetchEmiList(Request $request)
    {

        $loanEmiQuery = MemberLoan::query();
        if ($request->member_id) {
            $loanEmiQuery->where('member_id', $request->member_id);
        }

        if ($request->loan_id) {
            $loanEmiQuery->where('loan_id', $request->loan_id);
        }

        $loan_emi_list = $loanEmiQuery->paginate(10, ['*'], 'page', $request->page);
        $members = Member::orderBy('id', 'asc')->get();
        $loans = Loan::where('status', 1)->get();
        $emiInfo = true;
        // Return the partial view with the data
        if ($request->ajax()) {
            return response()->json([
                'view' => view('frontend.members.loan.emi-info-table', compact('loan_emi_list', 'members', 'loans', 'emiInfo'))->render()
            ]);
        }
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

    // public function deleteMember($id)
    // {
    //     $delete_member = Member::where('id', $id)->first();
    //     $delete_member->delete();

    //     return redirect()
    //         ->route('members.index')
    //         ->with('message', 'Member deleted successfully');
    // }

    public function getMemberGradePay(Request $request)
    {
        $grade_pay = GradePay::where('pay_level', $request->pm_level)->where('status', 1)->first() ?? '';
        $basic_pays = PayMatrixBasic::where('pm_level_id', $request->pm_level)->where('status', 1)->get() ?? '';
        $quarter = '';
        if ($grade_pay != null) {
            $quarter = Quater::where('grade_pay_id', $grade_pay->id)->first() ?? '';
        }
        $payBand = PmLevel::where('id', $request->pm_level)->where('status', 1)->orderBy('id', 'desc')->with('payBand')->first() ?? '';
        $pm_index = PmIndex::where('pm_level_id', $request->pm_level)->where('status', 1)->first();

        $quarter = Quater::where('grade_pay_id', $grade_pay->id)->where('status', 1)->first() ?? '';

        return response()->json(['grade_pay' => $grade_pay, 'quarter' => $quarter, 'basic_pays' => $basic_pays, 'pm_index' => $pm_index, 'payBand' => $payBand]);
    }

    public function getmemberCgegisvalue(Request $request)
    {
        $designations = Designation::where('group_id', $request->group)->get() ?? '';
        $cgegis_value = Cgegis::where('group_id', $request->group)->where('status', 1)->first() ?? '';
        return response()->json(['cgegis_value' => $cgegis_value, 'desigs' => $designations]);
    }



    public function getmemberCategoryValue(Request $request)
    {
        $get_designation = Designation::where('designation_type_id', $request->desig)->first();
        $category_value = Category::where('id', $get_designation->category_id)->where('status', 1)->first();
        $payband_type = PaybandType::where('id', $get_designation->payband_type_id)->first();
        $section = DesignationType::where('id', $get_designation->designation_type_id)->with('section')->first();

        return response()->json(['category_value' => $category_value, 'payband_type' => $payband_type, 'section' => $section]);
    }

    public function memberCreditDaPercentage(Request $request)
    {
        // $da_percentage = DearnessAllowancePercentage::where('is_active', 1)->first();
        // $member = Member::where('id', $request->memberID)->first();
        // $hra_percentage = 0;
        // if ($member->cities) {
        //     $hra_percentage = Hra::where('city_category', $member->cities->city_type)->where('status', 1)->first();
        // }
        // $member_expectation_hra = MemberExpectation::where('member_id', $request->memberID)->where('rule_name', 'HRA')->where('percent', '!=', 0)->first();
        // if ($member_expectation_hra) {
        //     $hra_percentage->percentage = $member_expectation_hra->percent;
        // }
        // $tptAmount = 0;
        // $tptDaAmount = 0;
        // if ($member->cities && $member->cities->tpt_type) {
        //     $tptAmount = Tpta::where('tpt_type', $member->cities->tpt_type)->where('pay_level_id', $member->pm_level)->where('status', 1)->first();
        //     $tptDaAmount = ($tptAmount->tpt_allowance) / 2;
        // }
        // $member_expectation_tpt = MemberExpectation::where('member_id', $request->memberID)->where('rule_name', 'TPT')->first();
        // if ($member_expectation_tpt) {
        //     $tptAmount->tpt_allowance = $member_expectation_tpt->amount;
        //     $tptdaec = $member_expectation_tpt->amount;
        //     $tptDaAmount = ($tptdaec) / 2; // 50% of the allowance
        // }
        // $basicPay = $request->basicPay;
        // $member_expectation_da = MemberExpectation::where('member_id', $request->memberID)->where('rule_name', 'DA')->first();
        // if ($member_expectation_da) {
        //     $daAmount = $member_expectation_da->amount;
        // } else {
        //     $daAmount = $da_percentage ? ($basicPay * $da_percentage->percentage) / 100 : 0;
        // }

        // $member_expectation_hra_amt = MemberExpectation::where('member_id', $request->memberID)->where('rule_name', 'HRA')->where('amount', '!=', 0)->first();
        // if ($member_expectation_hra_amt) {
        //     $hraAmount = $member_expectation_hra_amt->amount;
        // } else {
        //     $hraAmount = $hra_percentage ? ($basicPay * $hra_percentage->percentage) / 100 : 0;
        // }

        $member = Member::where('id', $request->memberID)->first();

        $member_credit = MemberMonthlyDataCredit::where('member_id', $request->memberID)->where('month', $request->current_month)->orderBy('id', 'desc')->first() ?? '';

        $daAmount = $member_credit->da ?? 0;
        $hraAmount = $member_credit->hra ?? 0;
        $tptAmount = $member_credit->tpt ?? 0;
        $tptDaAmount = $member_credit->da_on_tpt ?? 0;

        return response()->json([
            'daAmount' => $daAmount,
            'hraAmount' => $hraAmount,
            'tptAmount' => $tptAmount,
            'tptDa' => $tptDaAmount ?? 0,
        ]);
    }



    public function memberDebitEducationCess(Request $request)
    {

        // check under range of tax
        $tax_rate = IncomeTax::where('lower_slab_amount', '<=', $request->i_tax)
            ->where('higher_slab_amount', '>=', $request->i_tax)
            ->first();

        $edu_cess_rate = $tax_rate->edu_cess_rate;
        $edu_cal = round(($request->i_tax * $edu_cess_rate) / 100);

        return response()->json(['edu_cal' => $edu_cal]);
    }

    public function checkEolHplCcl(Request $request)
    {
        // dd($request->all());

        $member = Member::where('id', $request->memberID)->first();
        $member_leaves = MemberLeave::where('member_id', $request->memberID)->with('leaveType')->get();
        // Check if member has EOL or HPL
        $hasEOL = false;
        $hasHPL = false;
        $hasCCL = false;
        $cclDays = 0;
        $result = [];
        $total_deduction = 0;
        $cclDeduction = 0;

        foreach ($member_leaves as $leave) {
            $result[$leave->leave_type_id]['leave_name'] = $leave->leaveType->leave_type_abbr;

            if ($result[$leave->leave_type_id]['leave_name'] === 'EOL') {
                $hasEOL = true;
            }
            if ($result[$leave->leave_type_id]['leave_name'] === 'HPL') {
                $hasHPL = true;
            }
            if ($result[$leave->leave_type_id]['leave_name'] === 'CCL') {
                $hasCCL = true;
                $cclDays += $leave->no_of_days;
            }
            if (($hasEOL) || ($hasHPL)) {
                // check if member has nps
                $coreInfo = MemberMonthlyDataCoreInfo::where('member_id', $request->memberID)->where('month', $request->current_month)->where('year', $request->current_year)->orderBy('id', 'desc')->first();
                $nps = $coreInfo->pran_no ?? null;

                $no_of_days = $leave->no_of_days;
                $startDate = new \DateTime($leave->start_date);
                $endDate = new \DateTime($leave->end_date);

                // extract the month and year from the start date and end date
                $startMonth = $startDate->format('m');
                $startYear = $startDate->format('Y');
                $endMonth = $endDate->format('m');
                $endYear = $endDate->format('Y');

                // check if the start date and end date are in the same month and year
                if ($startMonth === $endMonth && $startYear === $endYear) {
                    $result[$leave->leave_type_id]['no_of_days'] = $leave->no_of_days;

                    // calculate the number of days in the month
                    $result[$leave->leave_type_id]['daysInMonth'] = cal_days_in_month(CAL_GREGORIAN, $startMonth, $startYear);

                    //calculate EOL/HPL deduction
                    $basic = $member->basic;
                    $da = $member->da;

                    $result[$leave->leave_type_id]['eolHplDeduction'] = formatIndianCurrency((float)((($basic + $da) * $result[$leave->leave_type_id]['no_of_days']) / $result[$leave->leave_type_id]['daysInMonth']), 2);

                    if ($nps != null) {
                        $npsDeductionown = round(($result[$leave->leave_type_id]['eolHplDeduction'] * 10) / 100);
                        $npsDeductionGovt = round(($result[$leave->leave_type_id]['eolHplDeduction'] * 14) / 100);
                        $result[$leave->leave_type_id]['npsDeductionown'] = $npsDeductionown;
                        $result[$leave->leave_type_id]['npsDeductionGovt'] = $npsDeductionGovt;
                    }
                } else {
                    // calculate the number of days in each month
                    $result[$leave->leave_type_id]['startDay'] = $startDate->format('d');
                    $result[$leave->leave_type_id]['endDay'] = $endDate->format('d');
                    $result[$leave->leave_type_id]['daysInStartMonth'] = cal_days_in_month(CAL_GREGORIAN, $startMonth, $startYear);
                    $result[$leave->leave_type_id]['daysInEndMonth'] = cal_days_in_month(CAL_GREGORIAN, $endMonth, $endYear);

                    // calculate leave days per month according to the start and end date and no of days if 30 or 31

                    $result[$leave->leave_type_id]['leaveDaysInStartMonth'] = $result[$leave->leave_type_id]['daysInStartMonth'] - $result[$leave->leave_type_id]['startDay'] + 1;
                    $result[$leave->leave_type_id]['leaveDaysInEndMonth'] = $result[$leave->leave_type_id]['endDay'];

                    // calculation for EOL/HPL deduction
                    $basic = $member->basic;
                    $da = $member->da;

                    $startmonthDeduction = (($basic + $da) * $result[$leave->leave_type_id]['leaveDaysInStartMonth']) / $result[$leave->leave_type_id]['daysInStartMonth'];
                    $endmonthDeduction = (($basic + $da) * $result[$leave->leave_type_id]['leaveDaysInEndMonth']) / $result[$leave->leave_type_id]['daysInEndMonth'];

                    $result[$leave->leave_type_id]['eolHplDeduction'] = formatIndianCurrency((float)($startmonthDeduction + $endmonthDeduction), 2);
                }
                $total_deduction += floatval(str_replace(',', '', $result[$leave->leave_type_id]['eolHplDeduction']));
            } elseif ($hasCCL) {
                $totalDaysCCL = $cclDays;
                $basic = $member->basic;
                $da = $member->da;

                if ($totalDaysCCL > 365) {
                    // Apply 20% deduction if CCL days exceed 365
                    // $salary = $basic + $da;
                    $cclDeduction = formatIndianCurrency((float)($basic * 0.20), 2);
                    // $total_deduction += floatval(str_replace(',', '', $cclDeduction));
                }
            }
            // dd($total_deduction);
        }


        return response()->json(['result' => $result, 'total_deduction' => $total_deduction, 'ccldeduction' => $cclDeduction]);
    }

    public function memberBankIfsc(Request $request)
    {
        $get_ifsc = Bank::where('id', $request->bank_id)->first();
        return response()->json(['ifsc' => $get_ifsc]);
    }

    public function memberExpRuleDetail(Request $request)
    {
        $get_rule_detail = Rule::where('id', $request->rule_id)->first();
        return response()->json(['data' => $get_rule_detail]);
    }

    public function importMembers()
    {
        $members = Member::orderBy('id', 'asc')->get();


        return view('frontend.members.import-member', compact('members'));
    }

    public function downloadImportFormatFile()
    {
        // $filePath = storage_path('app/public/members_format.xlsx');
        // new format
        $filePath = storage_path('app/public/Members_Import_Format.xlsx');

        if (!file_exists($filePath)) {
            return back()->with('error', 'Template file not found.');
        }

        return response()->download($filePath, 'members_import_format.xlsx');
    }

    public function importExcelData(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            // Import the file with the updated multi-sheet importer
            $import = new MembersImport();
            $import->import($request->file('import_file'));

            session()->flash('message', 'Members imported successfully');

            return redirect()
                ->route('members.index')
                ->with('message', 'Members imported successfully');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errorMessage = 'Validation error in import: ';
            foreach ($failures as $failure) {
                $errorMessage .= 'Row: ' . $failure->row() . ', ' . implode(',', $failure->errors()) . '; ';
            }
            return back()->with('error', $errorMessage);
        } catch (\Exception $e) {
            \Log::error('Excel import error: ' . $e->getMessage() . ' - ' . $e->getTraceAsString());
            return back()->with('error', 'Error importing file: ' . $e->getMessage());
        }
    }

    // public function deleteMember($id)
    // {
    //     $delete_member = Member::where('id', $id)->first();
    //     $delete_member->delete();

    //     return redirect()
    //         ->route('members.index')
    //         ->with('message', 'Member deleted successfully');
    // }

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

            if (Schema::hasColumn('member_monthly_data_core_infos', 'member_id')) {
                MemberMonthlyDataCoreInfo::where('member_id', $id)->delete();
            }

            if (Schema::hasColumn('member_monthly_data_expectations', 'member_id')) {
                MemberMonthlyDataExpectation::where('member_id', $id)->delete();
            }

            if (Schema::hasColumn('member_monthly_data_loan_infos', 'member_id')) {
                MemberMonthlyDataLoanInfo::where('member_id', $id)->delete();
            }

            if (Schema::hasColumn('member_monthly_data_credits', 'member_id')) {
                MemberMonthlyDataCredit::where('member_id', $id)->delete();
            }

            if (Schema::hasColumn('member_monthly_data_debits', 'member_id')) {
                MemberMonthlyDataDebit::where('member_id', $id)->delete();
            }

            if (Schema::hasColumn('member_monthly_data_var_infos', 'member_id')) {
                MemberMonthlyDataVarInfo::where('member_id', $id)->delete();
            }

            if (Schema::hasColumn('member_monthly_data_recoveries', 'member_id')) {
                MemberMonthlyDataRecovery::where('member_id', $id)->delete();
            }

            if (Schema::hasColumn('member_monthly_data_policy_info', 'member_id')) {
                MemberMonthlyDataPolicyInfo::where('member_id', $id)->delete();
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
                ->route('members.index')
                ->with('message', 'Member deleted successfully');
        } else {
            return response()->json(['message' => 'Member not found'], 404);
        }
    }

    // member store all data after new member create
    public function memberStoreAllData($id)
    {
        $member = Member::where('id', $id)->first();
        if (!$member) {
            return redirect()->route('members.index')->with('error', 'Member not found');
        }

        // 1. Credit data update - Calculate various allowances
        $da_percentage = DearnessAllowancePercentage::where('is_active', 1)->first();
        $basicPay = $member->basic;
        $daAmount = $da_percentage ? round(($basicPay * $da_percentage->percentage) / 100) : 0;

        // HRA calculation based on city category
        $hraAmount = 0;
        if ($member->member_city) {
            $city = City::find($member->member_city);
            if ($city) {
                $hraPercentage = Hra::where('city_category', $city->city_type)
                    ->where('status', 1)
                    ->first();
                $hraAmount = $hraPercentage ? round(($basicPay * $hraPercentage->percentage) / 100) : 0;
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
                    $tptDa = round($tptAmount * $da_percentage->percentage / 100);
                }
            }
        }


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

        // dd($member_personal_data);

        MemberPersonalInfo::updateOrCreate(
            ['member_id' => $member->id],
            $member_personal_data
        );





        $npsc = 0;
        if (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'NPS') {
            $npsc = round((($basicPay + $daAmount) * 14) / 100);
        }

        $upsc = 0;
        if (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'UPS') {
            $upsc = round((($basicPay + $daAmount) * 10) / 100);
        }

        $member_credit_data_monthly = [
            'month' => date('m'),
            'year' => date('Y'),
            'apply_date' => date('Y-m-d'),
            'member_id' => $member->id,
            'pay' => $member->basic,
            'da' => $daAmount,
            'tpt' => $tptAmount,
            'cr_rent' => 0,
            'g_pay' => $member->g_pay,
            'hra' => $hraAmount,
            'da_on_tpt' => $tptDa,
            'cr_elec' => 0,
            'fpa' => 0,
            's_pay' => 0,
            'pua' => 0,
            'hindi' => 0,
            'cr_water' => 0,
            'add_inc2' => 0,
            'npa' => 0,
            'deptn_alw' => 0,
            'npsc' => $npsc,
            'upsc_10' => $upsc,
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
            'tot_credits' => $basicPay + $daAmount + $tptAmount + $tptDa + $hraAmount + $member->g_pay + $npsc + $upsc,
            'remarks' => null,
        ];

        $member_credit_monthly = MemberMonthlyDataCredit::updateOrCreate(
            ['member_id' => $member->id],
            $member_credit_data_monthly
        );

        $member_credit_data = [
            'member_id' => $member->id,
            'pay' => $member->basic,
            'da' => $daAmount,
            'tpt' => $tptAmount,
            'cr_rent' => 0,
            'g_pay' => $member->g_pay,
            'hra' => $hraAmount,
            'da_on_tpt' => $tptDa,
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
            'remarks' => null
        ];

        $member_credit = MemberCredit::updateOrCreate(
            ['member_id' => $member->id],
            $member_credit_data
        );

        // 2. Debit data update - Calculate various deductions
        $deductionsTotal = 0;


        $gpfDeduction = 0;
        if ($member->memberCategory->fund_type == 'GPF') {
            $gpfDeduction = round(($basicPay + $daAmount) * 10 / 100);
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

        $cghsDeduction = 0;
        if ($member->pm_level) {
            $cgaData = Cghs::where('pay_level_id', $member->pm_level)->first();
            if ($cgaData) {
                $cghsDeduction = $cgaData->contribution;
                $deductionsTotal += $cghsDeduction;
            }
        }

        $npsg = 0;
        $nps_10_rec = 0;
        if (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'NPS') {
            $npsg = round((($basicPay + $daAmount) * 14) / 100);
            $deductionsTotal += $npsg;
            $nps_10_rec = round((($basicPay + $daAmount) * 10) / 100);
            $deductionsTotal += $nps_10_rec;
        }


        $ups_10_per_rec = 0;
        $upsg_10_per = 0;
        if (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'UPS') {
            $ups_10_per_rec = round((($basicPay + $daAmount) * 10) / 100);
            $deductionsTotal += $ups_10_per_rec;
            $upsg_10_per = round((($basicPay + $daAmount) * 10) / 100);
            $deductionsTotal += $upsg_10_per;
        }

        $member_debit_data_monthly = [
            'month' => date('m'),
            'year' => date('Y'),
            'apply_date' => date('Y-m-d'),
            'member_id' => $member->id,
            'gpa_sub' => $gpfDeduction,
            // 'nps_sub' => $npsSubTotal,
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
            'cghs' => $cghsDeduction,
            'ptax' => 0,
            // 'cmg' => $npsGMCTotal,
            'pli' => 0,
            'scooter' => 0,
            'tpt_rec' => 0,
            'licence_fee' => 0,

            'tot_debits' => $deductionsTotal,
            'net_pay' => ($basicPay + $daAmount + $tptAmount + $tptDa + $hraAmount + $member->g_pay + $npsc + $upsc) - $deductionsTotal,
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
            // 'society' => 0,
            'arrear_pay' => 0,

            'npsg' => $npsg,
            'npsg_arr' => 0,
            'npsg_adj' => 0,
            'nps_10_rec' => $nps_10_rec,
            'nps_10_arr' => 0,
            'nps_14_adj' => 0,

            'ups_10_per_rec' => $ups_10_per_rec,
            'upsg_10_per' => $upsg_10_per,
            'upsg_arr_10_per' => 0,
            'ups_adj_10_per' => 0,
            'upsg_adj_10_per' => 0,

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
            // 'ltc_rec' => 0,
            // 'medical_rec' => 0,
            // 'tada_rec' => 0,
            'remarks' => null
        ];

        $member_debit_monthly = MemberMonthlyDataDebit::updateOrCreate(
            ['member_id' => $member->id],
            $member_debit_data_monthly
        );

        $member_debit_data = [
            'member_id' => $member->id,
            'gpa_sub' => round($gpfDeduction),
            // 'nps_sub' => round($npsSubTotal),
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
            'cgegis' => round($cgegisDeduction),
            'cda' => 0,
            'furn' => 0,
            'furn_arr' => 0,
            'car' => 0,
            'hra_rec' => 0,
            'cghs' => round($cghsDeduction),
            'ptax' => 0,
            // 'cmg' => round($npsGMCTotal),
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
            // 'society' => 0,
            'arrear_pay' => 0,
            'npsg' => 0,
            'npsg_arr' => 0,
            'npsg_adj' => 0,
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
            // 'ltc_rec' => 0,
            // 'medical_rec' => 0,
            // 'tada_rec' => 0,
            'remarks' => null
        ];

        $member_debit = MemberDebit::updateOrCreate(
            ['member_id' => $member->id],
            $member_debit_data
        );

        // 3. Recovery data - variable increments
        $pmLevelData = PmLevel::find($member->pm_level);
        if ($pmLevelData && $pmLevelData->var_incr > 0 && $pmLevelData->noi > 0) {
            $recovery_data_monthly = [
                'month' => date('m'),
                'year' => date('Y'),
                'apply_date' => date('Y-m-d'),
                'member_id' => $member->id,
                'v_incr' => $pmLevelData->var_incr,
                'noi' => $pmLevelData->noi,
                'noi_pending' => $pmLevelData->noi,
                'total' => $pmLevelData->var_incr * $pmLevelData->noi,
                'stop' => NULL
            ];

            $member_recovery_monthly = MemberMonthlyDataVarInfo::updateOrCreate(
                ['member_id' => $member->id],
                $recovery_data_monthly
            );

            $recovery_data = [
                'member_id' => $member->id,
                'v_incr' => $pmLevelData->var_incr,
                'noi' => $pmLevelData->noi,
                'noi_pending' => $pmLevelData->noi,
                'total' => $pmLevelData->var_incr * $pmLevelData->noi,
                'stop' => NULL
            ];

            $member_recovery = MemberRecovery::updateOrCreate(
                ['member_id' => $member->id],
                $recovery_data
            );
        }

        // get med_ins and wel_sub from personal info
        $medIns = 0;
        $welSub = 0;
        $category = Category::where('id', $member->category)->first();

        if ($category) {

            $member_pg = Member::where('id', $member->id)->first()->pg;
            if ($member_pg == 1) {
                $medIns = 0;
            } else {
                $medIns = $category->med_ins ?? 0;;
            }

            $welSub = $category->wel_sub ?? 0;
        }

        $wel_rec = 0;

        // if (in_array($category->category, ['CGO NPS', 'CGO GPF', 'CGO DEP'])) {
        //     $wel_rec = 20;
        // } elseif (in_array($category->category, ['NIE NPS', 'NIE'])) {
        //     $wel_rec = 10;
        // }

        // 4. Original recovery data
        $member_org_recovery_data_monthly = [
            'month' => date('m'),
            'year' => date('Y'),
            'apply_date' => date('Y-m-d'),
            'member_id' => $member->id,
            'ccs_sub' => 0,
            'mess' => 0,
            'security' => 0,
            'misc1' => 0,
            'ccs_rec' => 0,
            'asso_fee' => 0,
            'dbf' => 0,
            'misc2' => 0,
            'wel_sub' => $welSub,
            'ben' => 0,
            'med_ins' => $medIns,
            'tot_rec' => 0,
            'wel_rec' => $wel_rec,
            'hdfc' => 0,
            'maf' => 0,
            'final_pay' => 0,
            'lic' => 0,
            'cort_atch' => 0,
            'ogpf' => 0,
            'ntp' => 0,
            'ptax' => 200,
            'remarks' => null
        ];

        $member_org_recovery_monthly = MemberMonthlyDataRecovery::updateOrCreate(
            ['member_id' => $member->id],
            $member_org_recovery_data_monthly
        );

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
            'wel_sub' => $welSub,
            'ben' => 0,
            'med_ins' => $medIns,
            'tot_rec' => 0,
            'wel_rec' => $wel_rec,
            'hdfc' => 0,
            'maf' => 0,
            'final_pay' => 0,
            'lic' => 0,
            'cort_atch' => 0,
            'ogpf' => 0,
            'ntp' => 0,
            'ptax' => 200,
            'remarks' => null
        ];

        $member_org_recovery = MemberOriginalRecovery::updateOrCreate(
            ['member_id' => $member->id],
            $member_org_recovery_data
        );

        // 5. Core info data
        $member_core_data_monthly = [
            'month' => date('m'),
            'year' => date('Y'),
            'apply_date' => date('Y-m-d'),
            'member_id' => $member->id,
            'bank_acc_no' => '',
            'ccs_mem_no' => '',
            'fpa' => 0,
            'bank' => null,
            'gpf_sub' => $member->memberCategory->fund_type == 'GPF' ? round(($basicPay * 10 / 100)) : 0,
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

        $member_core_monthly = MemberMonthlyDataCoreInfo::updateOrCreate(
            ['member_id' => $member->id],
            $member_core_data_monthly
        );

        $member_core_data = [
            'member_id' => $member->id,
            'bank_acc_no' => '',
            'ccs_mem_no' => '',
            'fpa' => 0,
            'bank' => null,
            'gpf_sub' => $member->memberCategory->fund_type == 'GPF' ? round($basicPay * 10 / 100) : 0,
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


        $member_monthly_data = new MemberMonthlyData();
        $member_monthly_data->member_id = $member->id;
        $member_monthly_data->month =  date('m');
        $member_monthly_data->year = date('Y');
        $member_monthly_data->apply_date = date('Y-m-d');
        $member_monthly_data->save();
    }
}
