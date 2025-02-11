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
        Schema::table('member_debits', function (Blueprint $table) {
            //
            $table->string('cghs_arr')->nullable()->after('cgeis_arr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_debits', function (Blueprint $table) {
            //
            $table->dropColumn('cghs_arr');
        });
    }
};
