<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('species');
            $table->text('family');
            $table->text('color');
            $table->unsignedDecimal('price', 19, 4);
            $table->enum('size', ['Small', 'Medium', 'Large']);
            $table->enum('temperament', ['Passive', 'Agressive']);
            $table->integer('in_stock');
            $table->text('image');
            $table->bigInteger('environmental_condition_id')->unsigned()->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fish');
    }
}
