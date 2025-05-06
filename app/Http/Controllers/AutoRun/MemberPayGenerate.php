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
        $month = $month; // e.g., '04'
        $year = $year;   // e.g., '2025'

        $same_date = strtotime("$year-$month-01");

        $previous_date = strtotime("$year-$month-01 -1 month");

        $previous_month = date('m', $previous_date);
        $previous_year = date('Y', $previous_date);

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
            $existing_data = MemberMonthlyData::where('month', $month)
                ->where('year', $year)
                ->where('member_id', $member_id) // Updated to use $member_id
                ->first();
            // dd($existing_data);
            if ($existing_data) {
                // Data for the previous month already exists; do not insert
                return response()->json([
                    'message' => 'Data already exist for this month please check.',
                    'status' => false,
                ], 200);
            }
            $member = Member::findOrFail($member_id); // Updated to use $member_id
            $member_id = $member->id;

            $member_monthly_data = new MemberMonthlyData();

            // insert member credit data to member monthly data credit
            $member_credit = MemberMonthlyDataCredit::where('member_id', $member_id)->orderBy('id', 'desc')->first();
            if ($member_credit) {
                $var_inc_amount = 0;
                $var_noi = MemberMonthlyDataVarInfo::where('member_id', $member->id)->first();
                if ($var_noi) {
                    if ($var_noi->stop == 'No') {

                        $var_inc_amount = $var_noi->v_incr;
                    }
                }
                // $member->var_inc_amount = $var_inc_amount;
                $exception_this_month = MemberMonthlyDataExpectation::where('member_id', $member->id)->where('amount_month', $month)->where('amount_year', $year)->first();

                // $check_recovery_member = MemberMonthlyDataVarInfo::where('member_id', $member->id)->get();
                // if (count($check_recovery_member) > 0) {
                //     $update_recovery_member = MemberMonthlyDataVarInfo::where('member_id', $member->id)->first();
                //     if ($update_recovery_member->noi_pending > 0 && $update_recovery_member->stop == 'No') {
                //         $update_recovery_member->noi_pending = $update_recovery_member->noi_pending - 1;
                //         $update_recovery_member->update();
                //     }
                // }


                $member_credit_monthly_data = new MemberMonthlyDataCredit();
                foreach ($CreditCommonColumns as $column) {
                    $member_credit_monthly_data->$column = $member_credit->$column;
                }
                if ($exception_this_month) {
                    if ($exception_this_month->rule_name == 'GPF') {
                        $member_credit_monthly_data->gpa_sub = $exception_this_month->amount;
                    }

                    if ($exception_this_month->rule_name == 'GMC') {
                        $member_credit_monthly_data->cmg = $exception_this_month->amount;
                    }

                    if ($exception_this_month->rule_name == 'CGHS') {
                        $member_credit_monthly_data->cghs = $exception_this_month->amount;
                    }

                    if ($exception_this_month->rule_name == 'CGEGIS') {
                        $member_credit_monthly_data->cgegis = $exception_this_month->amount;
                    }
                }
                $da_percentage = DearnessAllowancePercentage::where('is_active', 1)->first();
                $basicPay = $member->basic;
                $daAmount = $da_percentage ? ($basicPay * $da_percentage->percentage) / 100 : 0;

                $tptAmount = 0;
                $tptDa = 0;
                if ($member->member_city) {
                    $city = City::find($member->member_city);
                    if ($city && $city->tpt_type) {
                        $tptData = Tpta::where('tpt_type', $city->tpt_type)
                            ->where('pay_level_id', $member->pm_level)
                            ->where('status', 1)
                            ->first();
                        if ($tptData) {
                            $tptAmount = $tptData->tpt_allowance;
                            $tptDa = ($tptAmount) / 2;
                        }
                    }
                }

                $hraAmount = 0;
                if ($member->member_city) {
                    $city = City::find($member->member_city);
                    if ($city) {
                        $hraPercentage = Hra::where('city_category', $city->city_type)
                            ->where('status', 1)
                            ->first();
                        $hraAmount = $hraPercentage ? ($basicPay * $hraPercentage->percentage) / 100 : 0;
                    }
                }

                $member_credit_monthly_data->da = $daAmount;
                $member_credit_monthly_data->tpt = $tptAmount;
                $member_credit_monthly_data->da_on_tpt = $tptDa;
                $member_credit_monthly_data->hra = $hraAmount;

                $npsc = (($basicPay + $daAmount) * 14) / 100;
                $npg_arrs = (($basicPay + $daAmount) * 14) / 100;
                $npg_adj = (($basicPay + $daAmount) * 14) / 100;

                $member_credit_monthly_data->npsc = $npsc;
                $member_credit_monthly_data->npg_arrs = $npg_arrs;
                $member_credit_monthly_data->npg_adj = $npg_adj;

                $member_credit_monthly_data->var_incr = $var_inc_amount;

                $member_credit_monthly_data->month = $month;
                $member_credit_monthly_data->year = $year;
                $member_credit_monthly_data->apply_date = date('Y-m-d');
                $member_credit_monthly_data->save();

                $member_monthly_data->credit_id = $member_credit_monthly_data->id;
                $record_member_credit = MemberMonthlyDataCredit::find($member_monthly_data->credit_id);
                $creditFields = [
                    'pay',
                    'da',
                    'tpt',
                    'cr_rent',
                    'g_pay',
                    'hra',
                    'da_on_tpt',
                    'cr_elec',
                    'fpa',
                    's_pay',
                    'pua',
                    'npsc',
                    'npg_arrs',
                    'npg_adj',
                    'hindi',
                    'cr_water',
                    'add_inc2',
                    'npa',
                    'deptn_alw',
                    'misc1',
                    'var_incr',
                    'wash_alw',
                    'dis_alw',
                    'misc2',
                    'spl_incentive',
                    'incentive',
                    'variable_amount',
                    'arrs_pay_alw',
                    'risk_alw',
                    'landline_allow',
                    'mobile_allow',
                    'broad_band_allow',
                    'gpa_sub',
                    'cmg',
                    'cghs',
                    'cgegis',
                ];

                $totalCredits = 0;
                foreach ($creditFields as $field) {
                    $value = (float) $record_member_credit->$field ?? 0;
                    $totalCredits += $value;
                }

                $record_member_credit->tot_credits = $totalCredits;
                $record_member_credit->save();
            }

            $member_loan_infos = MemberMonthlyDataLoanInfo::where('member_id', $member_id)->where('month', $previous_month)->where('year', $previous_year)->get();

            // insert member debit data to member monthly data debit
            $member_debit = MemberMonthlyDataDebit::where('member_id', $member_id)->orderBy('id', 'desc')->first();
            if ($member_debit) {
                $member_debit_monthly_data = new MemberMonthlyDataDebit();
                foreach ($DebitCommonColumns as $column) {
                    $member_debit_monthly_data->$column = $member_debit->$column;
                }
                $deduction = 0;
                if ($member->fund_type == 'GPF') {
                    if ($member_debit->gpa_sub == 0) {
                        $gpfDeduction = ($member_credit_monthly_data->pay + $member_credit_monthly_data->da) * 10 / 100;
                        $member_debit_monthly_data->gpa_sub = $gpfDeduction;
                        $deduction += $gpfDeduction;
                    }
                }

                if ($member->fund_type == 'NPS') {
                    if ($member_debit->nps_sub == 0) {
                        $npsDeduction = ($member_credit_monthly_data->pay + $member_credit_monthly_data->da) * 10 / 100;
                        $member_debit_monthly_data->nps_sub = $npsDeduction;
                        $deduction += $npsDeduction;
                    }
                    if ($member_debit->cmg == 0) {
                        $gmcDeduction = ($member_credit_monthly_data->pay + $member_credit_monthly_data->da) * 14 / 100;
                        $npsGMCTotal = $gmcDeduction;
                        $member_debit_monthly_data->cmg = $npsGMCTotal;
                        $deduction += $npsGMCTotal;
                    }
                }


                if ($member->desig) {
                    $cgaData = Cghs::where('designation_id', $member->desig)->first();
                    if ($member_debit->cghs == 0) {
                        if ($cgaData) {
                            $cghsDeduction = $cgaData->amount;
                            $member_debit_monthly_data->cghs = $cghsDeduction;
                            $deduction += $cghsDeduction;
                        }
                    }
                }


                if ($exception_this_month) {
                    if ($exception_this_month->rule_name == 'TPT') {
                        $member_debit_monthly_data->tpt = $exception_this_month->amount;
                        $member_debit_monthly_data->da_on_tpt = $exception_this_month->amount / 2;
                    }

                    if ($exception_this_month->rule_name == 'DA') {
                        $member_debit_monthly_data->da = $exception_this_month->amount;
                    }

                    if ($exception_this_month->rule_name == 'HRA') {
                        $member_debit_monthly_data->hra = $exception_this_month->amount;
                    }
                }

                $member_debit_monthly_data->eol = 0;
                $member_debit_monthly_data->ccl = 0;

                $npsg = (($basicPay + $daAmount) * 14) / 100;
                $npsg_arr = (($basicPay + $daAmount) * 14) / 100;
                $npsg_adj = (($basicPay + $daAmount) * 10) / 100;

                $member_debit_monthly_data->npsg = $npsg;
                $member_debit_monthly_data->npsg_arr = $npsg_arr;
                $member_debit_monthly_data->npsg_adj = $npsg_adj;
                $member_debit_monthly_data->month = $month;
                $member_debit_monthly_data->year = $year;
                $member_debit_monthly_data->apply_date = date('Y-m-d');
                $member_debit_monthly_data->save();
                $member_monthly_data->debit_id = $member_debit_monthly_data->id;

                $record_member_debit = MemberMonthlyDataDebit::find($member_monthly_data->debit_id);
                $debitFields = [
                    'gpa_sub',
                    'gpf_adv',
                    'nps_sub',
                    'nps_rec',
                    'nps_arr',
                    'eol',
                    'ccl',
                    'rent',
                    'lf_arr',
                    'tada',
                    'hba',
                    'hba_cur_instl',
                    'hba_total_instl',
                    'hba_adv',
                    'hba_int',
                    'hba_int_cur_instl',
                    'hba_int_total_instl',
                    'misc1',
                    'gpf_rec',
                    'i_tax',
                    'elec',
                    'elec_arr',
                    'medi',
                    'pc',
                    'misc2',
                    'gpf_arr',
                    'ecess',
                    'water',
                    'water_arr',
                    'ltc',
                    'fadv',
                    'fest_adv_prin_cur',
                    'fest_adv_total_cur',
                    'misc3',
                    'cgegis',
                    'cda',
                    'furn',
                    'furn_arr',
                    'car',
                    'car_adv',
                    'car_adv_prin_instl',
                    'car_adv_total_instl',
                    'car_int',
                    'hra_rec',
                    'cghs',
                    'ptax',
                    'cmg',
                    'pli',
                    'scooter',
                    'sco_adv',
                    'scot_adv_prin_instl',
                    'scot_adv_total_instl',
                    'sco_int',
                    'sco_adv_int_curr_instl',
                    'sco_adv_int_total_instl',
                    'comp_adv',
                    'comp_prin_curr_instl',
                    'comp_prin_total_instl',
                    'comp_adv_int',
                    'comp_int_curr_instl',
                    'comp_int_total_instl',
                    'comp_int',
                    'tpt_rec',
                    'leave_rec',
                    'ltc_rec',
                    'medical_rec',
                    'tada_rec',
                    'pension_rec',
                    'quarter_charges',
                    'cgeis_arr',
                    'cghs_arr',
                    'penal_intr',
                    'arrear_pay',
                    'npsg',
                    'npsg_arr',
                    'npsg_adj',
                    'society'
                ];

                $totalDebits = 0;
                foreach ($debitFields as $field) {
                    $totalDebits += (float) $record_member_debit->$field;
                }

                $total_loan = 0;
                if (count($member_loan_infos) > 0) {
                    foreach ($member_loan_infos as $member_loan) {
                        if ($member_loan->tot_no_of_inst > $member_loan->present_inst_no) {
                            $total_loan += $member_loan->inst_amount;
                        }
                    }
                }

                $grossDebits = $totalDebits + $total_loan;
                $record_member_debit->tot_debits =  $grossDebits;
                $record_member_debit->net_pay =   $totalCredits - $grossDebits;
                $record_member_debit->save();
            }

            // insert member recovery data to member monthly data recovery
            $member_recovery = MemberMonthlyDataRecovery::where('member_id', $member_id)->orderBy('id', 'desc')->first();
            if ($member_recovery) {
                $member_recovery_monthly_data = new MemberMonthlyDataRecovery();
                foreach ($RecoveryCommonColumns as $column) {
                    $member_recovery_monthly_data->$column = $member_recovery->$column;
                }


                if ($member_recovery->wel_sub == 0 || $member_recovery->med_ins == 0) {
                    $category = Category::where('id', $member->category)->first();
                    $welSub = 0;
                    if ($category) {
                        $member_pg = Member::where('id', $member->id)->first()->pg;
                        if ($member_pg == 1) {
                            $medIns = 0;
                        } else {
                            $medIns = $category->med_ins ?? 0;;
                        }
                        $welSub = $category->wel_sub ?? 0;
                    }

                    $member_recovery_monthly_data->wel_sub = $welSub;
                    $member_recovery_monthly_data->med_ins = $medIns;
                }
                if ($member_recovery->wel_rec == 0) {
                    $wel_rec = 0;

                    if (in_array($category->category, ['CGO NPS', 'CGO GPF', 'CGO DEP'])) {
                        $wel_rec = 20;
                    } elseif (in_array($category->category, ['NIE NPS', 'NIE'])) {
                        $wel_rec = 10;
                    }
                    $member_recovery_monthly_data->wel_rec = $wel_rec;
                }

                if ($exception_this_month) {
                    if ($exception_this_month->rule_name == 'Wellfare') {
                        $member_recovery_monthly_data->wel_sub = $exception_this_month->amount;
                    }

                    if ($exception_this_month->rule_name == 'MESS') {
                        $member_recovery_monthly_data->mess = $exception_this_month->amount;
                    }

                    if ($exception_this_month->rule_name == 'Prof TAX') {
                        $member_recovery_monthly_data->ptax = $exception_this_month->amount;
                    }
                }

                $member_recovery_monthly_data->month = $month;
                $member_recovery_monthly_data->year = $year;
                $member_recovery_monthly_data->apply_date = date('Y-m-d');
                $member_recovery_monthly_data->save();
                $member_monthly_data->recovery_id = $member_recovery_monthly_data->id;


                $record_member_recovery = MemberMonthlyDataRecovery::find($member_monthly_data->recovery_id);
                $recoveryFields = [
                    'ccs_sub',
                    'ptax',
                    'mess',
                    'security',
                    'misc1',
                    'ccs_rec',
                    'asso_fee',
                    'dbf',
                    'misc2',
                    'wel_sub',
                    'ben',
                    'med_ins',
                    'wel_rec',
                    'hdfc',
                    'maf',
                    'final_pay',
                    'lic',
                    'cort_atch',
                    'ogpf',
                    'ntp',
                ];

                $totalRecoveries = 0;
                foreach ($recoveryFields as $field) {
                    $totalRecoveries += (float) $record_member_recovery->$field;
                }

                $record_member_recovery->tot_rec = $totalRecoveries;
                $record_member_recovery->save();
            }

            // insert member core info data to member monthly data core info
            $member_core_info = MemberMonthlyDataCoreInfo::where('member_id', $member_id)->orderBy('id', 'desc')->first();
            if ($member_core_info) {
                $member_core_info_monthly_data = new MemberMonthlyDataCoreInfo();
                foreach ($CoreInfoCommonColumns as $column) {
                    $member_core_info_monthly_data->$column = $member_core_info->$column;
                }

                if ($exception_this_month) {
                    if ($exception_this_month->rule_name == 'GPF') {
                        $member_core_info_monthly_data->gpf_sub = $exception_this_month->amount;
                    }
                }

                $member_core_info_monthly_data->month = $month;
                $member_core_info_monthly_data->year = $year;
                $member_core_info_monthly_data->apply_date = date('Y-m-d');
                $member_core_info_monthly_data->save();
                // $member_monthly_data->core_id = $member_core_info_monthly_data->id;
            }

            // insert member policy info data to member monthly data policy info
            $member_policy_infos = MemberMonthlyDataPolicyInfo::where('member_id', $member_id)->where('month', $previous_month)->where('year', $previous_year)->get();
            $policy_info_ids = [];
            if (count($member_policy_infos) > 0) {
                foreach ($member_policy_infos as $member_policy_info) {
                    $member_policy_info_monthly_data = new MemberMonthlyDataPolicyInfo();
                    foreach ($PolicyInfoCommonColumns as $column) {
                        $member_policy_info_monthly_data->$column = $member_policy_info->$column;
                    }
                    $member_policy_info_monthly_data->month = $month;
                    $member_policy_info_monthly_data->year = $year;
                    $member_policy_info_monthly_data->apply_date = date('Y-m-d');
                    $member_policy_info_monthly_data->save();
                    $policy_info_ids[] = $member_policy_info_monthly_data->id;
                }
                // $member_monthly_data->policy_info_ids = json_encode($policy_info_ids);
            }

            // insert member loan info data to member monthly data loan info

            $loan_info_ids = [];
            if (count($member_loan_infos) > 0) {
                foreach ($member_loan_infos as $member_loan_info) {
                    if ($member_loan_info->tot_no_of_inst > $member_loan_info->present_inst_no) {
                        $member_loan_info_monthly_data = new MemberMonthlyDataLoanInfo();

                        foreach ($LoanInfoCommonColumns as $column) {
                            $member_loan_info_monthly_data->$column = $member_loan_info->$column;
                        }

                        $member_loan_info->present_inst_no = $member_loan_info->present_inst_no - 1;
                        $member_loan_info_monthly_data->month = $month;
                        $member_loan_info_monthly_data->year = $year;
                        $member_loan_info_monthly_data->apply_date = date('Y-m-d');
                        $member_loan_info_monthly_data->save();
                        $loan_info_ids[] = $member_loan_info_monthly_data->id;
                    }
                }
                // $member_monthly_data->loan_info_ids = json_encode($loan_info_ids);
            }

            // insert member expectation data to member monthly data expectation
            $member_expectations = MemberMonthlyDataExpectation::where('member_id', $member_id)->where('month', $previous_month)->where('year', $previous_year)->get();
            $expectation_ids = [];
            if (count($member_expectations) > 0) {
                foreach ($member_expectations as $member_expectation) {
                    // Check if the member's amount_year and amount_month is >= selected year and month
                    $expYear = (int)$member_expectation->amount_year;
                    $expMonth = (int)$member_expectation->amount_month;
                    $selectedYear = (int)$year;
                    $selectedMonth = (int)$month;

                    if ($expYear > $selectedYear || ($expYear === $selectedYear && $expMonth >= $selectedMonth)) {
                        $member_expectation_monthly_data = new MemberMonthlyDataExpectation();
                        foreach ($ExpectationCommonColumns as $column) {
                            $member_expectation_monthly_data->$column = $member_expectation->$column;
                        }
                        $member_expectation_monthly_data->month = $month;
                        $member_expectation_monthly_data->year = $year;
                        $member_expectation_monthly_data->apply_date = date('Y-m-d');
                        $member_expectation_monthly_data->save();
                        $expectation_ids[] = $member_expectation_monthly_data->id;
                    }
                }
                // $member_monthly_data->expectation_ids = json_encode($expectation_ids);
            }

            // insert member var info data to member monthly data var info
            $member_var_info = MemberMonthlyDataVarInfo::where('member_id', $member_id)->orderBy('id', 'desc')->first();
            if ($member_var_info) {
                $member_var_info_monthly_data = new MemberMonthlyDataVarInfo();
                foreach ($VarInfoCommonColumns as $column) {
                    $member_var_info_monthly_data->$column = $member_var_info->$column;
                }

                $member_var_info_monthly_data->month = $month;
                $member_var_info_monthly_data->year = $year;
                $member_var_info_monthly_data->apply_date = date('Y-m-d');
                $member_var_info_monthly_data->save();
                //  $member_monthly_data->var_info_id = $member_var_info_monthly_data->id;
            }

            // insert main Member Monthly Data

            $member_monthly_data->member_id = $member_id;
            $member_monthly_data->month = $month;
            $member_monthly_data->year = $year;
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
                $existing_data = MemberMonthlyData::where('month', $month)
                    ->where('year', $year)
                    ->where('member_id', $member_id)
                    ->first();

                if ($existing_data) {
                    // Data for the previous month already exists; do not insert
                    continue;
                }


                $member_id = $member->id;

                $member_monthly_data = new MemberMonthlyData();

                // insert member credit data to member monthly data credit
                $member_credit = MemberMonthlyDataCredit::where('member_id', $member_id)->orderBy('id', 'desc')->first();
                if ($member_credit) {
                    $var_inc_amount = 0;
                    $var_noi = MemberMonthlyDataVarInfo::where('member_id', $member->id)->first();
                    if ($var_noi) {
                        if ($var_noi->stop == 'No') {

                            $var_inc_amount = $var_noi->v_incr;
                        }
                    }
                    // $member->var_inc_amount = $var_inc_amount;
                    $exception_this_month = MemberMonthlyDataExpectation::where('member_id', $member->id)->where('amount_month', $month)->where('amount_year', $year)->first();

                    // $check_recovery_member = MemberMonthlyDataVarInfo::where('member_id', $member->id)->get();
                    // if (count($check_recovery_member) > 0) {
                    //     $update_recovery_member = MemberMonthlyDataVarInfo::where('member_id', $member->id)->first();
                    //     if ($update_recovery_member->noi_pending > 0 && $update_recovery_member->stop == 'No') {
                    //         $update_recovery_member->noi_pending = $update_recovery_member->noi_pending - 1;
                    //         $update_recovery_member->update();
                    //     }
                    // }


                    $member_credit_monthly_data = new MemberMonthlyDataCredit();
                    foreach ($CreditCommonColumns as $column) {
                        $member_credit_monthly_data->$column = $member_credit->$column;
                    }
                    if ($exception_this_month) {
                        if ($exception_this_month->rule_name == 'GPF') {
                            $member_credit_monthly_data->gpa_sub = $exception_this_month->amount;
                        }

                        if ($exception_this_month->rule_name == 'GMC') {
                            $member_credit_monthly_data->cmg = $exception_this_month->amount;
                        }

                        if ($exception_this_month->rule_name == 'CGHS') {
                            $member_credit_monthly_data->cghs = $exception_this_month->amount;
                        }

                        if ($exception_this_month->rule_name == 'CGEGIS') {
                            $member_credit_monthly_data->cgegis = $exception_this_month->amount;
                        }
                    }
                    $da_percentage = DearnessAllowancePercentage::where('is_active', 1)->first();
                    $basicPay = $member->basic;
                    $daAmount = $da_percentage ? ($basicPay * $da_percentage->percentage) / 100 : 0;

                    $tptAmount = 0;
                    $tptDa = 0;
                    if ($member->member_city) {
                        $city = City::find($member->member_city);
                        if ($city && $city->tpt_type) {
                            $tptData = Tpta::where('tpt_type', $city->tpt_type)
                                ->where('pay_level_id', $member->pm_level)
                                ->where('status', 1)
                                ->first();
                            if ($tptData) {
                                $tptAmount = $tptData->tpt_allowance;
                                $tptDa = ($tptAmount) / 2;
                            }
                        }
                    }

                    $hraAmount = 0;
                    if ($member->member_city) {
                        $city = City::find($member->member_city);
                        if ($city) {
                            $hraPercentage = Hra::where('city_category', $city->city_type)
                                ->where('status', 1)
                                ->first();
                            $hraAmount = $hraPercentage ? ($basicPay * $hraPercentage->percentage) / 100 : 0;
                        }
                    }

                    $member_credit_monthly_data->da = $daAmount;
                    $member_credit_monthly_data->tpt = $tptAmount;
                    $member_credit_monthly_data->da_on_tpt = $tptDa;
                    $member_credit_monthly_data->hra = $hraAmount;

                    $member_credit_monthly_data->var_incr = $var_inc_amount;

                    $npsc = (($basicPay + $daAmount) * 14) / 100;
                    $npg_arrs = (($basicPay + $daAmount) * 14) / 100;
                    $npg_adj = (($basicPay + $daAmount) * 14) / 100;

                    $member_credit_monthly_data->npsc = $npsc;
                    $member_credit_monthly_data->npg_arrs = $npg_arrs;
                    $member_credit_monthly_data->npg_adj = $npg_adj;


                    $member_credit_monthly_data->month = $month;
                    $member_credit_monthly_data->year = $year;
                    $member_credit_monthly_data->apply_date = date('Y-m-d');
                    $member_credit_monthly_data->save();

                    $member_monthly_data->credit_id = $member_credit_monthly_data->id;
                    $record_member_credit = MemberMonthlyDataCredit::find($member_monthly_data->credit_id);
                    $creditFields = [
                        'pay',
                        'da',
                        'tpt',
                        'cr_rent',
                        'g_pay',
                        'hra',
                        'da_on_tpt',
                        'cr_elec',
                        'fpa',
                        's_pay',
                        'pua',
                        'npsc',
                        'npg_arrs',
                        'npg_adj',
                        'hindi',
                        'cr_water',
                        'add_inc2',
                        'npa',
                        'deptn_alw',
                        'misc1',
                        'var_incr',
                        'wash_alw',
                        'dis_alw',
                        'misc2',
                        'spl_incentive',
                        'incentive',
                        'variable_amount',
                        'arrs_pay_alw',
                        'risk_alw',
                        'landline_allow',
                        'mobile_allow',
                        'broad_band_allow',
                        'gpa_sub',
                        'cmg',
                        'cghs',
                        'cgegis',
                    ];

                    $totalCredits = 0;
                    foreach ($creditFields as $field) {
                        $value = (float) $record_member_credit->$field ?? 0;
                        $totalCredits += $value;
                    }

                    $record_member_credit->tot_credits = $totalCredits;
                    $record_member_credit->save();
                }

                $member_loan_infos = MemberMonthlyDataLoanInfo::where('member_id', $member_id)->where('month', $previous_month)->where('year', $previous_year)->get();

                // insert member debit data to member monthly data debit
                $member_debit = MemberMonthlyDataDebit::where('member_id', $member_id)->orderBy('id', 'desc')->first();
                if ($member_debit) {
                    $member_debit_monthly_data = new MemberMonthlyDataDebit();
                    foreach ($DebitCommonColumns as $column) {
                        $member_debit_monthly_data->$column = $member_debit->$column;
                    }
                    $deduction = 0;
                    if ($member->fund_type == 'GPF') {
                        if ($member_debit->gpa_sub == 0) {
                            $gpfDeduction = ($member_credit_monthly_data->pay + $member_credit_monthly_data->da) * 10 / 100;
                            $member_debit_monthly_data->gpa_sub = $gpfDeduction;
                            $deduction += $gpfDeduction;
                        }
                    }

                    if ($member->fund_type == 'NPS') {
                        if ($member_debit->nps_sub == 0) {
                            $npsDeduction = ($member_credit_monthly_data->pay + $member_credit_monthly_data->da) * 10 / 100;
                            $member_debit_monthly_data->nps_sub = $npsDeduction;
                            $deduction += $npsDeduction;
                        }
                        if ($member_debit->cmg == 0) {
                            $gmcDeduction = ($member_credit_monthly_data->pay + $member_credit_monthly_data->da) * 14 / 100;
                            $npsGMCTotal = $gmcDeduction;
                            $member_debit_monthly_data->cmg = $npsGMCTotal;
                            $deduction += $npsGMCTotal;
                        }
                    }


                    if ($member->desig) {
                        $cgaData = Cghs::where('designation_id', $member->desig)->first();
                        if ($member_debit->cghs == 0) {
                            if ($cgaData) {
                                $cghsDeduction = $cgaData->amount;
                                $member_debit_monthly_data->cghs = $cghsDeduction;
                                $deduction += $cghsDeduction;
                            }
                        }
                    }


                    if ($exception_this_month) {
                        if ($exception_this_month->rule_name == 'TPT') {
                            $member_debit_monthly_data->tpt = $exception_this_month->amount;
                            $member_debit_monthly_data->da_on_tpt = $exception_this_month->amount / 2;
                        }

                        if ($exception_this_month->rule_name == 'DA') {
                            $member_debit_monthly_data->da = $exception_this_month->amount;
                        }

                        if ($exception_this_month->rule_name == 'HRA') {
                            $member_debit_monthly_data->hra = $exception_this_month->amount;
                        }
                    }

                    $npsg = (($basicPay + $daAmount) * 14) / 100;
                    $npsg_arr = (($basicPay + $daAmount) * 14) / 100;
                    $npsg_adj = (($basicPay + $daAmount) * 10) / 100;

                    $member_debit_monthly_data->npsg = $npsg;
                    $member_debit_monthly_data->npsg_arr = $npsg_arr;
                    $member_debit_monthly_data->npsg_adj = $npsg_adj;

                    $member_debit_monthly_data->month = $month;
                    $member_debit_monthly_data->year = $year;
                    $member_debit_monthly_data->apply_date = date('Y-m-d');
                    $member_debit_monthly_data->save();
                    $member_monthly_data->debit_id = $member_debit_monthly_data->id;

                    $record_member_debit = MemberMonthlyDataDebit::find($member_monthly_data->debit_id);
                    $debitFields = [
                        'gpa_sub',
                        'gpf_adv',
                        'nps_sub',
                        'nps_rec',
                        'nps_arr',
                        'eol',
                        'ccl',
                        'rent',
                        'lf_arr',
                        'tada',
                        'hba',
                        'hba_cur_instl',
                        'hba_total_instl',
                        'hba_adv',
                        'hba_int',
                        'hba_int_cur_instl',
                        'hba_int_total_instl',
                        'misc1',
                        'gpf_rec',
                        'i_tax',
                        'elec',
                        'elec_arr',
                        'medi',
                        'pc',
                        'misc2',
                        'gpf_arr',
                        'ecess',
                        'water',
                        'water_arr',
                        'ltc',
                        'fadv',
                        'fest_adv_prin_cur',
                        'fest_adv_total_cur',
                        'misc3',
                        'cgegis',
                        'cda',
                        'furn',
                        'furn_arr',
                        'car',
                        'car_adv',
                        'car_adv_prin_instl',
                        'car_adv_total_instl',
                        'car_int',
                        'hra_rec',
                        'cghs',
                        'ptax',
                        'cmg',
                        'pli',
                        'scooter',
                        'sco_adv',
                        'scot_adv_prin_instl',
                        'scot_adv_total_instl',
                        'sco_int',
                        'sco_adv_int_curr_instl',
                        'sco_adv_int_total_instl',
                        'comp_adv',
                        'comp_prin_curr_instl',
                        'comp_prin_total_instl',
                        'comp_adv_int',
                        'comp_int_curr_instl',
                        'comp_int_total_instl',
                        'comp_int',
                        'tpt_rec',
                        'leave_rec',
                        'ltc_rec',
                        'medical_rec',
                        'tada_rec',
                        'pension_rec',
                        'quarter_charges',
                        'cgeis_arr',
                        'cghs_arr',
                        'penal_intr',
                        'arrear_pay',
                        'npsg',
                        'npsg_arr',
                        'npsg_adj',
                        'society'
                    ];

                    $totalDebits = 0;
                    foreach ($debitFields as $field) {
                        $totalDebits += (float) $record_member_debit->$field;
                    }

                    $total_loan = 0;
                    if (count($member_loan_infos) > 0) {
                        foreach ($member_loan_infos as $member_loan) {
                            if ($member_loan->tot_no_of_inst > $member_loan->present_inst_no) {
                                $total_loan += $member_loan->inst_amount;
                            }
                        }
                    }

                    $grossDebits = $totalDebits + $total_loan;
                    $record_member_debit->tot_debits =  $grossDebits;
                    $record_member_debit->net_pay =   $totalCredits - $grossDebits;
                    $record_member_debit->save();
                }

                // insert member recovery data to member monthly data recovery
                $member_recovery = MemberMonthlyDataRecovery::where('member_id', $member_id)->orderBy('id', 'desc')->first();
                if ($member_recovery) {
                    $member_recovery_monthly_data = new MemberMonthlyDataRecovery();
                    foreach ($RecoveryCommonColumns as $column) {
                        $member_recovery_monthly_data->$column = $member_recovery->$column;
                    }


                    if ($member_recovery->wel_sub == 0 || $member_recovery->med_ins == 0) {
                        $category = Category::where('id', $member->category)->first();
                        $welSub = 0;
                        if ($category) {
                            $member_pg = Member::where('id', $member->id)->first()->pg;
                            if ($member_pg == 1) {
                                $medIns = 0;
                            } else {
                                $medIns = $category->med_ins ?? 0;;
                            }
                            $welSub = $category->wel_sub ?? 0;
                        }

                        $member_recovery_monthly_data->wel_sub = $welSub;
                        $member_recovery_monthly_data->med_ins = $medIns;
                    }
                    if ($member_recovery->wel_rec == 0) {
                        $wel_rec = 0;

                        if (in_array($category->category, ['CGO NPS', 'CGO GPF', 'CGO DEP'])) {
                            $wel_rec = 20;
                        } elseif (in_array($category->category, ['NIE NPS', 'NIE'])) {
                            $wel_rec = 10;
                        }
                        $member_recovery_monthly_data->wel_rec = $wel_rec;
                    }

                    if ($exception_this_month) {
                        if ($exception_this_month->rule_name == 'Wellfare') {
                            $member_recovery_monthly_data->wel_sub = $exception_this_month->amount;
                        }

                        if ($exception_this_month->rule_name == 'MESS') {
                            $member_recovery_monthly_data->mess = $exception_this_month->amount;
                        }

                        if ($exception_this_month->rule_name == 'Prof TAX') {
                            $member_recovery_monthly_data->ptax = $exception_this_month->amount;
                        }
                    }

                    $member_recovery_monthly_data->month = $month;
                    $member_recovery_monthly_data->year = $year;
                    $member_recovery_monthly_data->apply_date = date('Y-m-d');
                    $member_recovery_monthly_data->save();
                    $member_monthly_data->recovery_id = $member_recovery_monthly_data->id;


                    $record_member_recovery = MemberMonthlyDataRecovery::find($member_monthly_data->recovery_id);
                    $recoveryFields = [
                        'ccs_sub',
                        'ptax',
                        'mess',
                        'security',
                        'misc1',
                        'ccs_rec',
                        'asso_fee',
                        'dbf',
                        'misc2',
                        'wel_sub',
                        'ben',
                        'med_ins',
                        'wel_rec',
                        'hdfc',
                        'maf',
                        'final_pay',
                        'lic',
                        'cort_atch',
                        'ogpf',
                        'ntp',
                    ];

                    $totalRecoveries = 0;
                    foreach ($recoveryFields as $field) {
                        $totalRecoveries += (float) $record_member_recovery->$field;
                    }

                    $record_member_recovery->tot_rec = $totalRecoveries;
                    $record_member_recovery->save();
                }

                // insert member core info data to member monthly data core info
                $member_core_info = MemberMonthlyDataCoreInfo::where('member_id', $member_id)->orderBy('id', 'desc')->first();
                if ($member_core_info) {
                    $member_core_info_monthly_data = new MemberMonthlyDataCoreInfo();
                    foreach ($CoreInfoCommonColumns as $column) {
                        $member_core_info_monthly_data->$column = $member_core_info->$column;
                    }

                    if ($exception_this_month) {
                        if ($exception_this_month->rule_name == 'GPF') {
                            $member_core_info_monthly_data->gpf_sub = $exception_this_month->amount;
                        }
                    }

                    $member_core_info_monthly_data->month = $month;
                    $member_core_info_monthly_data->year = $year;
                    $member_core_info_monthly_data->apply_date = date('Y-m-d');
                    $member_core_info_monthly_data->save();
                    // $member_monthly_data->core_id = $member_core_info_monthly_data->id;
                }

                // insert member policy info data to member monthly data policy info
                $member_policy_infos = MemberMonthlyDataPolicyInfo::where('member_id', $member_id)->where('month', $previous_month)->where('year', $previous_year)->get();
                $policy_info_ids = [];
                if (count($member_policy_infos) > 0) {
                    foreach ($member_policy_infos as $member_policy_info) {
                        $member_policy_info_monthly_data = new MemberMonthlyDataPolicyInfo();
                        foreach ($PolicyInfoCommonColumns as $column) {
                            $member_policy_info_monthly_data->$column = $member_policy_info->$column;
                        }
                        $member_policy_info_monthly_data->month = $month;
                        $member_policy_info_monthly_data->year = $year;
                        $member_policy_info_monthly_data->apply_date = date('Y-m-d');
                        $member_policy_info_monthly_data->save();
                        $policy_info_ids[] = $member_policy_info_monthly_data->id;
                    }
                    // $member_monthly_data->policy_info_ids = json_encode($policy_info_ids);
                }

                // insert member loan info data to member monthly data loan info

                $loan_info_ids = [];
                if (count($member_loan_infos) > 0) {
                    foreach ($member_loan_infos as $member_loan_info) {
                        if ($member_loan_info->tot_no_of_inst > $member_loan_info->present_inst_no) {
                            $member_loan_info_monthly_data = new MemberMonthlyDataLoanInfo();

                            foreach ($LoanInfoCommonColumns as $column) {
                                $member_loan_info_monthly_data->$column = $member_loan_info->$column;
                            }

                            $member_loan_info->present_inst_no = $member_loan_info->present_inst_no - 1;
                            $member_loan_info_monthly_data->month = $month;
                            $member_loan_info_monthly_data->year = $year;
                            $member_loan_info_monthly_data->apply_date = date('Y-m-d');
                            $member_loan_info_monthly_data->save();
                            $loan_info_ids[] = $member_loan_info_monthly_data->id;
                        }
                    }
                    // $member_monthly_data->loan_info_ids = json_encode($loan_info_ids);
                }

                // insert member expectation data to member monthly data expectation
                $member_expectations = MemberMonthlyDataExpectation::where('member_id', $member_id)->where('month', $previous_month)->where('year', $previous_year)->get();
                $expectation_ids = [];
                if (count($member_expectations) > 0) {
                    foreach ($member_expectations as $member_expectation) {
                        // Check if the member's amount_year and amount_month is >= selected year and month
                        $expYear = (int)$member_expectation->amount_year;
                        $expMonth = (int)$member_expectation->amount_month;
                        $selectedYear = (int)$year;
                        $selectedMonth = (int)$month;

                        if ($expYear > $selectedYear || ($expYear === $selectedYear && $expMonth >= $selectedMonth)) {
                            $member_expectation_monthly_data = new MemberMonthlyDataExpectation();
                            foreach ($ExpectationCommonColumns as $column) {
                                $member_expectation_monthly_data->$column = $member_expectation->$column;
                            }
                            $member_expectation_monthly_data->month = $month;
                            $member_expectation_monthly_data->year = $year;
                            $member_expectation_monthly_data->apply_date = date('Y-m-d');
                            $member_expectation_monthly_data->save();
                            $expectation_ids[] = $member_expectation_monthly_data->id;
                        }
                    }
                    // $member_monthly_data->expectation_ids = json_encode($expectation_ids);
                }

                // insert member var info data to member monthly data var info
                $member_var_info = MemberMonthlyDataVarInfo::where('member_id', $member_id)->orderBy('id', 'desc')->first();
                if ($member_var_info) {
                    $member_var_info_monthly_data = new MemberMonthlyDataVarInfo();
                    foreach ($VarInfoCommonColumns as $column) {
                        $member_var_info_monthly_data->$column = $member_var_info->$column;
                    }

                    $member_var_info_monthly_data->month = $month;
                    $member_var_info_monthly_data->year = $year;
                    $member_var_info_monthly_data->apply_date = date('Y-m-d');
                    $member_var_info_monthly_data->save();
                    //  $member_monthly_data->var_info_id = $member_var_info_monthly_data->id;
                }

                // insert main Member Monthly Data

                $member_monthly_data->member_id = $member_id;
                $member_monthly_data->month = $month;
                $member_monthly_data->year = $year;
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
