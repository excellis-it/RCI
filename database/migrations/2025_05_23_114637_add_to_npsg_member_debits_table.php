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
        Schema::table('member_debits', function (Blueprint $table) {
            $table->text('nps_10_rec')->default(0)->after('npsg_arr');
            $table->text('nps_10_arr')->default(0)->after('nps_10_rec');
            $table->text('nps_14_adj')->default(0)->after('nps_10_arr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_debits', function (Blueprint $table) {
            $table->dropColumn('nps_10_rec');
            $table->dropColumn('nps_10_arr');
            $table->dropColumn('nps_14_adj');
        });
    }
};
