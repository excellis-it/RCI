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
        Schema::create('advance_settlements', function (Blueprint $table) {
            $table->id();
            $table->string('adv_no')->nullable();
            $table->date('adv_date')->nullable();
            $table->string('adv_amount')->nullable();
            $table->foreignId('project_id')->nullable();  
            $table->string('var_no')->nullable();
            $table->date('var_date')->nullable();
            $table->string('var_amount')->nullable();
            $table->foreignId('var_type_id')->nullable();
            $table->string('chq_no')->nullable();
            $table->date('chq_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advance_settlements');
    }
};
