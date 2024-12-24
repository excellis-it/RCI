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
        Schema::create('cheque_payment_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cheque_payments_id');
            $table->unsignedBigInteger('receipt_id')->nullable();
            $table->string('vr_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->unsignedBigInteger('member_id');
            $table->decimal('amount', 15, 2);
            $table->string('bill_ref')->nullable();
            $table->string('cheq_no')->nullable();
            $table->date('cheq_date')->nullable();
            $table->timestamps();

            $table->foreign('cheque_payments_id')->references('id')->on('cheque_payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cheque_payment_members');
    }
};
