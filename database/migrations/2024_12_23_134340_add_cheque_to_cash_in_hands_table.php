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
        Schema::table('cash_in_hands', function (Blueprint $table) {
            //
            $table->string('cheque_no')->nullable();
            $table->string('cheque_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cash_in_hands', function (Blueprint $table) {
            //
            $table->dropColumn('cheque_no');
            $table->dropColumn('cheque_date');
        });
    }
};
