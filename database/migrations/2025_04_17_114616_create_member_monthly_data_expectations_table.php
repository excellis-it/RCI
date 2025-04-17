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
        Schema::create('member_monthly_data_expectations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('month');
            $table->year('year');
            $table->date('apply_date')->nullable();
            $table->string('rule_name');
            $table->decimal('percent', 5, 2)->nullable();
            $table->string('amount_year')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->string('amount_month')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_monthly_data_expectations');
    }
};
