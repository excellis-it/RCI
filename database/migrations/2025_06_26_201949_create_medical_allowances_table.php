<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('medical_allowances', function (Blueprint $table) {
            $table->id();
            $table->string('bill_no');
            $table->date('bill_date')->nullable();
            $table->string('patient_name')->nullable(); // e.g., OPD, IPD, etc.
            $table->string('name_of_hospital')->nullable(); // e.g., OPD, IPD, etc.
            $table->string('type')->nullable(); // e.g., OPD, IPD, etc.
            $table->string('type_number')->nullable(); // some reference number
            $table->unsignedBigInteger('member_id');
            $table->string('treatment_for')->nullable(); // who is being treated
            $table->decimal('amount_claimed', 10, 2)->default(0)->nullable();
            $table->decimal('total_adv_amount_given', 10, 2)->default(0)->nullable();
            $table->decimal('amount_passed', 10, 2)->default(0)->nullable();
            $table->decimal('amount_disallowed', 10, 2)->default(0)->nullable();
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_allowances');
    }
};
