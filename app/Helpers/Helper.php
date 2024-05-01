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
}
