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
        Schema::table('member_newspaper_allowances', function (Blueprint $table) {
            $table->string('duration')->nullable()->after('id');
            $table->string('month_duration')->nullable()->after('duration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_newspaper_allowances', function (Blueprint $table) {
            $table->dropColumn('duration');
              $table->dropColumn('month_duration');
        });
    }
};
