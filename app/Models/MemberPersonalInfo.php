<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPersonalInfo extends Model
{
    use HasFactory;
    protected $guarded = [];



    protected $fillable = [
        'division',
        'group',
        'member_id',
        'basic',
        'emp_id',
        'name',
        'g_pay',
        'cadre',
        'dob',
        'next_inr',
        'ex_service',
        'payband',
        'pm_level',
        'gender',
        'status',
        'doj_lab',
        'quater',
        'ph',
        'old_basic',
        'pm_index',
        'desig',
        'category',
        'doj_service',
        'quater_no',
        'dop',
        'fund_type',
        'cgegis',
        'cgegis_text',
        'pay_stop',
        'landline_no',
        'mobile_no',
        'mobile_allowance',
        'broadband_allowance',
        'landline_allowance',
        'cr_water',
        'e_status',
    ];


    public function quarter()
    {
        return $this->belongsTo(Quater::class, 'quater');
    }
}
