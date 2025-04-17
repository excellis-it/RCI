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
use App\Models\MemberMonthlyDataCoreInfo;
use App\Models\MemberMonthlyDataPolicyInfo;
use App\Models\MemberMonthlyDataLoanInfo;
use App\Models\MemberMonthlyDataExpectation;
use App\Models\MemberMonthlyDataVarInfo;
use Illuminate\Support\Facades\Schema;
use DateTime;

class MemberPayGenerate extends Controller
{
    public function paygenerate($month = null, $year = null, $generate_by = null, $member_id = null, $category_id = null)
    {
        $previous_month = $month;
        $previous_year = $year;

        // dd($previous_month, $previous_year);

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

        // member core info and member monthly data core info columns
        $MemberCoreInfoTableName = (new \App\Models\MemberCoreInfo())->getTable();
        $MemberCoreInfoColumns = Schema::getColumnListing($MemberCoreInfoTableName);
        $MemberMonthlyDataCoreInfoTableName = (new \App\Models\MemberMonthlyDataCoreInfo())->getTable();
        $MemberMonthlyDataCoreInfoColumns = Schema::getColumnListing($MemberMonthlyDataCoreInfoTableName);
        $CoreInfoCommonColumns = array_intersect(
            array_diff($MemberCoreInfoColumns, ['id', 'created_at', 'updated_at']),
            array_diff($MemberMonthlyDataCoreInfoColumns, ['id', 'created_at', 'updated_at'])
        );

        // member policy info and member monthly data policy info columns
        $MemberPolicyInfoTableName = (new \App\Models\MemberPolicyInfo())->getTable();
        $MemberPolicyInfoColumns = Schema::getColumnListing($MemberPolicyInfoTableName);
        $MemberMonthlyDataPolicyInfoTableName = (new \App\Models\MemberMonthlyDataPolicyInfo())->getTable();
        $MemberMonthlyDataPolicyInfoColumns = Schema::getColumnListing($MemberMonthlyDataPolicyInfoTableName);
        $PolicyInfoCommonColumns = array_intersect(
            array_diff($MemberPolicyInfoColumns, ['id', 'created_at', 'updated_at']),
            array_diff($MemberMonthlyDataPolicyInfoColumns, ['id', 'created_at', 'updated_at'])
        );

        // member loan info and member monthly data loan info columns
        $MemberLoanInfoTableName = (new \App\Models\MemberLoanInfo())->getTable();
        $MemberLoanInfoColumns = Schema::getColumnListing($MemberLoanInfoTableName);
        $MemberMonthlyDataLoanInfoTableName = (new \App\Models\MemberMonthlyDataLoanInfo())->getTable();
        $MemberMonthlyDataLoanInfoColumns = Schema::getColumnListing($MemberMonthlyDataLoanInfoTableName);
        $LoanInfoCommonColumns = array_intersect(
            array_diff($MemberLoanInfoColumns, ['id', 'created_at', 'updated_at']),
            array_diff($MemberMonthlyDataLoanInfoColumns, ['id', 'created_at', 'updated_at'])
        );

        // member expectation and member monthly data expectation columns
        $MemberExpectationTableName = (new \App\Models\MemberExpectation())->getTable();
        $MemberExpectationColumns = Schema::getColumnListing($MemberExpectationTableName);
        $MemberMonthlyDataExpectationTableName = (new \App\Models\MemberMonthlyDataExpectation())->getTable();
        $MemberMonthlyDataExpectationColumns = Schema::getColumnListing($MemberMonthlyDataExpectationTableName);
        $ExpectationCommonColumns = array_intersect(
            array_diff($MemberExpectationColumns, ['id', 'created_at', 'updated_at']),
            array_diff($MemberMonthlyDataExpectationColumns, ['id', 'created_at', 'updated_at'])
        );

        // member var info (recovery) and member monthly data var info columns
        $MemberVarInfoTableName = (new \App\Models\MemberRecovery())->getTable();
        $MemberVarInfoColumns = Schema::getColumnListing($MemberVarInfoTableName);
        $MemberMonthlyDataVarInfoTableName = (new \App\Models\MemberMonthlyDataVarInfo())->getTable();
        $MemberMonthlyDataVarInfoColumns = Schema::getColumnListing($MemberMonthlyDataVarInfoTableName);
        $VarInfoCommonColumns = array_intersect(
            array_diff($MemberVarInfoColumns, ['id', 'created_at', 'updated_at']),
            array_diff($MemberMonthlyDataVarInfoColumns, ['id', 'created_at', 'updated_at'])
        );

        if ($member_id) {
            $existing_data = MemberMonthlyData::where('month', $previous_month)
                ->where('year', $previous_year)
                ->where('member_id', $member_id) // Updated to use $member_id
                ->first();
            // dd($existing_data);
            if ($existing_data) {
                // Data for the previous month already exists; do not insert
                return response()->json([
                    'message' => 'Data for the previous month already exists.',
                    'status' => false,
                ], 200);
            }
            $member = Member::findOrFail($member_id); // Updated to use $member_id
            $member_id = $member->id;

            $member_monthly_data = new MemberMonthlyData();

            // insert member credit data to member monthly data credit
            $member_credit = MemberCredit::where('member_id', $member_id)->orderBy('id', 'desc')->first();
            if ($member_credit) {

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

            // insert member core info data to member monthly data core info
            $member_core_info = MemberCoreInfo::where('member_id', $member_id)->orderBy('id', 'desc')->first();
            if ($member_core_info) {
                $member_core_info_monthly_data = new MemberMonthlyDataCoreInfo();
                foreach ($CoreInfoCommonColumns as $column) {
                    $member_core_info_monthly_data->$column = $member_core_info->$column;
                }
                $member_core_info_monthly_data->month = $previous_month;
                $member_core_info_monthly_data->year = $previous_year;
                $member_core_info_monthly_data->apply_date = date('Y-m-d');
                $member_core_info_monthly_data->save();
                $member_monthly_data->core_id = $member_core_info_monthly_data->id;
            }

            // insert member policy info data to member monthly data policy info
            $member_policy_infos = MemberPolicyInfo::where('member_id', $member_id)->get();
            $policy_info_ids = [];
            if (count($member_policy_infos) > 0) {
                foreach ($member_policy_infos as $member_policy_info) {
                    $member_policy_info_monthly_data = new MemberMonthlyDataPolicyInfo();
                    foreach ($PolicyInfoCommonColumns as $column) {
                        $member_policy_info_monthly_data->$column = $member_policy_info->$column;
                    }
                    $member_policy_info_monthly_data->month = $previous_month;
                    $member_policy_info_monthly_data->year = $previous_year;
                    $member_policy_info_monthly_data->apply_date = date('Y-m-d');
                    $member_policy_info_monthly_data->save();
                    $policy_info_ids[] = $member_policy_info_monthly_data->id;
                }
                // $member_monthly_data->policy_info_ids = json_encode($policy_info_ids);
            }

            // insert member loan info data to member monthly data loan info
            $member_loan_infos = MemberLoanInfo::where('member_id', $member_id)->get();
            $loan_info_ids = [];
            if (count($member_loan_infos) > 0) {
                foreach ($member_loan_infos as $member_loan_info) {
                    $member_loan_info_monthly_data = new MemberMonthlyDataLoanInfo();
                    foreach ($LoanInfoCommonColumns as $column) {
                        $member_loan_info_monthly_data->$column = $member_loan_info->$column;
                    }
                    $member_loan_info_monthly_data->month = $previous_month;
                    $member_loan_info_monthly_data->year = $previous_year;
                    $member_loan_info_monthly_data->apply_date = date('Y-m-d');
                    $member_loan_info_monthly_data->save();
                    $loan_info_ids[] = $member_loan_info_monthly_data->id;
                }
                // $member_monthly_data->loan_info_ids = json_encode($loan_info_ids);
            }

            // insert member expectation data to member monthly data expectation
            $member_expectations = MemberExpectation::where('member_id', $member_id)->get();
            $expectation_ids = [];
            if (count($member_expectations) > 0) {
                foreach ($member_expectations as $member_expectation) {
                    $member_expectation_monthly_data = new MemberMonthlyDataExpectation();
                    foreach ($ExpectationCommonColumns as $column) {
                        $member_expectation_monthly_data->$column = $member_expectation->$column;
                    }
                    $member_expectation_monthly_data->month = $previous_month;
                    $member_expectation_monthly_data->year = $previous_year;
                    $member_expectation_monthly_data->apply_date = date('Y-m-d');
                    $member_expectation_monthly_data->save();
                    $expectation_ids[] = $member_expectation_monthly_data->id;
                }
                // $member_monthly_data->expectation_ids = json_encode($expectation_ids);
            }

            // insert member var info data to member monthly data var info
            $member_var_info = MemberRecovery::where('member_id', $member_id)->orderBy('id', 'desc')->first();
            if ($member_var_info) {
                $member_var_info_monthly_data = new MemberMonthlyDataVarInfo();
                foreach ($VarInfoCommonColumns as $column) {
                    $member_var_info_monthly_data->$column = $member_var_info->$column;
                }
                $member_var_info_monthly_data->month = $previous_month;
                $member_var_info_monthly_data->year = $previous_year;
                $member_var_info_monthly_data->apply_date = date('Y-m-d');
                $member_var_info_monthly_data->save();
              //  $member_monthly_data->var_info_id = $member_var_info_monthly_data->id;
            }

            // insert main Member Monthly Data

            $member_monthly_data->member_id = $member_id;
            $member_monthly_data->month = $previous_month;
            $member_monthly_data->year = $previous_year;
            $member_monthly_data->apply_date = date('Y-m-d');
            $member_monthly_data->save();

            return response()->json([
                'message' => 'Data for the previous month inserted successfully.',
                'status' => true
            ], 200);
        } elseif ($category_id) {

            $members = Member::where('category', $category_id)->get(); // Updated to use $category_id

            foreach ($members as $member) {
                $member_id = $member->id;

                // Check if data for the previous month and year exists
                $existing_data = MemberMonthlyData::where('month', $previous_month)
                    ->where('year', $previous_year)
                    ->where('member_id', $member_id)
                    ->first();

                if ($existing_data) {
                    // Data for the previous month already exists; do not insert
                    continue;
                }


                $member_id = $member->id;

                $member_monthly_data = new MemberMonthlyData();

                // insert member credit data to member monthly data credit
                $member_credit = MemberCredit::where('member_id', $member_id)->orderBy('id', 'desc')->first();
                if ($member_credit) {

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

                // insert member core info data to member monthly data core info
                $member_core_info = MemberCoreInfo::where('member_id', $member_id)->orderBy('id', 'desc')->first();
                if ($member_core_info) {
                    $member_core_info_monthly_data = new MemberMonthlyDataCoreInfo();
                    foreach ($CoreInfoCommonColumns as $column) {
                        $member_core_info_monthly_data->$column = $member_core_info->$column;
                    }
                    $member_core_info_monthly_data->month = $previous_month;
                    $member_core_info_monthly_data->year = $previous_year;
                    $member_core_info_monthly_data->apply_date = date('Y-m-d');
                    $member_core_info_monthly_data->save();
                    $member_monthly_data->core_id = $member_core_info_monthly_data->id;
                }

                // insert member policy info data to member monthly data policy info
                $member_policy_infos = MemberPolicyInfo::where('member_id', $member_id)->get();
                $policy_info_ids = [];
                if (count($member_policy_infos) > 0) {
                    foreach ($member_policy_infos as $member_policy_info) {
                        $member_policy_info_monthly_data = new MemberMonthlyDataPolicyInfo();
                        foreach ($PolicyInfoCommonColumns as $column) {
                            $member_policy_info_monthly_data->$column = $member_policy_info->$column;
                        }
                        $member_policy_info_monthly_data->month = $previous_month;
                        $member_policy_info_monthly_data->year = $previous_year;
                        $member_policy_info_monthly_data->apply_date = date('Y-m-d');
                        $member_policy_info_monthly_data->save();
                        $policy_info_ids[] = $member_policy_info_monthly_data->id;
                    }
                    //   $member_monthly_data->policy_info_ids = json_encode($policy_info_ids);
                }

                // insert member loan info data to member monthly data loan info
                $member_loan_infos = MemberLoanInfo::where('member_id', $member_id)->get();
                $loan_info_ids = [];
                if (count($member_loan_infos) > 0) {
                    foreach ($member_loan_infos as $member_loan_info) {
                        $member_loan_info_monthly_data = new MemberMonthlyDataLoanInfo();
                        foreach ($LoanInfoCommonColumns as $column) {
                            $member_loan_info_monthly_data->$column = $member_loan_info->$column;
                        }
                        $member_loan_info_monthly_data->month = $previous_month;
                        $member_loan_info_monthly_data->year = $previous_year;
                        $member_loan_info_monthly_data->apply_date = date('Y-m-d');
                        $member_loan_info_monthly_data->save();
                        $loan_info_ids[] = $member_loan_info_monthly_data->id;
                    }
                    // $member_monthly_data->loan_info_ids = json_encode($loan_info_ids);
                }

                // insert member expectation data to member monthly data expectation
                $member_expectations = MemberExpectation::where('member_id', $member_id)->get();
                $expectation_ids = [];
                if (count($member_expectations) > 0) {
                    foreach ($member_expectations as $member_expectation) {
                        $member_expectation_monthly_data = new MemberMonthlyDataExpectation();
                        foreach ($ExpectationCommonColumns as $column) {
                            $member_expectation_monthly_data->$column = $member_expectation->$column;
                        }
                        $member_expectation_monthly_data->month = $previous_month;
                        $member_expectation_monthly_data->year = $previous_year;
                        $member_expectation_monthly_data->apply_date = date('Y-m-d');
                        $member_expectation_monthly_data->save();
                        $expectation_ids[] = $member_expectation_monthly_data->id;
                    }
                    // $member_monthly_data->expectation_ids = json_encode($expectation_ids);
                }

                // insert member var info data to member monthly data var info
                $member_var_info = MemberRecovery::where('member_id', $member_id)->orderBy('id', 'desc')->first();
                if ($member_var_info) {
                    $member_var_info_monthly_data = new MemberMonthlyDataVarInfo();
                    foreach ($VarInfoCommonColumns as $column) {
                        $member_var_info_monthly_data->$column = $member_var_info->$column;
                    }
                    $member_var_info_monthly_data->month = $previous_month;
                    $member_var_info_monthly_data->year = $previous_year;
                    $member_var_info_monthly_data->apply_date = date('Y-m-d');
                    $member_var_info_monthly_data->save();
                 //   $member_monthly_data->var_info_id = $member_var_info_monthly_data->id;
                }

                // insert main Member Monthly Data

                $member_monthly_data->member_id = $member_id;
                $member_monthly_data->month = $previous_month;
                $member_monthly_data->year = $previous_year;
                $member_monthly_data->apply_date = date('Y-m-d');
                $member_monthly_data->save();
            }
            return response()->json([
                'message' => 'Data for the previous month inserted successfully.',
                'status' => true
            ], 200);
        }

        return response()->json([
            'message' => 'Data for the previous month inserted successfully.',
            'status' => true
        ], 200);
    }
}
