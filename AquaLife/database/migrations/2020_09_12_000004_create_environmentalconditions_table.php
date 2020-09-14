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
            $table->unsignedDecimal('ph_lr', 19, 2);
            $table->unsignedDecimal('ph_hr', 19, 2);
            $table->unsignedDecimal('temperature_lr', 19, 2);
            $table->unsignedDecimal('temperature_hr', 19, 2);
            $table->unsignedDecimal('hardness_lr', 19, 2);
            $table->unsignedDecimal('hardness_hr', 19, 2);
            $table->bigInteger('fish_id')->unsigned()->unique();
            $table->foreign('fish_id')->references('id')->on('fish');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('environmental_conditions');
    }
    
}