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
use Illuminate\Support\Facades\DB;
use App\Models\ImprestBalance;
use App\Models\InventorySir;
use App\Models\ItemCode;

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
        return ImprestBalance::where('date', '<=', $date)->latest('date')->latest('time')->orderBy('id', 'desc')->first();
    }

    public static function updateBalancesAfterDate($date, $updates)
    {
        $records = ImprestBalance::where('date', '>', $date)->orderBy('date')->orderBy('time')->orderBy('id', 'desc')->get();
        foreach ($records as $record) {
            foreach ($updates as $key => $value) {
                $record->{$key} += $value;
            }
            $record->save();
        }
    }

    public static function getCashInBank($date = null)
    {
        $lastIMBRecord = ImprestBalance::latest('date')->latest('time')->orderBy('id', 'desc')->value('cash_in_bank');
        // dd($lastIMBRecord); die;
        return $lastIMBRecord ?? 0;
    }

    public static function getCashInHand($date = null)
    {
        $lastIMBRecord = ImprestBalance::latest('date')->latest('time')->orderBy('id', 'desc')->value('cash_in_hand');
        return $lastIMBRecord ?? 0;
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

    public static function getFinancialYears($startYear  = null, $endYear  = null)
    {
        $currentYear = date('Y') - 1;
        $startYear = $startYear ?: $currentYear - 10; // default start year
        $endYear = $endYear ?: $currentYear; // default end year
        $financialYears = [];

        for ($year = $startYear; $year <= $endYear; $year++) {
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
}
