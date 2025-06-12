<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Division;
use App\Models\Group;

use App\Models\Member;
use App\Models\MemberPersonalInfo;

class AddtoCategoryDivision extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    $division = Division::orderBy('id', 'desc')->where('status', 1)->where('value', 'CHESS')->first();
    $group = Group::orderBy('id', 'desc')->where('status', 1)->where('value', 'CHESS')->first();

    if ($division && $group) {
        Member::query()->update([
            'division' => $division->id,
            'group' => $group->id,
        ]);

        MemberPersonalInfo::query()->update([
            'division' => $division->id,
            'group' => $group->id,
        ]);
    } else {
        // Optional: log or notify that CHESS division/group not found
        logger()->warning('CHESS Division or Group not found. Members not updated.');
    }
}

}
