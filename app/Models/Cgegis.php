<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cgegis extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function payLevel()
    {
        return $this->belongsTo(PmLevel::class, 'pay_level_id');
    }

}
