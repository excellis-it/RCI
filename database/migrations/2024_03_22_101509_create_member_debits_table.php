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
        Schema::create('member_debits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->references('id')->on('members')->nullable();      
            $table->string('gpa_sub')->nullable();
            $table->string('eol')->nullable();
            $table->string('rent')->nullable();
            $table->string('lf_arr')->nullable();
            $table->string('tada')->nullable();
            $table->string('hba')->nullable();
            $table->string('misc1')->nullable();
            $table->string('gpf_rec')->nullable();
            $table->string('i_tax')->nullable();
            $table->string('elec')->nullable();
            $table->string('elec_arr')->nullable();
            $table->string('medi')->nullable();
            $table->string('pc')->nullable();
            $table->string('misc2')->nullable();
            $table->string('gpf_arr')->nullable();
            $table->string('ecess')->nullable();
            $table->string('water')->nullable();
            $table->string('water_arr')->nullable();
            $table->string('ltc')->nullable();
            $table->string('fadv')->nullable();
            $table->string('misc3')->nullable();
            $table->string('cgegis')->nullable();
            $table->string('cda')->nullable();
            $table->string('furn')->nullable();
            $table->string('furn_arr')->nullable();
            $table->string('car')->nullable();
            $table->string('hra_rec')->nullable();
            $table->string('tot_debits')->nullable();
            $table->string('cghs')->nullable();
            $table->string('ptax')->nullable();
            $table->string('cmg')->nullable();
            $table->string('pli')->nullable();
            $table->string('scooter')->nullable();
            $table->string('tpt_rec')->nullable();
            $table->string('net_pay')->nullable();
            $table->longText('basic')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_debits');
    }
};