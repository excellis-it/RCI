<?php

if (!function_exists('formatIndianCurrency')) {
    function formatIndianCurrency($amount, $decimals = null)
    {
        $fmt = new \NumberFormatter('en_IN', \NumberFormatter::DECIMAL);

        if ($decimals !== null) {
            $fmt->setAttribute(\NumberFormatter::FRACTION_DIGITS, $decimals);
        }

        return $fmt->format($amount);
    }
}
