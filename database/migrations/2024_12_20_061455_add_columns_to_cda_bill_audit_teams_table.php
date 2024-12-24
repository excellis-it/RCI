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
        Schema::table('cda_bill_audit_teams', function (Blueprint $table) {
            $table->unsignedBigInteger('settle_id')->nullable()->after('id'); // Adjust 'after' as needed
            $table->unsignedBigInteger('member_id')->nullable()->after('settle_id');
            $table->decimal('bill_amount', 15, 2)->nullable()->after('member_id');
            $table->unsignedBigInteger('variable_id')->nullable()->after('bill_amount');

            // If needed, add foreign key constraints
            // $table->foreign('settle_id')->references('id')->on('some_table')->onDelete('cascade');
            // $table->foreign('member_id')->references('id')->on('some_table')->onDelete('cascade');
            // $table->foreign('variable_id')->references('id')->on('some_table')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cda_bill_audit_teams', function (Blueprint $table) {
            $table->dropColumn(['settle_id', 'member_id', 'bill_amount', 'variable_id']);
        });
    }
};
