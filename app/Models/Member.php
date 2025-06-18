<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'pers_no',
        'emp_id',
        'gender',
        'name',
        'phone_number',
        'account_number',
        'pran_number',
        'pm_level',
        'pm_index',
        'basic',
        'desig',
        'division',
        'group',
        'cadre',
        'category',
        'status',
        'e_status',
        'old_bp',
        'g_pay',
        'pay_band',
        'fund_type',
        'dob',
        'doj_lab',
        'doj_service1',
        'adhar_number',
        'gpf_number',
        'app_date',
        'nps_available',
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
        'gpf_no',
        'bank_name',
        'bank_account',
        'ifsc_code',
        'pan_no',
        'member_city',
        'rent_or_not',
        'member_status',
        'created_at',
        'updated_at'
    ];


    public function designation()
    {
        return $this->belongsTo(DesignationType::class, 'desig');
    }

    public function divisions()
    {
        return $this->belongsTo(Division::class, 'division');
    }

    public function quarter()
    {
        return $this->belongsTo(Quater::class, 'quater');
    }

    public function groups()
    {
        return $this->belongsTo(Group::class, 'group');
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'member_city');
    }

    public function cgegisVal()
    {
        return $this->belongsTo(Cgegis::class, 'cgegis');
    }

    public function payLevels()
    {
        return $this->belongsTo(PmLevel::class, 'pm_level');
    }

    public function desigs()
    {
        return $this->belongsTo(Designation::class, 'desig', 'id');
    }

    public function leaveAlloted()
    {
        return $this->hasMany(MemberAllotedLeave::class, 'member_id');
    }

    public function memberLeave()
    {
        return $this->hasMany(MemberLeave::class, 'member_id');
    }

    public function memberAttendances()
    {
        return $this->hasMany(Attendance::class, 'member_id');
    }


    public function memberCredit()
    {
        return $this->hasOne(MemberMonthlyDataCredit::class, 'member_id')->orderBy('id', 'desc');
    }



    public function memberDebit()
    {
        return $this->hasMany(MemberMonthlyDataDebit::class, 'member_id')->latest();
    }


    public function memberOneDebit()
    {
        return $this->hasOne(MemberMonthlyDataDebit::class, 'member_id')->latest();
    }

    public function memberOneRecovery()
    {
        return $this->hasOne(MemberMonthlyDataRecovery::class, 'member_id')->latest();
    }


    public function memberRecovery()
    {
        return $this->hasMany(MemberMonthlyDataRecovery::class, 'member_id')->latest();
    }

    public function memberPersonalInfo()
    {
        return $this->hasOne(MemberPersonalInfo::class, 'member_id');
    }

    public function memberCoreInfo()
    {
        return $this->hasOne(MemberMonthlyDataCoreInfo::class, 'member_id');
    }

    public function gPay()
    {
        return $this->belongsTo(GradePay::class, 'g_pay');
    }

    public function memberFamily()
    {
        return $this->hasOne(MemberFamily::class, 'member_id');
    }

    public function memberNewspaper()
    {
        return $this->hasOne(MemberNewspaperAllowance::class, 'member_id');
    }

    public function memberRetirementInfo()
    {
        return $this->hasMany(MemberRetirementInfo::class, 'member_id');
    }

    public function receiptMembers()
    {
        return $this->hasMany(ReceiptMember::class);
    }

    public function childrenAllowance()
    {
        return $this->hasMany(MemberChildAllowance::class);
    }

    public function memberCategory()
    {
        return $this->hasOneThrough(Category::class, MemberPersonalInfo::class, 'member_id', 'id', 'id', 'category');
    }
}
