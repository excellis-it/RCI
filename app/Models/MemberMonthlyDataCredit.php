<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberMonthlyDataCredit extends Model
{
    use HasFactory;


    protected $fillable = [
        'member_id',
        'pay',
        'da',
        'tpt',
        'cr_rent',
        'g_pay',
        'hra',
        'da_on_tpt',
        'cr_elec',
        'fpa',
        's_pay',
        'hindi',
        'cr_water',
        'add_inc2',
        'npa',
        'deptn_alw',
        'misc1',
        'var_incr',
        'wash_alw',
        'dis_alw',
        'misc2',
        'spl_incentive',
        'incentive',
        'variable_amount',
        'arrs_pay_alw',
        'risk_alw',
        'tot_credits',
        'remarks',
        'month',
        'year',
        'apply_date',
        'npg_adj',
        'npsc',
        'upsc_10',
        'upsg_arrs_10',
        'upsgcr_adj_10'

    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
