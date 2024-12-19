<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceFundToEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'emp_id', 'adv_date', 'adv_amount', 'project_id', 'var_type_id', 'chq_no', 'chq_date', 'adv_no'
    ];


    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
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
