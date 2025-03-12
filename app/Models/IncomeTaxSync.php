<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeTaxSync extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'category_id',
        'group_id',
        'month',
        'year',
        'gross',
        'net',
        'final'
    ];

    /**
     * Relationship with Member model.
     */
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    /**
     * Relationship with Category model.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
