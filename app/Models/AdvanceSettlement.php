<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceSettlement extends Model
{
    use HasFactory;

   
    public function project()
    {
        return $this->belongsTo(Project::class , 'project_id');
    }

    public function variableType()
    {
        return $this->belongsTo(VariableType::class, 'var_type_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
