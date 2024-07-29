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
            //
            $table->string('landline_no')->nullable()->after('old_basic');
            $table->string('mobile_no')->nullable()->after('landline_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_personal_infos', function (Blueprint $table) {
            //
            $table->dropColumn('landline_no');
            $table->dropColumn('mobile_no');
        });
    }
};
