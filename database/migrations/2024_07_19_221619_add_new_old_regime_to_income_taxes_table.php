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
        Schema::table('income_taxes', function (Blueprint $table) {
            //
            $table->string('old_regime')->nullable()->after('record_add_date');
            $table->string('new_regime')->nullable()->after('old_regime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('income_taxes', function (Blueprint $table) {
            //
            $table->dropColumn('old_regime');
            $table->dropColumn('new_regime');
        });
    }
};
