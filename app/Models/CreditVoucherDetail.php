<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditVoucherDetail extends Model
{
    use HasFactory;

    public function rins()
    {
        return $this->belongsTo(Rin::class, 'rin');
    }

    public function inventoryProjects()
    {
        return $this->belongsTo(InventoryProject::class, 'project_id');
    }

    public function members()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function itemCodes()
    {
        return $this->belongsTo(ItemCode::class, 'item_code_id');
    }
}
