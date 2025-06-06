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
            $table->decimal('licence_fee')->nullable()->after('tpt_rec');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_monthly_data_debits', function (Blueprint $table) {
            $table->dropColumn('licence_fee');
        });
    }
};
