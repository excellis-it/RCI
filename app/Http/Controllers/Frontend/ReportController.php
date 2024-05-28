<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberCredit;
use App\Models\MemberDebit;

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
        dd($request->all());
        $member_data = Member::where('id', $request->member_id)->first();
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->first();
        $member_debit_data = MemberDebit::where('member_id', $request->member_id)->first();
        

        return view('frontend.reports.payslip-generate');
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
