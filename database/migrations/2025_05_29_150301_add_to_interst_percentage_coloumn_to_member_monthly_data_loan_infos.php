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
        Schema::table('member_monthly_data_loan_infos', function (Blueprint $table) {
            $table->decimal('interst_percentage', 5, 2)->nullable()->after('balance'); // Note: Should be 'interest_percentage'
            $table->decimal('total_interest', 10, 2)->nullable()->after('interst_percentage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_monthly_data_loan_infos', function (Blueprint $table) {
            $table->dropColumn('interst_percentage');
            $table->dropColumn('total_interest');
        });
    }
};
