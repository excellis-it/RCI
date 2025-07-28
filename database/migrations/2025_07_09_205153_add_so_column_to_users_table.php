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
        Schema::table('users', function (Blueprint $table) {
             $table->string('so')->nullable()->after('last_name'); // Add after name or wherever needed
             $table->bigInteger('designation_id')->nullable()->after('so'); // Add after name or wherever needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('so');
               $table->dropColumn('designation_id');
        });
    }
};
