<?php

namespace App\Http\Controllers\Frontend;

use App\Constants\Quaterly;
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
use App\Models\MemberBagPurse;
use App\Models\PayCommission;
use App\Models\Payband;
use App\Models\PmLevel;
use App\Models\GradePay;
use App\Models\Group;
use App\Models\LandlineAllowance;
use App\Models\MemberPersonalInfo;
use App\Models\MemberChildAllowance;
use App\Models\MemberChildrenDetail;
use Carbon\Carbon;
use App\Models\User;

use App\Models\SiteLogo;
use App\Models\DearnessAllowancePercentage;
use Illuminate\Pagination\Paginator;
use PDF;
use App\Models\NewspaperAllowance;
use App\Helpers\Helper;
use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\IncomeTax;
use App\Models\MemberNewspaperAllowance;
use App\Models\DebitVoucher;
use App\Models\Category;
use App\Models\MemberFamily;
use App\Models\DebitVoucherDetail;
use App\Models\MemberGpf;
use App\Models\LeaveType;
use App\Models\MemberAllotedLeave;
use App\Models\MemberLeave;
use App\Models\MemberRetirementInfo;
use App\Models\PayMatrixRow;
use App\Models\PayMatrixBasic;
use App\Models\PmIndex;
use App\Models\Hra;
use App\Models\MemberMonthlyData;
use App\Models\MemberMonthlyDataCoreInfo;
use App\Models\Pension;
use App\Models\MemberOriginalRecovery;
use App\Models\MemberMonthlyDataCredit;
use App\Models\MemberMonthlyDataDebit;
use App\Models\MemberMonthlyDataLoanInfo;
use App\Models\MemberMonthlyDataRecovery;
use App\Models\Setting;
use App\Models\Designation;
use App\Models\MedicalAllowance;
use App\Models\MemberLandline;

class ReportController extends Controller
{
    //

    public function payslip()
    {
        $members = Member::where('e_status', '!=', 'retired')->where('e_status', '!=', 'transferred')->orderBy('id', 'asc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.payslip', compact('members', 'categories'));
    }

    public function payslipGenerate(Request $request)
    {
        $request->validate([
            'e_status' => 'required',
            'generate_by' => 'required|in:member,category',
            'month' => 'required',
            'year' => 'required',
            'member_id' => $request->generate_by === 'member' ? 'required' : 'nullable',
            'category' => $request->generate_by === 'category' ? 'required' : 'nullable',
        ]);

        $the_month = (int) $request->month;
        $the_year = (int) $request->year;


        $financialYear = $the_month >= 4
            ? $the_year . '-' . ($the_year + 1)
            : ($the_year - 1) . '-' . $the_year;

        $report_type = $request->report_type;
        $month = str_pad($the_month, 2, '0', STR_PAD_LEFT);

        $compareDate = Carbon::createFromDate($the_year, $month, 1)->startOfMonth();

        $all_members_info = [];

        if ($request->member_id) {
            $monthly_members_data = [$request->member_id];
            $member = Member::findOrFail($request->member_id);

            $category_fund_type = Category::find($member->category)->fund_type ?? null;
            if (!$category_fund_type) {
                return response()->json(['message' => 'No fund type added for this category'], 400);
            }

            $member_datas = Member::whereIn('id', $monthly_members_data)
                ->where('e_status', $request->e_status)
                ->where('member_status', 1)
                ->where(function ($query) use ($compareDate) {
                    $query->whereNull('pay_stop_date')
                        ->orWhere('pay_stop_date', '>', $compareDate);
                })
                ->orderBy('id', 'asc')
                ->with('desigs')
                ->get();
        } else {
            $monthly_members_data = MemberMonthlyData::where('year', $the_year)
                ->where('month', $month)
                ->pluck('member_id');

            $category_fund_type = Category::find($request->category)->fund_type ?? null;
            if (!$category_fund_type) {
                return response()->json(['message' => 'No fund type added for this category'], 400);
            }

            $member_datas = Member::whereIn('id', $monthly_members_data)
                ->where('e_status', $request->e_status)
                ->where('category', $request->category)
                ->where('member_status', 1)
                ->where(function ($query) use ($compareDate) {
                    $query->whereNull('pay_stop_date')
                        ->orWhere('pay_stop_date', '>', $compareDate);
                })
                ->orderBy('id', 'asc')
                ->with('desigs')
                ->get();
        }

        if ($member_datas->count() === 0) {
            return response()->json(['message' => 'No data found for the selected criteria'], 400);
            // return redirect()->back()->with('error', 'No data found for the selected criteria');
        }

        foreach ($member_datas as $member_data) {
            $member_credit_data = MemberMonthlyDataCredit::where([
                ['member_id', $member_data->id],
                ['year', $the_year],
                ['month', $month],
            ])->latest()->first();

            $member_debit_data = MemberMonthlyDataDebit::where([
                ['member_id', $member_data->id],
                ['year', $the_year],
                ['month', $month],
            ])->latest()->first();

            $member_recoveries_data = MemberMonthlyDataRecovery::where([
                ['member_id', $member_data->id],
                ['year', $the_year],
                ['month', $month],
            ])->latest()->first();

            $member_core_info = MemberMonthlyDataCoreInfo::where([
                ['member_id', $member_data->id],
                ['year', $the_year],
                ['month', $month],
            ])->latest()->first();

            $loan_ids = [
                1 => 'hba_adv',
                2 => 'hba_int',
                3 => 'car_adv',
                4 => 'car_int',
                5 => 'sco_adv',
                6 => 'sco_int',
                7 => 'comp_adv',
                8 => 'comp_int',
                9 => 'fest_adv',
                10 => 'gpf_adv',
            ];

            $member_loans = [];
            foreach ($loan_ids as $id => $key) {
                $loan_info = MemberMonthlyDataLoanInfo::where([
                    ['member_id', $member_data->id],
                    ['year', $the_year],
                    ['month', $month],
                    ['loan_id', $id],
                ])->first();

                $member_loans[$key] = $loan_info->inst_amount ?? 0;
                $member_loans[$key . '_data'] = $loan_info ?? 0;
            }

            $all_members_info[] = [
                'member_data' => $member_data,
                'member_credit_data' => $member_credit_data,
                'member_debit_data' => $member_debit_data,
                'member_core_info' => $member_core_info,
                'member_recoveries_data' => $member_recoveries_data,
                'member_loans' => $member_loans,
            ];
        }

        // Assume single member (if using only one)
        $member_info = $all_members_info;

        $logo = Helper::logo() ?? '';
        $monthName = \DateTime::createFromFormat('!m', $the_month)->format('F');
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;

        $pdf = PDF::loadView('frontend.reports.payslip-generate', [
            'logo' => $logo,
            'member_info' => $member_info,
            'monthName' => $monthName,
            'year' => $the_year,
        ])
            ->setPaper('a3', $paperType)->setPaper('a3', 'potrait')
            ->setOption('enable-local-file-access', true)
            ->setOption('encoding', 'UTF-8')
            ->setOption('isHtml5ParserEnabled', true)
            ->setOption('isPhpEnabled', true)
            ->setOption('isRemoteEnabled', true);

        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="payslip.pdf"');
    }


    // public function crv()
    // {
    //     $groups = Group::where('status', 1)->get()->chunk(2); // Fetch and chunk groups
    public function paybill()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $accountants  = User::role('ACCOUNTANT')->get();
        $members = Member::orderBy('id', 'asc')->where('name', '!=', 'The Director, CHESS')->with('designation')->get();
        return view('frontend.reports.paybill', compact('categories', 'accountants', 'members'));
    }

    public function paybillGenerate(Request $request)
    {
        $request->validate([
            'e_status' => 'required',
            'generate_by' => 'required|in:member,category',
            'month' => 'required',
            'year' => 'required',
            'account_officer_sign' => 'required',
            // Conditional validation
            'member_id' => $request->generate_by === 'member' ? 'required' : 'nullable',
            'category' => $request->generate_by === 'category' ? 'required' : 'nullable',
        ]);

        // try {
        $the_month = (int) $request->month; // Assume month is numeric (1-12)
        $the_year = (int) $request->year;

        if ($the_month >= 4) {
            $financialYear = $the_year . '-' . ($the_year + 1);
        } else {
            $financialYear = ($the_year - 1) . '-' . $the_year;
        }



        $report_type = $request->report_type;

        $themonth =  date('m', mktime(0, 0, 0, $request->month, 10));
        $pay_bill_no = $request->year . '-' . 'RCI-CHESS' . $request->month . $request->year . rand(1000, 9999);
        $year = $request->year;
        // $request->merge([
        //     'themonth' => $themonth,
        //     'pay_bill_no' => $pay_bill_no
        // ]);



        $currentMonth = $themonth;
        $currentYear = $year ?? now()->year;

        // Build comparison dates
        $compareDate = Carbon::createFromDate($currentYear, $currentMonth, 1)->startOfMonth();
        $comparePreviousDate = $compareDate->copy()->subMonth();
        $previousMonth = $comparePreviousDate->format('m');
        $previousYear = $comparePreviousDate->format('Y');

        $all_members_info = [];

        if ($request->member_id && $request->generate_by == 'member') {
            $monthly_members_data[] = $request->member_id;
            $member = Member::findOrFail($request->member_id);
            $previous_monthly_members_data[] = $request->member_id;


            $category_fund_type = Category::find($member->category)?->fund_type;

            if (!$category_fund_type) {
                return response()->json(['message' => 'No fund type added for this category'], 400);
            }

            // ✅ Current month members
            $member_datas = Member::whereIn('id', $monthly_members_data)->whereHas('desigs')
                ->where('e_status', $request->e_status)
                ->where('member_status', 1)
                ->where(function ($query) use ($compareDate) {
                    $query->whereNull('pay_stop_date')
                        ->orWhere('pay_stop_date', '>', $compareDate);
                })
                ->with('desigs')
                ->orderBy('id', 'asc')
                ->get();
        } else {
            $monthly_members_data = MemberMonthlyData::where('year', $request->year)
                ->where('month', $themonth)
                ->pluck('member_id');

            $previous_monthly_members_data = MemberMonthlyData::where('year', $previousYear)
                ->where('month', $previousMonth)
                ->pluck('member_id');


            $category_fund_type = Category::find($request->category)?->fund_type;

            if (!$category_fund_type) {
                return response()->json(['message' => 'No fund type added for this category'], 400);
            }

            $member_datas = Member::whereIn('id', $monthly_members_data)->whereHas('desigs')
                ->where('e_status', $request->e_status)
                ->where('category', $request->category)
                ->where('member_status', 1)
                ->where(function ($query) use ($compareDate) {
                    $query->whereNull('pay_stop_date')
                        ->orWhere('pay_stop_date', '>', $compareDate);
                })
                ->with('desigs')
                ->orderBy('id', 'asc')
                ->get();
        }

        $last_month_credit_raw =  MemberMonthlyDataCredit::with('member')->whereIn('member_id', $previous_monthly_members_data)->where('year', $previousYear)
            ->where('month', $previousMonth)->whereHas('member', function ($query) use ($request, $comparePreviousDate) {
                $query->where('e_status', $request->e_status)
                    ->when($request->generate_by === 'category' && $request->filled('category'), function ($q) use ($request) {
                        $q->where('category', $request->category);
                    })
                    ->whereHas('desigs')
                    ->where('member_status', 1)
                    ->where(function ($q) use ($comparePreviousDate) {
                        $q->whereNull('pay_stop_date')
                            ->orWhere('pay_stop_date', '>', $comparePreviousDate);
                    });
            })

            ->get()
            ->groupBy('member_id')
            ->map(function ($group) {
                return $group->first(); // only latest
            })
            ->values();

        $last_month_debit_raw = MemberMonthlyDataDebit::with('member')->whereIn('member_id', $previous_monthly_members_data)->where('year', $previousYear)
            ->where('month', $previousMonth)->whereHas('member', function ($query) use ($request, $comparePreviousDate) {
                $query->where('e_status', $request->e_status)
                    ->when($request->generate_by === 'category' && $request->filled('category'), function ($q) use ($request) {
                        $q->where('category', $request->category);
                    })
                    ->whereHas('desigs')
                    ->where('member_status', 1)
                    ->where(function ($q) use ($comparePreviousDate) {
                        $q->whereNull('pay_stop_date')
                            ->orWhere('pay_stop_date', '>', $comparePreviousDate);
                    });
            })

            ->get()
            ->groupBy('member_id')
            ->map(function ($group) {
                return $group->first(); // only latest
            })
            ->values();

        // Chunk data into groups of 40
        $last_month_credit_data = $last_month_credit_raw->chunk(40);
        // dd(  $last_month_credit_data);

        // Define fields to sum
        $fieldsToSum = [
            'pay',
            'da',
            'hra',
            'tpt',
            'da_on_tpt',
            's_pay',
            'spl_incentive',
            'incentive',
            'dis_alw',
            'var_incr',
            'risk_alw',
            'npsc',
            'npg_adj',
            'upsc_10',
            'upsg_arrs_10',
            'upsgcr_adj_10',
            'misc_1'
        ];

        // Calculate chunk-wise totals
        $chunkTotals = [];

        foreach ($last_month_credit_data as $chunk) {
            // dd($last_month_credit_data);
            $totals = [];

            foreach ($fieldsToSum as $field) {
                // Sum safely with null handling
                $totals[$field] = $chunk->sum(function ($item) use ($field) {
                    return (float) ($item->$field ?? 0);
                });
            }

            $chunkTotals[] = $totals;
        }

        // Convert chunked data to array if needed
        $last_month_credit_data = $last_month_credit_data->toArray();



        // Chunk data into groups of 40
        $last_month_debit_data_new = $last_month_debit_raw->chunk(40);


        // Response array
        $last_month_debit_data = [];

        foreach ($last_month_debit_data_new as $chunk) {
            $chunk_array = $chunk->toArray();

            // Initialize totals with zero
            $totals = [
                'gpa_sub' => 0,
                // 'gpa_adv' => 0,
                'cgegis' => 0,
                'cghs' => 0,
                'hba_adv' => 0,   // From loan table (loan_id = 1)
                'hba_int' => 0,   // From loan table (loan_id = 2)
                'gpf_adv' => 0,   // From loan table (loan_id = 10)
                'i_tax' => 0,
                'ecess' => 0,
                'misc1' => 0,
                'nps_10_rec' => 0,
                'npsg' => 0,
                'npsg_adj' => 0,
                'nps_14_adj' => 0,
                'misc_1' => 0,
                'licence_fee' => 0,
                'elec' => 0,
                'water' => 0,
                'furn' => 0,
            ];

            foreach ($chunk as $row) {
                foreach ($totals as $key => $_) {
                    // Skip loan fields for now, handled below
                    if (in_array($key, ['hba_adv', 'hba_int', 'gpf_adv'])) {
                        continue;
                    }

                    // Safely sum field if it exists and is numeric
                    $totals[$key] += is_numeric($row->$key ?? null) ? $row->$key : 0;
                }

                // Collect loan data per member
                $member_id = $row->member_id;

                if ($member_id) {
                    $loan_hba_adv = MemberMonthlyDataLoanInfo::where('member_id', $member_id)
                        ->where('year', $previousYear)
                        ->where('month', $previousMonth)
                        ->where('loan_id', 1)
                        ->sum('inst_amount');

                    $loan_hba_int = MemberMonthlyDataLoanInfo::where('member_id', $member_id)
                        ->where('year', $previousYear)
                        ->where('month', $previousMonth)
                        ->where('loan_id', 2)
                        ->sum('inst_amount');

                    $loan_gpf_adv = MemberMonthlyDataLoanInfo::where('member_id', $member_id)
                        ->where('year', $previousYear)
                        ->where('month', $previousMonth)
                        ->where('loan_id', 10)
                        ->sum('inst_amount');

                    // Add loan sums with null-safety
                    $totals['hba_adv'] += $loan_hba_adv ?? 0;
                    $totals['hba_int'] += $loan_hba_int ?? 0;
                    $totals['gpf_adv'] += $loan_gpf_adv ?? 0;
                }
            }

            // Append final chunk
            $last_month_debit_data[] = [
                'data' => $chunk_array,
                'totals' => $totals,
            ];
        }


        // dd($last_month_credit_data, $last_month_debit_data, $chunkTotals);


        // dd($member_datas->toArray(), $monthly_members_data);

        if ($member_datas->count() == 0) {
            return response()->json(['message' => 'No data found for the selected criteria'], 400);
        }

        foreach ($member_datas as $member_data) {
            $member_details = [
                'member_credit' => MemberMonthlyDataCredit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $themonth)
                    ->orderBy('id', 'desc')
                    ->first(),
                'member_debit' => MemberMonthlyDataDebit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $themonth)
                    ->orderBy('id', 'desc')
                    ->first(),
                'member_recovery' => MemberMonthlyDataRecovery::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $themonth)
                    ->orderBy('id', 'desc')
                    ->first(),
                'member_core_info' => MemberMonthlyDataCoreInfo::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $themonth)
                    ->orderBy('id', 'desc')
                    ->first(),
                'member_loans' => [
                    'hba_adv' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 1)
                        ->first()['inst_amount'] ?? 0,
                    'car_adv' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 3)
                        ->first()['inst_amount'] ?? 0,
                    'sco_adv' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 5)
                        ->first()['inst_amount'] ?? 0,
                    'comp_adv' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 7)
                        ->first()['inst_amount'] ?? 0,

                    'fest_adv' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 9)
                        ->first()['inst_amount'] ?? 0,

                    'gpf_adv' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 10)
                        ->first()['inst_amount'] ?? 0,


                    'hba_int' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 2)
                        ->first()['inst_amount'] ?? 0,
                    'car_int' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 4)
                        ->first()['inst_amount'] ?? 0,
                    'sco_int' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 6)
                        ->first()['inst_amount'] ?? 0,
                    'comp_int' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 8)
                        ->first()['inst_amount'] ?? 0,

                    'hba_adv_data' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 1)
                        ->first() ?? 0,
                    'car_adv_data' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 3)
                        ->first() ?? 0,
                    'sco_adv_data' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 5)
                        ->first() ?? 0,
                    'comp_adv_data' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 7)
                        ->first() ?? 0,

                    'fest_adv_data' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 9)
                        ->first() ?? 0,

                    'gpf_adv_data' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 10)
                        ->first() ?? 0,


                    'hba_int_data' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 2)
                        ->first() ?? 0,
                    'car_int_data' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 4)
                        ->first() ?? 0,
                    'sco_int_data' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 6)
                        ->first() ?? 0,
                    'comp_int_data' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 8)
                        ->first() ?? 0,

                ],
            ];

            $combined_member_info = [
                'member_data' => $member_data,
                'details' => $member_details,
            ];

            $all_members_info[] = $combined_member_info;
        }

        $baseMemberQuery = Member::query()
            ->whereIn('id', $monthly_members_data)
            ->where('e_status', $request->e_status)
            ->where('member_status', 1)->whereHas('desigs')
            ->where(function ($query) use ($compareDate) {
                $query->whereNull('pay_stop_date')
                    ->orWhere('pay_stop_date', '>', $compareDate);
            });

        // Conditionally apply category if generate_by is 'category'
        if ($request->generate_by === 'category') {
            $baseMemberQuery->where('category', $request->category);
        }

        $meber_chunk_data_quater = (clone $baseMemberQuery)
            ->with([
                'memberOneDebit' => function ($query) use ($request, $themonth) {
                    $query->where('year', $request->year)
                        ->where('month', $themonth)
                        ->latest();
                },
                'memberPersonalInfo',
                'memberPersonalInfo.quarter',
                'desigs'
            ])
            ->whereHas('memberPersonalInfo', function ($query) use ($request, $themonth) {
                $query->whereNotNull('quater_no');
            })
            ->get()
            ->chunk(40)
            ->toArray();

        $meber_chunk_data_income_tax = (clone $baseMemberQuery)
            ->with([
                'memberOneDebit' => function ($query) use ($request, $themonth) {
                    $query->where('year', $request->year)
                        ->where('month', $themonth)
                        ->latest();
                },
                'memberPersonalInfo',
                'desigs'
            ])
            ->whereHas('memberOneDebit', function ($query) use ($request, $themonth) {
                $query->whereNotNull('i_tax')
                    ->where('i_tax', '!=', 0)->where('year', $request->year)
                    ->where('month', $themonth);
            })
            ->get()
            ->chunk(40)
            ->toArray();


        $meber_chunk_data_misc = (clone $baseMemberQuery)
            ->with([
                'memberOneDebit' => function ($query) use ($request, $themonth) {
                    $query->where('year', $request->year)
                        ->where('month', $themonth)
                        ->latest();
                },
                'memberPersonalInfo',
                'desigs'
            ])
            ->whereHas('memberOneDebit', function ($query) use ($request, $themonth) {
                $query->whereNotNull('misc1')
                    ->where('misc1', '!=', 0)->where('year', $request->year)
                    ->where('month', $themonth);
            })
            ->get()
            ->chunk(40)
            ->toArray();




        // dd($meber_chunk_data_misc);

        $groupedData = collect($all_members_info)->chunk(4);
        $allMember40Data = collect($all_members_info)->chunk(40);

        // dd($allMember40Data);

        $month =  date('F', mktime(0, 0, 0, $request->month, 10));
        $number_month = $request->month;

        $logo = Helper::logo() ?? '';
        $da_percent = DearnessAllowancePercentage::where('year', $year)->where('is_active', 1)->first();
        $accountant = User::where('id', $request->account_officer_sign)->first();

        $pdf = PDF::loadView('frontend.reports.paybill-generate', compact(
            'previousMonth',
            'previousYear',
            'pay_bill_no',
            'month',
            'year',
            'logo',
            'da_percent',
            'all_members_info',
            'groupedData',
            'category_fund_type',
            'allMember40Data',
            'accountant',
            'number_month',
            'meber_chunk_data_quater',
            'meber_chunk_data_income_tax',
            'financialYear',
            'meber_chunk_data_misc',
            'themonth',
            'last_month_credit_data',
            'chunkTotals',
            'compareDate',
            'last_month_debit_data'
        ))->setPaper('a3', 'landscape');
        // return view('frontend.reports.paybill-generate')->with(compact(
        //     'previousMonth',
        //     'previousYear',
        //     'pay_bill_no',
        //     'month',
        //     'year',
        //     'logo',
        //     'da_percent',
        //     'all_members_info',
        //     'groupedData',
        //     'category_fund_type',
        //     'allMember40Data',
        //     'accountant',
        //     'number_month',
        //     'meber_chunk_data_quater',
        //     'meber_chunk_data_income_tax',
        //     'financialYear',
        //     'meber_chunk_data_misc',
        //     'themonth',
        //     'last_month_credit_data',
        //     'chunkTotals',
        //     'compareDate',
        //     'last_month_debit_data'
        // ));
        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="paybill.pdf"');
        // } catch (\Throwable $th) {
        //   return response()->json(['message'=> $th->getMessage()],400);
        // }



    }

    private function downloadCreditSummary(Request $request)
    {
        $themonth =  $request->themonth;
        $pay_bill_no = $request->pay_bill_no;

        $compareDate = Carbon::createFromDate($request->year, $themonth, 1)->startOfMonth();

        $all_members_info = [];

        $monthly_members_data = MemberMonthlyData::where('year', $request->year)
            ->where('month', $themonth)
            ->pluck('member_id');

        $member_datas = Member::whereIn('id', $monthly_members_data)
            ->where('e_status', $request->e_status)
            ->where('category', $request->category)
            ->where('member_status', 1)
            ->where(function ($query) use ($compareDate) {
                $query->whereNull('pay_stop_date')
                    ->orWhere('pay_stop_date', '>', $compareDate);
            })
            ->orderBy('id', 'asc')
            ->with('desigs')
            ->get();

        if ($member_datas->count() == 0) {
            return redirect()->back()->with('error', 'No data found for the selected criteria');
        }

        foreach ($member_datas as $member_data) {
            $member_details = [
                'member_credit' => MemberMonthlyDataCredit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $themonth)
                    ->first(),
                'member_debit' => MemberMonthlyDataDebit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $themonth)
                    ->first(),
                'member_recovery' => MemberMonthlyDataRecovery::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $themonth)
                    ->first(),
                'member_core_info' => MemberMonthlyDataCoreInfo::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $themonth)
                    ->first(),
                'member_loans' => [
                    'hba_adv' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 4)
                        ->first()['inst_amount'] ?? 0,
                    'car_adv' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 1)
                        ->first()['inst_amount'] ?? 0,
                    'sco_adv' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 2)
                        ->first()['inst_amount'] ?? 0,
                    'comp_adv' => MemberMonthlyDataLoanInfo::where('member_id', $member_data->id)
                        ->where('year', $request->year)
                        ->where('month', $themonth)
                        ->where('loan_id', 3)
                        ->first()['inst_amount'] ?? 0,
                ],
            ];

            $combined_member_info = [
                'member_data' => $member_data,
                'details' => $member_details,
            ];

            $all_members_info[] = $combined_member_info;
        }

        $groupedData = collect($all_members_info)->chunk(5);
        $month =  date('F', mktime(0, 0, 0, $request->month, 10));
        $year = $request->year;
        $logo = Helper::logo() ?? '';
        $da_percent = DearnessAllowancePercentage::where('year', $year)->first();

        $pdf = PDF::loadView('frontend.reports.paybill-credit-summary', compact(
            'pay_bill_no',
            'month',
            'year',
            'logo',
            'da_percent',
            'all_members_info',
            'groupedData'
        ))->setPaper('a3', 'landscape');

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
        $categories = Category::orderBy('id', 'desc')->get();
        $members = Member::orderBy('id', 'asc')->where('name', '!=', 'The Director, CHESS')->with('designation')->get();
        $financialYears = Helper::getFinancialYears();
        return view('frontend.reports.income-tax-report', compact('members', 'financialYears', 'categories'));
    }

    public function annualIncomeTaxReportGenerate(Request $request)
    {
        $request->validate([
            'e_status' => 'required',
            'generate_by' => 'required|in:member,category',
            'report_year' => 'required',
            // Conditional validation
            'member_id' => $request->generate_by === 'member' ? 'required' : 'nullable',
            'category' => $request->generate_by === 'category' ? 'required' : 'nullable',
        ]);


        $memberId = $request->member_id;
        [$startYear, $endYear] = explode('-', $request->report_year);
        // return $endYear;

        $startOfYear = Carbon::createFromDate($startYear, 3, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 2, 28)->endOfDay();

        $yearMonths = [];
        $current = $startOfYear->copy();

        while ($current->lessThanOrEqualTo($endOfYear)) {
            $yearMonths[] = $current->format('M-y');
            $current->addMonth();
        }

        $member_data = Member::where('id', $memberId)->first();
        // $member_credit_data = MemberCredit::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        // $member_debit_data = MemberDebit::where('member_id', $memberId)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();

        $member_credit_data = MemberMonthlyDataCredit::where('member_id', $memberId)->whereBetween('year', [$startYear, $endYear])->get();
        $member_debit_data = MemberMonthlyDataDebit::where('member_id', $memberId)->whereBetween('year', [$startYear, $endYear])->get();

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
        $ceaus = 0;
        $fixed_deposit = 0;
        $nsc = 0;
        $letOutProperty = 0;
        $pensionIncome = 0;
        $savingsInterest = 0;
        $ppf = 0;
        $otherBonds = 0;
        $nsc_ctd = 0;
        $hbaRefund = 0;
        $tutionFee = 0;
        $jeevanSuraksha = 0;
        $ulip = 0;
        $otherSavings = 0;
        $relief87A = 0;
        $relief89 = 0;

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
                if (Carbon::parse($credit->year . '-' . $credit->month . '-01')->format('M-y') == $month) {
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
                if (Carbon::parse($debit->year . '-' . $debit->month . '-01')->format('M-y') == $month) {
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
        // return $yearMonths;
        $hbaInterest = 0;
        if ($member_loan_info) {

            $member_loan_info->filter(function ($memberLoan) {
                return $memberLoan->loan->loan_name === 'hba';
            })->sum(function ($memberLoan) {
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
            if (preg_match('/\b80\s*d\b/i', $exemption['section']) || preg_match('/\b80\s*d{2}\b/i', $exemption['section']) || preg_match('/\b80\s*ddb\b/i', $exemption['section']) || preg_match('/\b80\s*u\b/i', $exemption['section']) || preg_match('/\b80\s*e\b/i', $exemption['section']) || preg_match('/\b80\s*g\b/i', $exemption['section']) || preg_match('/\b80\s*tta\b/i', $exemption['section']) || preg_match('/\b80\s*cc\s*g\b/i', $exemption['section']) || preg_match('/\b80\s*ee\b/i', $exemption['section'])) {
                $total_exemption += $exemption['member_deduction'];
            }
        }

        $logo = Helper::logo() ?? '';
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.annual-income-tax-report-generate', compact('logo', 'member_data', 'member_credit_data', 'member_debit_data', 'member_core_info', 'year', 'months', 'result', 'total_credit', 'total_debit', 'total_policy', 'standard_deduction', 'professional_update_allowance', 'member_loan_info', 'hbaInterest', 'member_it_exemption_info', 'exemption_result', 'total_exemption', 'ceaus', 'fixed_deposit', 'nsc', 'letOutProperty', 'pensionIncome', 'savingsInterest', 'ppf', 'otherBonds', 'nsc_ctd', 'hbaRefund', 'tutionFee', 'jeevanSuraksha', 'ulip', 'otherSavings', 'incometaxRate', 'relief87A', 'relief89'))->setPaper('a3', $paperType);
        return $pdf->download('income-tax-' . $member_data->name . '-' . $request->report_year . '.pdf');
    }

    public function salaryCertificate()
    {
        // $members = Member::where('e_status', '!=', 'retired')->where('e_status', '!=', 'transferred')->orderBy('id', 'desc')->get();

        $startYear = 1958;
        $endYear = date('Y');
        $accountants = User::role('ACCOUNTANT')->get();
        $years = range($endYear, $startYear);
            dd($years);
        return view('frontend.reports.salary-certificate', compact('years', 'accountants'));
    }

    public function salaryCertificateGenerate(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'year' => 'required',
            'month' => 'required',
            'accountant' => 'required',
        ]);

        $accountant = $request->accountant;

        $member_data = Member::with('desigs')->find($request->member_id);

        // Convert month to 2-digit format
        $themonth = str_pad($request->month, 2, '0', STR_PAD_LEFT);

        // Get monthly records
        $member_credit_data = MemberMonthlyDataCredit::where('member_id', $request->member_id)
            ->where('year', $request->year)
            ->where('month', $themonth)
            ->first();

        $member_debit_data = MemberMonthlyDataDebit::where('member_id', $request->member_id)
            ->where('year', $request->year)
            ->where('month', $themonth)
            ->first();

        $member_recoveries_data = MemberMonthlyDataRecovery::where('member_id', $request->member_id)
            ->where('year', $request->year)
            ->where('month', $themonth)
            ->first();

        // 🛑 Check if any data is missing
        if (!$member_credit_data || !$member_debit_data || !$member_recoveries_data) {
            return back()->with('error', 'Salary data for the selected month/year is not available.');
        }

        $year = $request->year;
        $requestMonth = $themonth;
        $dateStr = sprintf('%s-%02d-01', $year, $requestMonth);
        $month = date('M', strtotime($dateStr));

        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;

        $pdf = PDF::loadView('frontend.reports.salary-certificate-generate', compact(
            'member_credit_data',
            'member_debit_data',
            'member_data',
            'year',
            'month',
            'accountant',
            'member_recoveries_data'
        ))->setPaper('a4', $paperType);

        // If you want to download:
        return $pdf->download('salary-certificate-' . $member_data->name . '.pdf');

        return view('frontend.reports.salary-certificate-generate', compact(
            'member_credit_data',
            'member_debit_data',
            'member_data',
            'year',
            'month',
            'accountant',
            'member_recoveries_data'
        ));
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
        $category = Category::where('category', 'C')->first() ?? '';
        if ($category) {

            $member_data = Member::where('e_status', $request->e_status)->where('category', $category->id)->where('pay_stop', 'No')->with('desigs', 'groups')->get() ?? '';
            $member_credit_data = MemberCredit::whereBetween('created_at', [$startOfYear, $endOfYear])->get();
            $member_debit_data = MemberDebit::whereBetween('created_at', [$startOfYear, $endOfYear])->get();
            $year = $request->report_year;
            $months = $yearMonths;
            $unitCode = 'RCI-CHESS-' . rand(1000, 9999);
            // $category = Category::where('id', $request->category)->first();

            // create an array to store the result member wise
            $result = [];
            $total_credit = [
                'dress_alw' => 0,
                'bonus' => 0,
            ];
            $total_debit = [
                'eol' => 0,
            ];

            foreach ($member_data as $member) {
                $result[$member->id] = [
                    'name' => $member->name,
                    'gpf_nps' => $member->gpf_number ?? $member->pran_number ?? 'N/A',
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
        } else {
            $member_data = [];
            $member_credit_data = [];
            $member_debit_data = [];
            $year = '';
            $months = [];
            $unitCode = '';
            $result = [];
            $total_credit = [];
            $total_debit = [];
            $category = '';
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.bonus-schedule-generate', compact('member_data', 'member_credit_data', 'member_debit_data', 'year', 'months', 'unitCode', 'result', 'total_credit', 'total_debit', 'category'))->setPaper('a4', $paperType);
        return $pdf->download('bonus-schedule-' . $request->report_year . '.pdf');
    }

    public function lastPayCertificate()
    {
        $members = Member::orderBy('id', 'asc')->where('e_status', 'retired')->orWhere('e_status', 'transferred')->get();
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
        $drdoPin = $dojYear . 'AD' . str_pad($request->member_id, 4, '0', STR_PAD_LEFT);
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.last-pay-certificate-generate', compact('member_credit_data', 'member_debit_data', 'member_data', 'drdoPin', 'member_core_info', 'member_recoveries_data'))->setPaper('a4', $paperType);
        return $pdf->download('last-pay-certificate-' . $member_data->name . '.pdf');
    }

    public function getMemberInfo(Request $request)
    {
        $members = Member::where('e_status', $request->e_status)->orderBy('id', 'asc')->get();
        return response()->json(['members' => $members]);
    }

    public function getMemberGpf(Request $request)
    {
        $members = Member::where('e_status', $request->e_status)->where('pay_stop', 'No')->where('fund_type', 'GPF')->orderBy('id', 'asc')->get();
        return response()->json(['members' => $members]);
    }

    public function payroll(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.payroll', compact('categories'));
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
        $month = sprintf("%02d", $request->month);
        $get_month_name = date('F', mktime(0, 0, 0, $month, 10));
        $year = $request->year;
        $cat = $request->category;
        $category = Category::where('id', $cat)->first()->category;
        $today = Carbon::now()->format('d/m/Y g:i:s A');

        // return $request->all();
        $total = [
            'basic' => 0,
            'special' => 0,
            '2incr' => 0,
            'var_incr' => 0,
            'da' => 0,
            'house_rent' => 0,
            'transport' => 0,
            'family_alw' => 0,
            'hindi' => 0,
            'deptn_alw' => 0,
            'disable_alw' => 0,
            'wash_alwn' => 0,
            'risk_alwn' => 0,
            'non_pract_alwn' => 0,
            'cr_rent' => 0,
            'cr_elec' => 0,
            'cr_water' => 0,
            'misc1' => 0,
            'misc2' => 0,
            'gross' => 0,
            'nps_subsc' => 0,
            'nps_refunds' => 0,
            'rent' => 0,
            'elec' => 0,
            'water' => 0,
            'furn' => 0,
            'rent_arr' => 0,
            'elec_arr' => 0,
            'water_arr' => 0,
            'furn_arr' => 0,
            'car_adv' => 0,
            'car_adv_intrst' => 0,
            'sctr_adv_intrst' => 0,
            'cycle_adv' => 0,
            'cycle_adv_intrst' => 0,
            'hba_adv' => 0,
            'hba_adv_int' => 0,
            'pli' => 0,
            'cgegis' => 0,
            'cghs' => 0,
            'it' => 0,
            'ecess' => 0,
            'tada' => 0,
            'ltc' => 0,
            'medical' => 0,
            'eol_hpl' => 0,
            'pc_adv' => 0,
            'festival_adv_rec' => 0,
            'professional_tx' => 0,
            'hra_rec' => 0,
            'tpt_rec' => 0,
            'licence_fee' => 0,
            'misc1_debit' => 0,
            'misc2_debit' => 0,
            'misc3_debit' => 0,
            'total_debit' => 0,
            'net_pay' => 0
        ];

        $members = Member::where('category', $request->category)->where('e_status', $request->e_status)->where('pay_stop', 'No')->get();
        foreach ($members as $member) {
            // sum value of basicpay this month of this category member
            $total['basic'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('pay') ?? 0;
            $total['special'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('s_pay');
            $total['2incr'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('add_inc2');
            $total['var_incr'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('var_incr');
            $total['da'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('da');
            $total['house_rent'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('hra');
            $total['transport'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('tpt');
            // $total['family_alw'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('wash_alw');
            $total['hindi'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('hindi');
            $total['deptn_alw'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('deptn_alw');
            // $total['disable_alw'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('');
            $total['wash_alwn'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('wash_alw');
            $total['risk_alwn'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('risk_alw');
            $total['non_pract_alwn'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('npa');
            $total['cr_rent'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('cr_rent');
            $total['cr_elec'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('cr_elec');
            $total['cr_water'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('cr_water');
            $total['misc1'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('misc1');
            $total['misc2'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('misc2');
            $total['gross'] += $total['basic'] + $total['special'] + $total['2incr'] + $total['var_incr'] + $total['da'] + $total['house_rent'] + $total['transport'] + $total['hindi'] + $total['deptn_alw'] + $total['wash_alwn'] + $total['risk_alwn'] + $total['non_pract_alwn'] + $total['cr_rent'] + $total['cr_elec'] + $total['cr_water'] + $total['misc1'] + $total['misc2'];

            //deductions

            // $total['nps_subsc'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('misc2');
            // $total['nps_refunds'] += MemberMonthlyDataCredit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('misc2');
            $total['rent'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('rent');
            $total['elec'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('elec');
            $total['water'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('water');
            $total['furn'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('furn');
            // $total['rent_arr'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('furn');
            $total['elec_arr'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('elec_arr');
            $total['water_arr'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('water_arr');
            $total['furn_arr'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('furn_arr');
            $total['car_adv'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('car_adv');
            $total['car_adv_intrst'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('car_int');
            $total['sctr_adv_intrst'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('sco_int');
            //    $total['cycle_adv'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('sco_int');
            //  $total['cycle_adv_intrst'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('sco_int');
            $total['hba_adv'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('hba_adv');
            $total['hba_adv_int'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('hba_int');
            $total['pli'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('pli');
            $total['cgegis'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('cgegis');
            $total['cghs'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('cghs');
            $total['it'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('i_tax');
            $total['ecess'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('ecess');
            //  $total['it_surcharge'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('ecess');
            $total['tada'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('tada');
            $total['ltc'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('ltc');
            $total['medical'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('medi');
            $total['eol_hpl'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('eol');
            $total['pc_adv'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('pc');
            // $total[' '] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('pc');
            $total['festival_adv_rec'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('fadv');
            $total['professional_tx'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('ptax');
            $total['hra_rec'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('hra_rec');
            $total['tpt_rec'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('tpt_rec');
            $total['licence_fee'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('licence_fee');
            $total['misc1_debit'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('misc1');
            $total['misc2_debit'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('misc2');
            $total['misc3_debit'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('misc3');
            // $total['nps_arr'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('misc3');
            $total['total_debit'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('tot_debits');
            $total['net_pay'] += MemberMonthlyDataDebit::where('member_id', $member->id)->where('year', $year)->where('month', $month)->sum('net_pay');
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.payroll-generate', compact('total', 'get_month_name', 'year', 'category', 'today'))->setPaper('a4', $paperType);
        return $pdf->download('payroll-' . $month . '-' . $year . '.pdf');
    }

    public function cildrenAllowance()
    {
        $academicYears = Helper::getFinancialYears();
        $categories = Category::orderBy('id', 'desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        $directors = Member::whereHas('desigs', function ($query) {
            $query->where('designation', 'DIR');
        })->with('desigs')->get();
        return view('frontend.reports.children-allowance', compact('categories', 'accountants', 'academicYears', 'directors'));
    }

    public function cildrenAllowanceGenerate(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'report_type' => 'required',
            'year' => 'required',
            'e_status' => 'required',
            'director'  => 'required',
        ]);

        $data = $request->all();
        // dd($request->all());
        $timestamp = now()->format('YmdHis');
        $bill_no = date('Y') . '-PGB' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT) . $timestamp;
        $today = Carbon::now()->format('d-M-Y');
        $accountant = $request->accountant;
        $total = 0;
        $children = [];
        $member_detail = null; // Initialize to null for individual report

        if ($request->report_type == 'individual') {
            $request->validate([
                'member_id' => 'required',
            ]);

            $member_detail = Member::where('id', $request->member_id)->first();
            if (!$member_detail) {
                return redirect()->back()->with('error', 'Member not found.');
            }

            $child_datas = [
                'child_name' => $request->input('child_name'),
                'child_dob' => $request->input('child_dob'),
                'child_scll_name' => $request->input('child_scll_name'),
                'child_class' => $request->input('child_class'),
                'child_academic' => $request->input('child_academic'),
                'child_amount' => $request->input('child_amount')
            ];

            // Ensure child_name is an array before counting
            $num_of_children = isset($child_datas['child_name']) && is_array($child_datas['child_name'])
                ? count($child_datas['child_name'])
                : 0;

            for ($i = 0; $i < $num_of_children; $i++) {
                $children[] = [
                    'child_name' => $child_datas['child_name'][$i],
                    'child_dob' => $child_datas['child_dob'][$i],
                    'child_scll_name' => $child_datas['child_scll_name'][$i],
                    'child_class' => $child_datas['child_class'][$i],
                    'child_academic' => $child_datas['child_academic'][$i],
                    'child_amount' => $child_datas['child_amount'][$i]
                ];
                $total += $child_datas['child_amount'][$i];
            }

            if (empty($children)) {
                return redirect()->back()->with('error', 'No children data found for the selected member.');
            }

            $pdf_filename = 'children-allowance-report-' . $member_detail->name . '.pdf';
        } elseif ($request->report_type == 'group') {
            $request->validate([
                'category' => 'required',
            ]);

            $categoryId = $request->category;
            $academicYear = $request->year;
            $employeeStatus = $request->e_status;

            // Fetch members based on category and status
            $members = Member::where('category', $categoryId)
                ->where('e_status', $employeeStatus) // Assuming 'status' is the column for employee status
                ->with(['childrenAllowance' => function ($query) use ($academicYear) {
                    $query->where('year', $academicYear);
                }])->whereHas('childrenAllowance', function ($query) use ($academicYear) {
                    $query->where('year', $academicYear);
                })
                ->get();

            // dd( $members->toArray());

            $groupedChildrenData = [];
            foreach ($members as $member) {
                $memberTotal = 0;
                $memberChildren = [];
                foreach ($member->childrenAllowance as $childAllowance) {
                    // dd($childAllowance);
                    $memberChildren[] = [
                        'child_name' => $childAllowance->child_name,
                        'child_dob' => $childAllowance->child_dob,
                        'child_scll_name' => $childAllowance->child_school, // Assuming column name is school_name
                        'child_class' => $childAllowance->child_class, // Assuming column name is class_name
                        'child_academic' => $childAllowance->academic_year,
                        'child_amount' => $childAllowance->allowance_amount
                    ];
                    $memberTotal += $childAllowance->allowance_amount;
                }

                if (!empty($memberChildren)) {
                    $groupedChildrenData[] = [
                        'member_detail' => $member,
                        'children' => $memberChildren,
                        'member_total' => $memberTotal
                    ];
                    $total += $memberTotal;
                }
            }

            // dd($groupedChildrenData);

            if (empty($groupedChildrenData)) {
                return redirect()->back()->with('error', 'No children allowance data found for the selected category and academic year.');
            }

            // Pass grouped data to the view.
            // You might want to rename 'children' to something more descriptive like 'groupedChildrenData'
            // and pass individual member details inside that structure.
            $children = $groupedChildrenData; // Overriding $children for consistent variable name in view, or use a new variable for clarity
            $pdf_filename = 'children-allowance-report-category-' . $categoryId . '-' . $academicYear . '.pdf';
        } else {
            return redirect()->back()->with('error', 'Invalid report type selected.');
        }

        $setting = Setting::first();
        $paperType = $request->paper_type ?? ($setting->pdf_page_type ?? 'portrait'); // Default to portrait if not set in settings
        $year = $request->year;
        $director_name = Member::findOrFail($request->director)->name ?? '-';
        // The blade view will need to handle the structure of $children depending on report_type
        // If 'group', $children will be an array of arrays, each containing member_detail and their children
        // If 'individual', $children will be a flat array of children, and $member_detail will be direct.
        $pdf = PDF::loadView('frontend.reports.children-allowance-report', compact('director_name', 'data', 'total', 'bill_no', 'today', 'children', 'member_detail', 'accountant', 'request', 'year'))->setPaper('a4', 'potrait');
        return $pdf->download($pdf_filename);
    }
    public function getMemberChildren(Request $request)
    {

        $year = $request->year ?? date('Y');

        $child_allowance_count = MemberChildAllowance::where('member_id', $request->member_id)->where('year', $year)->count();
        if ($child_allowance_count > 0) {
            $children_allowances = MemberChildAllowance::where('member_id', $request->member_id)->where('year', $year)->get();
            $edit = true;
        } else {
            $children_allowances = MemberChildrenDetail::where('member_id', $request->member_id)->get();
            $edit = false;
        }

        return response()->json(['view' => view('frontend.reports.children-allowance-children-list', compact('edit', 'children_allowances'))->render(), 'status' => 'success']);
    }

    public function professionalUpdateAllowance()
    {
        $category = Category::where('category', 'A')->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Category A not found!');
        }
        $members = Member::where('e_status', 'active')->where('category', $category->id)->orderBy('id', 'asc')->get();


        $financialYears = Helper::getFinancialYears();
        return view('frontend.reports.professional-update-allowance', compact('category', 'members', 'financialYears'));
    }

    public function professionalUpdateAllowanceGenerate(Request $request)
    {
        // dd($request->all());
        $type = $request->type;
        if ($request->type == 'individual') {
            $request->validate([
                'member_id' => 'required',
                'report_year' => 'required',
            ]);
            $year = $request->report_year;
        } else {
            $request->validate([
                'report_year_group' => 'required',
            ]);
            $year = $request->report_year_group;
        }

        [$startYear, $endYear] = explode('-', $year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        if ($request->type == 'individual') {
            $member = Member::where('id', $request->member_id)->with('desigs', 'payLevels')->first();
            $category = Category::where('id', $member->category)->first();
            $member_credit_data = MemberCredit::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();

            $total_pua = 0;

            foreach ($member_credit_data as $member_credit) {
                $total_pua += $member_credit->pua;
            }

            if ($member->isEmpty()) {
                return redirect()->back()->with('error', 'No data available');
            }

            $member_data = [
                'member' => $member,
                'total_pua' => $total_pua
            ];
        } else {
            $members = Member::where('category', $request->category)->where('e_status', $request->e_status)->with('desigs', 'payLevels')->get();
            $category = Category::where('id', $request->category)->first();

            $member_data = [];

            foreach ($members as $member) {
                $member_credit_data = MemberCredit::where('member_id', $member->id)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();

                $total_pua = 0;

                if (count($member_credit_data) > 0) {
                    foreach ($member_credit_data as $credit_data) {
                        $total_pua += $credit_data->pua;
                    }
                } else {
                    $total_pua = 0;
                }


                $all_members_data = [
                    'member' => $member,
                    'total_pua' => $total_pua
                ];
                $member_data[] = $all_members_data;
            }
            // dd($member_data);
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.professional-update-allowance-generate', compact('member_data', 'type', 'category', 'year'))->setPaper('a4', $paperType);

        return $pdf->download('professional-update-allowance' . $year . '.pdf');
    }

    public function gpfWithdrawal()
    {
        // $members = Member::all();
        return view('frontend.reports.gpf-withdrawal');
    }

    public function gpfWithdrawalGenerate(Request $request)
    {
        // dd($request->all());

        $member = Member::where('id', $request->member_id)->with('desigs')->first();
        $apply_date = $request->apply_date;
        $required_date = $request->required_date;
        $required_amount = $request->amount;
        $received_amount = $request->received_amount;
        $reason = $request->reason;
        $month = Carbon::parse($request->apply_date)->subMonth();

        $member_core_data = MemberMonthlyDataCoreInfo::where('member_id', $request->member_id)->first();
        $member_gpf_datas = MemberGpf::where('member_id', $request->member_id)->where('created_at', '<', $month)->where('created_at', '=', $month)->get();
        $gpf_data = MemberGpf::where('member_id', $request->member_id)->where('created_at', '<', $month)->where('created_at', '=', $month)->latest()->first();
        $member_credit_data = MemberMonthlyDataCredit::where('member_id', $request->member_id)->latest()->first();

        $total_sub_amt = 0;
        $total_refund = 0;

        if ($member_gpf_datas->isEmpty()) {
            return redirect()->back()->with('error', 'No GPF data found for the selected month');
        }

        foreach ($member_gpf_datas as $gpf_data) {
            $total_sub_amt += $gpf_data->monthly_subscription;
            $total_refund += $gpf_data->refund;
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.gpf-withdrawal-generate', compact('member', 'apply_date', 'required_date', 'required_amount', 'received_amount', 'reason', 'member_core_data', 'gpf_data', 'total_sub_amt', 'member_credit_data', 'month', 'total_refund'))->setPaper('a4', $paperType);
        return $pdf->download('gpf-withdrawal-' . $member->name . '.pdf');
    }

    public function gpfSubscription()
    {
        $startYear = 1958;
        $endYear = date('Y');
        $accountants = User::role('ACCOUNTANT')->get();
        $years = range($startYear, $endYear);
        return view('frontend.reports.gpf-subscription', compact('years', 'accountants'));
    }

    public function gpfSubscriptionGenerate(Request $request)
    {
        // dd($request->all());
        $accountant = $request->accountant;
        $e_status = $request->e_status;
        $member_id = $request->member_id;
        $from_year = $request->from_year;
        $from_month = $request->from_month;
        $to_year = $request->to_year;
        $to_month = $request->to_month;

        // Construct the start and end dates
        $start_date = Carbon::create($from_year, $from_month, 1)->startOfMonth();
        $end_date = Carbon::create($to_year, $to_month, 1)->endOfMonth();

        // Fetch the GPF details
        $totalGpfDetails = MemberGpf::where('member_id', $member_id)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->get();

        $total_refund = 0;
        $total_sub_amt = 0;

        foreach ($totalGpfDetails as $gpf) {
            $total_refund += $gpf->refund;
            $total_sub_amt += $gpf->monthly_subscription;
        }

        $gpfData = MemberGpf::where('member_id', $member_id)->latest()->first();

        $member = Member::where('id', $member_id)->with('desigs')->first();
        $member_core_info = MemberCoreInfo::where('member_id', $member_id)->first();

        if ($totalGpfDetails->isEmpty()) {
            return redirect()->back()->with('error', 'No data found for the selected month');
        }

        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.gpf-subscription-generate', compact('member', 'totalGpfDetails', 'gpfData', 'member', 'from_year', 'from_month', 'to_year', 'to_month', 'member_core_info', 'total_refund', 'total_sub_amt', 'start_date', 'end_date', 'accountant'))->setPaper('a4', $paperType);
        return $pdf->download('gpf-subscription-' . $member->name . '.pdf');
    }

    public function quaterlyTds()
    {

        $financialYears = Helper::getFinancialYears();
        return view('frontend.reports.quaterly-tds-report', compact('financialYears'));
    }

    public function quaterlyTdsGenerate(Request $request)
    {
        $request->validate([
            'e_status' => 'required',
            'report_quarter' => 'required',
            'report_year' => 'required',
        ]);

        $report_quarter = $request->report_quarter;
        $report_year = $request->report_year;
        $years = explode('-', $report_year);

        if ($report_quarter == 'Q1') {
            $startYear = $years[0];
            $endYear = $years[0];
            $startMonthDate = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
            $endMonthDate = Carbon::createFromDate($endYear, 6, 30)->endOfDay();
            $months = ['Apr', 'May', 'Jun'];
            $year = $years[0];
            $cap_months  = ['APRIL', 'MAY', 'JUNE'];
            $number_months = ['04', '05', '06'];
        } elseif ($report_quarter == 'Q2') {
            $startYear = $years[0];
            $endYear = $years[0];
            $startMonthDate = Carbon::createFromDate($startYear, 7, 1)->startOfDay();
            $endMonthDate = Carbon::createFromDate($endYear, 9, 30)->endOfDay();
            $months = ['Jul', 'Aug', 'Sep'];
            $year = $years[0];
            $cap_months  = ['JULY', 'AUGUST', 'SEPTEMBER'];
            $number_months = ['07', '08', '09'];
        } elseif ($report_quarter == 'Q3') {
            $startYear = $years[0];
            $endYear = $years[0];
            $startMonthDate = Carbon::createFromDate($startYear, 10, 1)->startOfDay();
            $endMonthDate = Carbon::createFromDate($endYear, 12, 31)->endOfDay();
            $months = ['Oct', 'Nov', 'Dec'];
            $year = $years[0];
            $cap_months  = ['OCOTBER', 'NOVEMBER', 'DECEMBER'];
            $number_months = ['10', '11', '12'];
        } elseif ($report_quarter == 'Q4') {
            $startYear = $years[1];
            $endYear = $years[1];
            $startMonthDate = Carbon::createFromDate($startYear, 1, 1)->startOfDay();
            $endMonthDate = Carbon::createFromDate($endYear, 3, 31)->endOfDay();
            $months = ['Jan', 'Feb', 'Mar'];
            $year = $years[1];
            $cap_months  = ['JAUNARY', 'FEBRUARY', 'MARCH'];
            $number_months = ['01', '02', '03'];
        }

        $members = Member::where('e_status', $request->e_status)->where('pay_stop', 'No')
            ->get();
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.quaterly-tds-report-generate', compact('members', 'cap_months', 'months', 'year', 'report_quarter', 'report_year', 'number_months'))->setPaper('a4', $paperType);
        return $pdf->download('quaterly-tds-report-' . $report_quarter . '-' . $report_year . '.pdf');
    }
    public function groupChildrenAllowance()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.group-children-allowance', compact('categories'));
    }

    public function groupChildrenAllowanceGenerate(Request $request)
    {
        // find out the member respect to category then member family table detail loop

        $members = Member::where('category', $request->category)->get();
        $data = $request;
        $timestamp = now()->format('YmdHis');
        $bill_no = date('Y') . '-PGB' . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT) . $timestamp;
        $today =  Carbon::now()->format('d-M-Y');
        $total = 0;

        foreach ($members as $member) {
            $member_detail = Member::where('id', $member->id)->first();
            $member_children = MemberFamily::where('member_id', $member->id)->first();
            $total += ($member_children->child1_amount ?? 0) + ($member_children->child2_amount ?? 0);
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.group-children-allowance-report', compact('members', 'data', 'total', 'bill_no', 'today'))->setPaper('a4', $paperType);
        return $pdf->download('group-children-allowance-report-' . 'fgd' . '.pdf');
    }

    public function newspaperAllowance(Request $request)
    {
        $designations = Designation::orderBy('id', 'desc')->get();
        return view('frontend.reports.newspaper-allowance', compact('designations'));
    }

    public function getMemberNewspaperAllocation(Request $request)
    {
        $member_detail = Member::where('id', $request->member_id)->first();
        $get_news_allow = NewspaperAllowance::where('category_id', $member_detail->category)->where('year', $request->year)->first();
        return response()->json(['get_news_allow' => $get_news_allow]);
    }

    // public function newspaperReportGenerate(Request $request)
    // {

    //     $request->validate([
    //         'report_type' => 'required',
    //         //if $request->report_type == 'individual'
    //         'member_id' => 'required_if:report_type,individual',
    //         'e_status' => 'required_if:report_type,individual',
    //         //if $request->report_type == 'group'
    //         'category' => 'required_if:report_type,group',

    //     ]);
    //     $data = $request->all();

    //     if ($request->report_type == 'individual') {
    //         $member_detail = Member::where('id', $request->member_id)->first();
    //         $setting = Setting::first();
    //         $paperType = $request->paper_type ?? $setting->pdf_page_type;
    //         $pdf = PDF::loadView('frontend.reports.newspaper-allowance-report-generate', compact('member_detail', 'data'))->setPaper('a4', $paperType);
    //         return $pdf->download('newspaper-allowance-report-' . $member_detail->name . '.pdf');
    //     } else {

    //         $members = Member::where('category', $request->category)->get();
    //         $total = 0;
    //         foreach ($members as $member) {
    //             $amount = MemberNewspaperAllowance::where('member_id', $member->id)->first();
    //             $total += $amount->amount ?? 0;
    //         }
    //         $setting = Setting::first();
    //         $paperType = $request->paper_type ?? $setting->pdf_page_type;
    //         $pdf = PDF::loadView('frontend.reports.group-newspaper-report-generate', compact('members', 'total'))->setPaper('a4', $paperType);
    //         return $pdf->download('newspaper-allowance-report-' . 'all-members' . '.pdf');
    //     }
    // }

    public function newspaperReportGenerate(Request $request)
    {
        $request->validate([
            'generate_by'   => 'required|in:member,designation,all',
            'e_status'      => 'required|in:active,deputation',
            'duration'      => 'required|in:half_yearly,quarterly',
            'year'          => 'required|integer|min:1950|max:' . date('Y'),
            'month_duration' => 'required|regex:/^\d{2}-\d{2}$/',
            'member_id'     => 'required_if:generate_by,member|nullable|exists:members,id',
            'designation'   => 'required_if:generate_by,designation|nullable|exists:designations,id',
        ], [
            'member_id.required_if' => 'Please select a member when "Member" is selected.',
            'designation.required_if' => 'Please select a designation when "Designation" is selected.',
        ]);

        // Parse month range and determine year boundaries
        list($startMonth, $endMonth) = explode('-', $request->month_duration);
        $year = $request->year;
        // Convert numeric month to month name
        $startMonthName = date('M', mktime(0, 0, 0, (int)$startMonth, 1));
        $endMonthName = date('M', mktime(0, 0, 0, (int)$endMonth, 1));

        // dd($startMonthName, $endMonthName); // outputs: "Jan", "Jun"



        // Main query
        $query = MemberNewspaperAllowance::with(['member', 'member.memberPersonalInfo'])
            ->orderBy('id')
            ->where('duration', $request->duration)
            ->where('month_duration', $request->month_duration)
            ->whereHas('member', function ($q) use ($request) {
                $q->where('e_status', $request->e_status);
            });

        if ($request->generate_by === 'member') {
            $query->where('member_id', $request->member_id);
        }

        if ($request->generate_by === 'designation') {
            $query->whereHas('member', function ($q) use ($request) {
                $q->where('desig', $request->designation);
            });
        }

        $newspaperData = $query->get()->chunk(39);

        // dd($landlineData->toArray());

        if ($newspaperData->isEmpty()) {
            return redirect()->back()->with('error', 'No data found!');
        }

        $paperType = 'portrait';
        $pdf = PDF::loadView('frontend.reports.group-newspaper-report-generate', [
            'newspaperData' => $newspaperData,
            'startMonthName' => $startMonthName,
            'endMonthName' => $endMonthName,
            'year' => $year
        ])->setPaper('a4', $paperType);

        return $pdf->download('newspaper-report-' . now()->format('YmdHis') . '.pdf');



        return back()->with('error', 'Invalid document type selected.');
    }



    public function groupNewspaperAllocation()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.group-newspaper-allowance', compact('categories'));
    }

    public function groupNewspaperReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();
        $total = 0;
        foreach ($members as $member) {
            $amount = MemberNewspaperAllowance::where('member_id', $member->id)->first();
            $total += $amount->amount;
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.group-newspaper-report-generate', compact('members', 'total'))->setPaper('a4', $paperType);
        return $pdf->download('newspaper-allowance-report-' . 'all-members' . '.pdf');
    }

    public function landlineAllocation()
    {
        $designations = Designation::orderBy('id', 'desc')->get();
        $the_month = (int) date('m');
        $the_year = (int) date('Y');
        $directors = Member::whereHas('desigs', function ($query) {
            $query->where('designation', 'DIR');
        })->with('desigs')->get();

        $financialYear = $the_month >= 4
            ? $the_year . '-' . ($the_year + 1)
            : ($the_year - 1) . '-' . $the_year;
        return view('frontend.reports.landline-allowance', compact('designations', 'financialYear', 'directors'));
    }



    public function landlineReportGenerate(Request $request)
    {
        // Validation
        $rules = [
            'generate_by'   => 'required|in:member,designation,all',
            'e_status'      => 'required|in:active,deputation',
            'financial_year' => 'required',
            'director'  => 'required',
        ];

        if ($request->generate_by === 'member') {
            $rules['member_id'] = 'required|exists:members,id';
        }

        if ($request->generate_by === 'designation') {
            $rules['designation'] = 'required|exists:designations,id';
        }

        $this->validate($request, $rules);

        $financial_year = $request->financial_year;

        // Query
        [$startYear, $endYear] = explode('-', $financial_year);

        $query = MemberLandline::with(['member', 'member.memberPersonalInfo'])

            ->orderBy('date', 'asc')
            ->where(function ($q) use ($startYear, $endYear) {
                $q->where(function ($sub) use ($startYear) {
                    $sub->where('year', $startYear)
                        ->whereBetween('month', [4, 12]);
                })
                    ->orWhere(function ($sub) use ($endYear) {
                        $sub->where('year', $endYear)
                            ->whereBetween('month', [1, 3]);
                    });
            })
            ->whereHas('member', function ($q) use ($request) {
                $q->where('e_status', $request->e_status);
            });

        if ($request->generate_by === 'member') {
            $query->where('member_id', $request->member_id);
        }

        if ($request->generate_by === 'designation') {
            $query->whereHas('member', function ($q) use ($request) {
                $q->where('desig', $request->designation);
            });
        }

        $landlineData = $query->get()
            ->groupBy('member_id')
            ->values()
            ->chunk(24);

        if ($landlineData->isEmpty()) {
            return redirect()
                ->back()
                ->with('error', 'No data found!');
        }

        $setting = Setting::first();
        $logo = Helper::logo() ?? '';
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $director_name = Member::findOrFail($request->director)->name ?? '-';

        $pdf = PDF::loadView('frontend.reports.landline-allow-report-generate', compact('landlineData', 'startYear', 'endYear', 'financial_year', 'logo', 'director_name'))
            ->setPaper('a4', 'portrait');

        return $pdf->download("landline-allowance-report-{$startYear}-{$endYear}.pdf");
    }








    public function bagPurseAllowanceReport()
    {
        $designations = Designation::orderBy('id', 'desc')->get();
        $the_month = (int) date('m');
        $the_year = (int) date('Y');
        $directors = Member::whereHas('desigs', function ($query) {
            $query->where('designation', 'DIR');
        })->with('desigs')->get();

        $financialYear = $the_month >= 4
            ? $the_year . '-' . ($the_year + 1)
            : ($the_year - 1) . '-' . $the_year;

        $accountants = User::role('ACCOUNTANT')->get();
        $senior_account_officers = Member::whereHas('desigs', function ($query) {
            $query->where('designation', 'SAO-I');
        })->with('desigs')->get();

        return view('frontend.reports.bag-purse-allowance', compact('designations', 'financialYear', 'directors', 'accountants', 'senior_account_officers'));
    }

    public function bagPurseAllowanceReportGenerate(Request $request)
    {

        // Validation
        $rules = [
            'generate_by'   => 'required|in:member,designation,all',
            'e_status'      => 'required|in:active,deputation',
            'financial_year' => 'required',
            'director'  => 'required',
            'accountant'  => 'required',
            'senior_account_officer'  => 'required',
        ];

        if ($request->generate_by === 'member') {
            $rules['member_id'] = 'required|exists:members,id';
        }

        if ($request->generate_by === 'designation') {
            $rules['designation'] = 'required|exists:designations,id';
        }

        $this->validate($request, $rules);

        $financial_year = $request->financial_year;

        // Query
        [$startYear, $endYear] = explode('-', $financial_year);

        $query = MemberBagPurse::with(['member', 'member.memberPersonalInfo'])
            ->where(function ($q) use ($startYear, $endYear) {
                $q->where(function ($sub) use ($startYear) {
                    $sub->where('year', $startYear)
                        ->whereBetween('month', [4, 12]);
                })
                    ->orWhere(function ($sub) use ($endYear) {
                        $sub->where('year', $endYear)
                            ->whereBetween('month', [1, 3]);
                    });
            })
            ->whereHas('member', function ($q) use ($request) {
                $q->where('e_status', $request->e_status);
            });

        if ($request->generate_by === 'member') {
            $query->where('member_id', $request->member_id);
        }

        // if ($request->generate_by === 'designation') {
        //     $query->whereHas('member', function ($q) use ($request) {
        //         $q->where('desig', $request->designation);
        //     });
        // }

        $bagPurseData = $query->get()
            ->groupBy('member_id')
            ->values()
            ->chunk(24);

        //  dd($bagPurseData->toArray(), $request->designation);

        if ($bagPurseData->isEmpty()) {
            return redirect()
                ->back()
                ->with('error', 'No data found!');
        }



        $setting = Setting::first();
        $logo = Helper::logo() ?? '';
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $director_name = Member::findOrFail($request->director)->name ?? '-';
        $senior_account_manager_name = Member::findOrFail($request->senior_account_officer)->name ?? '-';
        $accountant = $request->accountant;
        // return view('frontend.reports.bag-purse-allowance-report-generate')->with(compact('bagPurseData', 'startYear', 'endYear', 'financial_year', 'logo', 'director_name', 'senior_account_manager_name', 'accountant'));
        $pdf = PDF::loadView('frontend.reports.bag-purse-allowance-report-generate', compact('bagPurseData', 'startYear', 'endYear', 'financial_year', 'logo', 'director_name', 'senior_account_manager_name', 'accountant'))
            ->setPaper('a4', 'portrait');

        return $pdf->download("bag-purse-allowance-report-{$startYear}-{$endYear}.pdf");
    }


    public function medicalAllowanceReport()
    {
        $members = Member::where('pay_stop', 'No')->orderBy('id', 'asc')
            ->get();

        $senior_account_officers = Member::whereHas('desigs', function ($query) {
            $query->where('designation', 'SAO-I');
        })->with('desigs')->get();

        return view('frontend.reports.medical-allowance', compact('members', 'senior_account_officers'));
    }

    public function medicalAllowanceReportGenerate(Request $request)
    {

        $rules = [
            'generate_by'   => 'required|in:member,designation,all',
            'e_status'      => 'required|in:active,deputation',
            'report_date' => 'required|date',
            'senior_account_officer' => 'required',
        ];

        if ($request->generate_by === 'member') {
            $rules['member_id'] = 'required|exists:members,id';
        }

        if ($request->generate_by === 'designation') {
            $rules['designation'] = 'required|exists:designations,id';
        }

        $this->validate($request, $rules);

        $reported_date = $request->report_date ? date('d-m-Y', strtotime($request->report_date)) : '';
        $date = Carbon::parse($request->report_date); // or use any date input

        $year = $date->year;
        $month = $date->month;

        if ($month < 4) {
            // January, February, March → Previous year – Current year
            $financial_year = ($year - 1) . '-' . $year;
        } else {
            // April to December → Current year – Next year
            $financial_year = $year . '-' . ($year + 1);
        }

        // Query
        [$startYear, $endYear] = explode('-', $financial_year);

        $query = MedicalAllowance::with(['member', 'member.memberPersonalInfo'])
            ->where('bill_date', $request->report_date)
            ->whereHas('member', function ($q) use ($request) {
                $q->where('e_status', $request->e_status);
            });

        if ($request->generate_by === 'member') {
            $query->where('member_id', $request->member_id);
        }

        // if ($request->generate_by === 'designation') {
        //     $query->whereHas('member', function ($q) use ($request) {
        //         $q->where('desig', $request->designation);
        //     });
        // }

        $medicalData = $query->get()
            ->values()
            ->chunk(6);

        //  dd($bagPurseData->toArray(), $request->designation);

        if ($medicalData->isEmpty()) {
            return redirect()
                ->back()
                ->with('error', 'No data found!');
        }



        $setting = Setting::first();
        $logo = Helper::logo() ?? '';
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $senior_account_manager_name = Member::findOrFail($request->senior_account_officer)->name ?? '-';
        // return view('frontend.reports.medical-allowance-report-generate')->with(compact('medicalData', 'startYear', 'endYear', 'financial_year', 'logo','reported_date', 'senior_account_manager_name'));
        $pdf = PDF::loadView('frontend.reports.medical-allowance-report-generate', compact('medicalData', 'startYear', 'endYear', 'financial_year', 'logo', 'reported_date', 'senior_account_manager_name'))
            ->setPaper('a4', 'portrait');

        return $pdf->download("medical-allowance-report-{$startYear}-{$endYear}.pdf");
    }

    public function terminalBenefits()
    {
        $members = Member::whereHas('memberRetirementInfo')->with('memberRetirementInfo')->get();
        $accountants = User::role('ACCOUNTANT')->get();

        return view('frontend.reports.terminal-benefits', compact('members', 'accountants'));
    }

    public function terminalBenefitsGenerate(Request $request)
    {
        // validation
        $request->validate([
            'member_id' => 'required',
        ]);
        $member_id = $request->member_id;
        $member = Member::where('id', $member_id)->with('memberRetirementInfo')->first();
        $member_retirement_info = MemberRetirementInfo::where('member_id', $member_id)->first();
        $member_credit_data = MemberCredit::where('member_id', $member_id)->latest()->first();
        $da_percentage = DearnessAllowancePercentage::where('is_active', 1)->first();
        $accountant = $request->accountant;

        if ($member_retirement_info->retirement_type == 'voluntary') {
            $retirement_type = 'VRS';
        } else {
            $retirement_type = '';
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.terminal-benefits-generate', compact('member', 'member_retirement_info', 'member_credit_data', 'retirement_type', 'da_percentage', 'accountant'))->setPaper('a4', $paperType);
        return $pdf->download('terminal-benefits-' . $member->name . '.pdf');
    }

    public function formSixteenB()
    {
        $members = Member::all();
        $assessment_year = Helper::getFinancialYears();

        return view('frontend.reports.form-sixteen-b', compact('members', 'assessment_year'));
    }

    public function formSixteenBGenerate(Request $request)
    {
        $member = Member::where('id', $request->member_id)->with('desigs')->first();
        $assessment_year = $request->report_year;
        $current_financial_year = date('Y') . '-' . (date('Y') + 1);
        $income_from_other_sources = $request->other_income;
        $income_from_house_property = $request->house_property_income;
        $prerequisite172 = 0;
        $profits_in_lieu = 0;
        $total_from_other_employer = 0;
        $amt10a = 0;
        $amt10b = 0;
        $exemption10 = 0;
        $standard_deduction_16 = 0;
        $entertainment_allow = 0;
        $profession_tax = 0;
        $other_deduction_via = 0;
        $surcharge = 0;

        [$startYear, $endYear] = explode('-', $request->report_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        $member_it_exemption = MemberIncomeTax::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->latest()->first();
        $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first();
        $incometaxRate = IncomeTax::where('financial_year', $request->report_year)->get();

        if ($member_it_exemption->count() == 0) {
            return redirect()->back()->with('error', 'No data found for the selected year');
        }

        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.form-sixteen-b-generate', compact('member', 'assessment_year', 'member_credit_data', 'member_it_exemption', 'current_financial_year', 'income_from_other_sources', 'income_from_house_property', 'member_core_info', 'prerequisite172', 'profits_in_lieu', 'total_from_other_employer', 'amt10a', 'amt10b', 'exemption10', 'standard_deduction_16', 'entertainment_allow', 'profession_tax', 'other_deduction_via', 'incometaxRate', 'surcharge'))->setPaper('a4', $paperType);
        return $pdf->download('form-sixteen-b-' . $member->name . '.pdf');
    }

    public function ltcAdvance()
    {
        $members = Member::orderBy('id', 'asc')->get();
        $assessment_years = Helper::getFinancialYears();
        $leave_types = LeaveType::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.reports.ltc-advancement', compact('members', 'assessment_years', 'leave_types'));
    }

    public function getMemberLeave(Request $request)
    {
        $leave = MemberLeave::where('member_id', $request->member_id)
            ->where('leave_type_id', $request->leave_type)
            ->where('year', date('Y'))
            ->sum('remaining_leaves');
        return response()->json(['leave' => $leave->remaining_leaves]);
    }

    public function ltcAdvanceSettlement()
    {
        return view('frontend.reports.ltc-advance-settlement');
    }

    public function ltcAdvanceReport()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $members = Member::orderBy('id', 'asc')->get();
        return view('frontend.reports.ltc-advance-report', compact('members', 'categories'));
    }

    public function ltcAdvanceReportGenerate(Request $request)
    {
        $member = Member::where('id', $request->member_id)->first();
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.ltc-advance-report-generate', compact('member'))->setPaper('a4', $paperType);
        return $pdf->download('ltc-advance-' . '.pdf');
    }

    public function formsixteen()
    {
        $members = Member::all();
        $assessment_year = Helper::getFinancialYears();

        return view('frontend.reports.form-sixteen', compact('members', 'assessment_year'));
    }

    public function formSixteenGenerate(Request $request)
    {
        $member = Member::where('id', $request->member_id)->with('desigs')->first();
        $assessment_year = $request->report_year;
        $current_financial_year = date('Y') . '-' . (date('Y') + 1);
        $prerequisite172 = 0;
        $profits_in_lieu = 0;
        $total_from_other_employer = 0;
        $amt10a = 0;
        $amt10b = 0;
        $exemption10 = 0;
        $standard_deduction_16 = 0;
        $entertainment_allow = 0;
        $profession_tax = 0;
        $other_deduction_via = 0;
        $other_income = 0;
        $surcharge = 0;
        $tax_deducted_192i = 0;
        $tax_paid_192ia = 0;

        [$startYear, $endYear] = explode('-', $request->report_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        $member_it_exemption = MemberIncomeTax::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->latest()->first();
        $member_debit_data = MemberDebit::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->latest()->first();
        $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first();
        $incometaxRate = IncomeTax::where('financial_year', $request->report_year)->get();

        if ($member_it_exemption->count() == 0) {
            return redirect()->back()->with('error', 'No data found for the selected year');
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.form-sixteen-generate', compact('member', 'assessment_year', 'member_credit_data', 'member_it_exemption', 'current_financial_year',  'member_core_info', 'prerequisite172', 'profits_in_lieu', 'total_from_other_employer', 'amt10a', 'amt10b', 'exemption10', 'standard_deduction_16', 'entertainment_allow', 'profession_tax', 'other_deduction_via', 'startYear', 'endYear', 'member_debit_data', 'other_income', 'incometaxRate', 'surcharge', 'tax_deducted_192i', 'tax_paid_192ia'))->setPaper('a4', $paperType);
        return $pdf->download('form-sixteen-' . $member->name . '.pdf');
    }

    public function formSixteenA()
    {
        $members = Member::all();
        $assessment_year = Helper::getFinancialYears();

        return view('frontend.reports.form-sixteen-a', compact('members', 'assessment_year'));
    }

    public function formSixteenAGenerate(Request $request)
    {
        $member = Member::where('id', $request->member_id)->with('desigs')->first();
        $assessment_year = $request->report_year;
        $current_financial_year = date('Y') . '-' . (date('Y') + 1);
        $prerequisite172 = 0;
        $profits_in_lieu = 0;
        $total_from_other_employer = 0;
        $amt10a = 0;
        $amt10b = 0;
        $exemption10 = 0;
        $standard_deduction_16 = 0;
        $entertainment_allow = 0;
        $profession_tax = 0;
        $other_deduction_via = 0;

        [$startYear, $endYear] = explode('-', $request->report_year);
        $startOfYear = Carbon::createFromDate($startYear, 4, 1)->startOfDay();
        $endOfYear = Carbon::createFromDate("$endYear", 3, 31)->endOfDay();

        $member_it_exemption = MemberIncomeTax::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $member_credit_data = MemberCredit::where('member_id', $request->member_id)->whereBetween('created_at', [$startOfYear, $endOfYear])->latest()->first();
        $member_core_info = MemberCoreInfo::where('member_id', $request->member_id)->first();
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.form-sixteen-a-generate', compact('member', 'assessment_year', 'member_credit_data', 'member_it_exemption', 'current_financial_year',  'member_core_info', 'prerequisite172', 'profits_in_lieu', 'total_from_other_employer', 'amt10a', 'amt10b', 'exemption10', 'standard_deduction_16', 'entertainment_allow', 'profession_tax', 'other_deduction_via', 'startYear', 'endYear'))->setPaper('a4', $paperType);
        return $pdf->download('form-sixteen-a-' . $member->name . '.pdf');
    }

    public function payMatrixReport()
    {
        $pay_commissions = PayCommission::orderBy('id', 'desc')->get();
        $financial_years = Helper::getFinancialYears();
        return view('frontend.reports.pay-matrix-report', compact('pay_commissions', 'financial_years'));
    }

    public function payMatrixReportGenerate(Request $request)
    {

        $pay_bands = Payband::where('year', $request->financial_year)->get();
        $pm_levels = PmLevel::where('year', $request->financial_year)->get();
        $pay_level_counts = [];
        foreach ($pay_bands as $pay_band) {
            $pay_levels = PmLevel::where('payband', $pay_band->id)->count();
            $pay_level_counts[$pay_band->id] = $pay_levels;
        }

        $gradePayArray = [];
        $entryPayArray = [];
        $levelArray = [];
        $pmIndexArray = [];
        $pmRowArray = [];

        // Initialize the pmRowArray with empty arrays for each row
        $pm_rows = PayMatrixRow::all();
        foreach ($pm_rows as $row) {
            $pmRowArray[$row->id] = []; // Initialize empty array for each row
        }

        foreach ($pm_levels as $pm_level) {
            $grade_pay = GradePay::where('pay_level', $pm_level->id)->first();
            $pm_index = PmIndex::where('pm_level_id', $pm_level->id)->first();

            $gradePayArray[] = $grade_pay->amount ?? '';
            $entryPayArray[] = $pm_level->entry_pay ?? '';
            $levelArray[] = $pm_level->value;
            $pmIndexArray[] = $pm_index->value ?? '';

            foreach ($pm_rows as $row) {
                $pay_matrix_basic = PayMatrixBasic::where('pay_matrix_row_id', $row->id)
                    ->where('pm_level_id', $pm_level->id)
                    ->first();



                $pmRowArray[$row->id][] = $pay_matrix_basic->basic_pay ?? '';
            }
        }

        // Create the final structured array
        $structuredArray = [
            'GradePay' => $gradePayArray,
            'EntryPay' => $entryPayArray,
            'Level' => $levelArray,
            'PmIndex' => $pmIndexArray,
            'PmRow' => array_values($pmRowArray) // Convert associative array to indexed array
        ];

        // dd($level_array);
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.pay-matrix-report-generate', compact('pay_bands', 'pay_level_counts', 'pm_levels', 'structuredArray'))->setPaper('a4', $paperType);
        return $pdf->download('pay-matrix-commission-report-' . $request->financial_year . '.pdf');
    }

    public function daArrears()
    {
        // $financialYears = Helper::getFinancialYears();
        $categories = Category::orderby('id', 'desc')->get();
        return view('frontend.reports.da-arrears', compact('categories'));
    }

    public function daArrearsGenerate(Request $request)
    {
        $from_year = $request->from_year;
        $from_month = $request->from_month;
        $to_year = $request->to_year;
        $to_month = $request->to_month;
        $category = Category::where('id', $request->category)->first();

        $start_date = Carbon::create($from_year, $from_month, 1)->startOfMonth();
        $end_date = Carbon::create($to_year, $to_month, 1)->endOfMonth();

        $members = Member::where('e_status', $request->e_status)->where('category', $request->category)->get();
        // Chunk the collection into groups of 10
        $chunkedMembers = $members->chunk(2);

        $due_da_percentage_for_heading = DearnessAllowancePercentage::whereBetween('year', [$from_year, $to_year])
            ->where(function ($query) use ($from_year, $to_year, $from_month, $to_month) {
                $query->where(function ($subQuery) use ($from_year, $from_month) {
                    $subQuery->where('year', $from_year)
                        ->where('month', '>=', $from_month);
                })
                    ->orWhere(function ($subQuery) use ($to_year, $to_month) {
                        $subQuery->where('year', $to_year)
                            ->where('month', '<=', $to_month);
                    })
                    ->orWhere(function ($subQuery) use ($from_year, $to_year) {
                        $subQuery->whereBetween('year', [strval($from_year + 1), strval($to_year - 1)]);
                    });
            })
            ->latest()->first();

        $drawn_da_percentage_for_heading = DearnessAllowancePercentage::whereBetween('year', [$from_year, $to_year])
            ->where(function ($query) use ($from_year, $to_year, $from_month, $to_month) {
                $query->where(function ($subQuery) use ($from_year, $from_month) {
                    $subQuery->where('year', $from_year)
                        ->where('month', '>=', $from_month);
                })
                    ->orWhere(function ($subQuery) use ($to_year, $to_month) {
                        $subQuery->where('year', $to_year)
                            ->where('month', '<=', $to_month);
                    })
                    ->orWhere(function ($subQuery) use ($from_year, $to_year) {
                        $subQuery->whereBetween('year', [strval($from_year + 1), strval($to_year - 1)]);
                    });
            })
            ->where('is_active', 0)
            ->latest()->first();

        $da_percentage_diff_heading = $due_da_percentage_for_heading->percentage - $drawn_da_percentage_for_heading->percentage;

        $report = []; // Initialize the report array outside the loop

        foreach ($chunkedMembers as $chunkedIndex => $chunkMember) {
            $chunkReport = []; // Initialize a temporary array for each chunk

            foreach ($chunkMember as $index => $member) { // Iterate over the members in the current chunk
                $member_basic = MemberMonthlyDataCredit::where('member_id', $member->id)
                    ->whereBetween('created_at', [$start_date, $end_date])
                    ->select('pay', 'g_pay')
                    ->latest()
                    ->first();
                $basic = $member_basic->pay ?? 0;
                $g_pay = $member_basic->g_pay ?? 0;

                $current_date = clone $start_date;
                $memberData = [
                    'Sl_No' => $index + 1,
                    'Emp_ID' => $member->emp_id,
                    'Name' => $member->name,
                    'Desig' => $member->designation->designation ?? null,
                    'Basic' => $basic,
                    'GPAY' => $g_pay,
                    'monthly_data' => [],
                    'total_diff' => 0,
                    'total_tpt_diff' => 0,
                ];

                $cumulativeDiff = 0;
                $cumulativeTptDiff = 0;

                while ($current_date <= $end_date) {
                    $year = $current_date->year;
                    $month = $current_date->month;

                    $da_percentage = DearnessAllowancePercentage::where('year', $year)
                        ->where('month', $month)
                        ->where('is_active', 1)
                        ->latest()
                        ->first();
                    $da_now_percentage = $da_percentage->percentage ?? 0;

                    $prev_percentage = DearnessAllowancePercentage::where('year', $year)
                        ->where('month', $month)
                        ->where('is_active', 0)
                        ->latest()
                        ->first();
                    $prev_da_percentage = $prev_percentage->percentage ?? 0;

                    $da_due = $basic * $da_now_percentage / 100;
                    $da_drawn = $basic * $prev_da_percentage / 100;
                    $diff = $da_due - $da_drawn;

                    $tptData = MemberMonthlyDataCredit::where('member_id', $member->id)
                        ->where('year', $year)
                        ->where('month', $month)
                        ->select('tpt', 'da_on_tpt')
                        ->first();
                    $tpt_due_amt = $tptData->tpt ?? 0;
                    $tpt_da = $tptData->da_on_tpt ?? 0;

                    $da_for_tpt_percentage = DearnessAllowancePercentage::where('year', $year)
                        ->where('is_active', 1)
                        ->latest()
                        ->first();
                    $da_now_tpt_percentage = $da_for_tpt_percentage->percentage ?? 0;

                    $tpt_due = $tpt_due_amt + ($tpt_due_amt * $da_now_tpt_percentage / 100);
                    $tpt_drawn = $tpt_due_amt + $tpt_da;
                    $tpt_diff = $tpt_due - $tpt_drawn;

                    $npsData = MemberMonthlyDataDebit::where('member_id', $member->id)
                        ->where('year', $year)
                        ->where('month', $month)
                        ->select('pension_rec', 'eol', 'npsg')
                        ->first();

                    $nps = ($npsData->npsg ?? 0) + ($npsData->pension_rec ?? 0);
                    $eol = $npsData->eol ?? 0;

                    $total = $da_due + $tpt_due - $da_drawn - $tpt_drawn;
                    $final = $total - $nps;

                    $cumulativeDiff += $diff;
                    $cumulativeTptDiff += $tpt_diff;

                    $memberData['monthly_data'][] = [
                        'Month' => $current_date->format('M-Y'),
                        'Due' => $da_due,
                        'Drawn' => $da_drawn,
                        'Diff' => $diff,
                        'TPT_Due' => $tpt_due,
                        'TPT_Drawn' => $tpt_drawn,
                        'TPT_Diff' => $tpt_diff,
                        'NPS' => $nps,
                        'EOl' => $eol,
                        'Final' => $final,
                    ];

                    // Move to the next month
                    $current_date->addMonth();
                }

                // Store cumulative values separately
                $memberData['total_diff'] = $cumulativeDiff;
                $memberData['total_tpt_diff'] = $cumulativeTptDiff;

                // Add member data to the chunk report
                $chunkReport[] = $memberData;
            }

            // Add the chunk report to the main report array
            $report[$chunkedIndex] = $chunkReport;
        }
        // dd($report);


        // Now $report contains separate arrays for each chunk of members


        if ($chunkedMembers->isEmpty()) {
            return redirect()->back()->with('error', 'No data found');
        }

        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.da-arrears-generate-new', compact('report', 'da_percentage_diff_heading', 'due_da_percentage_for_heading', 'drawn_da_percentage_for_heading', 'start_date', 'end_date', 'chunkedMembers'))->setPaper('a4', $paperType);
        return $pdf->download('da-arrears-' . Carbon::parse($start_date)->format('M-Y') . 'to' . Carbon::parse($end_date)->format('M-Y') . '.pdf');
    }


    public function cgegis()
    {

        return view('frontend.reports.cgegis', compact('members', 'financialYears'));
    }

    public function iTaxRecovery()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.i-tax-recovery', compact('categories', 'accountants'));
    }

    public function iTaxReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();
        if ($members->count() == 0) {
            return redirect()->back()->with('error', 'No data found');
        }

        $chunkedMembers = $members->chunk(10); // Chunk the collection into groups of 8
        $category = Category::where('id', $request->category)->first();
        $year = $request->year;
        $month = $request->month;
        $accountant = $request->accountant;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.i-tax-report-generate', compact('chunkedMembers', 'category', 'month_name', 'year', 'accountant', 'month'))->setPaper('a4', $paperType);
        return $pdf->download('i-tax-recovery-report-' . '.pdf');
    }

    public function lfChanges()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.lf-changes', compact('categories', 'accountants'));
    }

    public function lfReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();

        foreach ($members as $member) {
            $member->credit = MemberMonthlyDataCredit::where('member_id', $member->id)
                ->where('year', $request->year)
                ->where('month', $request->month)
                ->first() ?? null;

            $member->debit = MemberMonthlyDataDebit::where('member_id', $member->id)
                ->where('year', $request->year)
                ->where('month', $request->month)
                ->first() ?? null;
        }

        // Chunk the collection into groups of 10
        $chunkedMembers = $members->chunk(10);

        // Additional variables
        $category = Category::where('id', $request->category)->first();
        $year = $request->year;
        $month = $request->month;
        $accountant = $request->accountant;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));

        if ($members->count() == 0) {
            return redirect()->back()->with('error', 'No data found');
        }

        // Generate the PDF
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.lf-chnages-reports', compact('chunkedMembers', 'category', 'month_name', 'year', 'accountant', 'month'))->setPaper('a4', $paperType);

        return $pdf->download('lf-chnages-recovery-report-' . '.pdf');
    }

    public function miscReport()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.misc-report', compact('categories'));
    }

    public function miscReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();
        $chunkedMembers = $members->chunk(10); // Chunk the collection into groups of 8
        $category = Category::where('id', $request->category)->first();
        $year = $request->year;
        $month = $request->month;
        $accountant = $request->accountant;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        if ($members->count() == 0) {
            return redirect()->back()->with('error', 'No data found');
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.misc-report-generate', compact('chunkedMembers', 'category', 'month_name', 'year', 'accountant', 'month'))->setPaper('a4', $paperType);
        return $pdf->download('misc-report-' . '.pdf');
    }

    public function npsReport()
    {
        $financialYears = Helper::getFinancialYears();
        return view('frontend.reports.nps-report', compact('financialYears'));
    }

    public function npsReportGenerate(Request $request)
    {
        $members = Member::orderBy('id', 'asc')->where('fund_type', 'NPS')->get();
        $chunkedMembers = $members->chunk(10);
        $financial_year = $request->financial_year;
        $year = $request->year;
        $da = $request->da;
        $accountant = $request->accountant;
        $month = $request->month;

        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        if ($members->count() == 0) {
            return redirect()->back()->with('error', 'No data found');
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.nps-report-generate', compact('chunkedMembers', 'financial_year', 'month_name', 'year', 'da', 'accountant', 'month'))->setPaper('a4', $paperType);
        return $pdf->download('nps-report-' . '.pdf');
    }

    public function getDaPercentNps(Request $request)
    {
        $get_da_percenrtage = DearnessAllowancePercentage::where('financial_year', $request->financial_year)->where('year', $request->year)->where('is_active', 1)->first();
        return response()->json(['da_percentage' => $get_da_percenrtage->percentage]);
    }

    public function cgegisReport()
    {
        $categories = Category::orderby('id', 'desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.cgegis-report', compact('categories', 'accountants'));
    }

    public function cgegisReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();
        if ($members->count() == 0) {
            return redirect()->back()->with('error', 'No data found');
        }
        $chunkedMembers = $members->chunk(10); // Chunk the collection into groups of 8
        $category = Category::where('id', $request->category)->first();
        $year = $request->year;
        $month = $request->month;
        $accountant = $request->accountant;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.cgegis-report-generate', compact('chunkedMembers', 'category', 'month_name', 'year', 'accountant', 'month'))->setPaper('a4', $paperType);
        return $pdf->download('cgegis-report-' . '.pdf');
    }

    public function cghsReport()
    {
        $categories = Category::orderby('id', 'desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.cghs-report', compact('categories', 'accountants'));
    }

    public function cghsReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();
        $chunkedMembers = $members->chunk(10); // Chunk the collection into groups of 8
        $category = Category::where('id', $request->category)->first();
        $year = $request->year;
        $month = $request->month;
        $accountant = $request->accountant;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        if ($members->count() == 0) {
            return redirect()->back()->with('error', 'No data found');
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.cghs-report-generate', compact('chunkedMembers', 'category', 'month_name', 'year', 'accountant', 'month'))->setPaper('a4', $paperType);
        return $pdf->download('cghs-report-' . '.pdf');
    }

    public function hbaReport()
    {
        $categories = Category::orderby('id', 'desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.hba-report', compact('categories', 'accountants'));
    }

    public function hbaReportGenerate(Request $request)
    {
        $members = Member::where('category', $request->category)->get();
        $chunkedMembers = $members->chunk(10); // Chunk the collection into groups of 8
        $category = Category::where('id', $request->category)->first();
        $year = $request->year;
        $accountant = $request->accountant;
        $month = $request->month;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        if ($members->count() == 0) {
            return redirect()->back()->with('error', 'No data found');
        }
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.hba-report-generate', compact('chunkedMembers', 'category', 'month_name', 'year', 'accountant', 'month'))->setPaper('a4', $paperType);
        return $pdf->download('hba-report-' . '.pdf');
    }

    public function payFixationArrears()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $accountants = User::role('ACCOUNTANT')->get();
        return view('frontend.reports.pay-fixation-arrears', compact('categories', 'accountants'));
    }

    public function payFixationArrearsGenerate(Request $request)
    {
        $member = Member::where('id', $request->member_id)->first();
        $from_year = $request->from_year;
        $from_month = $request->from_month;
        $to_year = $request->to_year;
        $to_month = $request->to_month;
        $accountant = $request->accountant;
        $due_basic = $request->due_basic;
        $due_tpt = $request->due_tpt;
        $pran_no = $member->pran_number ?? '';

        $start_date = Carbon::create($from_year, $from_month, 1)->startOfMonth();
        $end_date = Carbon::create($to_year, $to_month, 1)->endOfMonth();

        $monthlyData = []; // Initialize an array to hold the monthly data

        $current_date = clone $start_date;
        while ($current_date <= $end_date) {
            $year = $current_date->year;
            $month = $current_date->month;

            // Query MemberCredit table for the current month and year
            $memberCredit = MemberMonthlyDataCredit::where('member_id', $member->id)
                ->where('year', $year)
                ->where('month', $month)
                ->first();

            // Query MemberDebit table for the current month and year
            $npsData = Pension::where('user_id', $member->id)
                ->whereYear('year', $year)
                ->whereMonth('month', $month)
                ->first();

            // Query HRA table for the current month and year
            $hraData = Hra::where('status')->latest()->first();
            $hra_percentage = $hraData->percentage ?? 0;

            // Default values if no data exists for the month
            $drawn_basic = $memberCredit->pay ?? 0;

            // Calculate DA Due and Drawn
            $da_percentage = DearnessAllowancePercentage::where('year', $year)
                ->where('month', $month)
                ->where('is_active', 1)
                ->latest()
                ->first()
                ->percentage ?? 0;

            $da_due = $due_basic * $da_percentage / 100;
            $da_drawn = $drawn_basic * $da_percentage / 100;
            $diff = $da_due - $da_drawn;

            // Calculate TPT Due and Drawn
            $tpt_due = $due_tpt;
            $tpt_drawn = $memberCredit->tpt ?? 0;
            $tpt_diff = $tpt_due - $tpt_drawn;

            $due_tpt_da = $tpt_due * $da_percentage / 100;
            $drawn_tpt_da = $tpt_drawn * $da_percentage / 100;

            // Calculate HRA Due and Drawn
            $hra_due = $due_basic * $hra_percentage / 100;
            $hra_drawn = $drawn_basic * $hra_percentage / 100;

            // Calculate the total due and drawn
            $total_due = $due_basic + $da_due + $tpt_due + $hra_due + $due_tpt_da;
            $total_drawn = $drawn_basic + $da_drawn + $tpt_drawn + $hra_drawn + $drawn_tpt_da;

            // Difference between total due and drawn
            if ($total_drawn == 0 || $total_due == 0) {
                $total_diff = 0;
            } else {
                $total_diff = $total_due - $total_drawn;
            }

            // nps amount
            $nps = $npsData->npsg_sub_amt ?? 0;

            // total amount
            $total_amt = $total_diff - $nps;

            // Store the data for this month (even if it's all zeros)
            $monthlyData[] = [
                'Year' => $year,
                'Month' => $current_date->format('F'),
                'Due_Basic' => $due_basic,
                'Drawn_Basic' => $drawn_basic,
                'DA_Due' => $da_due,
                'DA_Drawn' => $da_drawn,
                'TPT_Due' => $tpt_due,
                'TPT_Drawn' => $tpt_drawn,
                'HRA_Due' => $hra_due,
                'HRA_Drawn' => $hra_drawn,
                'tpt_da_due' => $due_tpt_da,
                'tpt_da_drawn' => $drawn_tpt_da,
                'Total_Due' => $total_due,
                'Total_Drawn' => $total_drawn,
                'Total_Diff' => $total_diff,
                'NPS' => $nps,
                'Total_Amt' => $total_amt,
            ];

            // Move to the next month
            $current_date->addMonth();
        }

        // The $monthlyData array now contains all the data for each month within the specified range

        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.pay-fixation-arrears-generate', compact('monthlyData', 'member', 'accountant', 'pran_no', 'start_date', 'end_date'))->setPaper('a4', $paperType);
        return $pdf->download('pay-fixation-arrears-' . '.pdf');
    }

    public function getNpsMemberInfo(Request $request)
    {
        $members = Member::where('e_status', $request->e_status)->where('pay_stop', 'No')->where('fund_type', 'NPS')->orderBy('id', 'asc')->get();
        return response()->json(['members' => $members]);
    }
    //

    public function cgegGpfReport()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.cgeg_gpf', compact('categories'));
    }

    public function cgegGpfReportGenerate(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));

        $all_members_info = [];

        $gpf_members = MemberGpf::pluck('member_id')->toArray();
        $compareDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();

        $member_datas = Member::whereIn('id', $gpf_members)
            ->where('e_status', 'active')
            // ->where('category', $request->category)
            ->where('member_status', 1)
            ->where(function ($query) use ($compareDate) {
                $query->whereNull('pay_stop_date')
                    ->orWhere('pay_stop_date', '>', $compareDate);
            })
            ->orderBy('id', 'asc')
            ->with('desigs')
            ->get();


        if ($member_datas->count() == 0) {
            return redirect()->back()->with('error', 'No data found');
        }

        foreach ($member_datas as $member_data) {
            $member_details = [
                'member_credit' => MemberMonthlyDataCredit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_debit' => MemberMonthlyDataDebit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_recovery' => MemberMonthlyDataRecovery::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_core_info' => MemberMonthlyDataCoreInfo::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->with('banks')
                    ->first(),

            ];

            $combined_member_info = [
                'member_data' => $member_data,
                'details' => $member_details,
            ];

            $all_members_info[] = $combined_member_info;
        }

        //  return $all_members_info;
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.cgeg_gpf_generate', compact('all_members_info', 'month_name', 'year', 'month'))->setPaper('a4', $paperType);
        return $pdf->download('CGEF-GPF-Report-' . $month . '-' . $year . '.pdf');
    }


    public function recoveryGpfReport()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.recovery-gpf', compact('categories'));
    }

    public function recoveryGpfReportGenerate(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        $compareDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $all_members_info = [];

        $gpf_members = MemberGpf::pluck('member_id')->toArray();

        $member_datas = Member::whereIn('id', $gpf_members)
            ->where('e_status', 'active')
            // ->where('category', $request->category)
            ->where('member_status', 1)
            ->where(function ($query) use ($compareDate) {
                $query->whereNull('pay_stop_date')
                    ->orWhere('pay_stop_date', '>', $compareDate);
            })
            ->orderBy('id', 'asc')
            ->with('desigs')
            ->get();


        if ($member_datas->count() == 0) {
            return redirect()->back()->with('error', 'No data found');
        }

        foreach ($member_datas as $member_data) {
            $member_details = [
                'member_credit' => MemberMonthlyDataCredit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_debit' => MemberMonthlyDataDebit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_recovery' => MemberMonthlyDataRecovery::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_core_info' => MemberCoreInfo::where('member_id', $member_data->id)
                    ->with('banks')
                    ->first(),

            ];

            $combined_member_info = [
                'member_data' => $member_data,
                'details' => $member_details,
            ];

            $all_members_info[] = $combined_member_info;
        }

        // return $all_members_info;
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.recovery-gpf-generate', compact('all_members_info', 'month_name', 'year', 'month'))->setPaper('a4', $paperType);
        return $pdf->download('RECOVERY-SCHEDULE-GPF-' . $month . '-' . $year . '.pdf');
    }


    public function recoveryNpsReport()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.recovery-nps', compact('categories'));
    }

    public function recoveryNpsReportGenerate(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));
        $compareDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $all_members_info = [];

        // $gpf_members = MemberGpf::pluck('member_id')->toArray();

        $member_datas = Member::where('e_status', 'active')
            // ->where('category', $request->category)
            ->where('member_status', 1)
            ->where('pay_stop', 'No')
            ->orderBy('id', 'asc')
            ->with('desigs')
            ->get();


        if ($member_datas->count() == 0) {
            return redirect()->back()->with('error', 'No data found');
        }

        foreach ($member_datas as $member_data) {
            $member_details = [
                'member_credit' => MemberMonthlyDataCredit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_debit' => MemberMonthlyDataDebit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_recovery' => MemberMonthlyDataRecovery::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_core_info' => MemberCoreInfo::where('member_id', $member_data->id)
                    ->with('banks')
                    ->first(),

            ];

            $combined_member_info = [
                'member_data' => $member_data,
                'details' => $member_details,
            ];

            $all_members_info[] = $combined_member_info;
        }

        // return $all_members_info;
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.recovery-nps-generate', compact('all_members_info', 'month_name', 'year', 'month'))->setPaper('a4', $paperType);
        return $pdf->download('RECOVERY-SCHEDULE-NPS-' . $month . '-' . $year . '.pdf');
    }


    public function incomeTaxCalculationReport()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('frontend.reports.income-tax-calculation', compact('categories'));
    }

    public function incomeTaxCalculationReportGenerate(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $month_name = date('F', mktime(0, 0, 0, $request->month, 10));

        $all_members_info = [];

        // $gpf_members = MemberGpf::pluck('member_id')->toArray();

        $member_datas = Member::where('e_status', 'active')
            // ->where('category', $request->category)
            ->where('member_status', 1)
            ->where('pay_stop', 'No')
            ->orderBy('id', 'asc')
            ->with('desigs')
            ->get();


        if ($member_datas->count() == 0) {
            return redirect()->back()->with('error', 'No data found');
        }

        foreach ($member_datas as $member_data) {
            $member_details = [
                'member_credit' => MemberMonthlyDataCredit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_debit' => MemberMonthlyDataDebit::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_recovery' => MemberMonthlyDataRecovery::where('member_id', $member_data->id)
                    ->where('year', $request->year)
                    ->where('month', $request->month)
                    ->first(),
                'member_core_info' => MemberCoreInfo::where('member_id', $member_data->id)
                    ->with('banks')
                    ->first(),

            ];

            $combined_member_info = [
                'member_data' => $member_data,
                'details' => $member_details,
            ];

            $all_members_info[] = $combined_member_info;
        }

        // return $all_members_info;
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;
        $pdf = PDF::loadView('frontend.reports.income-tax-calculation-generate', compact('all_members_info', 'month_name', 'year', 'month'))->setPaper('a4', $paperType)->setOptions(['isHtml5ParserEnabled' => true, 'isPhpEnabled' => true]);
        $pdf->setOption('margin-top', 0)
            ->setOption('margin-right', 0)
            ->setOption('margin-bottom', 0)
            ->setOption('margin-left', 0);
        return $pdf->download('income-tax-calculation-' . $month . '-' . $year . '.pdf');
    }






    //
}
