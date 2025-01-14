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
            $table->date('invoice_date')->nullable()->after('invoice_no');
            $table->string('inventory_no')->nullable()->after('invoice_date');
            $table->unsignedBigInteger('supplier_id')->nullable()->after('inventory_no');
            $table->string('supply_order_no')->nullable()->after('supplier_id');
            $table->string('inspection_authority')->nullable()->after('supply_order_no');
            $table->string('contract_authority')->nullable()->after('inspection_authority');
            $table->string('contract_authority_date')->nullable()->after('contract_authority');
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
                'invoice_date',
                'inventory_no',
                'supplier_id',
                'supply_order_no',
                'inspection_authority',
                'contract_authority',
                'contract_authority_date'
            ]);
        });
    }
};
