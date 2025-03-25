<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversionVoucher extends Model
{
    use HasFactory;


    public function inventoryNumber()
    {
        return $this->belongsTo(InventoryNumber::class, 'inv_no');
    }


    public function itemCode()
    {
        return $this->belongsTo(ItemCode::class, 'item_id');
    }

    public function details()
    {
        return $this->hasMany(ConversionVoucherDetail::class, 'conversion_voucher_id');
    }

    public function conversionVoucherDetails()
    {
        return $this->hasMany(ConversionVoucherDetail::class, 'conversion_voucher_id');
    }
}
