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
        Schema::table('pay_details', function (Blueprint $table) {
             $table->decimal('upsc_10', 10, 2)->nullable()->after('nps');
            $table->decimal('ups_10_per_rec', 10, 2)->nullable()->after('upsc_10');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pay_details', function (Blueprint $table) {
            $table->dropColumn(['upsc_10', 'ups_10_per_rec']);
        });
    }
};
