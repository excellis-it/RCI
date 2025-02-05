<?php

namespace App\Http\Controllers\AutoRun;

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
use App\Models\PayMatrixBasic;
use App\Models\MemberCoreInfo;
use App\Models\MemberPersonalInfo;
use App\Models\Bank;
use App\Models\Loan;
use App\Models\MemberLoanInfo;
use App\Models\Policy;
use App\Models\MemberPolicyInfo;
use App\Models\MemberExpectation;
use App\Models\MemberOriginalRecovery;
use App\Models\ResetEmployeeId;
use App\Models\City;
use App\Models\DearnessAllowancePercentage;
use App\Models\GradePay;
use App\Models\Designation;
use App\Models\Hra;
use App\Models\Tpta;
use App\Models\IncomeTax;
use App\Models\MemberLeave;
use App\Models\MemberLoan;
use App\Models\LeaveType;
use App\Models\MemberGpf;
use App\Models\Cghs;
use App\Models\MemberMonthlyData;
use App\Models\Rule;
use Illuminate\Support\Str;
use App\Models\MemberMonthlyDataCredit;
use App\Models\MemberMonthlyDataDebit;
use App\Models\MemberMonthlyDataRecovery;
use Illuminate\Support\Facades\Schema;
use DateTime;

class MemberPayGenerate extends Controller
{
    //
    // public function paygenerate()
    // {
    //     $members = Member::where('status', 1)->get();

    //     $MemberCreditTableName = (new \App\Models\MemberCredit())->getTable();
    //     $MemberCreditColumns = Schema::getColumnListing($MemberCreditTableName);
    //     $MemberMonthlyDataCreditTableName = (new \App\Models\MemberMonthlyDataCredit())->getTable();
    //     $MemberMonthlyDataCreditColumns = Schema::getColumnListing($MemberMonthlyDataCreditTableName);

    //     // // Output the column names
    //     // return response()->json([
    //     //     'columns' => $columns
    //     // ]);

    //     foreach ($members as $member) {
    //         $member_id = $member->id;

    //         $member_debit = MemberDebit::where('member_id', $member_id)->orderBy('id', 'desc')->first();
    //         $member_recovery = MemberRecovery::where('member_id', $member_id)->orderBy('id', 'desc')->first();
    //         $member_original_recovery = MemberOriginalRecovery::where('member_id', $member_id)->orderBy('id', 'desc')->first();
    //         $member_core_info = MemberCoreInfo::where('member_id', $member_id)->orderBy('id', 'desc')->first();
    //         $member_personal_info = MemberPersonalInfo::where('member_id', $member_id)->orderBy('id', 'desc')->first();

    //         $member_credit = MemberCredit::where('member_id', $member_id)->orderBy('id', 'desc')->first();
    //         $member_credit_monthly_data = new MemberMonthlyDataCredit();
    //     }


    // }


    public function paygenerate()
    {

        // Calculate previous month and year
        $previous_date = new DateTime('first day of last month');
        $previous_month = $previous_date->format('m');
        $previous_year = $previous_date->format('Y');

        // Check if data for the previous month and year exists
        $existing_data = MemberMonthlyData::where('month', $previous_month)
            ->where('year', $previous_year)
            ->first();

        if ($existing_data) {
            // Data for the previous month already exists; do not insert
            return response()->json([
                'message' => 'Data for the previous month already exists.',
                'status' => 'exists'
            ], 200);
        } else {

            $members = Member::where('pay_stop', 'No')->where('member_status', 1)->get();
            // return $members;

            // member credit and member monthly data credit columns
            $MemberCreditTableName = (new \App\Models\MemberCredit())->getTable();
            $MemberCreditColumns = Schema::getColumnListing($MemberCreditTableName);
            $MemberMonthlyDataCreditTableName = (new \App\Models\MemberMonthlyDataCredit())->getTable();
            $MemberMonthlyDataCreditColumns = Schema::getColumnListing($MemberMonthlyDataCreditTableName);
            $CreditCommonColumns = array_intersect(
                array_diff($MemberCreditColumns, ['id', 'created_at', 'updated_at']),
                array_diff($MemberMonthlyDataCreditColumns, ['id', 'created_at', 'updated_at'])
            );

            // member debit and member mothly data debit columns
            $MemberDebitTableName = (new \App\Models\MemberDebit())->getTable();
            $MemberDebitColumns = Schema::getColumnListing($MemberDebitTableName);
            $MemberMonthlyDataDebitTableName = (new \App\Models\MemberMonthlyDataDebit())->getTable();
            $MemberMonthlyDataDebitColumns = Schema::getColumnListing($MemberMonthlyDataDebitTableName);
            $DebitCommonColumns = array_intersect(
                array_diff($MemberDebitColumns, ['id', 'created_at', 'updated_at']),
                array_diff($MemberMonthlyDataDebitColumns, ['id', 'created_at', 'updated_at'])
            );

            // member recovery and member monthly data recovery columns
            $MemberRecoveryTableName = (new \App\Models\MemberOriginalRecovery())->getTable();
            $MemberRecoveryColumns = Schema::getColumnListing($MemberRecoveryTableName);
            $MemberMonthlyDataRecoveryTableName = (new \App\Models\MemberMonthlyDataRecovery())->getTable();
            $MemberMonthlyDataRecoveryColumns = Schema::getColumnListing($MemberMonthlyDataRecoveryTableName);
            $RecoveryCommonColumns = array_intersect(
                array_diff($MemberRecoveryColumns, ['id', 'created_at', 'updated_at']),
                array_diff($MemberMonthlyDataRecoveryColumns, ['id', 'created_at', 'updated_at'])
            );

            foreach ($members as $member) {
                $member_id = $member->id;

                $member_monthly_data = new MemberMonthlyData();

                // insert member credit data to member monthly data credit
                $member_credit = MemberCredit::where('member_id', $member_id)->orderBy('id', 'desc')->first();
                if ($member_credit) {


                    // $var_inc_amount = 0;
                    // $var_noi = MemberRecovery::where('member_id', $member->id)->first();
                    // if ($var_noi) {
                    //     if ($var_noi->noi_pending > 0 && $var_noi->stop == 'No') {

                    //         $var_inc_amount = $var_noi->v_incr;
                    //     }
                    // }

                    $var_inc_amount = 0;
                    $var_noi = MemberRecovery::where('member_id', $member->id)->first();
                    if ($var_noi) {
                        if ($var_noi->stop == 'No') {

                            $var_inc_amount = $var_noi->total;
                        }
                    }
                    // $member->var_inc_amount = $var_inc_amount;


                    $check_recovery_member = MemberRecovery::where('member_id', $member->id)->get();
                    if (count($check_recovery_member) > 0) {
                        $update_recovery_member = MemberRecovery::where('member_id', $member->id)->first();
                        if ($update_recovery_member->noi_pending > 0 && $update_recovery_member->stop == 'No') {
                            $update_recovery_member->noi_pending = $update_recovery_member->noi_pending - 1;
                            $update_recovery_member->update();
                        }
                    }


                    $member_credit_monthly_data = new MemberMonthlyDataCredit();
                    foreach ($CreditCommonColumns as $column) {
                        $member_credit_monthly_data->$column = $member_credit->$column;
                    }

                    $member_credit_monthly_data->var_incr = $var_inc_amount;

                    $member_credit_monthly_data->month = $previous_month;
                    $member_credit_monthly_data->year = $previous_year;
                    $member_credit_monthly_data->apply_date = date('Y-m-d');
                    $member_credit_monthly_data->save();
                    $member_monthly_data->credit_id = $member_credit_monthly_data->id;
                }

                // insert member debit data to member monthly data debit
                $member_debit = MemberDebit::where('member_id', $member_id)->orderBy('id', 'desc')->first();
                if ($member_debit) {
                    $member_debit_monthly_data = new MemberMonthlyDataDebit();
                    foreach ($DebitCommonColumns as $column) {
                        $member_debit_monthly_data->$column = $member_debit->$column;
                    }
                    $member_debit_monthly_data->month = $previous_month;
                    $member_debit_monthly_data->year = $previous_year;
                    $member_debit_monthly_data->apply_date = date('Y-m-d');
                    $member_debit_monthly_data->save();
                    $member_monthly_data->debit_id = $member_debit_monthly_data->id;
                }

                // insert member recovery data to member monthly data recovery
                $member_recovery = MemberOriginalRecovery::where('member_id', $member_id)->orderBy('id', 'desc')->first();
                if ($member_recovery) {
                    $member_recovery_monthly_data = new MemberMonthlyDataRecovery();
                    foreach ($RecoveryCommonColumns as $column) {
                        $member_recovery_monthly_data->$column = $member_recovery->$column;
                    }
                    $member_recovery_monthly_data->month = $previous_month;
                    $member_recovery_monthly_data->year = $previous_year;
                    $member_recovery_monthly_data->apply_date = date('Y-m-d');
                    $member_recovery_monthly_data->save();
                    $member_monthly_data->recovery_id = $member_recovery_monthly_data->id;
                }

                // insert main Member Monthly Data

                $member_monthly_data->member_id = $member_id;
                $member_monthly_data->month = $previous_month;
                $member_monthly_data->year = $previous_year;
                $member_monthly_data->apply_date = date('Y-m-d');
                $member_monthly_data->save();
            }

            //  return response()->json(['message' => 'Data copied successfully']);
            return response()->json([
                'message' => 'Data for the previous month inserted successfully.',
                'status' => 'inserted'
            ], 200);
        }
    }



    //
}
