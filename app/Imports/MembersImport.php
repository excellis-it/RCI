<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MembersImport implements ToModel, WithHeadingRow
{
    protected $fund_type;

    public function __construct($fund_type)
    {
        $this->fund_type = $fund_type;
    }

    public function model(array $row)
    {
        return new Member([
            'name'         => $row['name'] ?? null,
            'phone_number' => $row['phone'] ?? null,
            'pran_number'  => $row['pran'] ?? null,
            'fund_type'    => $this->fund_type,
        ]);
    }
}
