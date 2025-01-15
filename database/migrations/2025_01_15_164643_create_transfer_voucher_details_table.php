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
        Schema::create('transfer_vouchers_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transfer_voucher_id');
            $table->unsignedBigInteger('issuing_inv_no');
            $table->string('issuing_division');
            $table->unsignedBigInteger('receiving_inv_no');
            $table->string('receiving_division');
            $table->unsignedBigInteger('strike_ledger_no');
            $table->string('strike_nomenclature');
            $table->integer('strike_quantity')->unsigned();
            $table->decimal('strike_rate', 10, 2);
            $table->unsignedBigInteger('brought_ledger_no');
            $table->string('brought_nomenclature');
            $table->integer('brought_quantity')->unsigned();
            $table->timestamps();

            // Add foreign key constraint if 'transfer_vouchers' table exists
            $table->foreign('transfer_voucher_id')
                ->references('id')
                ->on('transfer_vouchers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_vouchers_details');
    }
};
