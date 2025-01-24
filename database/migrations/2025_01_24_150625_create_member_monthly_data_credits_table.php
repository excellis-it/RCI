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
        Schema::create('member_monthly_data_credits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('month');
            $table->string('year');
            $table->date('apply_date');
            $table->text('pay')->nullable();
            $table->text('da')->nullable();
            $table->text('tpt')->nullable();
            $table->text('cr_rent')->nullable();
            $table->text('g_pay')->nullable();
            $table->text('hra')->nullable();
            $table->text('da_on_tpt')->nullable();
            $table->text('cr_elec')->nullable();
            $table->text('fpa')->nullable();
            $table->text('s_pay')->nullable();
            $table->text('pua')->nullable();
            $table->text('hindi')->nullable();
            $table->text('cr_water')->nullable();
            $table->text('add_inc2')->nullable();
            $table->text('npa')->nullable();
            $table->text('deptn_alw')->nullable();
            $table->text('misc1')->nullable();
            $table->text('var_incr')->nullable();
            $table->text('wash_alw')->nullable();
            $table->text('dis_alw')->nullable();
            $table->text('misc2')->nullable();
            $table->text('spl_incentive')->nullable();
            $table->text('incentive')->nullable();
            $table->text('variable_amount')->nullable();
            $table->text('arrs_pay_alw')->nullable();
            $table->text('risk_alw')->nullable();
            $table->text('landline_allow')->nullable();
            $table->text('mobile_allow')->nullable();
            $table->text('broad_band_allow')->nullable();
            $table->text('tot_credits')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_monthly_data_credits');
    }
};
