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
        Schema::create('income_tax_savings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('month');
            $table->string('year');
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
            $table->string('med_ins_80d')->nullable();
            $table->boolean('med_ins_senior_dependent')->default(false);
            $table->boolean('cancer_80ddb_senior_dependent')->default(false);
            $table->boolean('med_tri_80dd_disability')->default(false);
            $table->boolean('ph_disable_80u_disability')->default(false);
            $table->boolean('it_rules')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_tax_savings');
    }
};
