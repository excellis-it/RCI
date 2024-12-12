<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_no',
        'vr_no',
        'vr_date',
        'dv_no',
        'narration',
        'category_id',
        'amount',
    ];

    public function fundVendor()
    {
        return $this->belongsTo(PublicFundVendor::class, 'fund_vendors_id');
    }

    //category relation
    public function category()
    {
        return $this->belongsTo(PaymentCategory::class, 'category_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function receiptMembers()
    {
        return $this->hasMany(ReceiptMember::class);
    }
}
