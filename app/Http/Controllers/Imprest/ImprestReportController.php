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

        // Format the date as required
        $report_date = $date->format('d/m/y');

        if ($request->bill_type == 'cash_book') {

            $cashin_bank = Helper::getBankBalance();
            $cashin_hand = Helper::getCashBalance();

            $total = $cashin_bank + $cashin_hand;

            $cash_withdraws =  CashWithdrawal::get();

            $total_cashin_hand = $cashin_hand;

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

            // $bills_to_cda = CDAReceipt::sum('cdaBill.bill_amount');
            $bills_to_cda = CDAReceipt::with('cdaBill')
                ->get()
                ->sum(function ($receipt) {
                    return $receipt->cdaBill->bill_amount ?? 0; // Use 0 if no related bill is found
                });


            $bills_on_hand = AdvanceSettlement::where('bill_status', 1)->where('receipt_status', 0)->sum('bill_amount');


            $advanceFunds = AdvanceFundToEmployee::whereDoesntHave('advanceSettlements', function ($query) {
                $query->where('bill_status', 1)->Where('receipt_status', 1);
            })
                ->orWhereHas('advanceSettlements', function ($query) {
                    $query->whereColumn('af_id', 'id');
                })
                ->get();



            $advance_amount_total_outstanding = $advanceFunds->sum('adv_amount');

            $advance_amount_total = AdvanceFundToEmployee::sum('adv_amount');

            $bill_reff_total = ($cashin_bank + $advance_amount_total + $cashin_hand + $bills_to_cda) - $advance_amount_total_outstanding;


            $pdf = PDF::loadView('imprest.reports.cash-book-report-generate', compact('report_date', 'cashin_bank', 'cashin_hand', 'total', 'cash_withdraws', 'total_cashin_hand', 'cda_bills', 'grand_total_cashin_hand', 'total_paybills', 'bills_to_cda', 'bills_on_hand', 'advance_amount_total_outstanding', 'advance_amount_total', 'bill_reff_total'));
            return $pdf->download('cash-book-report-' . $report_date . '.pdf');
        } else if ($request->bill_type == 'out_standing') {

            // Step 1: Fetch AdvanceFundToEmployee data with condition
            $advanceFunds = AdvanceFundToEmployee::whereDoesntHave('advanceSettlements', function ($query) {
                $query->where('bill_status', 1)->Where('receipt_status', 1);
            })
                ->orWhereHas('advanceSettlements', function ($query) {
                    $query->whereColumn('af_id', 'id');
                })
                ->get();

            $totalAmount = $advanceFunds->sum('adv_amount');

            //   return $advanceFunds;

            $pdf = PDF::loadView('imprest.reports.out-standing-report-generate', compact('advanceFunds', 'totalAmount', 'report_date'));
            return $pdf->download('out-standing-report-' . $report_date . '.pdf');
        } else if ($request->bill_type == 'bill_hand') {

            $settleBills = AdvanceSettlement::where('bill_status', 1)->where('receipt_status', 0)->get();

            // return $settleBills;

            $pdf = PDF::loadView('imprest.reports.bill-hand-report-generate', compact('report_date', 'settleBills'));
            return $pdf->download('bill-hand-report-' . $report_date . '.pdf');
        } else if ($request->bill_type == 'cda_bill') {

            $cdaReceipts = CDAReceipt::get();

            foreach ($cdaReceipts as $cdaReceipt) {
                $settle_id = $cdaReceipt->cdaBill->settle_id;
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
                $cdaReceipt->cda_bill_no = $cdaReceipt->cdaBill->cda_bill_no;
                $cdaReceipt->cda_bill_date = $cdaReceipt->cdaBill->cda_bill_date;
                $cdaReceipt->cda_bill_amount = $cdaReceipt->cdaBill->bill_amount;
            }

            $totalAmount = $cdaReceipts->sum('rct_vr_amount');

            // return $cdaReceipts;


            $pdf = PDF::loadView('imprest.reports.cda-bill-report-generate', compact('report_date', 'cdaReceipts', 'totalAmount'));
            return $pdf->download('cda_bill-report-' . $report_date . '.pdf');
        } else {
            return redirect()->back()->with('error', 'Invalid Bill Type');
        }
    }
}
