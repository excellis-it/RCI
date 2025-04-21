<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberMonthlyDataCoreInfo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    protected $fillable = [
        'month',
        'year',
        'apply_date',
        'member_id',
        'bank_acc_no',
        'ccs_mem_no',
        'fpa',
        'bank',
        'gpf_sub',
        'add2',
        'gpf_acc_no',
        'i_tax',
        'pran_no',
        'pan_no',
        'ecess',
        'ben_acc_no',
        'dcmaf_no',
        's_pay',
        'ifsc',
    ];
}
