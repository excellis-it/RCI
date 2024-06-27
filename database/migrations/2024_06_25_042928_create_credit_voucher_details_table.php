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
        Schema::create('credit_voucher_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('credit_voucher_id')->unsigned()->nullable();
            $table->bigInteger('item_code_id')->unsigned()->nullable();
            $table->bigInteger('inv_no')->unsigned()->nullable();  
            $table->string('description')->nullable();
            $table->string('uom')->nullable();
            $table->string('item_type')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('supply_order_no')->nullable();
            $table->unsignedBigInteger('rin')->nullable();
            $table->string('order_type')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('total_price', 15, 2)->default(0);
            $table->string('consigner')->nullable();
            $table->string('cost_debatable')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_voucher_details');
    }
};
