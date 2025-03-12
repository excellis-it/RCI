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
        Schema::table('inventory_numbers', function (Blueprint $table) {
            //
            $table->string('group_name')->nullable()->after('group_id');
            $table->string('desig_name')->nullable()->after('group_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_numbers', function (Blueprint $table) {
            //
            $table->dropColumn('group_name');
            $table->dropColumn('desig_name');
        });
    }
};
