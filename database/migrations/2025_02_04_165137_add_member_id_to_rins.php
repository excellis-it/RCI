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
            $table->unsignedBigInteger('member_id')->nullable()->after('desig_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rins', function (Blueprint $table) {
            //
            $table->dropColumn('member_id');
        });
    }
};
