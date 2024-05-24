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
        Schema::create('quarter_charges', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('grade_pay')->unsigned()->nullable();
            $table->string('license_pay')->nullable();
            $table->string('quarter_type')->nullable();
            $table->string('quarter_charge')->nullable();
            $table->boolean('status')->default(0)->comment('0=Inactive, 1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quarter_charges');
    }
};
