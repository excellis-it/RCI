<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CssSub extends Model
{
    use HasFactory;

    protected $fillable = ['pc_no', 'member_id', 'amount'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
