<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    public function payslip()
    {
        return view('frontend.reports.payslip');
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
