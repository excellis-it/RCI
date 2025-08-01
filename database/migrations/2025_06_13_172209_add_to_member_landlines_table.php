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
        Schema::table('member_landlines', function (Blueprint $table) {
             $table->decimal('total_amount', 10, 2)->default(0)->after('broadband_amount');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_landlines', function (Blueprint $table) {
            $table->dropColumn('total_amount');
        });
    }
};
