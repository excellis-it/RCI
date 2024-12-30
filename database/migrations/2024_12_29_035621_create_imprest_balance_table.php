<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imprest_balance', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->decimal('cash_in_hand', 15, 2)->default(0); // Amount fields
            $table->decimal('opening_cash_in_hand', 15, 2)->default(0);
            $table->decimal('cash_in_bank', 15, 2)->default(0);
            $table->decimal('opening_cash_in_bank', 15, 2)->default(0);
            $table->decimal('adv_fund', 15, 2)->default(0);
            $table->decimal('adv_settle', 15, 2)->default(0);
            $table->decimal('cda_bill', 15, 2)->default(0);
            $table->decimal('cda_receipt', 15, 2)->default(0);
            $table->decimal('adv_fund_outstand', 15, 2)->default(0);
            $table->decimal('adv_settle_outstand', 15, 2)->default(0);
            $table->decimal('cda_bill_outstand', 15, 2)->default(0);
            $table->unsignedBigInteger('adv_fund_id')->nullable(); // Foreign key references
            $table->unsignedBigInteger('adv_settle_id')->nullable();
            $table->unsignedBigInteger('cda_bill_id')->nullable();
            $table->unsignedBigInteger('cda_receipt_id')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->timestamps(); // Created_at and updated_at

            // Add foreign key constraints if needed
            // $table->foreign('adv_fund_id')->references('id')->on('some_table')->onDelete('cascade');
            // $table->foreign('adv_settle_id')->references('id')->on('some_table')->onDelete('cascade');
            // $table->foreign('cda_bill_id')->references('id')->on('some_table')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imprest_balance');
    }
};
