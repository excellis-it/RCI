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
        Schema::table('newspaper_allowances', function (Blueprint $table) {
             $table->bigInteger('designation_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newspaper_allowances', function (Blueprint $table) {
             $table->dropColumn('designation_id');
        });
    }
};
