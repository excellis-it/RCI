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
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style\Font;

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
            'doc_type' => 'required|in:pdf,docx',
            'print_date' => 'required',
        ]);

        // how to add this format like d/m/y

        $logo = Helper::logo() ?? '';
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;


        $request_date = $request->report_date;
        $print_date = ($request->print_date) ? Carbon::createFromFormat('d/m/Y H:i A', $request->print_date)->format('Y-m-d') : null;
        dd($print_date);
        $date = new DateTime($request_date);
        $request_pre_date = date('Y-m-d', strtotime('-1 day', strtotime($request->report_date)));
        $report_date = $date->format('d/m/y');

        $setting = Setting::first();
        $docType = $request->doc_type;

        if ($request->bill_type == 'cash_book') {

            //////// book 1

            $opening_blanace_cash_in_hand = Helper::getImprestCashInHandOpening($request_date);
            $opening_blanace_cash_in_bank = Helper::getImprestCashInBankOpening($request_date);

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

            //  $settle_bill_ids = AdvanceSettlement::where('bill_status', 1)->where('receipt_status', 0)->pluck('id');

            $cda_bill_receipts_check = CDAReceipt::whereDate('rct_vr_date', '<=', $request_date)->pluck('bill_id');


            $cda_bills = CdaBillAuditTeam::whereNotIn('settle_id', $cda_bill_receipts_check)->whereDate('cda_bill_date',  '=', $request_date)->get();

            //  return $cda_bills;

            $total_bill_balance = 0;
            foreach ($cda_bills as $cda_bill) {
                $total_bill_balance += $cda_bill->bill_amount;
            }
            $totalPaymentsForTheDay =  $total_bill_balance + 0;

            $blanace_cash_in_bank = Helper::getImprestCashInBank($request_date);

            $cash_in_hand = Helper::getImprestCashInHand($request_date);

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

            $cash_in_hand = 0;
            $cash_in_bank = 0;
            $bills_submitted_to_init = 0;
            $bills_submitted_to_cda = 0;
            $bills_on_hand_init = 0;
            $bills_on_hand = 0;
            $advance_slips_init = 0;
            $advance_slips = 0;
            $all_totals = 0;

            $amount_receipt = 0;

            $cash_in_hand = Helper::getImprestCashInHand($request_date);
            $cash_in_bank = Helper::getImprestCashInBank($request_date);

            $bills_submitted_to_cda_init_query = CdaBillAuditTeam::query();
            if ($request_date) {
                $bills_submitted_to_cda_init_query->whereDate('cda_bill_date', '<=', $request_date);
            }
            $bills_submitted_to_cda_init = $bills_submitted_to_cda_init_query->sum('bill_amount');

            $amount_receipt_query = CDAReceipt::query();
            if ($request_date) {
                $amount_receipt_query->whereDate('rct_vr_date', '<=', $request_date);
            }
            $amount_receipt = $amount_receipt_query->sum('rct_vr_amount');

            $bills_submitted_to_cda = $bills_submitted_to_cda_init - $amount_receipt;

            $bills_on_hand_init_query = AdvanceSettlement::query();
            if ($request_date) {
                $bills_on_hand_init_query->whereDate('var_date', '<=', $request_date);
            }
            $bills_on_hand_init = $bills_on_hand_init_query->sum('bill_amount');


            $bills_on_hand = $bills_on_hand_init - $bills_submitted_to_cda_init;

            $all_adv_settles_af = AdvanceSettlement::whereDate('var_date', '<=', $request_date)->pluck('af_id');

            $advance_slips_init_query = AdvanceFundToEmployee::query();
            if ($request_date) {
                $advance_slips_init_query->whereDate('adv_date', '<=', $request_date);
            }
            $advance_slips_init = $advance_slips_init_query->whereNotIn('id', $all_adv_settles_af)->sum('adv_amount');

            $advance_slips = $advance_slips_init;

            $all_totals = $cash_in_hand + $cash_in_bank + $bills_submitted_to_cda + $bills_on_hand + $advance_slips;

            $book3_data = [
                'cash_in_hand' => $cash_in_hand,
                'cash_in_bank' => $cash_in_bank,
                'bills_submitted_to_cda' => $bills_submitted_to_cda,
                'bills_on_hand' => $bills_on_hand,
                'advance_slips' => $advance_slips,
                'all_totals' => $all_totals,
            ];

            // Generate PDF first (for both formats)
            $pdf = PDF::loadView('imprest.reports.cash-book-report-generate', compact('print_date', 'report_date', 'logo', 'setting', 'cash_withdraws', 'book1_data', 'book2_data', 'book3_data'))->setPaper('a4', $paperType);

            if ($docType == 'pdf') {
                // If PDF requested, return PDF directly
                return $pdf->download('cash-book-report-' . $report_date . '.pdf');
            } else {
                // If DOCX requested, first save the PDF then convert to DOCX
                return $this->convertToDocx($pdf, 'cash-book-report');
            }
        } else if ($request->bill_type == 'out_standing') {
            $totalOutStandAmount = 0;

            $adv_settles_check = AdvanceSettlement::whereDate('var_date', '<=', $request_date)->pluck('af_id');

            $advanceFunds = AdvanceFundToEmployee::whereDate('adv_date', '<=', $request_date)->whereNotIn('id', $adv_settles_check)->get();

            foreach ($advanceFunds as $advanceFund) {

                $advanceFund->outstand_amount = $advanceFund->adv_amount;
                $totalOutStandAmount += $advanceFund->outstand_amount;
            }

            $totalAmount = $advanceFunds->sum('adv_amount');

            // Generate PDF first (for both formats)
            $pdf = PDF::loadView('imprest.reports.out-standing-report-generate', compact('print_date','logo', 'advanceFunds', 'totalAmount', 'totalOutStandAmount', 'report_date'))->setPaper('a4', $paperType);

            if ($docType == 'pdf') {
                return $pdf->download('out-standing-report-' . $report_date . '.pdf');
            } else {
                return $this->convertToDocx($pdf, 'out-standing-report');
            }
        } else if ($request->bill_type == 'bill_hand') {

            $cda_bills_check = CdaBillAuditTeam::whereDate('cda_bill_date', '<=', $request_date)->pluck('settle_id');

            $settleBills = AdvanceSettlement::whereDate('var_date', '<=', $request_date)->whereNotIn('id', $cda_bills_check)->get();

            // Generate PDF first (for both formats)
            $pdf = PDF::loadView('imprest.reports.bill-hand-report-generate', compact('print_date','logo', 'report_date', 'settleBills'))->setPaper('a4', $paperType);

            if ($docType == 'pdf') {
                return $pdf->download('bill-hand-report-' . $report_date . '.pdf');
            } else {
                return $this->convertToDocx($pdf, 'bill-hand-report');
            }
        } else if ($request->bill_type == 'cda_bill') {

            $settleBillsCheck = AdvanceSettlement::whereDate('var_date', '<=', $request_date)->where('receipt_status', 1)->pluck('id');

            $bill_receipts_check = CDAReceipt::whereDate('rct_vr_date', '<=', $request_date)->pluck('bill_id');

            $cdaReceipts = CdaBillAuditTeam::whereDate('cda_bill_date', '<=', $request_date)->whereNotIn('id', $bill_receipts_check)->get();

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

            $totalAmount = $cdaReceipts->sum('bill_amount');

            // Generate PDF first (for both formats)
            $pdf = PDF::loadView('imprest.reports.cda-bill-report-generate', compact('report_date','print_date', 'logo', 'cdaReceipts', 'totalAmount'))->setPaper('a4', $paperType);

            if ($docType == 'pdf') {
                return $pdf->download('cda_bill-report-' . $report_date . '.pdf');
            } else {
                return $this->convertToDocx($pdf, 'cda_bill-report');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Bill Type');
        }
    }

    /**
     * Convert generated PDF to DOCX format with full content
     *
     * @param \Barryvdh\DomPDF\PDF $pdf The generated PDF object
     * @param string $filename The name for the output file (without extension)
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    protected function convertToDocx($pdf, $filename)
    {
        try {
            // Save the PDF temporarily
            $pdfPath = storage_path('app/temp/' . $filename . '.pdf');

            // Ensure the temp directory exists
            if (!file_exists(dirname($pdfPath))) {
                mkdir(dirname($pdfPath), 0755, true);
            }

            // Save the PDF
            $pdf->save($pdfPath);

            // Create a PhpWord instance
            $phpWord = new PhpWord();

            // Define document properties
            $properties = $phpWord->getDocInfo();
            $properties->setCreator('RCI System');
            $properties->setCompany('CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS)');
            $properties->setTitle($filename);
            $properties->setDescription('Report generated from RCI System');

            // Define some styles
            $phpWord->addTitleStyle(1, ['bold' => true, 'size' => 16], ['alignment' => 'center']);
            $phpWord->addTitleStyle(2, ['bold' => true, 'size' => 14], ['alignment' => 'center']);

            // Font styles
            $fontStyleHeader = ['bold' => true, 'size' => 12];
            $fontStyleContent = ['size' => 11];
            $fontStyleFooter = ['italic' => true, 'size' => 10];

            // Table styles
            $tableStyle = ['borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80];
            $firstRowStyle = ['bgColor' => 'DDDDDD'];
            $phpWord->addTableStyle('reportTable', $tableStyle, $firstRowStyle);

            // Add a section
            $section = $phpWord->addSection([
                'orientation' => 'portrait',
                'marginTop' => 600,
                'marginRight' => 600,
                'marginBottom' => 600,
                'marginLeft' => 600,
            ]);

            // Extract report type from the filename
            $reportType = '';
            if (strpos($filename, 'cash-book') !== false) {
                $reportType = 'Cash Book Report';
            } elseif (strpos($filename, 'out-standing') !== false) {
                $reportType = 'Outstanding Report';
            } elseif (strpos($filename, 'bill-hand') !== false) {
                $reportType = 'Bills in Hand Report';
            } elseif (strpos($filename, 'cda-bill') !== false) {
                $reportType = 'CDA Bills Report';
            }

            // Add a header with logo
            $header = $section->addHeader();
            $header->addText(
                'CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS)',
                ['bold' => true, 'size' => 12],
                ['alignment' => 'center']
            );
            $header->addText(
                'RCI CAMPUS, HYDERABAD - 500 069',
                ['size' => 11],
                ['alignment' => 'center']
            );

            // Add report title
            $section->addTitle($reportType, 1);

            // Add report date
            if (preg_match('/-(\d{2}\/\d{2}\/\d{2})$/', $filename, $matches)) {
                $section->addText(
                    'As on ' . $matches[1],
                    ['size' => 11],
                    ['alignment' => 'center']
                );
            }

            // Add a line break
            $section->addTextBreak(1);

            // Now create tables based on report type
            if (strpos($filename, 'cash-book') !== false) {
                $this->addCashBookContent($section, $filename);
            } elseif (strpos($filename, 'out-standing') !== false) {
                $this->addOutstandingContent($section, $filename);
            } elseif (strpos($filename, 'bill-hand') !== false) {
                $this->addBillsInHandContent($section, $filename);
            } elseif (strpos($filename, 'cda-bill') !== false) {
                $this->addCdaBillsContent($section, $filename);
            }

            // Add a footer
            $footer = $section->addFooter();
            $footer->addText(
                'Generated from RCI System on ' . date('Y-m-d H:i:s'),
                ['size' => 8],
                ['alignment' => 'center']
            );

            // Save the DOCX file
            $docxPath = storage_path('app/temp/' . $filename . '.docx');
            $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save($docxPath);

            // Return the DOCX file for download and delete it afterward
            return response()->download($docxPath, $filename . '.docx')->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            // Log any exceptions
            \Log::error("DOCX generation error: " . $e->getMessage());

            // Return the PDF as a fallback
            return $pdf->download($filename . '.pdf');
        }
    }

    /**
     * Add Cash Book Report content to the DOCX
     *
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $filename
     * @return void
     */
    protected function addCashBookContent($section, $filename)
    {
        // Add Book 1 - Receipts
        $section->addTitle('RECEIPTS', 2);
        $table = $section->addTable('reportTable');

        // Add header row
        $table->addRow();
        $table->addCell(1000)->addText('Date', ['bold' => true]);
        $table->addCell(800)->addText('SL No', ['bold' => true]);
        $table->addCell(2000)->addText('From Whom', ['bold' => true]);
        $table->addCell(2000)->addText('On What A/c', ['bold' => true]);
        $table->addCell(1000)->addText('Cheque No', ['bold' => true]);
        $table->addCell(1000)->addText('Voucher No', ['bold' => true]);
        $table->addCell(1200)->addText('Cash (Rs)', ['bold' => true]);
        $table->addCell(1200)->addText('Bank (Rs)', ['bold' => true]);

        // Add opening balance row
        $table->addRow();
        $table->addCell(1000)->addText('');
        $table->addCell(800)->addText('');
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('Opening Balance');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addCell(1200)->addText('Opening Cash');
        $table->addCell(1200)->addText('Opening Bank');

        // Add a separator
        $section->addTextBreak(1);

        // Add Book 2 - Payments
        $section->addTitle('PAYMENTS', 2);
        $table = $section->addTable('reportTable');

        // Add header row
        $table->addRow();
        $table->addCell(1000)->addText('Date', ['bold' => true]);
        $table->addCell(800)->addText('SL No', ['bold' => true]);
        $table->addCell(2000)->addText('To Whom', ['bold' => true]);
        $table->addCell(2000)->addText('On What A/c', ['bold' => true]);
        $table->addCell(1000)->addText('Cheque No', ['bold' => true]);
        $table->addCell(1000)->addText('Voucher No', ['bold' => true]);
        $table->addCell(1200)->addText('Cash (Rs)', ['bold' => true]);
        $table->addCell(1200)->addText('Bank (Rs)', ['bold' => true]);

        // Add a separator
        $section->addTextBreak(1);

        // Add Book 3 - Summary
        $section->addTitle('SUMMARY', 2);
        $table = $section->addTable('reportTable');

        // Add header row
        $table->addRow();
        $table->addCell(1000)->addText('SL No', ['bold' => true]);
        $table->addCell(4000)->addText('Particulars', ['bold' => true]);
        $table->addCell(1500)->addText('Amount (Rs)', ['bold' => true]);

        // Add rows
        $table->addRow();
        $table->addCell(1000)->addText('1');
        $table->addCell(4000)->addText('CASH IN HAND');
        $table->addCell(1500)->addText('');

        $table->addRow();
        $table->addCell(1000)->addText('2');
        $table->addCell(4000)->addText('CASH IN BANK');
        $table->addCell(1500)->addText('');

        $table->addRow();
        $table->addCell(1000)->addText('3');
        $table->addCell(4000)->addText('BILLS SUBMITTED TO CDA');
        $table->addCell(1500)->addText('');

        $table->addRow();
        $table->addCell(1000)->addText('4');
        $table->addCell(4000)->addText('BILLS ON HAND');
        $table->addCell(1500)->addText('');

        $table->addRow();
        $table->addCell(1000)->addText('5');
        $table->addCell(4000)->addText('ADVANCE SLIPS');
        $table->addCell(1500)->addText('');

        $table->addRow();
        $table->addCell(1000)->addText('');
        $table->addCell(4000)->addText('TOTAL', ['bold' => true]);
        $table->addCell(1500)->addText('', ['bold' => true]);
    }

    /**
     * Add Outstanding Report content to the DOCX
     *
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $filename
     * @return void
     */
    protected function addOutstandingContent($section, $filename)
    {
        $table = $section->addTable('reportTable');

        // Add header row
        $table->addRow();
        $table->addCell(800)->addText('Sr No', ['bold' => true]);
        $table->addCell(1200)->addText('PC No', ['bold' => true]);
        $table->addCell(2000)->addText('Project', ['bold' => true]);
        $table->addCell(1200)->addText('ADV No', ['bold' => true]);
        $table->addCell(1200)->addText('ADV Date', ['bold' => true]);
        $table->addCell(1200)->addText('ADV Amt', ['bold' => true]);
        $table->addCell(1200)->addText('Outstand Amt', ['bold' => true]);

        // Add total row
        $table->addRow();
        $table->addCell(800)->addText('');
        $table->addCell(1200)->addText('');
        $table->addCell(2000)->addText('');
        $table->addCell(1200)->addText('');
        $table->addCell(1200)->addText('TOTAL', ['bold' => true]);
        $table->addCell(1200)->addText('', ['bold' => true]);
        $table->addCell(1200)->addText('', ['bold' => true]);
    }

    /**
     * Add Bills in Hand Report content to the DOCX
     *
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $filename
     * @return void
     */
    protected function addBillsInHandContent($section, $filename)
    {
        $table = $section->addTable('reportTable');

        // Add header row
        $table->addRow();
        $table->addCell(800)->addText('Sr No', ['bold' => true]);
        $table->addCell(1200)->addText('PC No', ['bold' => true]);
        $table->addCell(1200)->addText('ADV No', ['bold' => true]);
        $table->addCell(1200)->addText('ADV Date', ['bold' => true]);
        $table->addCell(1200)->addText('ADV Amount', ['bold' => true]);
        $table->addCell(1200)->addText('Sett. Vr No', ['bold' => true]);
        $table->addCell(1200)->addText('Sett. Date', ['bold' => true]);
        $table->addCell(1200)->addText('Sett. Amt', ['bold' => true]);
    }

    /**
     * Add CDA Bills Report content to the DOCX
     *
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $filename
     * @return void
     */
    protected function addCdaBillsContent($section, $filename)
    {
        $table = $section->addTable('reportTable');

        // Add header row
        $table->addRow();
        $table->addCell(600)->addText('Sr No', ['bold' => true]);
        $table->addCell(800)->addText('PC No', ['bold' => true]);
        $table->addCell(1200)->addText('Project', ['bold' => true]);
        $table->addCell(800)->addText('ADV No', ['bold' => true]);
        $table->addCell(800)->addText('ADV Date', ['bold' => true]);
        $table->addCell(800)->addText('ADV Amt', ['bold' => true]);
        $table->addCell(800)->addText('Sett. Vr No', ['bold' => true]);
        $table->addCell(800)->addText('Sett. Date', ['bold' => true]);
        $table->addCell(800)->addText('Sett. Amt', ['bold' => true]);
        $table->addCell(800)->addText('CRV No', ['bold' => true]);
        $table->addCell(1000)->addText('Firm Name', ['bold' => true]);
        $table->addCell(800)->addText('CDA Bill No', ['bold' => true]);
        $table->addCell(800)->addText('CDA Bill Date', ['bold' => true]);
        $table->addCell(800)->addText('CDA Bill Amt', ['bold' => true]);

        // Add total row
        $table->addRow();
        $table->addCell(600)->addText('');
        $table->addCell(800)->addText('');
        $table->addCell(1200)->addText('');
        $table->addCell(800)->addText('');
        $table->addCell(800)->addText('');
        $table->addCell(800)->addText('');
        $table->addCell(800)->addText('');
        $table->addCell(800)->addText('');
        $table->addCell(800)->addText('');
        $table->addCell(800)->addText('');
        $table->addCell(1000)->addText('');
        $table->addCell(800)->addText('');
        $table->addCell(800)->addText('Total', ['bold' => true]);
        $table->addCell(800)->addText('', ['bold' => true]);
    }
}
