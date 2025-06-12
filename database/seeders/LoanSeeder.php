<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loans')->truncate();
        $loanTypes = [
            'HBA ADV',
            'HBA INT',
            'CAR ADV',
            'CAR INT',
            'SCO ADV',
            'SCO INT',
            'COMP ADV',
            'COMP INT',
            'FEST ADV',
            'GPF ADV'
        ];

        // Insert each loan type into the table
        foreach ($loanTypes as $loanName) {
            Loan::create([
                'loan_name' => $loanName,
                'status' => 1
            ]);
        }


    }
}
