<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('income_tax_savings', function (Blueprint $table) {
            $table->string('annual_rent')->nullable()->after('id');
            $table->string('ph_disable')->nullable()->after('annual_rent');
            $table->string('fd_int')->nullable()->after('ph_disable');
            $table->string('nsc_ctd')->nullable()->after('fd_int');
            $table->string('t_fee')->nullable()->after('nsc_ctd');

            $table->string('hba_int')->nullable()->after('t_fee');
            $table->string('edu_loan_int')->nullable()->after('hba_int');
            $table->string('nscint')->nullable()->after('edu_loan_int');
            $table->string('hba_prncpl')->nullable()->after('nscint');
            $table->string('ohters_s')->nullable()->after('hba_prncpl');

            $table->string('hba_int_80ee')->nullable()->after('ohters_s');
            $table->string('others_d')->nullable()->after('hba_int_80ee');
            $table->string('letout')->nullable()->after('others_d');
            $table->string('pli')->nullable()->after('letout');
            $table->string('infa_bond')->nullable()->after('pli');

            $table->string('ac_int_80tta')->nullable()->after('med_ins_80d');
            $table->string('pension')->nullable()->after('ac_int_80tta');
            $table->string('js_sukanya')->nullable()->after('pension');
            $table->string('nsdl')->nullable()->after('js_sukanya');

            $table->string('med_trt')->nullable()->after('nsdl');
            $table->string('equity_mf')->nullable()->after('med_trt');
            $table->string('ppf')->nullable()->after('equity_mf');
            $table->string('lic')->nullable()->after('ppf');
            $table->string('sec_89')->nullable()->after('lic');

            $table->string('cancer')->nullable()->after('sec_89');

            $table->string('cea')->nullable()->after('cancer');

            $table->string('bonds')->nullable()->after('cea');
            $table->string('ulip')->nullable()->after('bonds');
            $table->string('ph')->nullable()->after('ulip');
            $table->string('cancer_amount')->nullable()->after('ph');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('income_tax_savings', function (Blueprint $table) {
            $table->dropColumn([
                'annual_rent',
                'ph_disable',
                'fd_int',
                'nsc_ctd',
                't_fee',
                'hba_int',
                'edu_loan_int',
                'nscint',
                'hba_prncpl',
                'ohters_s',
                'hba_int_80ee',
                'others_d',
                'letout',
                'pli',
                'infa_bond',
                'ac_int_80tta',
                'pension',
                'js_sukanya',
                'nsdl',
                'med_trt',
                'equity_mf',
                'ppf',
                'lic',
                'sec_89',
                'cancer',
                'cea',
                'bonds',
                'ulip',
                'ph',
            ]);
        });
    }
};
