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
}
