<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequePayment extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function reciepts()
    {
        return $this->belongsTo(Receipt::class, 'receipt_id');
    }
}
