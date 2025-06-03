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
            $table->decimal('licence_fee')->default(0)->after('npg_arrs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_monthly_data_credits', function (Blueprint $table) {
            $table->dropColumn('licence_fee');
        });
    }
};
