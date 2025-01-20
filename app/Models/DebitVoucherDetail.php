<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebitVoucherDetail extends Model
{
    use HasFactory;

    public function debitVoucher()
    {
        return $this->belongsTo(DebitVoucher::class, 'debit_voucher_id');
    }

    public function itemCode()
    {
        return $this->belongsTo(ItemCode::class, 'item_id');
    }
}
