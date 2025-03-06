<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberLoanInfo extends Model
{
    use HasFactory;

    //loan relation
    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id', 'id');
    }

    //member relation
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function allLoans()
    {
        return $this->hasMany(MemberLoan::class, 'loan_info_id', 'id');
    }

    public function loanInfoFirst()
    {
        return $this->hasOne(MemberLoan::class, 'loan_info_id', 'id')->latest();
    }
}
