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
        Schema::table('member_monthly_data_debits', function (Blueprint $table) {
             $table->decimal('nps_14_adj', 10, 2)->nullable()->change();
             $table->decimal('npsg', 10, 2)->nullable()->change();
             $table->decimal('npsg_arr', 10, 2)->nullable()->change();
             $table->decimal('npsg_adj', 10, 2)->nullable()->change();
             $table->decimal('nps_10_arr', 10, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_monthly_data_debits', function (Blueprint $table) {
            //
        });
    }
};
