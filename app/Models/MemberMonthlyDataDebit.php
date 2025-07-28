<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberMonthlyDataDebit extends Model
{
    use HasFactory;


    protected $fillable = [
        'member_id',
        'gpa_sub',
        'gpf_adv',
        'eol',
        'ccl',
        'rent',
        'lf_arr',
        'tada',
        'hba',
        'hba_adv',
        'hba_int',
        'misc1',
        'gpf_rec',
        'i_tax',
        'elec',
        'elec_arr',
        'medi',
        'pc',
        'misc2',
        'gpf_arr',
        'ecess',
        'water',
        'water_arr',
        'ltc',
        'fadv',
        'misc3',
        'cgegis',
        'cda',
        'furn',
        'furn_arr',
        'car',
        'car_adv',
        'car_int',
        'hra_rec',
        'tot_debits',
        'cghs',
        'ptax',
        'cmg',
        'pli',
        'scooter',
        'sco_adv',
        'sco_int',
        'comp_adv',
        'comp_int',
        'tpt_rec',
        'licence_fee',
        'net_pay',
        'basic',
        'leave_rec',
        'pension_rec',
        'quarter_charges',
        'cgeis_arr',
        'penal_intr',
        // 'society',
        'remarks',
        'month',
        'year',
        'apply_date',
        'npsg',
        'npsg_arr',
        'npsg_adj',
        'nps_10_rec',
        'nps_10_arr',
        'nps_14_adj',

        'ups_10_per_rec',
        'upsg_10_per',
        'ups_arr_10_per',
        'upsg_arr_10_per',
        'ups_adj_10_per',
        'upsg_adj_10_per',
    ];


    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
