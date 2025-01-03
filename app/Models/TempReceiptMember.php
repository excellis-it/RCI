<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempReceiptMember extends Model
{
    use HasFactory;
    protected $fillable = ['receipt_id', 'vr_no', 'member_id', 'serial_no', 'amount', 'bill_ref', 'cheq_no', 'cheq_date'];

    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
