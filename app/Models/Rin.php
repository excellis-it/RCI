<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rin extends Model
{
    use HasFactory;

    public function creditVoucherDetail()
    {
        return $this->hasOne(CreditVoucherDetail::class, 'rin', 'rin_no');
    }

    public function itemCode()
    {
        return $this->belongsTo(ItemCode::class, 'item_id');
    }
}
