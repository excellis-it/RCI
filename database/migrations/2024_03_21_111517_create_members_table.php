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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('pers_no')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('name')->nullable();
            $table->foreignId('pm_level')->references('id')->on('pm_levels')->nullable();
            $table->foreignId('pm_index')->references('id')->on('pm_indices')->nullable();
            $table->string('basic')->nullable();
            $table->foreignId('desig')->references('id')->on('designation_types')->nullable();
            $table->foreignId('division')->references('id')->on('divisions')->nullable();
            $table->foreignId('group')->references('id')->on('groups')->nullable();
            $table->foreignId('cadre')->references('id')->on('cadres')->nullable();
            $table->foreignId('category')->references('id')->on('categories')->nullable();
            $table->string('status')->nullable();
            $table->string('old_bp')->nullable();
            $table->string('g_pay')->nullable();
            $table->foreignId('pay_band')->references('id')->on('payband_types')->nullable();
            $table->foreignId('fund_type')->references('id')->on('fund_types')->nullable();
            $table->date('dob')->nullable();
            $table->string('doj_lab')->nullable();
            $table->string('doj_service1')->nullable();
            $table->string('dop')->nullable();
            $table->string('next_inr')->nullable();
            $table->foreignId('quater')->references('id')->on('quaters')->nullable();
            $table->string('quater_no')->nullable();
            $table->string('doj_service2')->nullable();
            $table->string('cgeis')->nullable();
            $table->foreignId('ex_service')->references('id')->on('ex_services')->nullable();
            $table->foreignId('pg')->references('id')->on('pgs')->nullable();
            $table->foreignId('cgegis')->references('id')->on('cgegis')->nullable();
            $table->string('pay_stop')->nullable();
            $table->string('pis')->nullable();
            $table->string('pis_address')->nullable();
            $table->string('sos')->nullable();
            $table->string('sos_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
