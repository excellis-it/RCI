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
        Schema::table('member_personal_infos', function (Blueprint $table) {
            $table->string('group')->nullable()->after('category');
            $table->string('division')->nullable()->after('group');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_personal_infos', function (Blueprint $table) {
            $table->dropColumn('group');
            $table->dropColumn('division');
        });
    }
};
