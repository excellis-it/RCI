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
        Schema::table('conversion_voucher_details', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('strike_inv_id')->nullable()->after('conversion_voucher_id');
            $table->unsignedBigInteger('strike_item_id')->nullable()->after('strike_inv_id');
            $table->decimal('strike_price', 10, 2)->nullable()->after('strike_item_id');
            $table->unsignedBigInteger('brought_inv_id')->nullable()->after('strike_rate');
            $table->unsignedBigInteger('brought_item_id')->nullable()->after('brought_inv_id');
            $table->decimal('brought_price', 10, 2)->nullable()->after('brought_item_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('conversion_voucher_details', function (Blueprint $table) {
            //
            $table->dropColumn([
                'strike_inv_id',
                'strike_item_id',
                'strike_price',
                'brought_inv_id',
                'brought_item_id',
                'brought_price',
            ]);
        });
    }
};
