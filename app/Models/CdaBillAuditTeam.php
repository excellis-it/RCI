<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CdaBillAuditTeam extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function variableType()
    {
        return $this->belongsTo(VariableType::class, 'variable_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function advanceSettlement()
    {
        return $this->belongsTo(AdvanceSettlement::class, 'settle_id');
    }
}
