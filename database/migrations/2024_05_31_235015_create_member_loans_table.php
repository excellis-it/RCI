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
        Schema::create('member_loans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned()->nullable();
            $table->string('loan_name')->nullable();
            $table->string('interest_rate')->nullable();
            $table->string('emi_amount')->nullable();
            $table->string('interest_amount')->nullable();
            $table->string('penal_interest')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_loans');
    }
};
