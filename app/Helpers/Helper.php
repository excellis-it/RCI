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

class Helper
{

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

    public static function getBankBalance($date = null)
    {
        try {
            $query = CashInBank::query();

            if ($date) {
                $query->whereDate('created_at', $date);
            }

            $bank_credit = $query->sum('credit');
            $bank_debit = $query->sum('debit');

            return $bank_credit - $bank_debit;
        } catch (\Exception $e) {
            // Handle the exception and log it if necessary
            return 0; // Return 0 or another default value in case of an error
        }
    }

    public static function getCashBalance($date = null)
    {
        try {
            $query = CashInHand::query();

            if ($date) {
                $query->whereDate('created_at', $date);
            }

            $cash_credit = $query->sum('credit');
            $cash_debit = $query->sum('debit');

            return $cash_credit - $cash_debit;
        } catch (\Exception $e) {
            // Handle the exception and log it if necessary
            return 0; // Return 0 or another default value in case of an error
        }
    }

    public static function getCheqpaymentMemberBalance($receipt_id, $member_id)
    {
        $balance = 0;
        $receipt_amount = ReceiptMember::where('receipt_id', $receipt_id)->where('member_id', $member_id)->sum('amount');
        $payment_amount = ChequePaymentMember::where('receipt_id', $receipt_id)->where('member_id', $member_id)->sum('amount');
        if ($payment_amount) {
            $balance = $receipt_amount - $payment_amount;
        } else {
            $balance = $receipt_amount;
        }
        return $balance;
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
}
