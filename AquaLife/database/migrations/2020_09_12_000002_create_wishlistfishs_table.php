<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * created by: Daniel Felipe Gomez Martinez
 */
class CreateWishListFishsTable extends Migration
{
	public function up(){
		Schema::create('wish_list_fish',function(Blueprint $table){
			$table->bigIncrements('id');
			$table->bigInteger('wish_list_id')->unsigned();
			$table->foreign('wish_list_id')->references('id')->on('wish_lists');
			$table->bigInteger('fish_id')->unsigned();
			$table->foreign('fish_id')->references('id')->on('fish');
			$table->unique(['wish_list_id', 'fish_id']);
			$table->timestamps();
		});
	}

	public function down()
    {
        Schema::dropIfExists('wish_list_fish');
    }
    
}