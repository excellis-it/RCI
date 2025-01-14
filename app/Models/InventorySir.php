<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorySir extends Model
{
    use HasFactory;

    protected $fillable = [
        'sir_no',
        'sir_date',
        'demand_no',
        'demand_date',
        'invoice_no',
        'invoice_date',
        'inventory_no',
        'supplier_id',
        'supply_order_no',
        'inspection_authority',
        'status',
        'demand_no',
        'demand_date',
        'invoice_no',
        'invoice_date',
        'inventory_no',
        'supplier_id',
        'supply_order_no',
        'inspection_authority',
        'contract_authority',
        'contract_authority_date'
    ];


    public function inventoryNumber()
    {
        return $this->belongsTo(InventoryNumber::class, 'inventory_no', 'id');
    }

    /**
     * Relationship with Vendor.
     */
    public function supplier()
    {
        return $this->belongsTo(Vendor::class, 'supplier_id', 'id');
    }

    /**
     * Relationship with SupplyOrder.
     */
    public function supplyOrder()
    {
        return $this->belongsTo(SupplyOrder::class, 'supply_order_no', 'id');
    }

    /**
     * Relationship with User for Inspection Authority.
     */
    public function inspectionAuthority()
    {
        return $this->belongsTo(User::class, 'inspection_authority', 'id')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'MATERIAL-MANAGER');
            });
    }

    /**
     * Relationship with User for Contract Authority.
     */
    public function contractAuthority()
    {
        return $this->belongsTo(User::class, 'contract_authority', 'id');
    }
}
