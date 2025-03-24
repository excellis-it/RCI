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
            $table->string('rin_no')->nullable()->after('voucher_date');
            $table->unsignedBigInteger('inv_id')->nullable()->after('rin_no');
            $table->string('budget_head')->nullable()->after('inv_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('credit_vouchers', function (Blueprint $table) {
            //
            $table->dropColumn('rin_no');
            $table->dropColumn('inv_id');
            $table->dropColumn('budget_head');
        });
    }
};
