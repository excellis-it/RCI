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
        Schema::table('pay_details', function (Blueprint $table) {
            $table->date('date')->nullable()->after('id');
            $table->string('npsc')->nullable()->after('da');
            $table->string('g_pay')->nullable()->after('npsc');
            $table->string('da_tpt')->nullable()->after('tpt');
            $table->string('dis_alw')->nullable()->after('wash_ajw');
            $table->string('nps')->nullable()->after('gpf');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pay_details', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('g_pay');
            $table->dropColumn('npsc');
            $table->dropColumn('da_tpt');
            $table->dropColumn('dis_alw');
            $table->dropColumn('nps');
        });
    }
};
