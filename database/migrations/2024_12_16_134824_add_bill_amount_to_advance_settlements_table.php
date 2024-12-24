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
            $table->decimal('bill_amount', 10, 2)->nullable()->after('chq_date'); // or any other column type or attributes
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
            $table->dropColumn('bill_amount');
        });
    }
};
