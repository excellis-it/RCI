<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptMember extends Model
{
    protected $fillable = ['receipt_id', 'vr_no', 'member_id', 'serial_no'];

    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
