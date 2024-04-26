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
        Schema::create('inventory_numbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_type_id')->references('id')->on('item_types')->nullable();
            $table->foreignId('holder_id')->references('id')->on('members')->nullable();
            $table->foreignId('group_id')->references('id')->on('groups')->nullable();
            $table->foreignId('inventory_project_id')->references('id')->on('inventory_projects')->nullable();
            $table->string('number')->nullable();
            $table->boolean('status')->default(1)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_numbers');
    }
};
