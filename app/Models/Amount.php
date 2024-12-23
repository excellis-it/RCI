<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    use HasFactory;

    public function amount()
    {
        return $this->belongsTo(CashInBank::class , 'credit');
    }
}
