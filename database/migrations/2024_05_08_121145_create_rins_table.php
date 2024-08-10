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
        Schema::create('rins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->string('rin_no')->nullable();
            $table->string('description')->nullable();
            $table->string('received_quantity')->nullable();
            $table->string('accepted_quantity')->nullable();
            $table->string('rejected_quantity')->nullable();
            $table->string('remarks')->nullable();
            $table->string('nc_status')->nullable();
            $table->string('au_status')->nullable();
            $table->string('unit_cost')->nullable();
            $table->string('total_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rins');
    }
};
