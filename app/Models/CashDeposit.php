<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashDeposit extends Model
{
    use HasFactory;

    protected $table = 'imprest_cash_deposits';

    protected $fillable = [
        'vr_no',
        'vr_date',
        'rct_no',
        'rct_date',
        'amount'
    ];

    protected $casts = [
        'vr_date' => 'date',
        'rct_date' => 'date',
    ];
}
