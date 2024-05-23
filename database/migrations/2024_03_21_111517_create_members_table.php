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
            $table->bigInteger('pm_level')->unsigned()->nullable();
            $table->bigInteger('pm_index')->unsigned()->nullable();
            $table->string('basic')->nullable();
            $table->bigInteger('desig')->unsigned()->nullable();
            $table->bigInteger('division')->unsigned()->nullable();
            $table->bigInteger('group')->unsigned()->nullable();
            $table->bigInteger('cadre')->unsigned()->nullable();
            $table->bigInteger('category')->unsigned()->nullable();
            $table->string('status')->nullable();
            $table->string('old_bp')->nullable();
            $table->string('g_pay')->nullable();
            $table->bigInteger('pay_band')->unsigned()->nullable();
            $table->bigInteger('fund_type')->unsigned()->nullable();
            $table->date('dob')->nullable();
            $table->string('doj_lab')->nullable();
            $table->string('doj_service1')->nullable();
            $table->string('dop')->nullable();
            $table->string('next_inr')->nullable();
            $table->bigInteger('quater')->unsigned()->nullable();
            $table->string('quater_no')->nullable();
            $table->string('doj_service2')->nullable();
            $table->string('cgeis')->nullable();
            $table->bigInteger('ex_service')->unsigned()->nullable();
            $table->bigInteger('pg')->unsigned()->nullable();
            $table->bigInteger('cgegis')->unsigned()->nullable();
            $table->string('pay_stop')->nullable();
            $table->string('pis')->nullable();
            $table->string('pis_address')->nullable();
            $table->string('sos')->nullable();
            $table->string('sos_address')->nullable();
            $table->string('resident_address1')->nullable();
            $table->string('resident_address2')->nullable();
            $table->string('resident_city')->nullable();
            $table->string('resident_district')->nullable();
            $table->string('resident_state')->nullable();
            $table->string('resident_pin')->nullable();
            $table->string('is_permanent_add')->enum('Y', 'N')->default('N');
            $table->string('permanent_add1')->nullable();
            $table->string('permanent_add2')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_dist')->nullable();
            $table->string('permanent_state')->nullable();
            $table->string('permanent_pin')->nullable();
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
