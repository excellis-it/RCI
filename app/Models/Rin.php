<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rin extends Model
{
    use HasFactory;

    public function creditVoucherDetail()
    {
        return $this->hasOne(CreditVoucherDetail::class);
    }

    public function itemCode()
    {
        return $this->belongsTo(ItemCode::class, 'item_id');
    }

    public function sirNo()
    {
        return $this->belongsTo(InventorySir::class, 'sir_no');
    }

    public function vendorDetail()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function inventoryNo()
    {
        return $this->belongsTo(InventoryNumber::class, 'inventory_id');
    }

    public function supplyOrder()
    {
        return $this->belongsTo(SupplyOrder::class, 'supply_order_no');
    }

    public function gst()
    {
        return $this->belongsTo(GstPercentage::class, 'gst');
    }

    // public function supply
}
