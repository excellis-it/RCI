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
        Schema::create('inventory_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name')->nullable();
            $table->string('sanction_amount')->nullable();  
            $table->bigInteger('sanction_authority')->unsigned()->nullable();
            $table->string('pdc')->nullable();  
            $table->bigInteger('project_director')->unsigned()->nullable();
            $table->string('entry_date')->nullable();  
            $table->string('end_date')->nullable();  
            $table->boolean('status')->default(1)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_projects');
    }
};
