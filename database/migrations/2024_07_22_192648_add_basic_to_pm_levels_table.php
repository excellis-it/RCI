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
            //
            $table->string('basic')->nullable()->after('value');
            $table->string('year')->nullable()->after('basic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pm_levels', function (Blueprint $table) {
            //
            $table->dropColumn('basic');
            $table->dropColumn('year');
        });
    }
};
