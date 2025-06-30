<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAllowance extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_no',
        'bill_date',
        'type',
        'type_number',
        'member_id',
        'treatment_for',
        'amount_claimed',
        'total_adv_amount_given',
        'amount_passed',
        'amount_disallowed',
        'patient_name',
        'name_of_hospital',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
