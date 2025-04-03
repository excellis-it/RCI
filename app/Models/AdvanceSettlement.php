<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceSettlement extends Model
{
    use HasFactory;


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

    public function advanceFund()
    {
        return $this->belongsTo(AdvanceFundToEmployee::class, 'af_id');
    }

    public function cdaBill()
    {
        return $this->hasMany(CdaBillAuditTeam::class, 'settle_id');
    }

    // is editable if not in cda bill
    public function isEditable()
    {
        return $this->cdaBill()->count() === 0;
    }

}
