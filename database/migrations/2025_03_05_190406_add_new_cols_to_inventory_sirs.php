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
        Schema::table('inventory_sirs', function (Blueprint $table) {
            //
            $table->string('store_received_date')->nullable()->after('inspection_authority');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_sirs', function (Blueprint $table) {
            //
            $table->dropColumn('store_received_date');
        });
    }
};
