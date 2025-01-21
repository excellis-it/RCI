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
        Schema::table('member_original_recoveries', function (Blueprint $table) {
            //
            $table->string('ptax')->nullable()->after('ccs_sub');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_original_recoveries', function (Blueprint $table) {
            //
            $table->dropColumn('ptax');
        });
    }
};
