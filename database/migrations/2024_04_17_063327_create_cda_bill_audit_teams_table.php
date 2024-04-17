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
        Schema::create('cda_bill_audit_teams', function (Blueprint $table) {
            $table->id();
            $table->string('adv_no')->nullable();
            $table->date('adv_date')->nullable();
            $table->string('adv_amount')->nullable();
            $table->foreignId('project_id')->references('id')->on('projects')->nullable();  
            $table->string('var_no')->nullable();
            $table->date('var_date')->nullable();  
            $table->string('var_amount')->nullable();
            $table->foreignId('var_type_id')->references('id')->on('variable_types')->nullable();  
            $table->string('chq_no')->nullable();
            $table->date('chq_date')->nullable();  
            $table->string('crv_no')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cda_bill_audit_teams');
    }
};
