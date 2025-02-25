<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropUnique(['email']); // Remove unique constraint from email
            $table->dropUnique(['phone']); // Remove unique constraint from phone
        });
    }

    public function down()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->unique('email'); // Restore unique constraint if needed
            $table->unique('phone');
        });
    }
};
