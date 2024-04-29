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
        Schema::create('debit_vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inv_no')->references('id')->on('inventory_numbers')->nullable();
            $table->foreignId('item_id')->references('id')->on('items')->nullable();
            $table->string('quantity')->nullable();
            $table->string('voucher_no')->nullable();
            $table->date('voucher_date')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debit_vouchers');
    }
};
