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
        Schema::create('cheque_payments', function (Blueprint $table) {
            $table->id();
            $table->string('vr_no')->nullable();
            $table->date('vr_date')->nullable();
            $table->string('sr_no')->nullable();
            $table->string('amount')->nullable();
            $table->bigInteger('member_id')->unsigned()->nullable();      
            $table->string('designation')->nullable();
            $table->string('bill_ref')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('dv_no')->nullable();
            $table->string('cheque_no')->nullable();
            $table->date('cheque_date')->nullable();
            $table->string('narration')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheque_payments');
    }
};
