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
        Schema::create('credit_vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_code_id')->references('id')->on('items')->nullable();
            $table->string('voucher_no')->nullable();
            $table->date('voucher_date')->nullable();
            $table->foreignId('inv_no')->references('id')->on('inventory_numbers')->nullable();
            $table->string('description')->nullable();
            $table->string('uom')->nullable();
            $table->string('item_type')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('supply_order_no')->nullable();
            $table->string('rin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_vouchers');
    }
};
