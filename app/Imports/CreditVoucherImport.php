<?php

namespace App\Imports;

use App\Models\CreditVoucher;
use App\Models\CreditVoucherDetail;
use App\Models\InventoryItemBalance;
use App\Models\InventoryNumber;
use App\Models\ItemCode;
use App\Models\Uom;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CreditVoucherImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    protected $inventoryNo;

    public function __construct($inventoryNo)
    {
        $this->inventoryNo = $inventoryNo;
    }



    public function collection(Collection $rows)
    {

        $rows = $rows->filter(function ($row) {
            return array_filter($row->toArray()); // Check if the row has any non-empty values
        });

        //auto increment 4 digit voucher number
        // Get the current date
        $currentDate = date('Y-m-d');
        $resetDate = date('Y') . '-04-01';
        $resetDateTimestamp = Carbon::createFromFormat('Y-m-d', $resetDate)->subDay()->endOfDay();

        // If the current date is before the reset date, get the reset date for the previous year
        if ($currentDate < $resetDate) {
            $resetDate = (date('Y') - 1) . '-04-01';
            $resetDateTimestamp = Carbon::createFromFormat('Y-m-d', $resetDate)->subDay()->endOfDay();
        }

        // Get the last voucher number that was created before the reset date
        $lastVoucher1 = CreditVoucher::where('created_at', '<', $resetDateTimestamp)
            ->orderBy('voucher_no', 'desc')
            ->first();

        if ($lastVoucher1) {
            $lastVoucher = $lastVoucher1;
        } else {
            $lastVoucher = CreditVoucher::latest()->first();
        }

        // If there are no vouchers yet, or if the last voucher was created before the reset date, start with 0001, otherwise increment the last voucher number
        $voucherNo = $lastVoucher ? ((int) $lastVoucher->voucher_no) + 1 : 1;

        // Pad the voucher number with leading zeros to ensure it's always 4 digits
        $voucherNo = str_pad($voucherNo, 4, '0', STR_PAD_LEFT);

        $creditVoucher = new CreditVoucher();
        // $creditVoucher->voucher_no = strtoupper($request->order_type) . '' . $voucherNo;
        $creditVoucher->voucher_no = $voucherNo;
        $creditVoucher->voucher_date = date('Y-m-d');
        $inventory_number = InventoryNumber::where('id', '=', $this->inventoryNo)->first();
        if ($creditVoucher->save()) {
            $lastCreditVoucher = CreditVoucher::latest()->first();
            foreach ($rows as $key => $row) {
                $item_code_count = ItemCode::where('code', $row['lvp'])->count();
                $uom_count = Uom::where('name', $row['uom'])->count();

                if ($uom_count > 0) {
                    $uom = Uom::where('name', $row['uom'])->first();
                    $uom_id = $uom->id;
                } else {
                    $uom = new Uom();
                    $uom->name = $row['uom'];
                    $uom->save();
                    $uom_id = $uom->id;
                }

                if ($item_code_count > 0) {
                    $item_code = ItemCode::where('code', $row['lvp'])->first();
                    $value = $item_code->id;
                } else {
                    $item_code = new ItemCode();
                    $item_code->code = $row['lvp'];
                    $item_code->description = $row['description'] ?? null;
                    $item_code->uom = $uom_id ?? null;
                    $item_code->item_type = isset($row['c/nc']) && $row['c/nc'] == 'C' ? 'Consumable' : 'Non-Consumable';
                    $item_code->save();
                    $value = $item_code->id;
                }

                $creditVoucherDetail = new CreditVoucherDetail();
                $creditVoucherDetail->credit_voucher_id = $lastCreditVoucher->id ?? null;
                $creditVoucherDetail->item_code = $row['lvp'] ?? null;
                $creditVoucherDetail->item_code_id = $value ?? null;
                $creditVoucherDetail->inv_no = $this->inventoryNo ?? null;
                $creditVoucherDetail->description = $row['description'] ?? null;
                $creditVoucherDetail->uom = $uom_id ?? null;
                $creditVoucherDetail->price = isset($row['rate']) ? str_replace('-', '', $row['rate']) : null;
                $creditVoucherDetail->quantity = $row['qty'] ?? null;
                $creditVoucherDetail->initial_quantity = $row['qty'] ?? null;
                $creditVoucherDetail->member_id = $inventory_number->holder_id ?? null;
                $creditVoucherDetail->total_price =  isset($row['value']) ? str_replace('-', '', $row['value']) : null;
                $creditVoucherDetail->remarks =  $row['remarks'] ?? null;
                $creditVoucherDetail->item_type = isset($row['c/nc']) && $row['c/nc'] == 'C' ? 'Consumable' : 'Non-Consumable';
                $creditVoucherDetail->save();

                $inventoryItem = new InventoryItemBalance();
                $inventoryItem->voucher_type = 'credit_voucher';
                $inventoryItem->item_id = $value ?? null;
                $inventoryItem->item_code = $row['lvp'] ?? null;
                $inventoryItem->inv_id = $this->inventoryNo ?? null;
                $inventoryItem->quantity = $row['qty'] ?? null;
                $inventoryItem->unit_cost = isset($row['rate']) ? str_replace('-', '', $row['rate']) : null;
                $inventoryItem->total_cost =  isset($row['value']) ? str_replace('-', '', $row['value']) : null;
                $inventoryItem->total_amount = isset($row['value']) ? str_replace('-', '', $row['value']) : null;
                $inventoryItem->save();
            }

        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
