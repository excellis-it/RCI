<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'pers_no',
        'emp_id',
        'gender',
        'name',
        'pm_level',
        'pm_index',
        'basic',
        'desig',
        'division',
        'group',
        'cadre',
        'category',
        'status',
        'old_bp',
        'g_pay',
        'pay_band',
        'fund_type',
        'dob',
        'doj_lab',
        'doj_service1',
        'dop',
        'next_inr',
        'quater',
        'quater_no',
        'doj_service2',
        'cgeis',
        'ex_service',
        'pg',
        'cgegis',
        'pay_stop',
        'pis',
        'pis_address',
        'sos',
        'sos_address',
    ];


    public function designation()
    {
        return $this->belongsTo(DesignationType::class, 'desig');
    }

    public function divisions()
    {
        return $this->belongsTo(Division::class, 'division');
    }

    public function groups()
    {
        return $this->belongsTo(Group::class, 'group');
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'member_city');
    }

    




    
}
