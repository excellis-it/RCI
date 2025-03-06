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
        Schema::table('member_loans', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('loan_info_id')->after('loan_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_loans', function (Blueprint $table) {
            //
            $table->dropColumn('loan_info_id');
        });
    }
};
