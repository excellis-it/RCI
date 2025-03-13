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
use App\Models\ImprestBalance;
use App\Models\Setting;


class ImprestReportController extends Controller
{

    //

    public function getDailyReport($date)
    {
        $record = $this->getLastImprestBalance($date);
        return [
            'cash_in_hand' => $record->cash_in_hand ?? 0,
            'opening_cash_in_hand' => $record->opening_cash_in_hand ?? 0,
            'cash_in_bank' => $record->cash_in_bank ?? 0,
            'opening_cash_in_bank' => $record->opening_cash_in_bank ?? 0,
            'adv_fund' => $record->adv_fund ?? 0,
            'adv_settle' => $record->adv_settle ?? 0,
            'cda_bill' => $record->cda_bill ?? 0,
            'cda_receipt' => $record->cda_receipt ?? 0,
            'adv_fund_outstand' => $record->adv_fund_outstand ?? 0,
            'adv_settle_outstand' => $record->adv_settle_outstand ?? 0,
            'cda_bill_outstand' => $record->cda_bill_outstand ?? 0,
            'date' => $record->date,
            'time' => $record->time,
        ];
    }


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
            //   'account_officer_sign' => 'required',
            'bill_type' => 'required',
        ]);

        // how to add this format like d/m/y

        $logo = Helper::logo() ?? '';


        $request_date = $request->report_date;
        $date = new DateTime($request_date);
        $request_pre_date = date('Y-m-d', strtotime('-1 day', strtotime($request->report_date)));
        $report_date = $date->format('d/m/y');

        $setting = Setting::first();

        if ($request->bill_type == 'cash_book') {

            //////// book 1

            $opening_blanace_cash_in_hand = ImprestBalance::whereDate('date', '<', $request_date)->latest('date')->latest('time')->orderBy('id', 'desc')->value('cash_in_hand');
            $opening_blanace_cash_in_bank = ImprestBalance::whereDate('date', '<', $request_date)->latest('date')->latest('time')->orderBy('id', 'desc')->value('cash_in_bank');

            $cash_withdraws = CashWithdrawal::whereDate('vr_date', $request_date)->get();
            $total_withdraw_balance = 0;
            foreach ($cash_withdraws as $cash_withdraw) {
                $total_withdraw_balance += $cash_withdraw->amount;
            }
            $totalCashInHandBalance =  $opening_blanace_cash_in_hand + $total_withdraw_balance;

            $cash_receipts = CDAReceipt::whereDate('rct_vr_date', $request_date)->get();
            $total_bank_balance = 0;
            foreach ($cash_receipts as $cash_receipt) {
                $total_bank_balance += $cash_receipt->rct_vr_amount;
            }
            $totalCashInBankBalance =  $opening_blanace_cash_in_bank + $total_bank_balance;

            $book1_data = [
                'opening_blanace_cash_in_hand' => $opening_blanace_cash_in_hand,
                'opening_blanace_cash_in_bank' => $opening_blanace_cash_in_bank,
                'cash_withdraws' => $cash_withdraws,
                'totalCashInHandBalance' => $totalCashInHandBalance,
                'totalCashInBankBalance' => $totalCashInBankBalance,
                'cash_receipts' => $cash_receipts,
            ];

            //////// book 2

            $settle_bill_ids = AdvanceSettlement::where('bill_status', 1)->where('receipt_status', 0)->pluck('id');


            $cda_bills = CdaBillAuditTeam::whereIn('settle_id', $settle_bill_ids)->whereDate('cda_bill_date', $request_date)->get();

            $total_bill_balance = 0;
            foreach ($cda_bills as $cda_bill) {
                $total_bill_balance += $cda_bill->bill_amount;
            }
            $totalPaymentsForTheDay =  $total_bill_balance + 0;

            $opening_blanace_cash_in_hand = ImprestBalance::whereDate('date', '<=', $request_date)->latest('date')->latest('time')->orderBy('id', 'desc')->value('cash_in_hand');
            $blanace_cash_in_bank = ImprestBalance::whereDate('date', '<=', $request_date)->latest('date')->latest('time')->orderBy('id', 'desc')->value('cash_in_bank');

            $cash_in_hand = ImprestBalance::whereDate('date', '<=', $date)->latest('date')->latest('time')->orderBy('id', 'desc')->value('cash_in_hand') ?? 0;

            $closing_balance_cash_in_hand = $cash_in_hand;
            $grand_total_cash_in_hand = $closing_balance_cash_in_hand + $totalPaymentsForTheDay;

            $closing_balance_cash_in_bank = $blanace_cash_in_bank;
            $grand_total_cash_in_bank = $closing_balance_cash_in_bank;

            $book2_data = [
                'cda_bills' => $cda_bills,
                'totalPaymentsForTheDay' => $totalPaymentsForTheDay,
                'closing_balance_cash_in_hand' => $closing_balance_cash_in_hand,
                'grand_total_cash_in_hand' => $grand_total_cash_in_hand,
                'closing_balance_cash_in_bank' => $closing_balance_cash_in_bank,
                'grand_total_cash_in_bank' => $grand_total_cash_in_bank,

            ];


            //////// book 3

            $imp_balances = ImprestBalance::where('date', '<=', $date)->latest('date')->latest('time')->orderBy('id', 'desc')->first();

            // dd($imp_balances);

            $cash_in_hand = 0;
            $cash_in_bank = 0;
            $bills_submitted_to_cda = 0;
            $bills_on_hand = 0;
            $advance_slips = 0;
            $all_totals = 0;

            $cash_in_hand = ImprestBalance::whereDate('date', '<=', $date)->latest('date')->latest('time')->orderBy('id', 'desc')->value('cash_in_hand') ?? 0;
            $cash_in_bank = ImprestBalance::whereDate('date', '<=', $date)->latest('date')->latest('time')->orderBy('id', 'desc')->value('cash_in_bank') ?? 0;

            if ($imp_balances) {

                $bills_submitted_to_cda = $imp_balances->cda_bill_outstand;
                $bills_on_hand = $imp_balances->adv_settle_outstand;
                $advance_slips = $imp_balances->adv_fund_outstand;
            }
            $all_totals = $cash_in_hand + $cash_in_bank + $bills_submitted_to_cda + $bills_on_hand + $advance_slips;

            $book3_data = [
                'cash_in_hand' => $cash_in_hand,
                'cash_in_bank' => $cash_in_bank,
                'bills_submitted_to_cda' => $bills_submitted_to_cda,
                'bills_on_hand' => $bills_on_hand,
                'advance_slips' => $advance_slips,
                'all_totals' => $all_totals,
            ];

            //  return view('imprest.reports.cash-book-report-generate', compact('report_date', 'logo', 'setting', 'cash_withdraws', 'book1_data', 'book2_data', 'book3_data'));


            $pdf = PDF::loadView('imprest.reports.cash-book-report-generate', compact('report_date', 'logo', 'setting', 'cash_withdraws', 'book1_data', 'book2_data', 'book3_data'));
            return $pdf->download('cash-book-report-' . $report_date . '.pdf');
        } else if ($request->bill_type == 'out_standing') {

            // Step 1: Fetch AdvanceFundToEmployee data with condition
            $advanceFunds = AdvanceFundToEmployee::whereDate('adv_date', '<=', $request_date)->get();

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

            $pdf = PDF::loadView('imprest.reports.out-standing-report-generate', compact('logo', 'advanceFunds', 'totalAmount', 'totalOutStandAmount', 'report_date'));
            return $pdf->download('out-standing-report-' . $report_date . '.pdf');
        } else if ($request->bill_type == 'bill_hand') {

            $settleBills = AdvanceSettlement::whereDate('var_date', '<=', $request_date)->where('bill_status', 0)->where('receipt_status', 0)->get();

            // return $settleBills;
            // return view('imprest.reports.bill-hand-report-generate', compact('logo', 'report_date', 'settleBills'));
            $pdf = PDF::loadView('imprest.reports.bill-hand-report-generate', compact('logo', 'report_date', 'settleBills'));
            return $pdf->download('bill-hand-report-' . $report_date . '.pdf');
        } else if ($request->bill_type == 'cda_bill') {

            $cdaReceipts = CdaBillAuditTeam::whereDate('cda_bill_date','<=', $request_date)->get();

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


            $pdf = PDF::loadView('imprest.reports.cda-bill-report-generate', compact('report_date', 'logo', 'cdaReceipts', 'totalAmount'));
            return $pdf->download('cda_bill-report-' . $report_date . '.pdf');
        } else {
            return redirect()->back()->with('error', 'Invalid Bill Type');
        }
    }
}
