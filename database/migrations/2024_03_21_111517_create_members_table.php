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
            $table->string('pm_level')->nullable();
            $table->string('pm_index')->nullable();
            $table->string('basic')->nullable();
            $table->string('desig')->nullable();
            $table->string('division')->nullable();
            $table->string('group')->nullable();
            $table->string('cadre')->nullable();
            $table->string('category')->nullable();
            $table->string('status')->nullable();
            $table->string('old_bp')->nullable();
            $table->string('g_pay')->nullable();
            $table->string('pay_band')->nullable();
            $table->string('fund_type')->nullable();
            $table->string('dob')->nullable();
            $table->string('doj_lab')->nullable();
            $table->string('doj_service1')->nullable();
            $table->string('dop')->nullable();
            $table->string('next_inr')->nullable();
            $table->string('quater')->nullable();
            $table->string('quater_no')->nullable();
            $table->string('doj_service2')->nullable();
            $table->string('cgeis')->nullable();
            $table->string('ex_service')->nullable();
            $table->string('pg')->nullable();
            $table->string('cgegis')->nullable();
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
