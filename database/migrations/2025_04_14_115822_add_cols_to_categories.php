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
        Schema::table('categories', function (Blueprint $table) {
            //
            $table->string('fund_type')->nullable()->after('gazetted');
            $table->string('med_ins')->nullable()->after('fund_type');
            $table->string('wel_sub')->nullable()->after('med_ins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('wel_sub');
            $table->dropColumn('med_ins');
            $table->dropColumn('fund_type');
        });
    }
};
