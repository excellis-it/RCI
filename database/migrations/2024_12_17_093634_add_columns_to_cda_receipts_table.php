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
        Schema::table('cda_receipts', function (Blueprint $table) {
            $table->bigInteger('bill_id')->nullable();
            $table->string('rct_vr_no')->nullable();
            $table->date('rct_vr_date')->nullable();
            $table->string('dv_no')->nullable();
            $table->decimal('rct_vr_amount', 10, 2)->nullable();
            $table->text('remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cda_receipts', function (Blueprint $table) {
            $table->dropColumn([
                'bill_id',
                'rct_vr_no',
                'rct_vr_date',
                'dv_no',
                'rct_vr_amount',
                'remark'
            ]);
        });
    }
};
