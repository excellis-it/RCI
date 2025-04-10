<?php

namespace App\Helpers;

use App\Models\CashPayment;
use App\Models\ChequePayment;
use App\Models\MemberCoreInfo;
use App\Models\MemberCredit;
use App\Models\MemberDebit;
use App\Models\MemberLoan;
use App\Models\MemberLoanInfo;
use App\Models\SiteLogo;
use App\Models\Pension;
use App\Models\CashInBank;
use App\Models\CashInHand;
use App\Models\ReceiptMember;
use App\Models\ChequePaymentMember;
use App\Models\CDAReceipt;
use App\Models\CashWithdrawal;
use App\Models\AdvanceSettlement;
use App\Models\AdvanceFundToEmployee;
use App\Models\ConversionVoucherDetail;
use Illuminate\Support\Facades\DB;
use App\Models\ImprestBalance;
use App\Models\InventorySir;
use App\Models\ItemCode;
use App\Models\Rin;
use App\Models\CreditVoucher;
use App\Models\InventoryItemStock;
use App\Models\Amount;
use App\Models\Setting;
use App\Models\CdaBillAuditTeam;
use App\Models\CashDeposit;

class Helper
{
    public static function getTotalSirQty($sir_no)
    {
        $sir_qty = InventorySir::where('sir_no', $sir_no)
            ->sum('received_quantity');

        return $sir_qty;
    }
    public static function get_openings_balance($cat_id, $pre_vr_date)
    {
        $total_reciept = DB::table('receipts')
            ->where('vr_date', '<=', $pre_vr_date) // Filter by past dates
            ->where('category_id', $cat_id) // Match category
            //  ->whereNotIn('vr_no', $vrNos) // Exclude cheque payments
            ->sum('amount');

        $total_payment = DB::table('cheque_payments')
            ->where('cheq_date', '<=', $pre_vr_date) // Filter by past dates
            ->where('category_id', $cat_id) // Match category
            //  ->whereNotIn('vr_no', $vrNos) // Exclude cheque payments
            ->sum('amount');

        return $total_reciept - $total_payment;
    }

    public static function total_payment_today($cat_id, $vr_date)
    {
        $total_payment = DB::table('cheque_payments')
            ->where('cheq_date', '=', $vr_date) // Filter by past dates
            ->where('category_id', $cat_id) // Match category
            //  ->whereNotIn('vr_no', $vrNos) // Exclude cheque payments
            ->sum('amount');

        return $total_payment;
    }

    public static function cashPayments()
    {
        // totakl amount of cash payments
        $cash_payments = CashPayment::sum('amount');
        if (isset($cash_payments) == null) {
            return $cash_payments = 00.00;
        }
        return $cash_payments;
    }

    public static function bankPayments()
    {
        $bank_payments = ChequePayment::sum('amount');
        if (isset($bank_payments) == null) {
            return $bank_payments = 00.00;
        }
        return $bank_payments;
    }

    public static function getLastImprestBalance($date)
    {
        return ImprestBalance::where('date', '<=', $date)->latest('date')->latest('created_at')->orderBy('id', 'desc')->first();
    }

    public static function updateBalancesAfterDate($date, $updates)
    {
        $records = ImprestBalance::where('date', '>', $date)->orderBy('date')->latest('created_at')->orderBy('id', 'desc')->get();
        foreach ($records as $record) {
            foreach ($updates as $key => $value) {
                $record->{$key} += $value;
            }
            $record->save();
        }
    }

    public static function getCashInBank($date = null)
    {
        $lastIMBRecord = ImprestBalance::latest('date')->latest('created_at')->orderBy('id', 'desc')->value('cash_in_bank');
        // dd($lastIMBRecord); die;
        return $lastIMBRecord ?? 0;
    }

    public static function getCashInHand($date = null)
    {
        $lastIMBRecord = ImprestBalance::latest('date')->latest('created_at')->orderBy('id', 'desc')->value('cash_in_hand');
        return $lastIMBRecord ?? 0;
    }

    public static function getImprestCashInBank($date = null)
    {
        $amount_credit = 0;
        $amount_withdraw = 0;
        $amount_receipt = 0;
        $amount_deposit = 0;

        $amount_credit_query = Amount::query();
        if ($date) {
            $amount_credit_query->whereDate('created_at', '<=', $date);
        }
        $amount_credit = $amount_credit_query->sum('amount');

        $amount_withdraw_query = CashWithdrawal::query();
        if ($date) {
            $amount_withdraw_query->whereDate('vr_date', '<=', $date);
        }
        $amount_withdraw = $amount_withdraw_query->sum('amount');

        $amount_receipt_query = CDAReceipt::query();
        if ($date) {
            $amount_receipt_query->whereDate('rct_vr_date', '<=', $date);
        }
        $amount_receipt = $amount_receipt_query->sum('rct_vr_amount');

        $amount_deposit_query = CashDeposit::query();
        if ($date) {
            $amount_deposit_query->whereDate('vr_date', '<=', $date);
        }
        $amount_deposit = $amount_deposit_query->sum('amount');

        $final_cash_in_bank = ($amount_credit - $amount_withdraw) + $amount_receipt + $amount_deposit;

        return $final_cash_in_bank;
    }

    public static function getImprestCashInBankOpening($date = null)
    {
        $date = $date ?? now()->toDateString();

        $amount_credit = 0;
        $amount_withdraw = 0;
        $amount_receipt = 0;
        $amount_deposit = 0;

        $amount_credit_query = Amount::query();
        $amount_credit_query->whereDate('created_at', '<', $date);
        $amount_credit = $amount_credit_query->sum('amount');

        $amount_withdraw_query = CashWithdrawal::query();
        $amount_withdraw_query->whereDate('vr_date', '<', $date);
        $amount_withdraw = $amount_withdraw_query->sum('amount');

        $amount_receipt_query = CDAReceipt::query();
        $amount_receipt_query->whereDate('rct_vr_date', '<', $date);
        $amount_receipt = $amount_receipt_query->sum('rct_vr_amount');

        $amount_deposit_query = CashDeposit::query();
        $amount_deposit_query->whereDate('vr_date', '<', $date);
        $amount_deposit = $amount_deposit_query->sum('amount');

        $final_cash_in_bank = ($amount_credit - $amount_withdraw) + $amount_receipt + $amount_deposit;

        // if minus then 0
        if ($final_cash_in_bank < 0) {
            $final_cash_in_bank = 0;
        }

        return $final_cash_in_bank;
    }


    public static function getImprestCashInHand($date = null)
    {
        $amount_withdraw = 0;
        $amount_advance = 0;
        $amount_settled_partial_returned = 0;
        $amount_receipt = 0;
        $amount_deposit = 0;

        $amount_withdraw_query = CashWithdrawal::query();
        if ($date) {
            $amount_withdraw_query->whereDate('vr_date', '<=', $date);
        }
        $amount_withdraw = $amount_withdraw_query->sum('amount');

        $amount_advance_query = AdvanceFundToEmployee::query();
        if ($date) {
            $amount_advance_query->whereDate('adv_date', '<=', $date);
        }
        $amount_advance = $amount_advance_query->sum('adv_amount');

        $amount_settled_partial_returned_query = AdvanceSettlement::query();
        if ($date) {
            $amount_settled_partial_returned_query->whereDate('var_date', '<=', $date);
        }
        $amount_settled_partial_returned = $amount_settled_partial_returned_query->sum('balance');

        $amount_deposit_query = CashDeposit::query();
        if ($date) {
            $amount_deposit_query->whereDate('vr_date', '<=', $date);
        }
        $amount_deposit = $amount_deposit_query->sum('amount');

        $final_cash_in_hand = (($amount_withdraw - $amount_advance) + $amount_settled_partial_returned) - $amount_deposit;

        return $final_cash_in_hand;
    }

    public static function getImprestCashInHandOpening($date = null)
    {
        $date = $date ?? now()->toDateString();

        // Determine the financial year start date based on the requested date
        $dateObj = new \DateTime($date);
        $month = (int)$dateObj->format('m');
        $year = (int)$dateObj->format('Y');

        // If month is January to March (1-3), financial year started in previous year
        // Otherwise, financial year started in current year
        $financialYearStart = ($month >= 4)
            ? "$year-04-01"
            : ($year - 1) . "-04-01";

        $amount_withdraw = 0;
        $amount_advance = 0;
        $amount_settled_partial_returned = 0;
        $amount_deposit = 0;

        $amount_withdraw_query = CashWithdrawal::query();
        $amount_withdraw_query->whereDate('vr_date', '>=', $financialYearStart)
                             ->whereDate('vr_date', '<', $date);
        $amount_withdraw = $amount_withdraw_query->sum('amount');

        $amount_advance_query = AdvanceFundToEmployee::query();
        $amount_advance_query->whereDate('adv_date', '>=', $financialYearStart)
                            ->whereDate('adv_date', '<', $date);
        $amount_advance = $amount_advance_query->sum('adv_amount');

        $amount_settled_partial_returned_query = AdvanceSettlement::query();
        $amount_settled_partial_returned_query->whereDate('var_date', '>=', $financialYearStart)
                                             ->whereDate('var_date', '<', $date);
        $amount_settled_partial_returned = $amount_settled_partial_returned_query->sum('balance');

        // $amount_deposit_query = CashDeposit::query();
        // $amount_deposit_query->whereDate('vr_date', '>=', $financialYearStart)
        //                      ->whereDate('vr_date', '<', $date);
        // $amount_deposit = $amount_deposit_query->sum('amount');

        $final_cash_in_hand = (($amount_withdraw - $amount_advance) + $amount_settled_partial_returned) - $amount_deposit;

        // if minus then 0
        if ($final_cash_in_hand < 0) {
            $final_cash_in_hand = 0;
        }

        return $final_cash_in_hand;
    }

    public static function getBankBalance($date = null)
    {
        try {
            $query = CashInBank::query();
            $query2 = CDAReceipt::query();
            $query3 = CashWithdrawal::query();


            if ($date) {
                //  $query->whereDate('created_at', $date);
                $query2->whereDate('rct_vr_date', $date);
                $query3->whereDate('vr_date', $date);
            }

            $bank_credit = $query->sum('credit');
            // $bank_debit = $query->sum('debit');
            // return $bank_credit - $bank_debit;

            $cda_receipt_amount = $query2->sum('rct_vr_amount');

            $withdrawls_amount = $query3->sum('amount');

            $total_balance = ($bank_credit - $withdrawls_amount) + $cda_receipt_amount;

            return $total_balance;
        } catch (\Exception $e) {
            // Handle the exception and log it if necessary
            return 0; // Return 0 or another default value in case of an error
        }
    }

    public static function getCashBalance($date = null)
    {
        try {
            $query1 = CashWithdrawal::query();
            // $query2 = AdvanceSettlement::query();AdvanceFundToEmployee
            $query2 = AdvanceFundToEmployee::query();

            if ($date) {
                $query1->whereDate('vr_date', $date);
                $query2->whereDate('adv_date', $date);
            }

            $withdrawls_amount = $query1->sum('amount');
            $fund_amount = $query2->sum('adv_amount');

            $total_balance = $withdrawls_amount - $fund_amount;

            return $total_balance;
        } catch (\Exception $e) {
            // Handle the exception and log it if necessary
            return 0; // Return 0 or another default value in case of an error
        }
    }

    public static function getBankBalanceNoCDAReceipt($date = null)
    {
        try {
            $query = CashInBank::query();
            $query2 = CDAReceipt::query();
            $query3 = CashWithdrawal::query();


            if ($date) {
                // $query->whereDate('created_at', $date);
                $query2->whereDate('rct_vr_date', $date);
                $query3->whereDate('vr_date', $date);
            }

            $bank_credit = $query->sum('credit');
            // $bank_debit = $query->sum('debit');
            // return $bank_credit - $bank_debit;

            $cda_receipt_amount = $query2->sum('rct_vr_amount');

            $withdrawls_amount = $query3->sum('amount');

            $total_balance = ($bank_credit - $withdrawls_amount);

            return $total_balance;
        } catch (\Exception $e) {
            // Handle the exception and log it if necessary
            return 0; // Return 0 or another default value in case of an error
        }
    }

    public static function getCheqpaymentMemberBalance($receipt_id, $member_id, $srno)
    {
        $balance = 0;
        $receipt_amount = ReceiptMember::where('receipt_id', $receipt_id)->where('member_id', $member_id)->where('serial_no', $srno)->sum('amount');
        $payment_amount = ChequePaymentMember::where('receipt_id', $receipt_id)->where('member_id', $member_id)->where('serial_no', $srno)->sum('amount');
        if ($payment_amount > 0) {
            $balance = $receipt_amount - $payment_amount;
        } else {
            $balance = $receipt_amount;
        }
        return $balance;
    }

    public static function getCheqpaymentMemberBalanceIn($receipt_id, $member_id, $srno)
    {
        $balance = 0;
        $receipt_amount = ReceiptMember::where('receipt_id', $receipt_id)->where('member_id', $member_id)->where('serial_no', $srno)->sum('amount');
        $payment_amount = ChequePaymentMember::where('receipt_id', $receipt_id)->where('member_id', $member_id)->where('serial_no', $srno)->sum('amount');
        if ($payment_amount > 0) {
            $balance = 0;
        } else {
            $balance = 0;
        }
        return $balance;
    }

    public static function getCheqpaymentBillTotal($receipt_id)
    {
        $balance = 0;
        $receipt_amount = ReceiptMember::where('receipt_id', $receipt_id)->sum('amount');
        $payment_amount = ChequePaymentMember::where('receipt_id', $receipt_id)->sum('amount');
        if ($payment_amount > 0) {
            $balance = $receipt_amount - $payment_amount;
        } else {
            $balance = $receipt_amount;
        }
        return $balance;
    }

    // public static function getCheqpaymentMemberBalance($receipt_id, $member_id, $srno)
    // {
    //     try {
    //         // Retrieve receipt and payment amounts
    //         $receipt_amount = ReceiptMember::where('receipt_id', $receipt_id)
    //             ->where('member_id', $member_id)
    //             ->where('serial_no', $srno)
    //             ->sum('amount');

    //         $payment_amount = ChequePaymentMember::where('receipt_id', $receipt_id)
    //             ->where('member_id', $member_id)
    //             ->where('serial_no', $srno)
    //             ->sum('amount');

    //         // Calculate the balance
    //         $balance = $receipt_amount - $payment_amount;

    //         return $balance;
    //     } catch (\Exception $e) {
    //         // Log the exception and return 0 as a fallback
    //         Log::error('Error calculating member balance: ' . $e->getMessage(), [
    //             'receipt_id' => $receipt_id,
    //             'member_id' => $member_id,
    //             'serial_no' => $srno,
    //         ]);

    //         return 0;
    //     }
    // }


    public static function getCheqpaymentMemberRCamount($receipt_id, $member_id, $srno)
    {
        $balance = 0;
        $receipt_amount = ReceiptMember::where('receipt_id', $receipt_id)->where('member_id', $member_id)->where('serial_no', $srno)->sum('amount');

        return $receipt_amount;
    }

    public static function getTotalPaymentsByChqNo($cheqNo)
    {
        $totalamount = ChequePayment::where('cheq_no', $cheqNo)->sum('amount');
        return $totalamount;
    }





    public static function logo()
    {
        $logo = SiteLogo::first();
        return $logo;
    }

    public static function getFinancialYears($startYear = null, $endYear = null)
    {
        // Get the current month and year
        $currentMonth = (int)date('m');
        $currentYear = (int)date('Y');

        // If current month is January to March, the current financial year started in the previous year
        // Otherwise, it starts in the current year
        $currentFinancialYearStart = ($currentMonth >= 4) ? $currentYear : $currentYear - 1;

        $startYear = $startYear ?: $currentFinancialYearStart - 10; // default start year
        $endYear = $endYear ?: $currentFinancialYearStart; // default end year
        $financialYears = [];

        for ($year = $endYear; $year >= $startYear; $year--) {
            $financialYears[] = "$year-" . ($year + 1);
        }

        return $financialYears;
    }


    private static $ones = [
        0 => '',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen'
    ];

    private static $tens = [
        0 => '',
        2 => 'twenty',
        3 => 'thirty',
        4 => 'forty',
        5 => 'fifty',
        6 => 'sixty',
        7 => 'seventy',
        8 => 'eighty',
        9 => 'ninety'
    ];

    private static $places = [
        1 => 'hundred',
        2 => 'thousand',
        3 => 'lakh',
        4 => 'crore'
    ];

    public static function convert($number)
    {
        if ($number == 0) {
            return 'zero';
        }

        $number = number_format((float)$number, 2, '.', '');
        list($integerPart, $fractionalPart) = explode('.', $number);

        $integerWords = self::convertToWords($integerPart);
        $fractionalWords = self::convertToWords($fractionalPart);

        $result = 'Rupees ' . ucwords($integerWords) . ' Only';

        if ((int)$fractionalPart > 0) {
            $result .= ' and ' . ucwords($fractionalWords) . ' Paise Only';
        }

        return ucfirst($result);
    }

    public static function convertToWords($number)
    {
        $number = ltrim($number, '0');
        $length = strlen($number);
        $words = [];

        if ($length > 7) {
            $crores = substr($number, 0, -7);
            $number = substr($number, -7);
            $words[] = self::convertToWords($crores) . ' crore';
        }
        if ($length > 5) {
            $lakhs = substr($number, 0, -5);
            $number = substr($number, -5);
            $words[] = self::convertToWords($lakhs) . ' lakh';
        }
        if ($length > 3) {
            $thousands = substr($number, 0, -3);
            $number = substr($number, -3);
            $words[] = self::convertToWords($thousands) . ' thousand';
        }
        if ($length > 2) {
            $hundreds = substr($number, 0, -2);
            $number = substr($number, -2);
            if ((int)$hundreds > 0) {
                $words[] = self::convertGroup($hundreds) . ' hundred';
            }
        }
        if ($number > 0) {
            $words[] = self::convertGroup($number);
        }

        return implode(' ', $words);
    }


    private static function convertGroup($group)
    {
        $group = (int)$group;
        if ($group < 20) {
            return self::$ones[$group];
        }

        $tens = (int)($group / 10);
        $ones = $group % 10;

        return trim(self::$tens[$tens] . ' ' . self::$ones[$ones]);
    }


    public static function getTdsDetails($member_id, $month, $year)
    {
        $tds = MemberCredit::where('member_id', $member_id)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        return $tds;
    }

    public static function getDebitDetails($member_id, $month, $year)
    {
        $debit = MemberDebit::where('member_id', $member_id)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        return $debit;
    }
    public static function getCreditDetails($member_id, $month, $year)
    {
        $credit = MemberCredit::where('member_id', $member_id)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        return $credit;
    }

    public static function getMemberCoreInfo($member_id, $month, $year)
    {
        $coreInfo = MemberCoreInfo::where('member_id', $member_id)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        return $coreInfo;
    }

    public static function pensionInfo($member_id, $month, $year)
    {
        $pension = Pension::where('user_id', $member_id)
            ->where('month', $month)
            ->where('year', $year)
            ->orderBy('id', 'desc')
            ->first();

        return $pension;
    }

    public static function getHbaLoanDetails($member_id, $month, $year)
    {
        $loan = MemberLoanInfo::where('member_id', $member_id)
            ->where('loan_name', 'hba')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        return $loan;
    }

    public static function getItemCode($item_id)
    {
        $item = ItemCode::where('id', $item_id)->first();

        return $item->code;
    }

    public static function getSIRbyRin($rin_no)
    {
        $rin = Rin::where('rin_no', $rin_no)->first();
        //  return $rin->sir_no;
        $sir = InventorySir::where('id', $rin->sir_no)->first();

        return $sir;
    }

    public static function numberToWords($num)
    {
        $words = array(
            0 => 'Zero',
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
            4 => 'Four',
            5 => 'Five',
            6 => 'Six',
            7 => 'Seven',
            8 => 'Eight',
            9 => 'Nine',
            10 => 'Ten',
            11 => 'Eleven',
            12 => 'Twelve',
            13 => 'Thirteen',
            14 => 'Fourteen',
            15 => 'Fifteen',
            16 => 'Sixteen',
            17 => 'Seventeen',
            18 => 'Eighteen',
            19 => 'Nineteen',
            20 => 'Twenty',
            30 => 'Thirty',
            40 => 'Forty',
            50 => 'Fifty',
            60 => 'Sixty',
            70 => 'Seventy',
            80 => 'Eighty',
            90 => 'Ninety',
            100 => 'Hundred',
            1000 => 'Thousand',
            1000000 => 'Million',
            1000000000 => 'Billion'
        );

        if ($num < 21) {
            return $words[$num];
        } elseif ($num < 100) {
            $unit = $num % 10;
            return $words[$num - $unit] . ($unit ? ' ' . $words[$unit] : '');
        } elseif ($num < 1000) {
            return $words[(int)($num / 100)] . ' ' . $words[100] . ($num % 100 ? ' ' . self::numberToWords($num % 100) : '');
        } elseif ($num < 1000000) {
            return self::numberToWords((int)($num / 1000)) . ' ' . $words[1000] . ($num % 1000 ? ' ' . self::numberToWords($num % 1000) : '');
        } elseif ($num < 1000000000) {
            return self::numberToWords((int)($num / 1000000)) . ' ' . $words[1000000] . ($num % 1000000 ? ' ' . self::numberToWords($num % 1000000) : '');
        }
    }

    // format to decimal 2 number (number_format(floor($original_total_amount * 100) / 100, 2, '.', ''))
    public static function formatDecimal($number)
    {
        return floor($number * 100) / 100;
    }

    // getLoanInstalment
    public static function getLoanInstalment($member_id, $loan_id, $month, $year)
    {
        $loan = MemberLoan::where('member_id', $member_id)
            ->where('loan_id', $loan_id)
            ->whereMonth('emi_date', $month)
            ->whereYear('emi_date', $year)
            ->orderBy('id', 'desc')
            ->first();

        if ($loan) {
            return number_format($loan->emi_amount, 2, '.', '');
        } else {
            return 0;
        }
    }

    public static function getNewFinancialYears($years = 20)
    {
        // Get current month and year
        $currentMonth = (int)date('m');
        $currentYear = (int)date('Y');

        // Determine the current financial year
        // If we're in Jan-Mar, we're in the previous year's financial year
        $currentFinancialYear = ($currentMonth >= 4) ? $currentYear : $currentYear - 1;

        // Calculate the starting year based on how many years back we want to show
        $startYear = $currentFinancialYear - ($years - 1);

        $financialYears = [];

        // Generate financial years
        for ($i = 0; $i < $years; $i++) {
            $fyStart = $startYear + $i;
            $fyEnd = $fyStart + 1;
            $financialYears[] = "$fyStart-$fyEnd";
        }

        return array_reverse($financialYears); // Show most recent first
    }

    public static function getCrvDetaisByInv($cnvid)
    {
        $cnv = ConversionVoucherDetail::where('conversion_voucher_id', $cnvid)->where('brought_inv_id', '!=', null)->first();
        $inv_id = $cnv->brought_inv_id ?? 0;
        // return $inv_id;
        $crv = CreditVoucher::where('inv_id', $inv_id)->first();
        // return $crv;
        if ($crv) {
            return $crv;
        } else {
            return 'abc';
        }
    }

    // get stock by inv id and item id
    public static function getStockByInvId($inv_id, $item_id)
    {
        $stock = InventoryItemStock::where('inv_id', $inv_id)->where('item_id', $item_id)->first();
        return $stock;
    }
}
