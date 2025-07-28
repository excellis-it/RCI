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
            $table->decimal('ups_10_per_rec', 10, 2)->nullable()->after('id');
            $table->decimal('upsg_10_per', 10, 2)->nullable()->after('ups_10_per_rec');
            $table->decimal('upsg_arr_10_per', 10, 2)->nullable()->after('upsg_10_per');
            $table->decimal('ups_arr_10_per', 10, 2)->nullable()->after('upsg_arr_10_per');
            $table->decimal('ups_adj_10_per', 10, 2)->nullable()->after('ups_arr_10_per');
            $table->decimal('upsg_adj_10_per', 10, 2)->nullable()->after('ups_adj_10_per');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_monthly_data_debits', function (Blueprint $table) {
            $table->dropColumn([
                'ups_10_per_rec',
                'upsg_10_per',
                'ups_arr_10_per',
                'upsg_arr_10_per',
                'ups_adj_10_per',
                'upsg_adj_10_per',
            ]);
        });
    }
};
