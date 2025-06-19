<?php

namespace Database\Seeders;

use App\Models\Designation;
use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolveDesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [
            "Sc 'C'" => "SC C",
            "Sc 'D'" => "SC D",
            "Sc 'E'" => "SC E",
            "Sc 'F'" => "SC F",
            "Sc 'G'" => "SC G",
        ];

        foreach ($designations as $key => $value) {
            $key_id = Designation::where('designation', $key)->first();
            $value_id = Designation::where('designation', $value)->first();

            if ($key_id && $value_id) {
                Member::where('desig', $key_id->id)
                    ->update(['desig' => $value_id->id]);
            } else {
                echo "Designation not found for key: $key or value: $value\n";
            }
        }
    }
}
