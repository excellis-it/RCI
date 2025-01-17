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
            $table->after('contract_authority_date', function (Blueprint $table) {
                $table->unsignedBigInteger('item_id')->nullable();
                $table->string('description')->nullable();
                $table->integer('received_quantity')->nullable();
                $table->integer('accepted_quantity')->nullable();
                $table->integer('rejected_quantity')->nullable();
                $table->string('remarks')->nullable();
                $table->string('nc_status')->nullable();
                $table->string('au_status')->nullable();
                $table->decimal('unit_cost', 15, 2)->nullable();
                $table->decimal('total_cost', 15, 2)->nullable();
                $table->decimal('gst', 5, 2)->nullable();
                $table->decimal('gst_amount', 15, 2)->nullable();
                $table->decimal('discount', 5, 2)->nullable();
                $table->decimal('discount_amount', 15, 2)->nullable();
                $table->string('discount_type')->nullable();
                $table->decimal('total_amount', 15, 2)->nullable();
            });
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
                'item_id',
                'description',
                'received_quantity',
                'accepted_quantity',
                'rejected_quantity',
                'remarks',
                'nc_status',
                'au_status',
                'unit_cost',
                'total_cost',
                'gst',
                'gst_amount',
                'discount',
                'discount_amount',
                'discount_type',
                'total_amount',
            ]);
        });
    }
};
