<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromIncomeTaxSavingsTable extends Migration
{
    public function up()
    {
        Schema::table('income_tax_savings', function (Blueprint $table) {
            $table->dropColumn([
                'var_incr',
                'misc',
                'p_tax',
                'hdfc',
                'basic',
                'da',
                'ot',
                'i_tax',
                'd_misc',
                'd_pay',
                'hra',
                'arrears',
                'hba',
                'gmc',
                's_pay',
                'cca',
                'gpf',
                'pli',
                'e_pay',
                'tpt',
                'cgeis',
                'lic',
                'add_incr',
                'wash_ajw',
                'cghs',
                'eol_hpl',
            ]);
        });
    }

    public function down()
    {
        Schema::table('income_tax_savings', function (Blueprint $table) {
            $table->string('var_incr')->nullable();
            $table->string('misc')->nullable();
            $table->string('p_tax')->nullable();
            $table->string('hdfc')->nullable();
            $table->string('basic')->nullable();
            $table->string('da')->nullable();
            $table->string('ot')->nullable();
            $table->string('i_tax')->nullable();
            $table->string('d_misc')->nullable();
            $table->string('d_pay')->nullable();
            $table->string('hra')->nullable();
            $table->string('arrears')->nullable();
            $table->string('hba')->nullable();
            $table->string('gmc')->nullable();
            $table->string('s_pay')->nullable();
            $table->string('cca')->nullable();
            $table->string('gpf')->nullable();
            $table->string('pli')->nullable();
            $table->string('e_pay')->nullable();
            $table->string('tpt')->nullable();
            $table->string('cgeis')->nullable();
            $table->string('lic')->nullable();
            $table->string('add_incr')->nullable();
            $table->string('wash_ajw')->nullable();
            $table->string('cghs')->nullable();
            $table->string('eol_hpl')->nullable();
        });
    }
}
