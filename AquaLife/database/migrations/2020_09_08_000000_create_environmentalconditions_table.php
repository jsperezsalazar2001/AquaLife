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
            $table->decimal('ph_lr', 10, 2);
            $table->decimal('ph_hr', 10, 2);
            $table->decimal('temperature_lr', 10, 2);
            $table->decimal('temperature_hr', 10, 2);
            $table->decimal('hardness_lr', 10, 2);
            $table->decimal('hardness_hr', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('environmental_conditions');
    }
    
}