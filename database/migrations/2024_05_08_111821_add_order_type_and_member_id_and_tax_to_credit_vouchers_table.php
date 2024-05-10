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
        Schema::table('credit_vouchers', function (Blueprint $table) {
            $table->string('order_type')->nullable()->after('rin');
            $table->unsignedBigInteger('member_id')->nullable()->after('order_type');
            $table->decimal('tax', 10, 2)->nullable()->after('member_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('credit_vouchers', function (Blueprint $table) {
            $table->dropColumn('order_type');
            $table->dropColumn('member_id');
            $table->dropColumn('tax');
        });
    }
};
