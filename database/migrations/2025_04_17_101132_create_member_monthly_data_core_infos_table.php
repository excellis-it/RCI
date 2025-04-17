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
        Schema::create('member_monthly_data_core_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('month');
            $table->year('year');
            $table->date('apply_date')->nullable();
            $table->string('bank_acc_no')->nullable();
            $table->string('ccs_mem_no')->nullable();
            $table->decimal('fpa', 10, 2)->nullable();
            $table->string('bank')->nullable();
            $table->decimal('gpf_sub', 10, 2)->nullable();
            $table->decimal('add2', 10, 2)->nullable();
            $table->string('gpf_acc_no')->nullable();
            $table->decimal('i_tax', 10, 2)->nullable();
            $table->string('pran_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->decimal('ecess', 10, 2)->nullable();
            $table->string('ben_acc_no')->nullable();
            $table->string('dcmaf_no')->nullable();
            $table->decimal('s_pay', 10, 2)->nullable();
            $table->string('ifsc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_monthly_data_core_infos');
    }
};
