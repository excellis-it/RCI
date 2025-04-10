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
            $table->string('demand_no')->nullable()->after('sir_date');
            $table->string('demand_date')->nullable()->after('demand_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rins', function (Blueprint $table) {
            $table->dropColumn('demand_no');
            $table->dropColumn('demand_date');
        });
    }
};
