<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberCoreInfo;
use App\Models\MemberCredit;
use App\Models\MemberDebit;
use App\Models\MemberRecovery;
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

    public function crv()
    {
        return view('frontend.reports.crv');
    }

    public function plWithdrawl()
    {
        return view('frontend.reports.pl-withdrawl');
    }
}
