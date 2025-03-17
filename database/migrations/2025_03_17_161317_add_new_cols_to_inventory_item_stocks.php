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
        Schema::table('inventory_item_stocks', function (Blueprint $table) {
            //
            $table->string('unit_price')->nullable()->after('quantity_balance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_item_stocks', function (Blueprint $table) {
            //
            $table->dropColumn('unit_price');
        });
    }
};
