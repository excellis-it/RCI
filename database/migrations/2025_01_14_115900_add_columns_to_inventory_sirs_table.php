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
            $table->string('demand_no')->nullable()->after('sir_date');
            $table->date('demand_date')->nullable()->after('demand_no');
            $table->string('invoice_no')->nullable()->after('demand_date');
            $table->string('inventory_no')->nullable()->after('invoice_no');
            $table->unsignedBigInteger('supplier_id')->nullable()->after('inventory_no');
            $table->string('supply_order_no')->nullable()->after('supplier_id');
            $table->string('inspection_authority')->nullable()->after('supply_order_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_sirs', function (Blueprint $table) {
            //
            $table->dropColumn([
                'demand_no',
                'demand_date',
                'invoice_no',
                'inventory_no',
                'supplier_id',
                'supply_order_no',
                'inspection_authority',
            ]);
        });
    }
};
