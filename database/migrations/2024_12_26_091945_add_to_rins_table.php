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
        Schema::table('rins', function (Blueprint $table) {
            $table->string('discount')->nullable()->after('gst_amount');
            $table->string('discount_amount')->nullable()->after('discount');
            $table->enum('discount_type',['fixed', 'percentage'])->nullable()->after('discount_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rins', function (Blueprint $table) {
            $table->dropColumn('discount');
            $table->dropColumn('discount_amount');
            $table->dropColumn('discount_type');
        });
    }
};
