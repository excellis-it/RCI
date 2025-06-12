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
    Schema::create('member_landlines', function (Blueprint $table) {
        $table->id();

        // Foreign key to members table
        $table->unsignedBigInteger('member_id');

        // Allowance fields
        $table->decimal('landline_amount', 10, 2)->default(0);
        $table->decimal('mobile_amount', 10, 2)->default(0);
        $table->decimal('broadband_amount', 10, 2)->default(0);
        $table->decimal('entitle_amount', 10, 2)->default(0);

        // Period fields
        $table->string('month', 20);
        $table->year('year');

        // Timestamps
        $table->timestamps();

        // Optional: Add foreign key constraint
        $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_landlines');
    }
};
