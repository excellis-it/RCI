<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCode extends Model
{
    use HasFactory;

    // protected $table = 'inventory_types';

    public function creditVouchers()
    {
        return $this->hasMany(CreditVoucher::class, 'item_code_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function uomajorment()
    {
        return $this->belongsTo(Uom::class, 'uom');
    }

    public function ncStatus()
    {
        return $this->belongsTo(NcStatus::class, 'nc_status');
    }

    public function auStatus()
    {
        return $this->belongsTo(AuStatus::class, 'au_status');
    }

    // item stock
    public function itemStocks()
    {
        return $this->hasMany(InventoryItemStock::class, 'item_id');
    }


}
