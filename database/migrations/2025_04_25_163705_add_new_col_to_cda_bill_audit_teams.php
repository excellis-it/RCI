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
        Schema::table('cda_bill_audit_teams', function (Blueprint $table) {
            //
            $table->string('bill_voucher_no')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cda_bill_audit_teams', function (Blueprint $table) {
            //
            $table->dropColumn('bill_voucher_no');
        });
    }
};
