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
             $table->decimal('upsc_10', 12, 2)->nullable()->after('id');
            $table->decimal('upsg_arrs_10', 12, 2)->nullable()->after('upsc_10');
            $table->decimal('upsgcr_adj_10', 12, 2)->nullable()->after('upsg_arrs_10');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_monthly_data_credits', function (Blueprint $table) {
            $table->dropColumn(['upsc_10', 'upsg_arrs_10', 'upsgcr_adj_10']);
        });
    }
};
