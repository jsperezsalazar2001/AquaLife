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
            $table->text('size');
            $table->text('temperament');
            $table->integer('in_stock');
            $table->text('image');
            $table->bigInteger('wish_list_id')->unsigned()->default(0);
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
