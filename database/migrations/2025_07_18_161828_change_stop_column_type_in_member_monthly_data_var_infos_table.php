<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Step 1: Replace 'No' and 'Yes' with NULL
        DB::table('member_monthly_data_var_infos')
            ->whereIn('stop', ['No', 'Yes'])
            ->update(['stop' => null]);

        // Step 2: Change the column type to DATE (nullable to avoid crash on existing NULLs)
        Schema::table('member_monthly_data_var_infos', function (Blueprint $table) {
            $table->date('stop')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('member_monthly_data_var_infos', function (Blueprint $table) {
            $table->string('stop')->change();
        });
    }
};
