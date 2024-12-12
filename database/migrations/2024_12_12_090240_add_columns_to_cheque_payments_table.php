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
        Schema::table('cheque_payments', function (Blueprint $table) {
            $table->string('receipt_no')->nullable()->after('id');
            $table->string('vr_no')->nullable()->after('receipt_no');
            $table->date('vr_date')->nullable()->after('vr_no');
            $table->string('bill_ref')->nullable()->after('vr_date');
            $table->string('cheq_no')->nullable()->after('bill_ref');
            $table->date('cheq_date')->nullable()->after('cheq_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cheque_payments', function (Blueprint $table) {
            $table->dropColumn(['receipt_no', 'vr_no', 'vr_date', 'bill_ref', 'cheq_no', 'cheq_date']);
        });
    }
};
