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
        Schema::table('advance_settlements', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id')->nullable()->after('id');
            $table->decimal('balance', 10, 2)->nullable()->after('bill_amount');
            $table->string('firm')->nullable()->after('balance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advance_settlements', function (Blueprint $table) {
            $table->dropColumn('member_id');   // Remove the column
            $table->dropColumn('balance');   // Remove the column
            $table->dropColumn('firm');
        });
    }
};
