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
        Schema::table('advance_fund_to_employees', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advance_fund_to_employees', function (Blueprint $table) {
            $table->dropColumn('member_id');   // Drops the column
        });
    }
};
