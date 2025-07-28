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
        Schema::table('members', function (Blueprint $table) {
            // Change column using raw SQL (recommended for MySQL for type conversion safety)
            DB::statement('ALTER TABLE members MODIFY pm_index DECIMAL(8,2) NULL');
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            // Revert to previous type (e.g., if it was string or integer)
            DB::statement('ALTER TABLE members MODIFY pm_index VARCHAR(255) NULL');
        });
    }
};
