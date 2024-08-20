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
        Schema::create('cash_payments', function (Blueprint $table) {
            $table->id();
            $table->string('vr_no')->nullable();
            $table->date('vr_date')->nullable();
            $table->string('amount')->nullable();
            $table->string('rct_no_id')->nullable();
            $table->string('form')->nullable();
            $table->string('details')->nullable();
            $table->bigInteger('member_id')->unsigned()->nullable();      
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_payments');
    }
};
