<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = [
            'UPSG'
        ];

        foreach ($rules as $key => $value) {
            $rule_add = new Rule();
            $rule_add->id = 11;
            $rule_add->rule_name = $value;
            $rule_add->month =  date('M');
            $rule_add->year = date('Y');
            $rule_add->f_basic = 0;
            $rule_add->t_basic = 0;
            $rule_add->percent = 0;
            $rule_add->amount = 0;
            $rule_add->f_gross = 0;
            $rule_add->t_gross = 0;
            $rule_add->f_scale = 0;
            $rule_add->t_scale = 0;
            $rule_add->more_info = 0;
            $rule_add->save();
        }
    }
}
