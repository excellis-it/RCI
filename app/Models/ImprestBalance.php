<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprestBalance extends Model
{
    use HasFactory;

    // Table name (optional if it matches the pluralized class name)
    protected $table = 'imprest_balance';

    // Fillable columns for mass assignment
    protected $fillable = [
        'cash_in_hand',
        'opening_cash_in_hand',
        'cash_in_bank',
        'opening_cash_in_bank',
        'adv_fund',
        'adv_settle',
        'cda_bill',
        'cda_receipt',
        'adv_fund_outstand',
        'adv_settle_outstand',
        'cda_bill_outstand',
        'adv_fund_id',
        'adv_settle_id',
        'cda_bill_id',
        'cda_receipt_id',
        'date',
        'time'
    ];
}
