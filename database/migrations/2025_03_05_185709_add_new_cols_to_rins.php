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
            $table->string('store_received_date')->nullable()->after('budget_head_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rins', function (Blueprint $table) {
            //
            $table->dropColumn('store_received_date');
        });
    }
};
