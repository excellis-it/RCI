<?php

namespace App\Helpers;
use App\Models\CashPayment;
use App\Models\ChequePayment;
use App\Models\SiteLogo;

class Helper {

    public static function cashPayments()
    {
        // totakl amount of cash payments
        $cash_payments = CashPayment::sum('amount');
        if(isset($cash_payments) == null){
            return $cash_payments = 00.00;
        }
        return $cash_payments;
    }

    public static function bankPayments()
    {
        $bank_payments = ChequePayment::sum('amount');
        if(isset($bank_payments) == null){
            return $bank_payments = 00.00;
        }
        return $bank_payments;
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

    private static function convertToWords($number)
    {
        if ($number == 0) {
            return '';
        }

        $number = ltrim($number, '0');
        $length = strlen($number);
        $words = [];

        if ($length > 3) {
            $number = str_pad($number, ceil($length / 2) * 2, '0', STR_PAD_LEFT);
            $groups = str_split($number, 2);
        } else {
            $groups = [$number];
        }

        $groupCount = count($groups);
        foreach ($groups as $index => $group) {
            $groupWords = self::convertGroup($group);
            if ($groupWords) {
                $place = $groupCount - $index - 1;
                if ($place > 0) {
                    $words[] = $groupWords . ' ' . self::$places[$place];
                } else {
                    $words[] = $groupWords;
                }
            }
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
}
