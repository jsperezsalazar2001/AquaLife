<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * created by: Daniel Felipe Gomez Martinez
 */
class CreateWishListsTable extends Migration
{
	public function up(){
		Schema::create('wish_lists',function(Blueprint $table){
			$table->bigIncrements('id');
			$table->bigInteger('user_id')->unsigned()->unique();
			$table->foreign('user_id')->references('id')->on('users');
			$table->bigInteger('fish_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
    {
        Schema::dropIfExists('wish_lists');
    }
    
}