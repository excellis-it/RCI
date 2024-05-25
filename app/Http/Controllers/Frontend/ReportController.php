<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class ReportController extends Controller
{
    //

    public function payslip()
    {
        $members = Member::orderBy('id', 'desc')->get();
        return view('frontend.reports.payslip', compact('members'));
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
