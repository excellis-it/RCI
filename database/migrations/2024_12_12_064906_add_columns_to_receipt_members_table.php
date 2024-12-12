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
        Schema::table('receipt_members', function (Blueprint $table) {
            $table->decimal('amount', 10, 2)->nullable()->after('member_id');
            $table->string('bill_ref')->nullable()->after('amount');
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
        Schema::table('receipt_members', function (Blueprint $table) {
            $table->dropColumn(['amount', 'bill_ref', 'cheq_no', 'cheq_date']);
        });
    }
};
