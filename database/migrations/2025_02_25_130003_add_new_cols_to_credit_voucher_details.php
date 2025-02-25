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
        Schema::table('credit_voucher_details', function (Blueprint $table) {
            //
            $table->string('ledger_no')->nullable();
            $table->string('folio_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('credit_voucher_details', function (Blueprint $table) {
            //
            $table->dropColumn('ledger_no');
            $table->dropColumn('folio_no');
        });
    }
};
