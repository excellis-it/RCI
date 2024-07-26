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
        Schema::create('member_families', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->string('father_mother_name')->nullable();
            $table->string('wife_hus_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('work_status')->nullable();
            $table->string('child1_name')->nullable();
            $table->string('child1_dob')->nullable();
            $table->string('child1_scll_name')->nullable();
            $table->string('child2_name')->nullable();
            $table->string('child2_dob')->nullable();
            $table->string('child2_scll_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_families');
    }
};
