<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditVoucher extends Model
{
    use HasFactory;

    public function itemCode()
    {
        return $this->belongsTo(ItemCode::class, 'item_code_id');
    }

    public function supplyOrder()
    {
        return $this->belongsTo(SupplyOrder::class, 'supply_order_id');
    }

    public function invNo()
    {
        return $this->belongsTo(InventoryNumber::class, 'icc_no');
    }

    public function invNumber()
    {
        return $this->belongsTo(InventoryNumber::class, 'inv_id');
    }
}
