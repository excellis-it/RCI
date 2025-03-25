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
            $table->double('gst_percent')->nullable()->default(0.0)->after('quantity_balance');
            $table->double('gst_amount')->nullable()->default(0.0)->after('gst_percent');
            $table->double('discount_percent')->nullable()->default(0.0)->after('gst_amount');
            $table->double('discount_amount')->nullable()->default(0.0)->after('discount_percent');
            $table->string('ledger_no')->nullable()->after('unit_price');
            $table->string('page_no')->nullable()->after('ledger_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_item_stocks', function (Blueprint $table) {
            //
            $table->dropColumn('gst_percent');
            $table->dropColumn('gst_amount');
            $table->dropColumn('discount_percent');
            $table->dropColumn('discount_amount');
            $table->dropColumn('ledger_no');
            $table->dropColumn('page_no');
        });
    }
};
