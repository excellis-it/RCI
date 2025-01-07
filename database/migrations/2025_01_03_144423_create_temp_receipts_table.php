<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    public function up()
    {
        // Create the permanent temp_receipts table
        Schema::create('temp_receipts', function (Blueprint $table) {
            // Get the columns of the existing receipts table
            $columns = DB::getSchemaBuilder()->getColumnListing('receipts');

            // Add the columns dynamically to the temp_receipts table
            foreach ($columns as $column) {
                // Get column type
                $columnType = DB::getSchemaBuilder()->getColumnType('receipts', $column);

                // Check if the column is an auto-incrementing primary key
                if ($column === 'id') {
                    $table->bigIncrements($column); // Use bigIncrements for primary key
                } elseif ($columnType === 'bigint') {
                    $table->bigInteger($column)->nullable(); // Use bigInteger for bigint type columns
                } else {
                    $table->String($column)->nullable(); // Use other column types as they are
                }
            }
        });

        // Create the permanent temp_receipts_members table
        Schema::create('temp_receipt_members', function (Blueprint $table) {
            // Get the columns of the existing receipts_members table
            $columns = DB::getSchemaBuilder()->getColumnListing('receipt_members');

            // Add the columns dynamically to the temp_receipts_members table
            foreach ($columns as $column) {
                // Get column type
                $columnType = DB::getSchemaBuilder()->getColumnType('receipt_members', $column);

                // Check if the column is an auto-incrementing primary key
                if ($column === 'id') {
                    $table->bigIncrements($column); // Use bigIncrements for primary key
                } elseif ($columnType === 'bigint') {
                    $table->bigInteger($column)->nullable(); // Use bigInteger for bigint type columns
                } else {
                    $table->String($column)->nullable(); // Use other column types as they are
                }
            }
        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_receipts');
        Schema::dropIfExists('temp_receipt_members');
    }
};
