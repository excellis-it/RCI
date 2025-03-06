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
        Schema::table('rins', function (Blueprint $table) {
            //
            $table->string('round_type')->default(0)->after('total_amount')->comment('0: None, 1: off, 2: to');
            $table->string('round_settle_amount')->default(0)->after('round_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rins', function (Blueprint $table) {
            //
            $table->dropColumn('round_type');
            $table->dropColumn('round_settle_amount');
        });
    }
};
