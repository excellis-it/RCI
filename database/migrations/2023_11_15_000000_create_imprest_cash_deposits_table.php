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
        Schema::create('imprest_cash_deposits', function (Blueprint $table) {
            $table->id();
            $table->string('vr_no');
            $table->date('vr_date');
            $table->string('rct_no');
            $table->date('rct_date');
            $table->decimal('amount', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imprest_cash_deposits');
    }
};
