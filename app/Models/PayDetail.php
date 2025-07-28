<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayDetail extends Model
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
        'npsc',
        'g_pay',
        'da_tpt',
        'dis_alw',
        'nps',
        'date',
        'ups_10_per_rec',
        'upsc_10',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
