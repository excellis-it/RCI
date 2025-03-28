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
        Schema::create('income_tax_arrears', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('date')->nullable();
            $table->string('name')->nullable();
            $table->string('amt')->nullable();
            $table->string('cps')->nullable();
            $table->string('i_tax')->nullable();
            $table->string('cghs')->nullable();
            $table->string('gmc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_tax_arrears');
    }
};
