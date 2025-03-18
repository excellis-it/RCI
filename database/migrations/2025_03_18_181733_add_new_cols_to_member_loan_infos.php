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
        Schema::table('member_loan_infos', function (Blueprint $table) {
            //
            $table->string('recovery_type')->nullable()->after('balance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_loan_infos', function (Blueprint $table) {
            //
            $table->dropColumn('recovery_type');
        });
    }
};
