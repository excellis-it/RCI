<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DearnessAllowancePercentage;
use App\Models\MemberMonthlyDataCredit;
use App\Models\MemberMonthlyDataDebit;
use App\Models\MemberMonthlyDataExpectation;
use App\Models\PayCommission;
use App\Models\Tpta;

class DearnessAllowancePercentageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dearnessAllowancePercentages = DearnessAllowancePercentage::paginate(10);
        $payCommissions = PayCommission::where('is_active', true)->get();
        $financialYears = Helper::getFinancialYears();

        return view('frontend.dearness-allowance-percentages.list', compact('dearnessAllowancePercentages', 'payCommissions', 'financialYears'));
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
            'financial_year' => 'required',
            'quarter' => 'required',
            'percentage' => 'required',
            'pay_commission_id' => 'required',
            'status' => 'required',
        ]);

        $dearnessAllowancePercentage = new DearnessAllowancePercentage();
        $dearnessAllowancePercentage->financial_year = $request->financial_year;
        $dearnessAllowancePercentage->quarter = $request->quarter;
        $dearnessAllowancePercentage->percentage = $request->percentage;
        $dearnessAllowancePercentage->pay_commission_id = $request->pay_commission_id;
        $dearnessAllowancePercentage->year = $request->year;
        $dearnessAllowancePercentage->month = $request->month;
        $dearnessAllowancePercentage->is_active = $request->status;
        $dearnessAllowancePercentage->save();

        if ($request->status == 1) {
            $tpts = Tpta::where('status', true)->get();

            $percentage = $request->percentage;
            $current_month = date('m', mktime(0, 0, 0, $request->month, 10));
            $current_year = $request->year;
            // $records_array = [];
            foreach ($tpts as $tpt) {
                // Calculate and update TPT DA
                $total = round($tpt->tpt_allowance * $percentage / 100);
                $tpt->tpt_da = $total;
                $tpt->save();

                // Update related MemberMonthlyDataCredit records
                $records = MemberMonthlyDataCredit::whereHas('member', function ($query) use ($tpt) {
                    $query->where('pm_level', $tpt->pay_level_id);
                })
                    ->where(function ($query) use ($current_month, $current_year) {
                        $query->where('year', '>', $current_year)
                            ->orWhere(function ($q) use ($current_month, $current_year) {
                                $q->where('year', $current_year)
                                    ->where('month', '>=', $current_month);
                            });
                    })
                    ->get();

                // $records_array[] = $records->toArray();
                foreach ($records as $record) {
                    $exceptions_this_month = MemberMonthlyDataExpectation::where('member_id', $record->member_id)->where('amount_year', $record->year)->where('amount_month', $record->month)->get();

                    $da_amount = round(($record->pay * $percentage) / 100);

                    $record->da = $da_amount;
                    $record->tpt = $tpt->tpt_allowance;
                    $record->da_on_tpt = $total; // da_on_tpt set based on TPT value

                    foreach ($exceptions_this_month as $exception) {
                        if ($exception->rule_name == 'TPT') {
                            $record->tpt = $exception->amount ?? 0;
                            if ($record->tpt == 0) {
                                $record->da_on_tpt = 0;
                            } else {
                                $total = round($exception->amount * $percentage / 100);
                                $record->da_on_tpt = $total;
                            }
                        }

                        if ($exception->rule_name == 'DA') {
                            $record->da = $exception->amount ?? 0;
                            if ($record->da == 0) {
                                $record->da_on_tpt = 0;
                                $record->tpt = 0;
                            } else {
                                $total = round($exception->amount * $percentage / 100);
                                $record->tpt = $tpt->tpt_allowance;
                                $record->da_on_tpt = $total;
                            }
                        }
                    }

                    if (isset($record->member->memberCategory->fund_type) && $record->member->memberCategory->fund_type == 'NPS') {
                        $record->npsc = round((($record->pay + $da_amount) * 14) / 100); // da_on_tpt set based on TPT value
                    } elseif (isset($record->member->memberCategory->fund_type) && $record->member->memberCategory->fund_type == 'UPS') {
                        $record->upsc_10 = round((($record->pay + $da_amount) * 10) / 100); // da_on_tpt set based on TPT value
                    }

                    $record->save();

                    // Existing NPS block
                    if (isset($record->member->memberCategory->fund_type) && $record->member->memberCategory->fund_type == 'NPS') {
                        $record_debit = MemberMonthlyDataDebit::where('member_id', $record->member_id)
                            ->orderBy('id', 'desc')
                            ->where('year', $record->year)
                            ->where('month', $record->month)
                            ->first();

                        if ($record_debit) {
                            $exceptions_this_month_npsg = MemberMonthlyDataExpectation::where('member_id', $record->member_id)
                                ->where('amount_year', $record->year)
                                ->where('amount_month', $record->month)
                                ->where('rule_name', 'NPSG')
                                ->first();

                            if ($exceptions_this_month_npsg) {
                                $record_debit->npsg = $exceptions_this_month_npsg->amount ?? 0;
                            } else {
                                // Assuming $da_amount is defined elsewhere in your code for both NPS and UPS
                                $record_debit->npsg = round((($record->pay + $da_amount) * 14) / 100); // da_on_tpt set based on TPT value
                            }
                            $record_debit->nps_10_rec = round((($record->pay + $da_amount) * 10) / 100);
                            $record_debit->save();
                        }
                    }
                    // ELSE IF FUND_TYPE UPS
                    elseif (isset($record->member->memberCategory->fund_type) && $record->member->memberCategory->fund_type == 'UPS') {
                        $record_debit = MemberMonthlyDataDebit::where('member_id', $record->member_id)
                            ->orderBy('id', 'desc')
                            ->where('year', $record->year)
                            ->where('month', $record->month)
                            ->first();

                        if ($record_debit) {
                            // Assuming 'UPSG' is the rule_name for UPS Government contribution expectations
                            $exceptions_this_month_upsg = MemberMonthlyDataExpectation::where('member_id', $record->member_id)
                                ->where('amount_year', $record->year)
                                ->where('amount_month', $record->month)
                                ->where('rule_name', 'UPSG') // Assuming 'UPSG' for UPS Government contribution
                                ->first();

                            if ($exceptions_this_month_upsg) {
                                $record_debit->upsg_10_per = $exceptions_this_month_upsg->amount ?? 0;
                            } else {
                                // Assuming a 14% contribution from the government for UPS as well, similar to NPSG
                                $record_debit->upsg_10_per = round((($record->pay + $da_amount) * 10) / 100);
                            }

                            // Member's 10% contribution
                            $record_debit->ups_10_per_rec = round((($record->pay + $da_amount) * 10) / 100);
                            $record_debit->save();
                        }
                    }

                   Helper::updateTotalCredit($record->member_id, $record->month, $record->year);
                    Helper::updateTotalDebit($record->member_id, $record->month, $record->year);
                }



                // $records_array[] = $records->toArray();

            }
        }


        // make the older dearness allowance percentage inactive
        $lastDa = DearnessAllowancePercentage::latest()->first();
        DearnessAllowancePercentage::where('id', '!=', $lastDa->id)
            ->update(['is_active' => 0]);

        session()->flash('message', 'Dearness Allowance Percentage updated successfully');
        return response()->json([
            'message' => 'Dearness Allowance Percentage created successfully!'
        ]);
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
        $dearnessAllowancePercentage = DearnessAllowancePercentage::findOrFail($id);
        $payCommissions = PayCommission::where('is_active', true)->get();
        $financialYears = Helper::getFinancialYears();
        $edit = true;

        return response()->json([
            'view' => view('frontend.dearness-allowance-percentages.form', compact('dearnessAllowancePercentage', 'edit', 'payCommissions', 'financialYears'))->render()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'financial_year' => 'required',
            'quarter' => 'required',
            'percentage' => 'required',
            'pay_commission_id' => 'required',
            'status' => 'required',
        ]);

        $dearnessAllowancePercentagePasts = DearnessAllowancePercentage::where('id', '!=', $id)->get();
        foreach ($dearnessAllowancePercentagePasts as $dearnessAllowancePercentagePast) {
            $dearnessAllowancePercentagePast->is_active = 0;
            $dearnessAllowancePercentagePast->update();
        }

        $dearnessAllowancePercentage = DearnessAllowancePercentage::findOrFail($id);
        $dearnessAllowancePercentage->financial_year = $request->financial_year;
        $dearnessAllowancePercentage->quarter = $request->quarter;
        $dearnessAllowancePercentage->percentage = $request->percentage;
        $dearnessAllowancePercentage->pay_commission_id = $request->pay_commission_id;
        $dearnessAllowancePercentage->year = $request->year;
        $dearnessAllowancePercentage->month = $request->month;
        $dearnessAllowancePercentage->is_active = $request->status;
        $dearnessAllowancePercentage->update();

        if ($request->status == 1) {
            $tpts = Tpta::where('status', true)->get();

            $percentage = $request->percentage;
            $current_month = date('m', mktime(0, 0, 0, $request->month, 10));
            $current_year = $request->year;
            // $records_array = [];
            foreach ($tpts as $tpt) {
                // Calculate and update TPT DA
                $total = round($tpt->tpt_allowance * $percentage / 100);
                $tpt->tpt_da = $total;
                $tpt->save();

                // Update related MemberMonthlyDataCredit records
                $records = MemberMonthlyDataCredit::whereHas('member', function ($query) use ($tpt) {
                    $query->where('pm_level', $tpt->pay_level_id);
                })
                    ->where(function ($query) use ($current_month, $current_year) {
                        $query->where('year', '>', $current_year)
                            ->orWhere(function ($q) use ($current_month, $current_year) {
                                $q->where('year', $current_year)
                                    ->where('month', '>=', $current_month);
                            });
                    })
                    ->get();

                // $records_array[] = $records->toArray();
                foreach ($records as $record) {
                    $exceptions_this_month = MemberMonthlyDataExpectation::where('member_id', $record->member_id)->where('amount_year', $record->year)->where('amount_month', $record->month)->get();




                    $da_amount = round(($record->pay * $percentage) / 100);
                    $record->tpt = $tpt->tpt_allowance;
                    $record->da = $da_amount;
                    $record->da_on_tpt = $total; // da_on_tpt set based on TPT value

                    foreach ($exceptions_this_month as $exception) {
                        if ($exception->rule_name == 'TPT') {
                            $record->tpt = $exception->amount ?? 0;
                            if ($record->tpt == 0) {
                                $record->da_on_tpt = 0;
                            } else {
                                $total = round($exception->amount * $percentage / 100);
                                $record->da_on_tpt = $total;
                            }
                        }

                        if ($exception->rule_name == 'DA') {
                            $record->da = $exception->amount ?? 0;
                            $da_amount = $exception->amount ?? 0;
                            if ($record->da == 0) {
                                $record->da_on_tpt = 0;
                                $record->tpt = 0;
                            } else {
                                $total = round($exception->amount * $percentage / 100);
                                $record->tpt = $tpt->tpt_allowance;
                                $record->da_on_tpt = $total;
                            }
                        }
                    }


                    if (isset($record->member->memberCategory->fund_type) && $record->member->memberCategory->fund_type == 'NPS') {
                        $record->npsc = round((($record->pay + $da_amount) * 14) / 100); // da_on_tpt set based on TPT value
                    } elseif (isset($record->member->memberCategory->fund_type) && $record->member->memberCategory->fund_type == 'UPS') {
                        $record->upsc_10 = round((($record->pay + $da_amount) * 10) / 100); // da_on_tpt set based on TPT value
                    }

                    $record->save();

                    // Existing NPS block
                    if (isset($record->member->memberCategory->fund_type) && $record->member->memberCategory->fund_type == 'NPS') {
                        $record_debit = MemberMonthlyDataDebit::where('member_id', $record->member_id)
                            ->orderBy('id', 'desc')
                            ->where('year', $record->year)
                            ->where('month', $record->month)
                            ->first();

                        if ($record_debit) {
                            $exceptions_this_month_npsg = MemberMonthlyDataExpectation::where('member_id', $record->member_id)
                                ->where('amount_year', $record->year)
                                ->where('amount_month', $record->month)
                                ->where('rule_name', 'NPSG')
                                ->first();

                            if ($exceptions_this_month_npsg) {
                                $record_debit->npsg = $exceptions_this_month_npsg->amount ?? 0;
                            } else {
                                // Assuming $da_amount is defined elsewhere in your code for both NPS and UPS
                                $record_debit->npsg = round((($record->pay + $da_amount) * 14) / 100); // da_on_tpt set based on TPT value
                            }
                            $record_debit->nps_10_rec = round((($record->pay + $da_amount) * 10) / 100);
                            $record_debit->save();
                        }
                    }
                    // ELSE IF FUND_TYPE UPS
                    elseif (isset($record->member->memberCategory->fund_type) && $record->member->memberCategory->fund_type == 'UPS') {
                        $record_debit = MemberMonthlyDataDebit::where('member_id', $record->member_id)
                            ->orderBy('id', 'desc')
                            ->where('year', $record->year)
                            ->where('month', $record->month)
                            ->first();

                        if ($record_debit) {
                            // Assuming 'UPSG' is the rule_name for UPS Government contribution expectations
                            $exceptions_this_month_upsg = MemberMonthlyDataExpectation::where('member_id', $record->member_id)
                                ->where('amount_year', $record->year)
                                ->where('amount_month', $record->month)
                                ->where('rule_name', 'UPSG') // Assuming 'UPSG' for UPS Government contribution
                                ->first();

                            if ($exceptions_this_month_upsg) {
                                $record_debit->upsg_10_per = $exceptions_this_month_upsg->amount ?? 0;
                            } else {
                                // Assuming a 14% contribution from the government for UPS as well, similar to NPSG
                                $record_debit->upsg_10_per = round((($record->pay + $da_amount) * 10) / 100);
                            }

                            // Member's 10% contribution
                            $record_debit->ups_10_per_rec = round((($record->pay + $da_amount) * 10) / 100);
                            $record_debit->save();
                        }
                    }

                    Helper::updateTotalCredit($record->member_id, $record->month, $record->year);
                    Helper::updateTotalDebit($record->member_id, $record->month, $record->year);
                }
            }
        }
        // dd($records_array);

        session()->flash('message', 'Dearness Allowance Percentage updated successfully');
        return response()->json([
            'message' => 'Dearness Allowance Percentage updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(string $id)
    {
        $dearnessAllowancePercentage = DearnessAllowancePercentage::findOrFail($id);
        $dearnessAllowancePercentage->delete();

        return redirect()->back()->with('message', 'Dearness Allowance Percentage deleted successfully.');
    }
}
