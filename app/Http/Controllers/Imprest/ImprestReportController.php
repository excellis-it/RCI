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
        ]);

        // how to add this format like d/m/y

        $logo = Helper::logo() ?? '';
        $setting = Setting::first();
        $paperType = $request->paper_type ?? $setting->pdf_page_type;


        $request_date = $request->report_date;
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
            $pdf = PDF::loadView('imprest.reports.cash-book-report-generate', compact('report_date', 'logo', 'setting', 'cash_withdraws', 'book1_data', 'book2_data', 'book3_data'))->setPaper('a4', $paperType);

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
            $pdf = PDF::loadView('imprest.reports.out-standing-report-generate', compact('logo', 'advanceFunds', 'totalAmount', 'totalOutStandAmount', 'report_date'))->setPaper('a4', $paperType);

            if ($docType == 'pdf') {
                return $pdf->download('out-standing-report-' . $report_date . '.pdf');
            } else {
                return $this->convertToDocx($pdf, 'out-standing-report');
            }
        } else if ($request->bill_type == 'bill_hand') {

            $cda_bills_check = CdaBillAuditTeam::whereDate('cda_bill_date', '<=', $request_date)->pluck('settle_id');

            $settleBills = AdvanceSettlement::whereDate('var_date', '<=', $request_date)->whereNotIn('id', $cda_bills_check)->get();

            // Generate PDF first (for both formats)
            $pdf = PDF::loadView('imprest.reports.bill-hand-report-generate', compact('logo', 'report_date', 'settleBills'))->setPaper('a4', $paperType);

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
            $pdf = PDF::loadView('imprest.reports.cda-bill-report-generate', compact('report_date', 'logo', 'cdaReceipts', 'totalAmount'))->setPaper('a4', $paperType);

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

            // Extract the report date from the filename (format: report-name-dd/mm/yy)
            $reportDateStr = null;
            $dbReportDate = null;

            if (preg_match('/-(\d{2}\/\d{2}\/\d{2})$/', $filename, $matches)) {
                $reportDateStr = $matches[1]; // e.g. "31/03/23"

                // Convert d/m/y format to Y-m-d for database queries
                $dateParts = explode('/', $reportDateStr);
                if (count($dateParts) === 3) {
                    // Assuming the format is dd/mm/yy
                    $day = $dateParts[0];
                    $month = $dateParts[1];
                    $year = '20' . $dateParts[2]; // Assuming 20xx for year

                    $dbReportDate = "{$year}-{$month}-{$day}"; // Now in Y-m-d format

                    // Log for debugging
                    \Log::info("Converted date: {$reportDateStr} to {$dbReportDate}");
                }
            }

            if (!$dbReportDate) {
                // If we couldn't extract the date, use today as a fallback
                $dbReportDate = date('Y-m-d');
                \Log::warning("Could not extract date from filename: {$filename}, using today's date instead");
            }

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

            // set logo
            // $logo = Helper::logo() ?? '';
            // $header->addImage($logo, [
            //     'width' => 100,
            //     'height' => 100,
            //     'align' => 'center',
            //     'marginTop' => -10,
            //     'marginLeft' => -10,
            // ]);

            $header->addText(
                'CENTER FOR HIGHENERGY SYSTEMS & SCIENCES (CHESS)',
                ['bold' => true, 'size' => 12],
                ['alignment' => 'center']
            );
            $header->addText(
                'RCI CAMPUS, HYDERABAD - 500 069',
                ['size' => 11],
                ['alignment' => 'center'],
            );
            $header->addText(
                ' ',
                ['size' => 11],
                ['alignment' => 'center'],
                // set bottom margin
                ['marginBottom' => 200],
                // set bottom padding
                ['paddingBottom' => 200]
            );

            // Add report title
            $section->addTitle($reportType, 1);

            // Add report date
            if ($reportDateStr) {
                $section->addText(
                    'As on ' . $reportDateStr,
                    ['size' => 11],
                    ['alignment' => 'center']
                );
            }

            // Add a line break
            $section->addTextBreak(1);

            // Extract data based on report type
            if (strpos($filename, 'cash-book') !== false) {
                // Debugging info
                \Log::info("Generating Cash Book content for date: {$dbReportDate}");
                $this->addCashBookContent($section, $dbReportDate);
            } elseif (strpos($filename, 'out-standing') !== false) {
                \Log::info("Generating Outstanding content for date: {$dbReportDate}");
                $this->addOutstandingContent($section, $dbReportDate);
            } elseif (strpos($filename, 'bill-hand') !== false) {
                \Log::info("Generating Bills in Hand content for date: {$dbReportDate}");
                $this->addBillsInHandContent($section, $dbReportDate);
            } elseif (strpos($filename, 'cda-bill') !== false) {
                \Log::info("Generating CDA Bills content for date: {$dbReportDate}");
                $this->addCdaBillsContent($section, $dbReportDate);
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

            // Log success
            \Log::info("DOCX file generated successfully at: {$docxPath}");

            // Return the DOCX file for download and delete it afterward
            return response()->download($docxPath, $filename . '.docx')->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            // Log any exceptions with detailed information
            \Log::error("DOCX generation error: " . $e->getMessage());
            \Log::error("Exception trace: " . $e->getTraceAsString());

            // Return the PDF as a fallback
            return $pdf->download($filename . '.pdf');
        }
    }

    /**
     * Add Cash Book Report content to the DOCX
     *
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $reportDate
     * @return void
     */
    protected function addCashBookContent($section, $reportDate)
    {
        // Get the same data as used in the PDF
        $opening_balance_cash_in_hand = Helper::getImprestCashInHandOpening($reportDate);
        $opening_balance_cash_in_bank = Helper::getImprestCashInBankOpening($reportDate);

        $cash_withdraws = CashWithdrawal::whereDate('vr_date', $reportDate)->get();
        $total_withdraw_balance = 0;
        foreach ($cash_withdraws as $cash_withdraw) {
            $total_withdraw_balance += $cash_withdraw->amount;
        }
        $totalCashInHandBalance = $opening_balance_cash_in_hand + $total_withdraw_balance;

        $cash_receipts = CDAReceipt::whereDate('rct_vr_date', $reportDate)->get();
        $total_bank_balance = 0;
        foreach ($cash_receipts as $cash_receipt) {
            $total_bank_balance += $cash_receipt->rct_vr_amount;
        }
        $totalCashInBankBalance = $opening_balance_cash_in_bank + $total_bank_balance;

        // Book 2 data
        $cda_bill_receipts_check = CDAReceipt::whereDate('rct_vr_date', '<=', $reportDate)->pluck('bill_id');
        $cda_bills = CdaBillAuditTeam::whereNotIn('settle_id', $cda_bill_receipts_check)->whereDate('cda_bill_date', '=', $reportDate)->get();

        $total_bill_balance = 0;
        foreach ($cda_bills as $cda_bill) {
            $total_bill_balance += $cda_bill->bill_amount;
        }
        $totalPaymentsForTheDay = $total_bill_balance;

        $cash_in_hand = Helper::getImprestCashInHand($reportDate);
        $cash_in_bank = Helper::getImprestCashInBank($reportDate);

        $closing_balance_cash_in_hand = $cash_in_hand;
        $closing_balance_cash_in_bank = $cash_in_bank;

        // Book 3 data
        $bills_submitted_to_cda_init = CdaBillAuditTeam::whereDate('cda_bill_date', '<=', $reportDate)->sum('bill_amount');
        $amount_receipt = CDAReceipt::whereDate('rct_vr_date', '<=', $reportDate)->sum('rct_vr_amount');
        $bills_submitted_to_cda = $bills_submitted_to_cda_init - $amount_receipt;

        $bills_on_hand_init = AdvanceSettlement::whereDate('var_date', '<=', $reportDate)->sum('bill_amount');
        $bills_on_hand = $bills_on_hand_init - $bills_submitted_to_cda_init;

        $all_adv_settles_af = AdvanceSettlement::whereDate('var_date', '<=', $reportDate)->pluck('af_id');
        $advance_slips = AdvanceFundToEmployee::whereDate('adv_date', '<=', $reportDate)->whereNotIn('id', $all_adv_settles_af)->sum('adv_amount');

        $all_totals = $cash_in_hand + $cash_in_bank + $bills_submitted_to_cda + $bills_on_hand + $advance_slips;

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
        $table->addCell(1000)->addText($reportDate);
        $table->addCell(800)->addText('');
        $table->addCell(2000)->addText('');
        $table->addCell(2000)->addText('Opening Balance');
        $table->addCell(1000)->addText('');
        $table->addCell(1000)->addText('');
        $table->addCell(1200)->addText(number_format($opening_balance_cash_in_hand, 2));
        $table->addCell(1200)->addText(number_format($opening_balance_cash_in_bank, 2));

        // Add cash withdrawals
        foreach ($cash_withdraws as $index => $cash_withdraw) {
            $table->addRow();
            $table->addCell(1000)->addText($cash_withdraw->vr_date);
            $table->addCell(800)->addText(($index + 1));
            $table->addCell(2000)->addText('CASH WITHDRAWAL', ['bold' => true]);
            $table->addCell(2000)->addText('');
            $table->addCell(1000)->addText($cash_withdraw->chq_no);
            $table->addCell(1000)->addText($cash_withdraw->vr_no ?? '');
            $table->addCell(1200)->addText(number_format($cash_withdraw->amount, 2));
            $table->addCell(1200)->addText('');
        }

        // Add cash receipts
        foreach ($cash_receipts as $index => $cash_receipt) {
            $table->addRow();
            $table->addCell(1000)->addText($cash_receipt->rct_vr_date ?? '');
            $table->addCell(800)->addText(($index + 1));
            $table->addCell(2000)->addText('By DV No. ' . ($cash_receipt->dv_no ?? ''));
            $table->addCell(2000)->addText('Repayment Of Bill No. ' . ($cash_receipt->cdaBill->cda_bill_no ?? ''));
            $table->addCell(1000)->addText('');
            $table->addCell(1000)->addText('');
            $table->addCell(1200)->addText('');
            $table->addCell(1200)->addText(number_format($cash_receipt->rct_vr_amount, 2));
        }

        // Add total row
        $table->addRow();
        $cellColSpan = $table->addCell(7800, ['gridSpan' => 6]);
        $cellColSpan->addText('Total Amount', ['bold' => true], ['alignment' => 'right']);
        $table->addCell(1200)->addText(number_format($totalCashInHandBalance, 2), ['bold' => true]);
        $table->addCell(1200)->addText(number_format($totalCashInBankBalance, 2), ['bold' => true]);

        // Add a separator
        $section->addTextBreak(1);
        $section->addPageBreak();

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

        // Add CDA bills
        foreach ($cda_bills as $index => $cda_bill) {
            $table->addRow();
            $table->addCell(1000)->addText($cda_bill->cda_bill_date ?? '');
            $table->addCell(800)->addText(($index + 1));
            $table->addCell(2000)->addText($cda_bill->advanceSettlement->firm ?? '');
            $table->addCell(2000)->addText($cda_bill->variableType->name ?? '');
            $table->addCell(1000)->addText($cda_bill->chq_no ?? '');
            $table->addCell(1000)->addText($cda_bill->variableType->var_no ?? '');
            $table->addCell(1200)->addText(number_format($cda_bill->bill_amount, 2));
            $table->addCell(1200)->addText('');
        }

        // Add total payments row
        $table->addRow();
        $cellColSpan = $table->addCell(7800, ['gridSpan' => 6]);
        $cellColSpan->addText('Total Payments', ['bold' => true], ['alignment' => 'right']);
        $table->addCell(1200)->addText(number_format($totalPaymentsForTheDay, 2), ['bold' => true]);
        $table->addCell(1200)->addText('0', ['bold' => true]);

        // Add closing balance row
        $table->addRow();
        $cellColSpan = $table->addCell(7800, ['gridSpan' => 6]);
        $cellColSpan->addText('Closing Balance', ['bold' => true], ['alignment' => 'right']);
        $table->addCell(1200)->addText(number_format($closing_balance_cash_in_hand, 2), ['bold' => true]);
        $table->addCell(1200)->addText(number_format($closing_balance_cash_in_bank, 2), ['bold' => true]);

        // Add grand total row
        $table->addRow();
        $cellColSpan = $table->addCell(7800, ['gridSpan' => 6]);
        $cellColSpan->addText('Grand Total', ['bold' => true], ['alignment' => 'right']);
        $table->addCell(1200)->addText(number_format($closing_balance_cash_in_hand, 2), ['bold' => true]);
        $table->addCell(1200)->addText(number_format($closing_balance_cash_in_bank, 2), ['bold' => true]);

        // Add a separator
        $section->addTextBreak(1);
        $section->addPageBreak();

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
        $table->addCell(4000)->addText('CASH IN HAND', ['bold' => true]);
        $table->addCell(1500)->addText(number_format($cash_in_hand, 2), ['bold' => true]);

        $table->addRow();
        $table->addCell(1000)->addText('2');
        $table->addCell(4000)->addText('CASH IN BANK', ['bold' => true]);
        $table->addCell(1500)->addText(number_format($cash_in_bank, 2), ['bold' => true]);

        $table->addRow();
        $table->addCell(1000)->addText('3');
        $table->addCell(4000)->addText('BILLS SUBMITTED TO CDA', ['bold' => true]);
        $table->addCell(1500)->addText(number_format($bills_submitted_to_cda, 2), ['bold' => true]);

        $table->addRow();
        $table->addCell(1000)->addText('4');
        $table->addCell(4000)->addText('BILLS ON HAND', ['bold' => true]);
        $table->addCell(1500)->addText(number_format($bills_on_hand, 2), ['bold' => true]);

        $table->addRow();
        $table->addCell(1000)->addText('5');
        $table->addCell(4000)->addText('ADVANCE SLIPS', ['bold' => true]);
        $table->addCell(1500)->addText(number_format($advance_slips, 2), ['bold' => true]);

        // Add total row
        $table->addRow();
        $table->addCell(1000)->addText('');
        $table->addCell(4000)->addText('TOTAL', ['bold' => true], ['alignment' => 'right']);
        $table->addCell(1500)->addText(number_format($all_totals, 2), ['bold' => true]);
    }

    /**
     * Add Outstanding Report content to the DOCX
     *
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $reportDate
     * @return void
     */
    protected function addOutstandingContent($section, $reportDate)
    {
        try {
            // Debug information
            \Log::info("Getting outstanding data for date: {$reportDate}");

            // Get the same data as used in the PDF
            $adv_settles_check = AdvanceSettlement::whereDate('var_date', '<=', $reportDate)->pluck('af_id');

            // Log retrieved data
            \Log::info("Found " . count($adv_settles_check) . " advanced settlements");

            $advanceFunds = AdvanceFundToEmployee::whereDate('adv_date', '<=', $reportDate)
                ->whereNotIn('id', $adv_settles_check)
                ->get();

            // Log retrieved data
            \Log::info("Found " . $advanceFunds->count() . " advance funds");

            $totalOutStandAmount = 0;
            foreach ($advanceFunds as $advanceFund) {
                $totalOutStandAmount += $advanceFund->adv_amount;
            }

            $totalAmount = $advanceFunds->sum('adv_amount');

            // Log for debugging
            \Log::info("Total amount: {$totalAmount}, Outstanding amount: {$totalOutStandAmount}");

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

            // Add data rows
            foreach ($advanceFunds as $index => $advanceFund) {
                $adv_date = $advanceFund->adv_date ? Carbon::parse($advanceFund->adv_date)->format('d/m/Y') : 'N/A';

                $table->addRow();
                $table->addCell(800)->addText($index + 1);
                $table->addCell(1200)->addText($advanceFund->pc_no ?? 'N/A');
                $table->addCell(2000)->addText($advanceFund->project ? $advanceFund->project->name : 'N/A');
                $table->addCell(1200)->addText($advanceFund->adv_no ?? 'N/A');
                $table->addCell(1200)->addText($adv_date);
                $table->addCell(1200)->addText(number_format($advanceFund->adv_amount, 2));
                $table->addCell(1200)->addText(number_format($advanceFund->adv_amount, 2));
            }

            // Add total row
            $table->addRow();
            $table->addCell(800)->addText('');
            $table->addCell(1200)->addText('');
            $table->addCell(2000)->addText('');
            $table->addCell(1200)->addText('');
            $table->addCell(1200)->addText('TOTAL', ['bold' => true]);
            $table->addCell(1200)->addText(number_format($totalAmount, 2), ['bold' => true]);
            $table->addCell(1200)->addText(number_format($totalOutStandAmount, 2), ['bold' => true]);
        } catch (\Exception $e) {
            \Log::error("Error in addOutstandingContent: " . $e->getMessage());
            \Log::error("Stack trace: " . $e->getTraceAsString());

            // Add error message to the document itself
            $section->addText("Error generating content: " . $e->getMessage(), ['color' => 'FF0000']);
        }
    }

    /**
     * Add Bills in Hand Report content to the DOCX
     *
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $reportDate
     * @return void
     */
    protected function addBillsInHandContent($section, $reportDate)
    {
        try {
            // Debug information
            \Log::info("Getting bills in hand data for date: {$reportDate}");

            // Get the same data as used in the PDF
            $cda_bills_check = CdaBillAuditTeam::whereDate('cda_bill_date', '<=', $reportDate)
                ->pluck('settle_id');

            \Log::info("Found " . count($cda_bills_check) . " CDA bills");

            $settleBills = AdvanceSettlement::whereDate('var_date', '<=', $reportDate)
                ->whereNotIn('id', $cda_bills_check)
                ->get();

            \Log::info("Found " . $settleBills->count() . " settlement bills");

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

            // Add data rows
            foreach ($settleBills as $index => $settleBill) {
                $adv_date = $settleBill->adv_date ? Carbon::parse($settleBill->adv_date)->format('d/m/Y') : 'N/A';
                $var_date = $settleBill->var_date ? Carbon::parse($settleBill->var_date)->format('d/m/Y') : 'N/A';

                $table->addRow();
                $table->addCell(800)->addText($index + 1);
                $table->addCell(1200)->addText($settleBill->advanceFund ? $settleBill->advanceFund->pc_no : 'N/A');
                $table->addCell(1200)->addText($settleBill->adv_no ?? 'N/A');
                $table->addCell(1200)->addText($adv_date);
                $table->addCell(1200)->addText(number_format($settleBill->adv_amount ?? 0, 2));
                $table->addCell(1200)->addText($settleBill->var_no ?? 'N/A');
                $table->addCell(1200)->addText($var_date);
                $table->addCell(1200)->addText(number_format($settleBill->bill_amount ?? 0, 2));
            }
        } catch (\Exception $e) {
            \Log::error("Error in addBillsInHandContent: " . $e->getMessage());
            \Log::error("Stack trace: " . $e->getTraceAsString());

            // Add error message to the document itself
            $section->addText("Error generating content: " . $e->getMessage(), ['color' => 'FF0000']);
        }
    }

    /**
     * Add CDA Bills Report content to the DOCX
     *
     * @param \PhpOffice\PhpWord\Element\Section $section
     * @param string $reportDate
     * @return void
     */
    protected function addCdaBillsContent($section, $reportDate)
    {

        try {
            // Debug information
            \Log::info("Getting CDA bills data for date: {$reportDate}");

            // Get the same data as used in the PDF
            $settleBillsCheck = AdvanceSettlement::whereDate('var_date', '<=', $reportDate)
                ->where('receipt_status', 1)
                ->pluck('id');

            \Log::info("Found " . count($settleBillsCheck) . " settlement bills with receipt status 1");

            $bill_receipts_check = CDAReceipt::whereDate('rct_vr_date', '<=', $reportDate)
                ->pluck('bill_id');

            \Log::info("Found " . count($bill_receipts_check) . " CDA receipts");

            $cdaReceipts = CdaBillAuditTeam::whereDate('cda_bill_date', '<=', $reportDate)
                ->whereNotIn('id', $bill_receipts_check)
                ->get();

            \Log::info("Found " . $cdaReceipts->count() . " CDA bill audit team records");

            // Process the data to add additional fields
            foreach ($cdaReceipts as $cdaReceipt) {
                $settle_id = $cdaReceipt->settle_id;
                $settleBill = AdvanceSettlement::find($settle_id);

                if ($settleBill && $settleBill->advanceFund) {
                    $cdaReceipt->pc_no = $settleBill->advanceFund->pc_no ?? 'N/A';
                    $cdaReceipt->project_name = $settleBill->advanceFund->project ? $settleBill->advanceFund->project->name : 'N/A';
                    $cdaReceipt->adv_no = $settleBill->advanceFund->adv_no ?? 'N/A';
                    $cdaReceipt->adv_date = $settleBill->advanceFund->adv_date ?? null;
                    $cdaReceipt->adv_amount = $settleBill->advanceFund->adv_amount ?? 0;
                    $cdaReceipt->settle_vr_no = $settleBill->var_no ?? 'N/A';
                    $cdaReceipt->settle_vr_date = $settleBill->var_date ?? null;
                    $cdaReceipt->settle_amount = $settleBill->bill_amount ?? 0;
                    $cdaReceipt->settle_firm = $settleBill->firm ?? 'N/A';
                }
            }


            $totalAmount = $cdaReceipts->sum('bill_amount');

            \Log::info("Total amount for CDA bills: {$totalAmount}");

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

            // Add data rows
            foreach ($cdaReceipts as $index => $cdaReceipt) {
                $adv_date = $cdaReceipt->adv_date ? Carbon::parse($cdaReceipt->adv_date)->format('d/m/Y') : 'N/A';
                $settle_date = $cdaReceipt->settle_vr_date ? Carbon::parse($cdaReceipt->settle_vr_date)->format('d/m/Y') : 'N/A';
                $cda_bill_date = $cdaReceipt->cda_bill_date ? Carbon::parse($cdaReceipt->cda_bill_date)->format('d/m/Y') : 'N/A';

                $table->addRow();
                $table->addCell(600)->addText($index + 1);
                $table->addCell(800)->addText($cdaReceipt->pc_no ?? 'N/A');
                $table->addCell(1200)->addText($cdaReceipt->project_name ?? 'N/A');
                $table->addCell(800)->addText($cdaReceipt->adv_no ?? 'N/A');
                $table->addCell(800)->addText($adv_date);
                $table->addCell(800)->addText($cdaReceipt->adv_amount ? number_format($cdaReceipt->adv_amount, 2) : '0.00');
                $table->addCell(800)->addText($cdaReceipt->settle_vr_no ?? 'N/A');
                $table->addCell(800)->addText($settle_date);
                $table->addCell(800)->addText($cdaReceipt->settle_amount ? number_format($cdaReceipt->settle_amount, 2) : '0.00');
                $table->addCell(800)->addText($cdaReceipt->settle_vr_no ?? 'N/A'); // Using settle_vr_no for CRV No
                $table->addCell(1000)->addText($cdaReceipt->settle_firm ?? 'N/A');
                $table->addCell(800)->addText($cdaReceipt->cda_bill_no ?? 'N/A');
                $table->addCell(800)->addText($cda_bill_date);
                $table->addCell(800)->addText(number_format($cdaReceipt->bill_amount ?? 0, 2));
            }

            // Add total row
            $table->addRow();
            $cellColSpan = $table->addCell(11800, ['gridSpan' => 13]);
            $cellColSpan->addText('Total', ['bold' => true], ['alignment' => 'right']);
            $table->addCell(800)->addText(number_format($totalAmount, 2), ['bold' => true]);
        } catch (\Exception $e) {
            \Log::error("Error in addCdaBillsContent: " . $e->getMessage());
            \Log::error("Stack trace: " . $e->getTraceAsString());

            // Add error message to the document itself
            $section->addText("Error generating content: " . $e->getMessage(), ['color' => 'FF0000']);
        }
    }
}
