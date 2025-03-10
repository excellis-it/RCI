<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItemStock extends Model
{
    use HasFactory;

    // belong to item codes by item id
    public function itemCode()
    {
        return $this->belongsTo(ItemCode::class, 'item_id');
    }

    // credit voucher details by inv_id and item_id
    public function creditVoucherDetails()
    {
        return $this->belongsTo(CreditVoucherDetail::class, 'inv_id', 'item_id');
    }

}
