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
        Schema::create('member_monthly_data_debits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('month');
            $table->string('year');
            $table->date('apply_date');
            $table->text('gpa_sub')->nullable();
            $table->text('gpf_adv')->nullable();
            $table->text('eol')->nullable();
            $table->text('ccl')->nullable();
            $table->text('rent')->nullable();
            $table->text('lf_arr')->nullable();
            $table->text('tada')->nullable();
            $table->text('hba')->nullable();
            $table->text('hba_cur_instl')->nullable();
            $table->text('hba_total_instl')->nullable();
            $table->text('hba_adv')->nullable();
            $table->text('hba_int')->nullable();
            $table->text('hba_int_cur_instl')->nullable();
            $table->text('hba_int_total_instl')->nullable();
            $table->text('misc1')->nullable();
            $table->text('gpf_rec')->nullable();
            $table->text('i_tax')->nullable();
            $table->text('elec')->nullable();
            $table->text('elec_arr')->nullable();
            $table->text('medi')->nullable();
            $table->text('pc')->nullable();
            $table->text('misc2')->nullable();
            $table->text('gpf_arr')->nullable();
            $table->text('ecess')->nullable();
            $table->text('water')->nullable();
            $table->text('water_arr')->nullable();
            $table->text('ltc')->nullable();
            $table->text('fadv')->nullable();
            $table->text('fest_adv_prin_cur')->nullable();
            $table->text('fest_adv_total_cur')->nullable();
            $table->text('misc3')->nullable();
            $table->text('cgegis')->nullable();
            $table->text('cda')->nullable();
            $table->text('furn')->nullable();
            $table->text('furn_arr')->nullable();
            $table->text('car')->nullable();
            $table->text('car_adv')->nullable();
            $table->text('car_adv_prin_instl')->nullable();
            $table->text('car_adv_total_instl')->nullable();
            $table->text('car_int')->nullable();
            $table->text('hra_rec')->nullable();
            $table->text('tot_debits')->nullable();
            $table->text('cghs')->nullable();
            $table->text('ptax')->nullable();
            $table->text('cmg')->nullable();
            $table->text('pli')->nullable();
            $table->text('scooter')->nullable();
            $table->text('sco_adv')->nullable();
            $table->text('scot_adv_prin_instl')->nullable();
            $table->text('scot_adv_total_instl')->nullable();
            $table->text('sco_int')->nullable();
            $table->text('sco_adv_int_curr_instl')->nullable();
            $table->text('sco_adv_int_total_instl')->nullable();
            $table->text('comp_adv')->nullable();
            $table->text('comp_prin_curr_instl')->nullable();
            $table->text('comp_prin_total_instl')->nullable();
            $table->text('comp_adv_int')->nullable();
            $table->text('comp_int_curr_instl')->nullable();
            $table->text('comp_int_total_instl')->nullable();
            $table->text('comp_int')->nullable();
            $table->text('tpt_rec')->nullable();
            $table->text('net_pay')->nullable();
            $table->text('basic')->nullable();
            $table->text('leave_rec')->nullable();
            $table->text('ltc_rec')->nullable();
            $table->text('medical_rec')->nullable();
            $table->text('tada_rec')->nullable();
            $table->text('pension_rec')->nullable();
            $table->text('quarter_charges')->nullable();
            $table->text('cgeis_arr')->nullable();
            $table->text('cghs_arr')->nullable();
            $table->text('penal_intr')->nullable();
            $table->text('arrear_pay')->nullable();
            $table->text('npsg')->nullable();
            $table->text('npsg_arr')->nullable();
            $table->text('npsg_adj')->nullable();
            $table->text('society')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_monthly_data_debits');
    }
};
