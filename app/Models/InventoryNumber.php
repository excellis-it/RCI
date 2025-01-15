<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_type',
        'holder_id',
        'group_id',
        'inventory_project_id',
        'number',
        'division',
        'status'
    ];

    public function member()
    {
        return $this->belongsTo(User::class, 'holder_id');
    }


    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function project()
    {
        return $this->belongsTo(InventoryProject::class, 'inventory_project_id');
    }

    public function creditVoucherDetails()
    {
        return $this->hasMany(CreditVoucherDetail::class, 'inv_no');
    }
}
