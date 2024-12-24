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
        Schema::table('receipts', function (Blueprint $table) {
            $table->bigInteger('member_id')->nullable()->after('cheque_date');
            $table->string('member_name')->nullable()->after('member_id');
            $table->string('member_desig')->nullable()->after('member_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropColumn(['member_id', 'member_name', 'member_desig']);
        });
    }
};
