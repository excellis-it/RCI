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
        Schema::table('member_monthly_data_credits', function (Blueprint $table) {
            $table->string('npsc')->nullable()->after('broad_band_allow');
            $table->string('npg_arrs')->nullable()->after('npsc');
            $table->string('npg_adj')->nullable()->after('npg_arrs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_monthly_data_credits', function (Blueprint $table) {
            $table->dropColumn('npsc');
            $table->dropColumn('npg_arrs');
            $table->dropColumn('npg_adj');
        });
    }
};
