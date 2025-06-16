<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberLandline extends Model
{
    use HasFactory;

   protected $fillable = [
        'member_id',
        'landline_amount',
        'mobile_amount',
        'broadband_amount',
        'entitle_amount',
        'month',
        'year',
        'date',
        'total_amount'
    ];


    // Relationship: Each landline record belongs to one member
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
