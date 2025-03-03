<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateIssueVoucherDetail extends Model
{
    use HasFactory;

    //item code realation
    public function item()
    {
        return $this->belongsTo(ItemCode::class, 'item_code');
    }

    public function voucherDetail()
    {
        return $this->belongsTo(CertificateIssueVoucher::class, 'certicate_issue_voucher_id');
    }
}
