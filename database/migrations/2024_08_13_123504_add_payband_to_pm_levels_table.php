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
        Schema::table('pm_levels', function (Blueprint $table) {
            $table->unsignedBigInteger('payband')->nullable()->after('id');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pm_levels', function (Blueprint $table) {
            $table->dropColumn('payband');
        });
    }
};
