<?php
// Created by: Daniel Felipe Gomez Martinez

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class WishListFish extends Pivot
{
	//attributes id, wish_list_id, fish_id, created_at, updated_at
    public function getId(){
		return $this->attributes['id'];
	}

	public function getWishListId(){
		return $this->attributes['wish_list_id'];
	}

	public function setWishListId($wish_list_id){
		$this->attributes['wish_list_id'] = $wish_list_id;
	}

	public function getFishId(){
		return $this->attributes['fish_id'];
	}

	public function setFishId($fish_id){
		$this->attributes['fish_id'] = $fish_id;
	}

}