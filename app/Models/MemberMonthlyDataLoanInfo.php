<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberMonthlyDataLoanInfo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }
    public function loanInfoFirst()
    {
        return $this->hasOne(MemberLoan::class, 'loan_info_id', 'id')->latest();
    }
}
