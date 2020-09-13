<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class WishListFish extends Pivot
{
    public function getId(){
		return $this->attributes['id'];
	}

	public function getWishListId(){
		return $this->attributes['wish_list_id '];
	}
}