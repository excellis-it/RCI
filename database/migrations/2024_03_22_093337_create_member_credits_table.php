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
        Schema::create('member_credits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->references('id')->on('members')->nullable();      
            $table->string('pay')->nullable(); 
            $table->string('da')->nullable();  
            $table->string('tpt')->nullable();      
            $table->string('cr_rent')->nullable();  
            $table->string('g_pay')->nullable();     
            $table->string('hra')->nullable();  
            $table->string('da_on_tpt')->nullable();  
            $table->string('cr_elec')->nullable();  
            $table->string('fpa')->nullable();  
            $table->string('s_pay')->nullable();  
            $table->string('hindi')->nullable();
            $table->string('cr_water')->nullable();    
            $table->string('2_add_inc')->nullable();  
            $table->string('npa')->nullable();  
            $table->string('deptn_alw')->nullable();  
            $table->string('misc1')->nullable();  
            $table->string('var_incr')->nullable();  
            $table->string('wash_alw')->nullable();
            $table->string('dis_alw')->nullable(); 
            $table->string('misc2')->nullable();   
            $table->string('risk_alw')->nullable();  
            $table->string('tot_credits')->nullable(); 
            $table->longText('remarks')->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_credits');
    }
};
