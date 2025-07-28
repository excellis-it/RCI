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
        Schema::create('paybill_trackings', function (Blueprint $table) {
            $table->id();

            $table->string('e_status'); // e.g. 'draft', 'submitted'
            $table->enum('generate_by', ['member', 'category']);
            $table->string('month'); // or $table->tinyInteger('month');
            $table->year('year');
            $table->string('account_officer_sign');

            $table->unsignedBigInteger('member_id')->nullable();
            $table->string('category')->nullable(); // or use foreign key if referring to category table

            $table->string('dv_number')->nullable(); // DV Number field
            $table->boolean('status')->default(false); // e.g. 0 = inactive, 1 = active

            $table->timestamps();

            // Optional: Foreign key constraint if member_id references users or members table
            // $table->foreign('member_id')->references('id')->on('members')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paybill_trackings');
    }
};
