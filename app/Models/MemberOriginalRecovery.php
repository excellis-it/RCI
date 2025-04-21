<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberOriginalRecovery extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'member_id',
        'ccs_sub',
        'mess',
        'security',
        'misc1',
        'ccs_rec',
        'asso_fee',
        'dbf',
        'misc2',
        'wel_sub',
        'ben',
        'med_ins',
        'tot_rec',
        'wel_rec',
        'hdfc',
        'maf',
        'final_pay',
        'lic',
        'cort_atch',
        'ogpf',
        'ntp',
        'ptax',
        'remarks',
    ];
    
}
