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
        Schema::table('item_codes', function (Blueprint $table) {
            //
            $table->integer('nc_status')->after('uom')->nullable();
            $table->integer('au_status')->after('nc_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_codes', function (Blueprint $table) {
            //
            $table->dropColumn('nc_status');
            $table->dropColumn('au_status');
        });
    }
};
