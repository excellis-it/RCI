<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberMonthlyDataVarInfo extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'month',
        'year',
        'apply_date',
        'member_id',
        'v_incr',
        'noi',
        'noi_pending',
        'total',
        'stop',
    ];


    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
