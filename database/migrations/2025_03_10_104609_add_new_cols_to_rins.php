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
        Schema::table('rins', function (Blueprint $table) {
            //
            $table->string('invoice_no')->nullable()->after('store_received_date');
            $table->string('invoice_date')->nullable()->after('invoice_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rins', function (Blueprint $table) {
            //
            $table->dropColumn('invoice_no');
            $table->dropColumn('invoice_date');
        });
    }
};
