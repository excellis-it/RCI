<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversionVoucherDetail extends Model
{
    use HasFactory;

    public function strikeInventoryNumber()
    {
        return $this->belongsTo(InventoryNumber::class, 'strike_item_id');
    }

    public function broughtInventoryNumber()
    {
        return $this->belongsTo(InventoryNumber::class, 'brought_item_id');
    }

    public function conversionVoucher()
    {
        return $this->belongsTo(ConversionVoucher::class, 'conversion_voucher_id');
    }
}
