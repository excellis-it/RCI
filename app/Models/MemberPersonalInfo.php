<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPersonalInfo extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
          'division',
        'group',
    ];

    public function quarter()
    {
        return $this->belongsTo(Quater::class, 'quater');
    }
}
