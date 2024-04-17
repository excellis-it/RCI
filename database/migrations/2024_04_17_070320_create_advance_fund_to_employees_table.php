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
        Schema::create('advance_fund_to_employees', function (Blueprint $table) {
            $table->id();
            $table->string('pc_no')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('name')->nullable();
            $table->string('desig')->nullable();
            $table->string('basic')->nullable();
            $table->string('group')->nullable();
            $table->string('division')->nullable();
            $table->string('adv_no')->nullable();
            $table->date('adv_date')->nullable();
            $table->string('adv_amount')->nullable();
            $table->foreignId('project_id')->references('id')->on('projects')->nullable();
            $table->string('chq_no')->nullable();
            $table->date('chq_date')->nullable(); 
            $table->foreignId('var_type_id')->references('id')->on('variable_types')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advance_fund_to_employees');
    }
};
