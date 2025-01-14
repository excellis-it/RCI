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
    ];
}
