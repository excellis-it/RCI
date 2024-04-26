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
        Schema::create('member_loan_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->references('id')->on('members')->nullable();     
            $table->string('loan_id')->references('id')->on('loans')->nullable();
            $table->string('loan_name')->nullable();
            $table->string('present_inst_no')->nullable();
            $table->string('tot_no_of_inst')->nullable();
            $table->string('inst_amount')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('balance')->nullable();
            $table->longText('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_loan_infos');
    }
};