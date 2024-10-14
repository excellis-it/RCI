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
        Schema::create('conversion_vouchers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inv_no')->unsigned()->nullable(); 
            $table->bigInteger('item_id')->unsigned()->nullable(); 
            $table->string('quantity')->nullable();
            $table->string('voucher_no')->nullable();
            $table->date('voucher_date')->nullable();
            $table->string('voucher_type')->nullable();
            $table->string('transfer_voucher_number')->nullable();
            $table->string('strike_item_code')->nullable();
            $table->string('strike_ledger')->nullable();
            $table->string('strike_description')->nullable();
            $table->string('strike_c_nc')->nullable();
            $table->string('strike_quantity')->nullable();
            $table->string('strike_rate')->nullable();
            $table->string('brought_item_code')->nullable();
            $table->string('brought_ledger')->nullable();
            $table->string('brought_description')->nullable();
            $table->string('brought_c_nc')->nullable();
            $table->string('brought_quantity')->nullable();
            $table->string('brought_rate')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversion_vouchers');
    }
};
