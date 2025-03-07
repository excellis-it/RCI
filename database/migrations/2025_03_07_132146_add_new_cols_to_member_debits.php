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
            $table->decimal('nps_sub', 10, 2)->nullable()->after('gpf_adv');
            $table->decimal('nps_rec', 10, 2)->nullable()->after('nps_sub');
            $table->decimal('nps_arr', 10, 2)->nullable()->after('nps_rec');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_debits', function (Blueprint $table) {
            //
            $table->dropColumn('nps_sub');
            $table->dropColumn('nps_rec');
            $table->dropColumn('nps_arr');
        });
    }
};
