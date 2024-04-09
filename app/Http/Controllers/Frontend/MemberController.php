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
use App\Models\MemberCredit;
use App\Models\MemberDebit;
use App\Models\MemberRecovery;
use App\Models\MemberCoreInfo;
use App\Models\MemberPersonalInfo;
use App\Models\Bank;
use App\Models\Loan;
use App\Models\MemberLoanInfo;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $members = Member::orderBy('id', 'desc')->with('designation')->paginate(10);
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
        $member = Member::with('designation','divisions','groups')->where('id',$id)->first();
        $member_credit = MemberCredit::where('member_id',$id)->orderBy('id','desc')->first() ?? '';
        $member_debit = MemberDebit::where('member_id',$id)->orderBy('id','desc')->first() ?? '';
        $member_recovery = MemberRecovery::where('member_id',$id)->orderBy('id','desc')->first() ?? '';
        $member_core = MemberCoreInfo::where('member_id',$id)->orderBy('id','desc')->first() ?? '';
        $member_personal = MemberPersonalInfo::where('member_id',$id)->orderBy('id','desc')->first() ?? '';
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
        $banks = Bank::orderBy('id', 'desc')->get();
        $loans = Loan::orderBy('id', 'desc')->get();


        $members_loans_info = MemberLoanInfo::where('member_id',$id)->orderBy('id','desc')->get();

        return view('frontend.members.edit',compact('member','member_credit','member_debit','member_recovery','banks','member_core','member_personal','cadres','exServices','paybands','quaters','pgs','pmLevels','designations','pmIndexes','cgegises','categories','loans','members_loans_info'));
    }

    public function memberCreditUpdate(Request $request)
    {
        //validation 
        $validated = $request->validate([
            'pay' => 'required',
            // 'da' => 'required',
            // 'tpt' => 'required',
            // 'cr_rent' => 'required',
            // 'g_pay' => 'required',
            // 'hra' => 'required',
            // 'da_on_tpt' => 'required',
            // 'cr_elec' => 'required',
            // 'fpa' => 'required',
            // 's_pay' => 'required',
            // 'hindi' => 'required',
            // 'cr_water' => 'required',
            // 'add_inc2' => 'required',
            // 'npa' => 'required',
            // 'deptn_alw' => 'required',
            // 'misc_1' => 'required',
            // 'var_incr' => 'required',
            // 'wash_alw' => 'required',
            // 'dis_alw' => 'required',
            // 'misc_2' => 'required',
            // 'risk_alw' => 'required',
            // 'tot_credits' => 'required',
            // 'remarks' => 'required',
        ]);

        $check_credit_member = MemberCredit::where('member_id',$request->member_id)->get();
        if(count($check_credit_member) > 0)
        {
            $update_credit_member = MemberCredit::where('member_id',$request->member_id)->first();
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
            $update_credit_member->tot_credits = $request->tot_credits;
            $update_credit_member->remarks = $request->remarks;
            $update_credit_member->update();

            // session()->flash('message', 'Member credit updated successfully');
            return response()->json(['message' => 'Member credit updated successfully']);
        }else{
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
            $member_credit->tot_credits = $request->tot_credits;
            $member_credit->remarks = $request->remarks;
            $member_credit->save();


            // session()->flash('message', 'Member credit added successfully');
            return response()->json(['message' => 'Member credit added successfully']);

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
       
      
        $check_debit_member = MemberDebit::where('member_id',$request->member_id)->get();
        if(count($check_debit_member) > 0)
        {
            $update_debit_member = MemberDebit::where('member_id',$request->member_id)->first();
            $update_debit_member->gpa_sub = $request->gpa_sub;
            $update_debit_member->eol = $request->eol;
            $update_debit_member->rent = $request->rent;
            $update_debit_member->lf_arr = $request->lf_arr;
            $update_debit_member->tada = $request->tada;
            $update_debit_member->hba = $request->hba;
            $update_debit_member->misc1 = $request->misc1;
            $update_debit_member->gpf_rec = $request->gpf_rec;
            $update_debit_member->i_tax = $request->i_tax;
            $update_debit_member->elec = $request->elec;
            $update_debit_member->elec_arr = $request->elec_arr;
            $update_debit_member->medi = $request->medi;
            $update_debit_member->pc = $request->pc;
            $update_debit_member->misc2 = $request->misc2;
            $update_debit_member->gpf_arr = $request->gpf_arr;
            $update_debit_member->ecess = $request->ecess;
            $update_debit_member->water = $request->water;
            $update_debit_member->water_arr = $request->water_arr;
            $update_debit_member->ltc = $request->ltc;
            $update_debit_member->fadv = $request->fadv;
            $update_debit_member->misc3 = $request->misc3;
            $update_debit_member->cgegis = $request->cgegis;
            $update_debit_member->cda = $request->cda;
            $update_debit_member->furn = $request->furn;
            $update_debit_member->furn_arr = $request->furn_arr;
            $update_debit_member->car = $request->car;
            $update_debit_member->hra_rec = $request->hra_rec;
            $update_debit_member->tot_debits = $request->tot_debits;
            $update_debit_member->cghs = $request->cghs;
            $update_debit_member->ptax = $request->ptax;
            $update_debit_member->cmg = $request->cmg;
            $update_debit_member->pli = $request->pli;
            $update_debit_member->scooter = $request->scooter;
            $update_debit_member->tpt_rec = $request->tpt_rec;
            $update_debit_member->net_pay = $request->net_pay;
            $update_debit_member->basic = $request->basics;
            $update_debit_member->remarks = $request->remarks;
            $update_debit_member->update();

            // session()->flash('message', 'Member debit updated successfully');
            return response()->json(['message' => 'Member debit updated successfully']);

        }else{
            
            $debit_member = new MemberDebit();
            $debit_member->member_id = $request->member_id;
            $debit_member->gpa_sub = $request->gpa_sub;
            $debit_member->eol = $request->eol;
            $debit_member->rent = $request->rent;
            $debit_member->lf_arr = $request->lf_arr;
            $debit_member->tada = $request->tada;
            $debit_member->hba = $request->hba;
            $debit_member->misc1 = $request->misc1;
            $debit_member->gpf_rec = $request->gpf_rec;
            $debit_member->i_tax = $request->i_tax;
            $debit_member->elec = $request->elec;
            $debit_member->elec_arr = $request->elec_arr;
            $debit_member->medi = $request->medi;
            $debit_member->pc = $request->pc;
            $debit_member->misc2 = $request->misc2;
            $debit_member->gpf_arr = $request->gpf_arr;
            $debit_member->ecess = $request->ecess;
            $debit_member->water = $request->water;
            $debit_member->water_arr = $request->water_arr;
            $debit_member->ltc = $request->ltc;
            $debit_member->fadv = $request->fadv;
            $debit_member->misc3 = $request->misc3;
            $debit_member->cgegis = $request->cgegis;
            $debit_member->cda = $request->cda;
            $debit_member->furn = $request->furn;
            $debit_member->furn_arr = $request->furn_arr;
            $debit_member->car = $request->car;
            $debit_member->hra_rec = $request->hra_rec;
            $debit_member->tot_debits = $request->tot_debits;
            $debit_member->cghs = $request->cghs;
            $debit_member->ptax = $request->ptax;
            $debit_member->cmg = $request->cmg;
            $debit_member->pli = $request->pli;
            $debit_member->scooter = $request->scooter;
            $debit_member->tpt_rec = $request->tpt_rec;
            $debit_member->net_pay = $request->net_pay;
            $debit_member->basic = $request->basic;
            $debit_member->remarks = $request->remarks;
            $debit_member->save();

            // session()->flash('message', 'Member debit added successfully');
            return response()->json(['message' => 'Member debit added successfully']);
        }
    }

    public function memberRecoveryUpdate(Request $request)
    {
        //validation 
        // $validated = $request->validate([
        //     'v_incr' => 'required',
        //     'noi' => 'required',
        //     'total' => 'required',
        //     'stop' => 'required',
           
        // ]);

        $check_recovery_member = MemberRecovery::where('member_id',$request->member_id)->get();
        if(count($check_recovery_member) > 0)
        {
            $update_recovery_member = MemberRecovery::where('member_id',$request->member_id)->first();
            $update_recovery_member->v_incr = $request->v_incr;
            $update_recovery_member->noi = $request->noi;
            $update_recovery_member->total = $request->total;
            $update_recovery_member->stop = $request->stop;
            $update_recovery_member->update();  
        }else{
            $recovery_member = new MemberRecovery();
            $recovery_member->member_id = $request->member_id;
            $recovery_member->v_incr = $request->v_incr;
            $recovery_member->noi = $request->noi;
            $recovery_member->total = $request->total;
            $recovery_member->stop = $request->stop;
            $recovery_member->save();
        }

        // session()->flash('message', 'Member recovery updated successfully');
        
        return response()->json(['message' => 'Member recovery updated successfully']);
    }
    public function memberRecoveryDelete(Request $request)
    {
        
        $delete_recovery = MemberRecovery::where('id',$request->id)->first();
        $delete_recovery->delete();
        
        session()->flash('message', 'Member recovery delete successfully');
        return response()->json(['message' => 'Member recovery delete successfully']);

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

        $check_core_member = MemberCoreInfo::where('member_id',$request->member_id)->get();
        if(count($check_core_member) > 0)
        {
            $update_core_member = MemberCoreInfo::where('member_id',$request->member_id)->first();
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
            $update_core_member->update();
        }else{
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
            $core_member->save();
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

        $check_personal_member = MemberPersonalInfo::where('member_id',$request->member_id)->get();
        if(count($check_personal_member) > 0)
        {
            $update_personal_member = MemberPersonalInfo::where('member_id',$request->member_id)->first();
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
            $update_personal_member->doj_service = $request->doj_service;
            $update_personal_member->quater_no = $request->quater_no;
            $update_personal_member->dop = $request->dop;
            $update_personal_member->fund_type = $request->fund_type;
            $update_personal_member->cgegis = $request->cgegis;
            $update_personal_member->cgegis_text = $request->cgegis_text;
            $update_personal_member->pay_stop = $request->pay_stop;
            $update_personal_member->update();

            // session()->flash('message', 'Member personal info updated successfully');
            return response()->json(['message' => 'Member personal info updated successfully']);
        }else{

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
            $personal_member->doj_service = $request->doj_service;
            $personal_member->quater_no = $request->quater_no;
            $personal_member->dop = $request->dop;
            $personal_member->fund_type = $request->fund_type;
            $personal_member->cgegis = $request->cgegis;
            $personal_member->cgegis_text = $request->cgegis_text;
            $personal_member->pay_stop = $request->pay_stop;
            $personal_member->save();

            // session()->flash('message', 'Member personal info added successfully');  
            return response()->json(['message' => 'Member personal info added successfully']);
        }
            

    } 

    public function memberLoanInfoStore(Request $request)
    {
        $loan_detail = Loan::where('id',$request->loan_name)->first() ?? '';

        $loan_info = new MemberLoanInfo;
        $loan_info->member_id = $request->member_id;
        $loan_info->loan_id = $request->loan_name;
        $loan_info->loan_name = $loan_detail->loan_name;
        $loan_info->present_inst_no = $request->present_inst_no;
        $loan_info->tot_no_of_inst = $request->tot_no_of_inst;
        $loan_info->remark = $request->remark;
        $loan_info->inst_amount = $request->inst_amount;
        $loan_info->total_amount = $request->total_amount;
        $loan_info->balance = $request->balance;
        $loan_info->save();

         

        return response()->json(['message' => 'Member loan info added successfully', 'data' => $loan_info]);

    }

    public function memberLoanEdit($id)
    {
        
        $member_loan = MemberLoanInfo::find($id);
        $edit = true;
        $loans = Loan::orderBy('id', 'desc')->get();
        return response()->json(['view' => view('frontend.members.loan.form', compact('edit','member_loan','loans'))->render()]);
    }

    public function memberLoanUpdate(Request $request)
    {
        $loan_detail = Loan::where('id',$request->loan_name)->first() ?? '';

        $loan_info = MemberLoanInfo::where('id',$request->member_loan_id)->first();
        $loan_info->loan_id = $request->loan_name;
        $loan_info->loan_name = $loan_detail->loan_name;
        $loan_info->present_inst_no = $request->present_inst_no;
        $loan_info->tot_no_of_inst = $request->tot_no_of_inst;
        $loan_info->remark = $request->remark;
        $loan_info->inst_amount = $request->inst_amount;
        $loan_info->total_amount = $request->total_amount;
        $loan_info->balance = $request->balance;
        $loan_info->update();

        return response()->json(['message' => 'Member loan info updated successfully', 'data' => $loan_info]);
        
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
