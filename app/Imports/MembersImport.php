<?php

namespace App\Imports;

use App\Models\Member;
use App\Models\Designation;
use Maatwebsite\Excel\Concerns\ToModel;

class MembersImport implements ToModel
{
    protected $fund_type;

    public function __construct($fund_type)
    {
        $this->fund_type = $fund_type;
    }

    public function model(array $row)
    {
        $designationName = $row[3] ?? null;
        $designation = Designation::firstOrCreate(['designation' => $designationName]);

        return new Member([
            'name'         => $row[1] ?? null,
            'phone_number' => $row[2] ?? null,
            'gpf_no'       => $row[4] ?? null,
            'pran_no'      => $row[5] ?? null,
            'bank_account' => $row[6] ?? null,
            'bank_name'    => $row[7] ?? null,
            'ifsc_code'    => $row[8] ?? null,
            'desig'        => $designation->id,

        ]);
    }
}
