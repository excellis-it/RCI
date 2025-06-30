<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addSeederForNpsAvailableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = Member::with('memberCategory')->get();

        foreach ($members as $member) {
            if ($member->memberCategory && $member->memberCategory->fund_type === 'NPS') {
                $member->nps_available = 'Yes';
            } else {
                $member->nps_available = 'No';
            }

            $member->save(); // This updates the record in the database
        }
    }
}
