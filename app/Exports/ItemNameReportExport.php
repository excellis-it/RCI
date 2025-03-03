<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ItemNameReportExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'Sr No',
            'LVP',
            'Item Name',
            'Description',
            'NC Status',
            'UOM',
            'Quantity',
            'Rate',
            'Value',
            'Remarks',
            'From Inv',
            'To Inv',
            // 'Voucher Type',
            'Variable No',
            'Variable Date',
        ];
    }

    public function map($row): array
    {
        return [
            $row['sr_no'],
            $row['lvp'],
            $row['item_name'],
            $row['description'],
            $row['nc_status'],
            $row['uom'],
            $row['quantity'],
            $row['rate'],
            $row['value'],
            $row['remarks'],
            $row['from_inv'],
            $row['to_inv'],
            // $row['voucher_type'],
            $row['voucher_no'],
            $row['voucher_date'],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:O1')->getFont()->setBold(true);
        $sheet->getStyle('A:O')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

        return [];
    }
}
