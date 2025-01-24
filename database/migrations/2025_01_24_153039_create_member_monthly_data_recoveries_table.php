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
        Schema::create('member_monthly_data_recoveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('month');
            $table->string('year');
            $table->date('apply_date');
            $table->text('ccs_sub')->nullable();
            $table->text('ptax')->nullable();
            $table->text('mess')->nullable();
            $table->text('security')->nullable();
            $table->text('misc1')->nullable();
            $table->text('ccs_rec')->nullable();
            $table->text('asso_fee')->nullable();
            $table->text('dbf')->nullable();
            $table->text('misc2')->nullable();
            $table->text('wel_sub')->nullable();
            $table->text('ben')->nullable();
            $table->text('med_ins')->nullable();
            $table->text('tot_rec')->nullable();
            $table->text('wel_rec')->nullable();
            $table->text('hdfc')->nullable();
            $table->text('maf')->nullable();
            $table->text('final_pay')->nullable();
            $table->text('lic')->nullable();
            $table->text('cort_atch')->nullable();
            $table->text('ogpf')->nullable();
            $table->text('ntp')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_monthly_data_recoveries');
    }
};
