<?php

namespace App\Imports;

use App\Models\Member;
use App\Models\Designation;
use App\Models\PmLevel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterImport;
use App\Http\Controllers\Frontend\MemberController;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;

class MembersImport implements WithMultipleSheets, WithEvents
{
    use Importable;

    protected $importedMemberIds = [];

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            'CGO GPF' => new MemberSheetImport('CGO GPF', $this->importedMemberIds),
            'CGO DEP' => new MemberSheetImport('CGO DEP', $this->importedMemberIds),
            'NIE' => new MemberSheetImport('NIE', $this->importedMemberIds),
            'CGO NPS' => new MemberSheetImport('CGO NPS', $this->importedMemberIds),
            'NIE NPS' => new MemberSheetImport('NIE NPS', $this->importedMemberIds),
        ];
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
            },
        ];
    }
}

class MemberSheetImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    protected $fund_type;
    protected $importedMemberIds;

    public function __construct($fund_type, &$importedMemberIds)
    {
        $this->fund_type = $fund_type;
        $this->importedMemberIds = &$importedMemberIds;
    }

    /**
     * Convert date format from d.m.Y to Y-m-d
     */
    private function formatDate($date)
    {
        if (!$date) return null;

        // Check if it's already in the correct format
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            return $date;
        }

        try {
            // Handle different date formats
            if (strpos($date, '.') !== false) { // d.m.Y format
                $parts = explode('.', $date);
                if (count($parts) == 3) {
                    return Carbon::createFromFormat('d.m.Y', $date)->format('Y-m-d');
                }
            } elseif (strpos($date, '/') !== false) { // d/m/Y format
                $parts = explode('/', $date);
                if (count($parts) == 3) {
                    return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
                }
            }

            // Try to parse with Carbon if format is not recognized
            return Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Get or create a designation by name
     */
    private function getOrCreateDesignation($designationName)
    {
        if (!$designationName) {
            return null;
        }

        $designation = Designation::firstWhere('designation', $designationName);
        if (!$designation) {
            $designation = Designation::create([
                'designation' => $designationName,
            ]);
        }

        return $designation->id;
    }

    /**
     * Get or create a category by name
     */
    private function getOrCreateCategory($categoryName)
    {
        if (!$categoryName) {
            return null;
        }

        $category = Category::firstWhere('category', $categoryName);
        if (!$category) {
            $category = Category::create([
                'designation_type_id' => 1, // Assuming 1 is the default designation type ID
                'category' => $categoryName,
            ]);
        }

        return $category->id;
    }

    /**
     * Get or create a PM level by value
     */
    private function getOrCreatePmLevel($levelValue)
    {
        if (!$levelValue) {
            return null;
        }

        $pmLevel = PmLevel::firstWhere('value', $levelValue);
        if (!$pmLevel) {
            $pmLevel = PmLevel::create([
                'value' => $levelValue,
                'status' => 1
            ]);
        }

        return $pmLevel->id;
    }

    public function model(array $row)
    {
        // Skip empty rows or header rows
        if (empty($row['name']) || strtoupper($row['name']) === 'NAME') {
            return null;
        }

        // Try to find existing member by name
        $existingMember = Member::where('name', $row['name'])->first();

        // Process the designation
        $designationId = $this->getOrCreateDesignation($row['desg']);

        // Process the category
        $categoryId = $this->getOrCreateCategory($this->fund_type);

        // Process the PM level
        $pmLevelId = $this->getOrCreatePmLevel($row['level']);

        // Format dates
        $dob = $this->formatDate($row['dob'] ?? null);
        $doj = $this->formatDate($row['doj'] ?? null);
        $nextIncrement = $this->formatDate($row['date_of_next_increment'] ?? null);

        $memberData = [
            'name' => $row['name'],
            'desig' => $designationId,
            'category' => $categoryId,
            'pers_no' => $row['pcno'] ?? null,
            'gpf_number' => $row['gpf_number'] ?? null,
            'emp_id' => $row['code'] ?? null,
            'pm_level' => $pmLevelId,
            'basic' => $row['basic_pay'] ?? 0,
            'dob' => $dob,
            'doj_lab' => $doj,
            'next_inr' => $nextIncrement,
            'bank_account' => $row['acc_number'] ?? null,
            'ifsc_code' => $row['ifsc'] ?? null,
            'pran_number' => $row['pran_number'] ?? null,
            'pan_no' => $row['pan'] ?? null,
            'status' => 1,
            'e_status' => 'active',
            'member_status' => 1,
            'pay_stop' => 'No',
            'fund_type' => $this->fund_type,
            'member_city' => 1, // Default city ID
            'old_bp' => $row['basic_pay'] ?? 0, // Using basic pay as old_bp too
        ];

        // Update existing member or create a new one
        if ($existingMember) {
            $existingMember->update($memberData);
            $member = $existingMember;
        } else {
            $member = Member::create($memberData);
        }

        // Update core info for bank account, PAN, etc.
        $coreInfoData = [
            'member_id' => $member->id,
            'bank_acc_no' => $row['acc_number'] ?? null,
            'pan_no' => $row['pan'] ?? null,
            'pran_no' => $row['pran_number'] ?? null,
            'ifsc' => $row['ifsc'] ?? null,
            'gpf_acc_no' => $row['gpf_number'] ?? null,
        ];

        // Use updateOrInsert to handle both new and existing core info
        DB::table('member_core_infos')->updateOrInsert(
            ['member_id' => $member->id],
            $coreInfoData
        );

        // update credit, debit, recovery data
        $memberController = new \App\Http\Controllers\Frontend\MemberController();
        $memberController->memberStoreAllData($member->id);

        $this->importedMemberIds[] = $member->id;

        return $member;
    }
}
