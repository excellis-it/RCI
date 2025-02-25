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
        Schema::table('credit_vouchers', function (Blueprint $table) {
            //
            $table->string('store_receipt_date')->nullable();
            $table->string('demand_no')->nullable();
            $table->string('icc_no')->nullable();
            $table->string('division_group')->nullable();
            $table->string('division_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('credit_vouchers', function (Blueprint $table) {
            //
            $table->dropColumn('store_receipt_date');
            $table->dropColumn('demand_no');
            $table->dropColumn('icc_no');
            $table->dropColumn('division_group');
            $table->dropColumn('division_date');
        });
    }
};
