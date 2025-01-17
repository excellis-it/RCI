<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItemBalance extends Model
{
    use HasFactory;

    protected $table = 'inventory_item_balance';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voucher_type',
        'item_id',
        'item_code',
        'inv_id',
        'quantity',
        'unit_cost',
        'total_cost',
        'gst_amount',
        'discount_amount',
        'total_amount',
    ];
}
