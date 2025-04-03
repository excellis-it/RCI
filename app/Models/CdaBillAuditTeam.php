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

    // cda receipt
    public function cdaReceipt()
    {
        return $this->hasMany(CDAReceipt::class, 'bill_id');
    }

    // editable if not in cda receipt
    public function isEditable()
    {
        return $this->cdaReceipt()->count() === 0;
    }
}
