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
        Schema::create('members_monthly_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('month');
            $table->string('year');
            $table->date('apply_date');
            $table->unsignedBigInteger('credit_id')->nullable();
            $table->unsignedBigInteger('debit_id')->nullable();
            $table->unsignedBigInteger('recovery_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members_monthly_data');
    }
};
