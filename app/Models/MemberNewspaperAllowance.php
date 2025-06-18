<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberNewspaperAllowance extends Model
{
    use HasFactory;

    protected $fillable = [
    'duration',
    'month_duration',
    'member_id',
    'amount',
    'year',
    'remarks',
];


    //member relation
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
