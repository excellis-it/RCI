<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaybillTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'e_status',
        'generate_by',
        'month',
        'year',
        'account_officer_sign',
        'member_id',
        'category',
        'dv_number',
        'status',
    ];

    // Relationships (optional)
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function categoryData()
    {
        return $this->belongsTo(Category::class, 'category');
    }
}
