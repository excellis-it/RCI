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
        'var_incr',
        'misc',
        'p_tax',
        'hdfc',
        'basic',
        'da',
        'ot',
        'i_tax',
        'd_misc',
        'd_pay',
        'hra',
        'arrears',
        'hba',
        'gmc',
        's_pay',
        'cca',
        'gpf',
        'pli',
        'e_pay',
        'tpt',
        'cgeis',
        'lic',
        'add_incr',
        'wash_ajw',
        'cghs',
        'eol_hpl',
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
