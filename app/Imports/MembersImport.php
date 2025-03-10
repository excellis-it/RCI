<?php

namespace App\Imports;

use App\Models\Member;
use App\Models\Designation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterImport;
use App\Http\Controllers\Frontend\MemberController;

class MembersImport implements ToModel
{
    protected $fund_type;
    protected $importedMemberIds = [];

    public function __construct($fund_type)
    {
        $this->fund_type = $fund_type;
    }

    public function model(array $row)
    {
        if ($row[1] === 'Name') {
            return null;
        }

        $designationName = $row[3] ?? null;
        $designation = Designation::firstOrCreate(['designation' => $designationName]);

        $member = new Member([
            'name'         => $row[1] ?? null,
            'phone_number' => $row[2] ?? null,
            'desig'        => $designation->id,
            'gpf_number'       => $row[4] ?? null,
            'pran_number'  => $row[5] ?? null,
            'bank_account' => $row[6] ?? null,
            'bank_name'    => $row[7] ?? null,
            'ifsc_code'    => $row[8] ?? null,
            'status' => 1,
            'member_status' => 1,
            'e_status' => 'active',
            'pay_stop' => 'No',
            'fund_type' => $this->fund_type,
            'member_city' => 1,
        ]);

        $member->save();
        $this->importedMemberIds[] = $member->id;

        return $member;
    }

    /**
     * Register events for the import.
     *
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterImport::class => function (AfterImport $event) {
                $memberController = new MemberController();

                // Process each imported member
                foreach ($this->importedMemberIds as $memberId) {
                    $memberController->memberStoreAllData($memberId);
                }
            }
        ];
    }
}
