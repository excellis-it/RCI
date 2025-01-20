<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebitVoucher extends Model
{
    use HasFactory;

    public function inventoryNumbers()
    {
        return $this->hasOne(InventoryNumber::class, 'id', 'inv_no');
    }

    public function details()
    {
        return $this->hasMany(DebitVoucherDetail::class, 'debit_voucher_id');
    }
}
