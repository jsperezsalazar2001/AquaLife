<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * created by: Daniel Felipe Gomez Martinez
 */
class CreateEnvironmentalconditionsTable extends Migration
{
    public function up(){
        Schema::create('environmental_conditions',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->decimal('ph_l_r', 10, 2);
            $table->decimal('ph_h_r', 10, 2);
            $table->decimal('temperature_l_r', 10, 2);
            $table->decimal('temperature_h_r', 10, 2);
            $table->decimal('hardness_l_r', 10, 2);
            $table->decimal('hardness_h_r', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('environmental_conditions');
    }
    
}