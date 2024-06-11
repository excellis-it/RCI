<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberCoreInfo;
use App\Models\MemberCredit;
use App\Models\MemberDebit;
use App\Models\MemberRecovery;
use App\Models\Group;
use Carbon\Carbon;

use PDF;

class ReportController extends Controller
{
    //

    public function payslip()
    {
        $members = Member::orderBy('id', 'desc')->get();
        return view('frontend.reports.payslip', compact('members'));
    }

    public function payslipGenerate(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        $member_data = Member::where('id', $request->member_id)->first();
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->first();
        $member_debit_data = MemberDebit::where('member_id', $request->member_id)->first();
        $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first();
        $member_recoveries_data = MemberRecovery::where('member_id', $request->member_id)->first();
        $month = $request->month;
        $dateObj = \DateTime::createFromFormat('!m', $month);
        $monthName = $dateObj->format('F');
        $year = $request->year;
        
        
        $pdf = PDF::loadView('frontend.reports.payslip-generate', compact('member_data', 'member_credit_data', 'member_debit_data', 'member_core_info', 'monthName', 'year'));
        return $pdf->download('document.pdf');
    
    }

    // public function crv()
    // {
    //     $groups = Group::where('status', 1)->get()->chunk(2); // Fetch and chunk groups

    //     $pdf = PDF::loadView('frontend.reports.test-crv', compact('groups'));
    //     return $pdf->download('document.pdf');
       
        
    //     // return view('frontend.reports.crv');
    // }

    // public function plWithdrawl()
    // {
    //     return view('frontend.reports.pl-withdrawl');
    // }

    public function annualIncomeTaxReport()
    {
        $members = Member::orderBy('id', 'desc')->get();
        return view('frontend.reports.income-tax-report', compact('members'));
    }

    public function annualIncomeTaxReportGenerate(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
        ]);

        $memberId = $request->member_id;
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
        
        $member_data = Member::where('id', $memberId)->first();
        $member_credit_data = MemberCredit::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_debit_data = MemberDebit::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_core_info = MemberCoreInfo::where('member_id', $memberId)->first();
        $member_recoveries_data = MemberRecovery::where('member_id', $memberId)->first();
        
        $pdf = PDF::loadView('frontend.reports.annual-income-tax-report-generate', compact('member_data', 'member_credit_data', 'member_debit_data', 'member_core_info'));
        return $pdf->download('income-tax.pdf');
    
    }

    
}
