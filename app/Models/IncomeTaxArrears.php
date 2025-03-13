<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeTaxArrears extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'date',
        'name',
        'amt',
        'cps',
        'i_tax',
        'cghs',
        'gmc',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

}
