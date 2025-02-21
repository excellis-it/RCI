<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToItemCodeNamesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('item_code_names', function (Blueprint $table) {
            $table->string('uom')->after('name');
            $table->integer('nc_status')->after('uom')->nullable();
            $table->integer('au_status')->after('nc_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_code_names', function (Blueprint $table) {
            $table->dropColumn(['uom', 'nc_status', 'au_status']);
        });
    }
}
