<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequePaymentMember extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cheque_payment_members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cheque_payments_id',
        'receipt_id',
        'vr_no',
        'serial_no',
        'member_id',
        'amount',
        'bill_ref',
        'cheq_no',
        'cheq_date',
    ];

    /**
     * Get the cheque payment that owns this member.
     */
    public function chequePayment()
    {
        return $this->belongsTo(ChequePayment::class, 'cheque_payments_id');
    }

    /**
     * Get the member associated with this cheque payment.
     */
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function reciepts()
    {
        return $this->belongsTo(Receipt::class, 'receipt_id');
    }
}
