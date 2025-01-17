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
        Schema::create('inventory_item_balance', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_type');
            $table->unsignedBigInteger('item_id'); // Foreign key reference to the items table
            $table->string('item_code');
            $table->unsignedBigInteger('inv_id'); // Foreign key reference to the inventory table
            $table->integer('quantity')->default(0);
            $table->decimal('unit_cost', 10, 2)->default(0.00);
            $table->decimal('total_cost', 15, 2)->default(0.00);
            $table->decimal('gst_amount', 10, 2)->default(0.00);
            $table->decimal('discount_amount', 10, 2)->default(0.00);
            $table->decimal('total_amount', 15, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_item_balance');
    }
};
