<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CDAReceipt extends Model
{
    use HasFactory;

    protected $table = 'cda_receipts';

    protected $fillable = [
        'bill_id',
        'rct_vr_no',
        'rct_vr_date',
        'dv_no',
        'dv_date',
        'rct_vr_amount',
        'remark'
    ];


    public function cdaReceiptDetails()
    {
        return $this->belongsTo(CdaReceiptDetail::class, 'details');
    }

    public function cdaBill()
    {
        return $this->belongsTo(CdaBillAuditTeam::class, 'bill_id');
    }
}
