<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberMonthlyDataPolicyInfo extends Model
{
    use HasFactory;

    protected $table = 'member_monthly_data_policy_info';

    protected $guarded = [];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
