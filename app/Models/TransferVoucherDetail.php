<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferVoucherDetail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transfer_vouchers_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transfer_voucher_id',
        'issuing_inv_no',
        'issuing_division',
        'receiving_inv_no',
        'receiving_division',
        'strike_ledger_no',
        'strike_nomenclature',
        'strike_quantity',
        'strike_rate',
        'brought_ledger_no',
        'brought_nomenclature',
        'brought_quantity',
    ];

    /**
     * Define relationship with TransferVoucher.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transferVoucher()
    {
        return $this->belongsTo(TransferVoucher::class, 'transfer_voucher_id');
    }

    public function strikeLedgerDetail()
    {
        return $this->belongsTo(InventoryItemStock::class, 'strike_ledger_no');
    }

    public function broughtLedgerDetail()
    {
        return $this->belongsTo(InventoryItemStock::class, 'brought_ledger_no');
    }

    //fromInventoryNumber
    public function fromInventoryNumber()
    {
        return $this->belongsTo(InventoryNumber::class, 'issuing_inv_no');
    }

    //toInventoryNumber
    public function toInventoryNumber()
    {
        return $this->belongsTo(InventoryNumber::class, 'receiving_inv_no');
    }
}
