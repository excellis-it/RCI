<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeTaxSaving extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'month',
        'year',

        'annual_rent',
        'ph_disable',
        'fd_int',
        'nsc_ctd',
        't_fee',
        'hba_int',
        'edu_loan_int',
        'nscint',
        'hba_prncpl',
        'ohters_s',
        'hba_int_80ee',
        'others_d',
        'letout',
        'pli',
        'infa_bond',
        'ac_int_80tta',
        'pension',
        'js_sukanya',
        'nsdl',
        'med_trt',
        'equity_mf',
        'ppf',
        'lic',
        'sec_89',
        'cancer',
        'cea',
        'bonds',
        'ulip',
        'ph',
        'cancer_amount',
        'med_ins_80d',
        'med_ins_senior_dependent',
        'cancer_80ddb_senior_dependent',
        'med_tri_80dd_disability',
        'ph_disable_80u_disability',
        'it_rules'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
