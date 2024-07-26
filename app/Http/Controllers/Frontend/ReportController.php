<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberCoreInfo;
use App\Models\MemberCredit;
use App\Models\MemberDebit;
use App\Models\MemberRecovery;
use App\Models\MemberPolicyInfo;
use App\Models\MemberLoan;
use App\Models\MemberIncomeTax;
use App\Models\Group;
use Carbon\Carbon;

use App\Models\SiteLogo;
use App\Models\DearnessAllowancePercentage;
use Illuminate\Pagination\Paginator;
use PDF;
use App\Helpers\Helper;
use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\IncomeTax;
use App\Models\DebitVoucher;
use App\Models\Category;
use App\Models\DebitVoucherDetail;

class ReportController extends Controller
{
    //

    public function payslip()
    {
        $members = Member::where('e_status', '!=', 'retired')->where('e_status', '!=', 'transferred')->orderBy('id', 'desc')->get();
        return view('frontend.reports.payslip', compact('members'));
    }

    public function payslipGenerate(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        $member_data = Member::where('id', $request->member_id)->first() ?? '' ;
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->first() ?? '';
        $member_debit_data = MemberDebit::where('member_id', $request->member_id)->first() ?? '';
        $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first() ?? '';
        $member_recoveries_data = MemberRecovery::where('member_id', $request->member_id)->first() ?? '';
        $month = $request->month;
        $dateObj = \DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        $year = $request->year;
        $member_quarter_charge = ($member_debit_data->quarter_charges + $member_debit_data->elec + $member_debit_data->water + $member_debit_data->furn + $member_debit_data->misc2) ?? 0;
        
        
        $pdf = PDF::loadView('frontend.reports.payslip-generate', compact('member_data', 'member_credit_data', 'member_debit_data', 'member_core_info', 'monthName', 'year','member_quarter_charge'));
        return $pdf->download('payslip-' . $member_data->name . '-' . $monthName . '-' . $year . '.pdf');
    
    }

    // public function crv()
    // {
    //     $groups = Group::where('status', 1)->get()->chunk(2); // Fetch and chunk groups
    public function paybill()
    {
        return view('frontend.reports.paybill');
    }

    public function paybillGenerate(Request $request)
    {
        $request->validate([
            'month' => 'required',
            'year' => 'required',
        ]);

        $pay_bill_no = $request->year.'-'.'RCI-CHESS'.$request->month.$request->year.rand(1000,9999);
        $all_members_info = [];
        $member_datas = Member::where('e_status', '!=', 'retired')->where('e_status', '!=', 'transferred')->where('member_status',1)->orderBy('id','desc')->with('desigs')->get();
        foreach($member_datas as $member_data){
            $member_details['member_credit'] = MemberCredit::where('member_id', $member_data->id)->whereYear('created_at',$request->year)->whereMonth('created_at',$request->month)->first();
            $member_details['member_debit'] = MemberDebit::where('member_id', $member_data->id)->whereYear('created_at',$request->year)->whereMonth('created_at',$request->month)->first();
            $member_details['member_core_info'] = MemberCoreInfo::where('member_id', $member_data->id)->whereYear('created_at',$request->year)->whereMonth('created_at',$request->month)->with('banks')->first();
            $member_details['member_recovery'] = MemberRecovery::where('member_id', $member_data->id)->whereYear('created_at',$request->year)->whereMonth('created_at',$request->month)->first();
            $combined_member_info = [
                'member_data' => $member_data,
                'details' => $member_details
            ];

            $all_members_info[] = $combined_member_info;
        }
         // Split the data into chunks for pagination
        $perPage = 2; // Set this according to how many records fit on a page
        $groupedData = array_chunk($all_members_info, $perPage);

        // dd($all_members_info);
        $month =  date('F', mktime(0, 0, 0, $request->month, 10));
        $year = $request->year;
        $logo = SiteLogo::first() ?? null;
        $da_percent = DearnessAllowancePercentage::where('year', $year)->first();
        // dd($member_datas);
        $pdf = PDF::loadView('frontend.reports.paybill-generate', compact('pay_bill_no','month','year','logo','da_percent','all_members_info','groupedData'));
        
        return $pdf->download('paybill-' . $month . '-' . $year . '.pdf');
    }



    // public function crv()
    // {
    //     $groups = Group::where('status', 1)->get()->chunk(2); // Fetch and chunk groups

    //     $pdf = PDF::loadView('frontend.reports.test-crv', compact('groups'));
    //     return $pdf->download('document.pdf');
       
        
    //     // return view('frontend.reports.crv');
    // }

    public function plWithdrawl()
    {
        return view('frontend.reports.pl-withdrawl');
    }

    public function annualIncomeTaxReport()
    {
        $members = Member::where('e_status', '!=', 'retired')->where('e_status', '!=', 'transferred')->orderBy('id', 'desc')->get();
        $financialYears = Helper::getFinancialYears();
        return view('frontend.reports.income-tax-report', compact('members', 'financialYears'));
    }

    public function annualIncomeTaxReportGenerate(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'report_year' => 'required',
        ]);

        $memberId = $request->member_id;
        // $startOfYear = Carbon::now()->startOfYear();
        // $endOfYear = Carbon::now()->endOfYear();
        [$startYear, $endYear] = explode('-', $request->report_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        $yearMonths = [];
        $current = $startOfYear->copy();

        while ($current->lessThanOrEqualTo($endOfYear)) {
            $yearMonths[] = $current->format('M-y');
            $current->addMonth();
        }
        
        $member_data = Member::where('id', $memberId)->first();
        $member_credit_data = MemberCredit::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_debit_data = MemberDebit::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_core_info = MemberCoreInfo::where('member_id', $memberId)->first();
        $member_recoveries_data = MemberRecovery::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_policy_info = MemberPolicyInfo::where('member_id', $memberId)->sum('amount');
        $member_loan_info = MemberLoan::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->with('loan')->get();
        $member_it_exemption_info = MemberIncomeTax::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $incometaxRate = IncomeTax::where('financial_year', $request->report_year)->get();
        $year = $request->report_year;
        $months = $yearMonths;

        // create an array to store the result month wise
        $result = [];

        $total_credit = [
            'basic_pay' => 0,
            'g_pay' => 0,
            's_pay' => 0,
            'f_pay' => 0,
            'add_inc2' => 0,
            'var_incr' => 0,
            'da' => 0,
            'hra' => 0,
            'tpt' => 0,
            'wash_alw' => 0,
            'misc2' => 0,
            'ot' => 0,
            'total' => 0
        ];
        
        $total_debit = [
            'gpf' => 0,
            'cgegis' => 0,
            'cghs' => 0,
            'ptax' => 0,
            'hba' => 0,
            'pli' => 0,
            'eol' => 0,
            'hdfc' => 0,
            'misc1' => 0,
            'i_tax' => 0
        ];
        
        $total_policy = 0;
        $standard_deduction = 50000;
        $professional_update_allowance = 0;
        $ceaus = 0; $fixed_deposit = 0; $nsc = 0; $letOutProperty = 0; $pensionIncome = 0; $savingsInterest = 0;
        $ppf = 0; $otherBonds = 0; $nsc_ctd = 0; $hbaRefund = 0; $tutionFee = 0; $jeevanSuraksha = 0; $ulip = 0; $otherSavings = 0;
        $relief87A = 0; $relief89 = 0;

        foreach ($yearMonths as $month) {
            $result[$month]['credit'] = [
                'basic_pay' => 0,
                'g_pay' => 0,
                's_pay' => 0,
                'f_pay' => 0,
                'add_inc2' => 0,
                'var_incr' => 0,
                'da' => 0,
                'hra' => 0,
                'tpt' => 0,
                'wash_alw' => 0,
                'misc2' => 0,
                'ot' => 0,
                'total' => 0
            ];
            $result[$month]['debit'] = [
                'gpf' => 0,
                'cgegis' => 0,
                'cghs' => 0,
                'ptax' => 0,
                'hba' => 0,
                'pli' => 0,
                'eol' => 0,
                'hdfc' => 0,
                'misc1' => 0,
                'i_tax' => 0
            ];
            $result[$month]['policy'] = [
                'amount' => 0
            ];
            
            // Set the policy amount if available for the current month
            $result[$month]['policy']['amount'] = $member_policy_info[$month] ?? 0;
            $total_policy += $result[$month]['policy']['amount'];

            foreach ($member_credit_data as $credit) {
                if(Carbon::parse($credit->created_at)->format('M-y') == $month) {
                    $result[$month]['credit']['basic_pay'] += $credit->pay ?? 0;
                    $result[$month]['credit']['g_pay'] += $credit->g_pay ?? 0;
                    $result[$month]['credit']['s_pay'] += $credit->s_pay ?? 0;
                    $result[$month]['credit']['f_pay'] += $credit->f_pay ?? 0;
                    $result[$month]['credit']['add_inc2'] += $credit->add_inc2 ?? 0;
                    $result[$month]['credit']['var_incr'] += $credit->var_incr ?? 0;
                    $result[$month]['credit']['da'] += $credit->da ?? 0;
                    $result[$month]['credit']['hra'] += $credit->hra ?? 0;
                    $result[$month]['credit']['tpt'] += $credit->tpt ?? 0;
                    $result[$month]['credit']['wash_alw'] += $credit->wash_alw ?? 0;
                    $result[$month]['credit']['misc2'] += $credit->misc2 ?? 0;
                    $result[$month]['credit']['ot'] += $credit->ot ?? 0;
                }
            }

            // Calculate the total credit amount for the current month
            $result[$month]['credit']['total'] = array_sum($result[$month]['credit']);

            // Accumulate total credits for each field
            foreach ($result[$month]['credit'] as $key => $value) {
                $total_credit[$key] += $value;
            }

            foreach ($member_debit_data as $debit) {
                if(Carbon::parse($debit->created_at)->format('M-y') == $month) {
                    $result[$month]['debit']['gpf'] += $debit->gpa_sub ?? 0;
                    $result[$month]['debit']['cgegis'] += $debit->cgegis ?? 0;
                    $result[$month]['debit']['cghs'] += $debit->cghs ?? 0;
                    $result[$month]['debit']['ptax'] += $debit->ptax ?? 0;
                    $result[$month]['debit']['hba'] += $debit->hba ?? 0;
                    $result[$month]['debit']['pli'] += $debit->pli ?? 0;
                    $result[$month]['debit']['eol'] += $debit->eol ?? 0;
                    $result[$month]['debit']['hdfc'] += $debit->hdfc ?? 0;
                    $result[$month]['debit']['misc1'] += $debit->misc1 ?? 0;
                    $result[$month]['debit']['i_tax'] += $debit->i_tax ?? 0;
                }
            }

            // Accumulate total debits for each field
            foreach ($result[$month]['debit'] as $key => $value) {
                $total_debit[$key] += $value;
            }


        }
        $hbaInterest = 0;
        if($member_loan_info) {

            $member_loan_info->filter(function($memberLoan) {
                return $memberLoan->loan->loan_name === 'hba';
            })->sum(function($memberLoan) {
                return $memberLoan->interest_amount;
            });
        }
        
        // create an array to store exemption data for each exemption section
        $exemption_result = [];
        foreach ($member_it_exemption_info as $exemption) {
            $exemption_result[$exemption->section]['section'] = $exemption->section;
            $exemption_result[$exemption->section]['member_deduction'] = $exemption->member_deduction;
            $exemption_result[$exemption->section]['max_deduction'] = $exemption->max_deduction;
        }

        // total for member exemption
        $total_exemption = 0;
        foreach ($exemption_result as $exemption) {
            if(preg_match('/\b80\s*d\b/i', $exemption['section']) || preg_match('/\b80\s*d{2}\b/i', $exemption['section']) || preg_match('/\b80\s*ddb\b/i', $exemption['section']) || preg_match('/\b80\s*u\b/i', $exemption['section']) || preg_match('/\b80\s*e\b/i', $exemption['section']) || preg_match('/\b80\s*g\b/i', $exemption['section']) || preg_match('/\b80\s*tta\b/i', $exemption['section']) || preg_match('/\b80\s*cc\s*g\b/i', $exemption['section']) || preg_match('/\b80\s*ee\b/i', $exemption['section'])) 
            {
                $total_exemption += $exemption['member_deduction'];
            }
        }
        
        
        $pdf = PDF::loadView('frontend.reports.annual-income-tax-report-generate', compact('member_data', 'member_credit_data', 'member_debit_data', 'member_core_info', 'year', 'months', 'result', 'total_credit', 'total_debit', 'total_policy', 'standard_deduction', 'professional_update_allowance', 'member_loan_info', 'hbaInterest', 'member_it_exemption_info', 'exemption_result', 'total_exemption', 'ceaus', 'fixed_deposit', 'nsc', 'letOutProperty', 'pensionIncome', 'savingsInterest', 'ppf', 'otherBonds', 'nsc_ctd', 'hbaRefund', 'tutionFee', 'jeevanSuraksha', 'ulip', 'otherSavings', 'incometaxRate', 'relief87A', 'relief89'));
        return $pdf->download('income-tax-' . $member_data->name . '-' . $request->report_year . '.pdf');
    
    }

    public function salaryCertificate()
    {
        $members = Member::where('e_status', '!=', 'retired')->where('e_status', '!=', 'transferred')->orderBy('id', 'desc')->get();

        $startYear = 1958;
        $endYear = date('Y');

        $years = range($startYear, $endYear);

        return view('frontend.reports.salary-certificate', compact('members', 'years'));
    }

    public function salaryCertificateGenerate(Request $request) 
    {
        $request->validate([
            'member_id' => 'required',
            'year' => 'required',
            'month' => 'required'
        ]);

        $member_data = Member::where('id', $request->member_id)->with('desigs')->first();
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->first();
        $member_debit_data = MemberDebit::where('member_id', $request->member_id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->first();
        $year = $request->year;
        $requestMonth = $request->month;
        $dateStr = sprintf('2024-%02d-01', $requestMonth);
        $month = date('M', strtotime($dateStr));

        $pdf = PDF::loadView('frontend.reports.salary-certificate-generate', compact('member_credit_data', 'member_debit_data', 'member_data', 'year', 'month'));
        return $pdf->download('salary-certificate-' . $member_data->name . '.pdf');
        
    }

    public function bonusSchedule()
    {
        $financialYears = Helper::getFinancialYears();
        return view('frontend.reports.bonus-schedule', compact('financialYears'));
    }

    public function bonusScheduleGenerate(Request $request)
    {
        $request->validate([
            'report_year' => 'required',
        ]);

        [$startYear, $endYear] = explode('-', $request->report_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        $yearMonths = [];
        $current = $startOfYear->copy();

        while ($current->lessThanOrEqualTo($endOfYear)) {
            $yearMonths[] = $current->format('M-y');
            $current->addMonth();
        }
        
        $member_data = Member::where('e_status', '!=', 'retired')->where('e_status', '!=', 'transferred')->with('desigs')->get();
        $member_credit_data = MemberCredit::whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_debit_data = MemberDebit::whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $year = $request->report_year;
        $months = $yearMonths;
        $unitCode = 'RCI-CHESS-' . rand(1000, 9999);

        // create an array to store the result member wise
        $result = [];
        $total_credit = [
            'dress_alw' => 0,
            'bonus' => 0,
        ];
        $total_debit = [
            'eol' => 0,
        ];

        foreach($member_data as $member) {
            $result[$member->id] = [
                'name' => $member->name,
                'emp_id' => $member->emp_id,
                'designation' => $member->desigs->designation ?? 'N/A',
                'doj' => $member->doj_lab,
                'credit' => [
                    'basic_pay' => 0,
                    'dress_alw' => 0,
                    'bonus' => 0,
                ],
                'debit' => [
                    'eol' => 0,
                ],
                'total' => 0
            ];
        }

        foreach ($member_credit_data as $credit) {
            $memberId = $credit->member_id;
            if (isset($result[$memberId])) {
                $result[$memberId]['credit']['basic_pay'] += $credit->pay;
                $result[$memberId]['credit']['dress_alw'] += $credit->dis_alw;
                $result[$memberId]['credit']['bonus'] += $credit->incentive;

                $total_credit['dress_alw'] += $credit->dis_alw;
                $total_credit['bonus'] += $credit->incentive;
            }
        }

        foreach ($member_debit_data as $debit) {
            $memberId = $debit->member_id;
            if (isset($result[$memberId])) {
                $result[$memberId]['debit']['eol'] += $debit->eol;

                $total_debit['eol'] += $debit->eol;
            }
        }

        foreach ($result as $memberId => $data) {
            $creditTotal = array_sum($data['credit']);
            $debitTotal = array_sum($data['debit']);
            $result[$memberId]['total'] = $creditTotal - $debitTotal;
        }

        $pdf = PDF::loadView('frontend.reports.bonus-schedule-generate', compact('member_data', 'member_credit_data', 'member_debit_data', 'year', 'months', 'unitCode', 'result', 'total_credit', 'total_debit'));
        return $pdf->download('bonus-schedule-' . $request->report_year . '.pdf');
    }

    public function lastPayCertificate()
    {
        $members = Member::orderBy('id', 'desc')->where('e_status', 'retired')->orWhere('e_status', 'transferred')->get();
        return view('frontend.reports.last-pay-certificate', compact('members'));
    }

    public function lastPayCertificateGenerate(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
        ]);

        $member_data = Member::where('id', $request->member_id)->with('desigs', 'payLevels')->first();
        $dojYear = Carbon::parse($member_data->doj_lab)->format('Y');
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->first();
        $member_debit_data = MemberDebit::where('member_id', $request->member_id)->first();
        $member_recoveries_data = MemberRecovery::where('member_id', $request->member_id)->first();
        $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first();
        $drdoPin = $dojYear.'AD'.str_pad($request->member_id, 4, '0', STR_PAD_LEFT);

        $pdf = PDF::loadView('frontend.reports.last-pay-certificate-generate', compact('member_credit_data', 'member_debit_data', 'member_data', 'drdoPin', 'member_core_info', 'member_recoveries_data'));
        return $pdf->download('last-pay-certificate-' . $member_data->name . '.pdf');
    }

    
    public function getMemberInfo(Request $request)
    {
        $members = Member::where('e_status', $request->e_status)->orderBy('id', 'desc')->get();
        return response()->json(['members' => $members]);

    }

    public function payroll(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.payroll',compact('categories'));
    }

    public function payrollGenerate(Request $request)
    {
        
        $request->validate([
            'e_status' => 'required',
            'category' => 'required',
            'year' => 'required',
            'month' => 'required',
        ]);

        $month = $request->month;
        $get_month_name = date('F', mktime(0, 0, 0, $month, 10));
        $year = $request->year;
        $cat = $request->category;
        $category = Category::where('id', $cat)->first()->category;
        $today = Carbon::now()->format('d/m/Y g:i:s A');
    

        // return $request->all();
        $total = [
            'basic' => 0, 'special' => 0, '2incr' => 0, 'var_incr' => 0, 'da' => 0, 'house_rent' => 0, 'transport' => 0, 'family_alw' => 0, 'hindi' => 0,
            'deptn_alw' => 0, 'disable_alw' => 0, 'wash_alwn' => 0, 'risk_alwn' => 0, 'non_pract_alwn' => 0, 'cr_rent' => 0, 'cr_elec' => 0, 'cr_water' => 0,
            'misc1' => 0, 'misc2' => 0, 'gross' => 0, 'nps_subsc' => 0, 'nps_refunds' => 0, 'rent' => 0, 'elec' => 0,'water' => 0,'furn' => 0,'rent_arr' => 0,
            'elec_arr' => 0,'water_arr' => 0,'furn_arr' => 0,'car_adv' => 0,'car_adv_intrst' => 0,'sctr_adv_intrst' => 0, 'cycle_adv' => 0, 'cycle_adv_intrst' => 0 ,
            'hba_adv' => 0, 'hba_adv_int' => 0,'pli' => 0, 'cgegis' => 0, 'cghs' => 0,'it'=> 0, 'ecess' => 0, 'tada' => 0, 'ltc' => 0, 'medical' => 0,
            'eol_hpl' => 0, 'pc_adv' => 0, 'festival_adv_rec' => 0,  'professional_tx' => 0, 'hra_rec' => 0, 'tpt_rec' => 0, 'misc1_debit' => 0,
            'misc2_debit' => 0,'misc3_debit' => 0,'total_debit' => 0, 'net_pay' => 0
        ];

        $members = Member::where('category',$request->category)->where('e_status',$request->e_status)->get();
        foreach($members as $member)
        {
            // sum value of basicpay this month of this category member
            $total['basic'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('pay') ?? 0;
            $total['special'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('s_pay');
            $total['2incr'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('add_inc2'); 
            $total['var_incr'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('var_incr');  
            $total['da'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('da'); 
            $total['house_rent'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('hra');
            $total['transport'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('tpt');  
            // $total['family_alw'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('wash_alw');
            $total['hindi'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('hindi');  
            $total['deptn_alw'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('deptn_alw');  
            // $total['disable_alw'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('');
            $total['wash_alwn'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('wash_alw'); 
            $total['risk_alwn'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('risk_alw');
            $total['non_pract_alwn'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('npa');  
            $total['cr_rent'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('cr_rent');  
            $total['cr_elec'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('cr_elec');  
            $total['cr_water'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('cr_water');
            $total['misc1'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc1');
            $total['misc2'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc2');
            $total['gross'] += $total['basic'] + $total['special'] + $total['2incr'] + $total['var_incr'] + $total['da'] + $total['house_rent'] + $total['transport'] + $total['hindi'] + $total['deptn_alw'] + $total['wash_alwn'] + $total['risk_alwn'] + $total['non_pract_alwn'] + $total['cr_rent'] + $total['cr_elec'] + $total['cr_water'] + $total['misc1'] + $total['misc2'];

            //deductions

           // $total['nps_subsc'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc2');
           // $total['nps_refunds'] += MemberCredit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc2');
           $total['rent'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('rent');
           $total['elec'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('elec');
           $total['water'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('water');
           $total['furn'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('furn');
           // $total['rent_arr'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('furn');
           $total['elec_arr'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('elec_arr');
           $total['water_arr'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('water_arr');
           $total['furn_arr'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('furn_arr');
           $total['car_adv'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('car_adv');
           $total['car_adv_intrst'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('car_int');
           $total['sctr_adv_intrst'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('sco_int');
        //    $total['cycle_adv'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('sco_int');
        //  $total['cycle_adv_intrst'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('sco_int');
            $total['hba_adv'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('hba_adv');
            $total['hba_adv_int'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('hba_int');
            $total['pli'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('pli');
            $total['cgegis'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('cgegis');
            $total['cghs'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('cghs');
            $total['it'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('i_tax');
            $total['ecess'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('ecess');
          //  $total['it_surcharge'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('ecess');
            $total['tada'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('tada');
            $total['ltc'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('ltc');
            $total['medical'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('medi');
            $total['eol_hpl'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('eol');
            $total['pc_adv'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('pc');
           // $total[' '] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('pc');
            $total['festival_adv_rec'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('fadv');
            $total['professional_tx'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('ptax');
            $total['hra_rec'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('hra_rec');
            $total['tpt_rec'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('tpt_rec');
            $total['misc1_debit'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc1');
            $total['misc2_debit'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc2');
            $total['misc3_debit'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc3');
            // $total['nps_arr'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('misc3');
            $total['total_debit'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('tot_debits');
            $total['net_pay'] += MemberDebit::where('member_id', $member->id)->whereYear('created_at', $request->year)->whereMonth('created_at', $request->month)->sum('net_pay');
        }

        

        $pdf = PDF::loadView('frontend.reports.payroll-generate', compact('total','get_month_name','year','category','today'));
        return $pdf->download('payroll-'. $month . '-' . $year . '.pdf');
    }

    public function cildrenAllowance()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.children-allowance',compact('categories'));
    }

    public function cildrenAllowanceGenerate(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
        ]);

        $member_data = Member::where('id', $request->member_id)->with('desigs', 'payLevels')->first();
        $dojYear = Carbon::parse($member_data->doj_lab)->format('Y');
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->first();
        $member_debit_data = MemberDebit::where('member_id', $request->member_id)->first();
        $member_recoveries_data = MemberRecovery::where('member_id', $request->member_id)->first();
        $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first();
        $drdoPin = $dojYear.'AD'.str_pad($request->member_id, 4, '0', STR_PAD_LEFT);

        $pdf = PDF::loadView('frontend.reports.last-pay-certificate-generate', compact('member_credit_data', 'member_debit_data', 'member_data', 'drdoPin', 'member_core_info', 'member_recoveries_data'));
        return $pdf->download('last-pay-certificate-' . $member_data->name . '.pdf');
    }
    
}
