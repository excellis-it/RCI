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
        Schema::table('income_tax_savings', function (Blueprint $table) {
                $table->unsignedTinyInteger('month')->nullable()->change();
            $table->unsignedSmallInteger('year')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('income_tax_savings', function (Blueprint $table) {
            $table->unsignedTinyInteger('month')->nullable(false)->change();
            $table->unsignedSmallInteger('year')->nullable(false)->change();
        });
    }
};
