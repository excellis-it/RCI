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
        Schema::create('member_monthly_data_loan_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('month');
            $table->year('year');
            $table->date('apply_date')->nullable();
            $table->unsignedBigInteger('loan_id')->nullable();
            $table->string('loan_name');
            $table->integer('present_inst_no')->nullable();
            $table->integer('tot_no_of_inst')->nullable();
            $table->decimal('inst_amount', 10, 2)->nullable();
            $table->decimal('inst_rate', 5, 2)->nullable();
            $table->decimal('total_amount', 12, 2)->nullable();
            $table->decimal('balance', 12, 2)->nullable();
            $table->string('recovery_type')->nullable();
            $table->decimal('penal_inst_rate', 5, 2)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_monthly_data_loan_infos');
    }
};
