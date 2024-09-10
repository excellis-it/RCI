<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatePass extends Model
{
    use HasFactory;

    // item code relationship
    public function itemCode()
    {
        return $this->belongsTo(ItemCode::class, 'item_code_id');
    }

    public function consignee()
    {
        return $this->belongsTo(User::class, 'consignee_id');
    }

    public function inventoryNumber()
    {
        return $this->belongsTo(InventoryNumber::class, 'invoice_no');
    }
}
