<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomtTaxRent extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'month',
        'year',
        'rent'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
