<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_id',
        'receipt_no',
        'vr_no',
        'vr_date',
        'category_id',
        'amount',
        'bill_ref',
        'cheq_no',
        'cheq_date',
        'status',  // Add other fields if needed
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function reciepts()
    {
        return $this->belongsTo(Receipt::class, 'receipt_id');
    }
}
