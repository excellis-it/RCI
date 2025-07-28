<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\IncomeTaxSync;
use App\Models\Member;
use App\Models\MemberLoan;
use App\Models\MemberMonthlyData;
use App\Models\MemberMonthlyDataCredit;
use App\Models\MemberMonthlyDataDebit;
use App\Models\MemberMonthlyDataLoanInfo;
use App\Models\MemberMonthlyDataRecovery;
use App\Models\PayDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $backups = IncomeTaxSync::select(
            'income_tax_syncs.group_id',
            'income_tax_syncs.month',
            'income_tax_syncs.year',
            DB::raw('MIN(categories.category) as category_name'),
            DB::raw('SUM(income_tax_syncs.gross) as total_gross'),
            DB::raw('SUM(income_tax_syncs.final) as total_final'),
            DB::raw('SUM(income_tax_syncs.net) as total_net')
        )
            ->leftJoin('categories', 'income_tax_syncs.category_id', '=', 'categories.id')
            ->groupBy('income_tax_syncs.group_id', 'income_tax_syncs.month', 'income_tax_syncs.year')
            ->orderByDesc('income_tax_syncs.year')
            ->orderByDesc('income_tax_syncs.month')
            ->paginate(10);

        $members = Member::orderBy('id', 'asc')
            ->where('name', '!=', 'The Director, CHESS')
            ->with('designation')
            ->get();

        $categories = DB::table('categories')->get();

        return view('frontend.backups.list', compact('backups', 'members', 'categories'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'generate_by' => 'required|in:member,category',
            'month' => 'required',
            'year' => 'required',
            'member_id' => 'required_if:generate_by,member',
            'category_id' => 'required_if:generate_by,category',
        ], [
            'generate_by.required' => 'Please select whether to generate data by Member or Category.',
            'month.required' => 'Month is required.',
            'year.required' => 'Year is required.',
            'member_id.required_if' => 'Please select a Member.',
            'category_id.required_if' => 'Please select a Category.',
        ]);

        $month = $request->month;
        $year = $request->year;

        $compareDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();

        $queryCredit = MemberMonthlyDataCredit::with('member')->where('month', $month)->where('year', $year)->whereHas('member', function ($query) use ($request, $compareDate) {
            $query->whereHas('desigs')
                ->where('member_status', 1)
                ->where(function ($q) use ($compareDate) {
                    $q->whereNull('pay_stop_date')
                        ->orWhere('pay_stop_date', '>', $compareDate);
                });
        });

        $queryDebit = MemberMonthlyDataDebit::with('member')->where('month', $month)->where('year', $year)->whereHas('member', function ($query) use ($request, $compareDate) {
            $query->whereHas('desigs')
                ->where('member_status', 1)
                ->where(function ($q) use ($compareDate) {
                    $q->whereNull('pay_stop_date')
                        ->orWhere('pay_stop_date', '>', $compareDate);
                });
        });

        if ($request->generate_by === 'member' && $request->filled('member_id')) {
            $queryCredit->where('member_id', $request->member_id);
            $queryDebit->where('member_id', $request->member_id);
        } elseif ($request->generate_by === 'category' && $request->filled('category_id')) {
            $queryCredit->whereHas('member', function ($query) use ($request) {
                $query->where('category', $request->category_id);
            });
            $queryDebit->whereHas('member', function ($query) use ($request) {
                $query->where('category', $request->category_id);
            });
        }

        $monthly_credit_users_data = $queryCredit->get();
        $monthly_debit_users_data = $queryDebit->get();

        if ($monthly_credit_users_data->count() > 0 && $monthly_debit_users_data->count() > 0) {
            $last_income_tax = IncomeTaxSync::orderBy('id', 'desc')->first();
            $group_id = $last_income_tax ? $last_income_tax->group_id + 1 : 1;

            foreach ($monthly_credit_users_data as $credit) {
                $debit = $monthly_debit_users_data->firstWhere('member_id', $credit->member_id);

                if (!$debit) {
                    continue; // Skip if no matching debit record found
                }
                $member = Member::findOrFail($credit->member_id);

                $income_tax = IncomeTaxSync::where([
                    'member_id' => $credit->member_id,
                    'month' => $month,
                    'year' => $year
                ])->first();

                if (!$income_tax) {
                    $income_tax = new IncomeTaxSync();
                    $income_tax->month = $month;
                    $income_tax->year = $year;
                }

                $hba_loan_this_month_year = MemberMonthlyDataLoanInfo::where('member_id', $credit->member_id)
                    ->where('month', $month)
                    ->where('year', $year)
                    ->where('loan_id', 1)
                    ->first()['inst_amount'] ?? 0;

                $this_month_year_recovery = MemberMonthlyDataRecovery::where('member_id', $credit->member_id)
                    ->where('month', $month)
                    ->where('year', $year)->orderBy('id', 'desc')
                    ->first();

                $income_tax->member_id = $credit->member_id;
                $income_tax->group_id = $group_id;
                $income_tax->category_id = $credit->member->category ?? null;
                $income_tax->gross = $credit->tot_credits;
                $income_tax->final = $debit->tot_debits;
                $income_tax->net = $debit->net_pay;
                $income_tax->save();

                // Check if PayDetail exists
                $pay_detail = PayDetail::where([
                    'member_id' => $credit->member_id,
                    'month' => $month,
                    'year' => $year
                ])->first();

                if (!$pay_detail) {
                    // If not exists, create a new entry
                    $pay_detail = new PayDetail();
                    $pay_detail->member_id = $credit->member_id;
                    $pay_detail->month = $month;
                    $pay_detail->year = $year;
                    $month = str_pad($request->month, 2, '0', STR_PAD_LEFT); // ensures 2-digit month
                    $year = $request->year;

                    $date = "$year-$month-01"; // Format: YYYY-MM-01
                    $pay_detail->date = $date;
                }

                // Update fields
                $pay_detail->basic = $credit->pay ?? 0;
                $pay_detail->da = $credit->da ?? 0;
                $pay_detail->hra = $credit->hra ?? 0;
                $pay_detail->tpt = $credit->tpt ?? 0;
                $pay_detail->da_tpt = $credit->da_on_tpt ?? 0;
                $pay_detail->var_incr = $credit->var_incr ?? 0;
                $pay_detail->add_incr = $credit->add_inc2 ?? 0;
                $pay_detail->s_pay = $credit->s_pay ?? 0;
                $pay_detail->e_pay = $credit->fpa ?? 0;
                $pay_detail->g_pay = $credit->g_pay ?? 0;
                $pay_detail->dis_alw = $credit->dis_alw  ?? 0;

                if (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'NPS') {
                    $pay_detail->npsc = $credit->npsc ?? 0;
                } elseif (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'UPS') {
                    $pay_detail->upsc_10 = $credit->upsc_10 ?? 0;
                }
                // $pay_detail->e_pay = $credit->pay ?? 0; // Assuming this field needs the pay value
                $pay_detail->misc = $credit->misc_1 ?? 0;
                 

                // Populate fields from debit model
                $pay_detail->i_tax = ($debit->i_tax ?? 0) + ($debit->ecess ?? 0);
                $pay_detail->p_tax =  $this_month_year_recovery->ptax ?? 0;
                if (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'NPS') {
                    $pay_detail->nps = $debit->nps_10_rec ?? 0;
                } elseif (isset($member->memberCategory->fund_type) && $member->memberCategory->fund_type == 'UPS') {
                    $pay_detail->ups_10_per_rec = $debit->ups_10_per_rec ?? 0;
                } else {
                    $pay_detail->gpf = $debit->gpa_sub ?? 0;
                }

                $pay_detail->hdfc = $this_month_year_recovery->hdfc ?? 0;
                $pay_detail->hba = $hba_loan_this_month_year ?? 0;
                // $pay_detail->gmc = $debit->cmg ?? 0;
                $pay_detail->cgeis = $debit->cgegis ?? 0;
                $pay_detail->pli = $debit->pli ?? 0;
                $pay_detail->lic = $this_month_year_recovery->lic ?? 0;
                $pay_detail->cghs = $debit->cghs ?? 0;
                $pay_detail->d_misc = $debit->misc1 ?? 0;
                $pay_detail->d_pay = $debit->tot_debits ?? 0; // Total debits
                // $pay_detail->net_pay = $debit->net_pay ?? 0; // Final net pay after deductions

                // Save or update the record
                $pay_detail->save();
            }

            return response()->json([
                'status' => true,
                'message' => 'Pay details generated/updated successfully.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No credit/debit data found for the selected month and year.'
            ]);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
