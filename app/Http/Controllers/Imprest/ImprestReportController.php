<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use PDF;
use App\Models\CdaBillAuditTeam;
use App\Models\AdvanceFundToEmployee;
use App\Models\AdvanceSettlement;
use App\Models\CDAReceipt;
use App\Models\CashWithdrawal;
use DateTime;
use Carbon\Carbon;
use App\Helpers\Helper;


class ImprestReportController extends Controller
{
    //
    public function imprestReport()
    {
        $accountants  = User::role('ACCOUNTANT')->get();
        return view('imprest.reports.form', compact('accountants'));
    }

    public function imprestReportGenerate(Request $request)
    {
        // validation
        $this->validate($request, [
            'report_date' => 'required',
            'account_officer_sign' => 'required',
            'bill_type' => 'required',
        ]);

        // how to add this format like d/m/y


        $request_date = $request->report_date;
        $date = new DateTime($request_date);

        $request_pre_date = date('Y-m-d', strtotime('-1 day', strtotime($request->report_date)));


        // Format the date as required
        $report_date = $date->format('d/m/y');

        if ($request->bill_type == 'cash_book') {

            $cashin_bank = Helper::getBankBalance();
            $cashin_hand = Helper::getCashBalance();
            $cashin_hand_predate = Helper::getCashBalance($request_pre_date);
            $cashin_bank_predate = Helper::getBankBalance($request_pre_date);

            $total = $cashin_bank + $cashin_hand;

            $cash_withdraws =  CashWithdrawal::get();

            $total_cashin_hand = $cashin_hand_predate;

            if ($cash_withdraws) {
                foreach ($cash_withdraws as $cash_withdraw) {
                    $total_cashin_hand += $cash_withdraw->amount;
                }
            }

            // $cda_bills = CdaBillAuditTeam::get();

            // $total_paybills = 0;

            // $grand_total_cashin_hand = $cashin_hand;
            // if ($cda_bills) {
            //     foreach ($cda_bills as $cda_bill) {
            //         //  $grand_total_cashin_hand += $cda_bill->bill_amount;
            //         $total_paybills += $cda_bill->bill_amount;
            //     }
            //     $grand_total_cashin_hand = $total_paybills + $cashin_hand;
            // }

            $cda_bills = CDAReceipt::get();
            $total_paybills = 0;
            $grand_total_cashin_hand = $cashin_hand;
            if ($cda_bills) {
                foreach ($cda_bills as $cda_bill) {
                    $settle_id = $cda_bill->cdaBill->settle_id;
                    $settleBills = AdvanceSettlement::find($settle_id);

                    $cda_bill->cda_bill_date = $cda_bill->cdaBill->cda_bill_date;
                    $cda_bill->settle_firm = $settleBills->firm;
                    $cda_bill->var_type = $settleBills->variableType->name;
                    $cda_bill->chq_no = $settleBills->chq_no;
                    $cda_bill->cda_bill_amount = $cda_bill->cdaBill->bill_amount;
                    $cda_bill->varno = $settleBills->adv_no;
                    $total_paybills += $cda_bill->cdaBill->bill_amount;
                }

                $grand_total_cashin_hand = $total_paybills + $cashin_hand;
            }

            $advance_amount_total = AdvanceFundToEmployee::sum('adv_amount');
            $total_paybills = $grand_total_cashin_hand + $advance_amount_total;

            // $bills_to_cda = CDAReceipt::sum('cdaBill.bill_amount');
            $bills_to_cda = CDAReceipt::with('cdaBill')
                ->get()
                ->sum(function ($receipt) {
                    return $receipt->cdaBill->bill_amount ?? 0; // Use 0 if no related bill is found
                });


            $bills_on_hand = AdvanceSettlement::where('bill_status', 1)->where('receipt_status', 0)->sum('bill_amount');


            $advanceFunds = AdvanceFundToEmployee::whereDoesntHave('advanceSettlements', function ($query) use ($request_date) {
                $query->where('bill_status', 1)->Where('receipt_status', 1);
            })
                ->orWhereHas('advanceSettlements', function ($query) use ($request_date) {
                    $query->whereColumn('af_id', 'id');
                })

                ->get();

            // $advanceFunds = AdvanceFundToEmployee::whereDoesntHave('advanceSettlements', function ($query) use ($request_date) {
            //     $query->where('bill_status', 1)
            //         ->where('receipt_status', 1)
            //         ->whereDate('created_at', $request_date);
            // })
            //     ->orWhere(function ($query) use ($request_date) {
            //         $query->whereHas('advanceSettlements', function ($subQuery) {
            //             $subQuery->whereColumn('af_id', 'id');
            //         })
            //             ->whereDate('created_at', $request_date);
            //     })
            //     ->get();




            $advance_amount_total_outstanding = $advanceFunds->sum('adv_amount');

            $advance_amount_total = AdvanceFundToEmployee::sum('adv_amount');

            $advance_settle_total_outstand = AdvanceSettlement::where('bill_status', 0)->where('receipt_status', 0)->sum('bill_amount');

            $bills_onhand_total_outstand = AdvanceSettlement::where('bill_status', 1)->where('receipt_status', 0)->sum('bill_amount');

            $cashinbank_without_cdareceipt = ($cashin_bank - $bills_to_cda);
            // $bill_reff_total = ($cashin_bank + $advance_amount_total + $cashin_hand + $bills_to_cda) - $advance_amount_total_outstanding;
            $bill_reff_total = $cashin_hand + $cashinbank_without_cdareceipt + $bills_on_hand + $bills_onhand_total_outstand + $advance_amount_total;


            $pdf = PDF::loadView('imprest.reports.cash-book-report-generate', compact('report_date', 'cashinbank_without_cdareceipt', 'advance_settle_total_outstand', 'bills_onhand_total_outstand', 'cashin_hand_predate', 'cashin_bank_predate', 'cashin_bank', 'cashin_hand', 'total', 'cash_withdraws', 'total_cashin_hand', 'cda_bills', 'grand_total_cashin_hand', 'total_paybills', 'bills_to_cda', 'bills_on_hand', 'advance_amount_total_outstanding', 'advance_amount_total', 'bill_reff_total'));
            return $pdf->download('cash-book-report-' . $report_date . '.pdf');
        } else if ($request->bill_type == 'out_standing') {

            // Step 1: Fetch AdvanceFundToEmployee data with condition
            $advanceFunds = AdvanceFundToEmployee::whereDate('adv_date', $request_date)->get();

            $totalOutStandAmount = 0;

            foreach ($advanceFunds as $advanceFund) {
                $paid_amount = AdvanceSettlement::where('af_id', $advanceFund->id)->where('bill_status', 1)->where('receipt_status', 1)->sum('bill_amount');
                if ($paid_amount) {
                    $advanceFund->outstand_amount = $advanceFund->adv_amount - $paid_amount;
                    $totalOutStandAmount += $advanceFund->outstand_amount;
                } else {
                    $advanceFund->outstand_amount = $advanceFund->adv_amount;
                    $totalOutStandAmount += $advanceFund->outstand_amount;
                }
            }

            $totalAmount = $advanceFunds->sum('adv_amount');

            // return $advanceFunds;

            $pdf = PDF::loadView('imprest.reports.out-standing-report-generate', compact('advanceFunds', 'totalAmount', 'totalOutStandAmount', 'report_date'));
            return $pdf->download('out-standing-report-' . $report_date . '.pdf');
        } else if ($request->bill_type == 'bill_hand') {

            $settleBills = AdvanceSettlement::whereDate('var_date', $request_date)->where('bill_status', 0)->where('receipt_status', 0)->get();

            // return $settleBills;

            $pdf = PDF::loadView('imprest.reports.bill-hand-report-generate', compact('report_date', 'settleBills'));
            return $pdf->download('bill-hand-report-' . $report_date . '.pdf');
        } else if ($request->bill_type == 'cda_bill') {

            $cdaReceipts = CdaBillAuditTeam::whereDate('cda_bill_date', $request_date)->get();

            foreach ($cdaReceipts as $cdaReceipt) {
                $settle_id = $cdaReceipt->settle_id;
                $settleBills = AdvanceSettlement::find($settle_id);
                $cdaReceipt->pc_no = $settleBills->advanceFund->pc_no;
                $cdaReceipt->project = $settleBills->advanceFund->project->name;
                $cdaReceipt->adv_no = $settleBills->advanceFund->adv_no;
                $cdaReceipt->adv_date = $settleBills->advanceFund->adv_date;
                $cdaReceipt->adv_amount = $settleBills->advanceFund->adv_amount;
                $cdaReceipt->settle_vr_no = $settleBills->var_no;
                $cdaReceipt->settle_vr_date = $settleBills->var_date;
                $cdaReceipt->settle_amount = $settleBills->bill_amount;
                $cdaReceipt->settle_firm = $settleBills->firm;
                $cdaReceipt->cda_bill_no = $cdaReceipt->cda_bill_no;
                $cdaReceipt->cda_bill_date = $cdaReceipt->cda_bill_date;
                $cdaReceipt->cda_bill_amount = $cdaReceipt->bill_amount;
            }

            //  $cdaReceipts = AdvanceSettlement::whereDate('var_date', $request_date)->where('bill_status', 1)->where('receipt_status', 0)->get();

            $totalAmount = $cdaReceipts->sum('bill_amount');

            // return $cdaReceipts;


            $pdf = PDF::loadView('imprest.reports.cda-bill-report-generate', compact('report_date', 'cdaReceipts', 'totalAmount'));
            return $pdf->download('cda_bill-report-' . $report_date . '.pdf');
        } else {
            return redirect()->back()->with('error', 'Invalid Bill Type');
        }
    }
}
