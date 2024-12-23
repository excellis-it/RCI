<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashInBank extends Model
{
    use HasFactory;

    public function amount()
    {
        return $this->belongsTo(Amount::class);
    }
}
