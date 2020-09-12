<?php
// Created by: Daniel Felipe Gomez MArtinez

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
// use App\Models\Fish;

/**
 * 
 */
class WishList extends  Model
{
	protected $fillable = ['user_id','fish_id']; // add 'fish_id'
	
	public function getId(){
		return $this->attributes['id'];
	}

	public function getUserId(){
		return $this->attributes['user_id'];
	}

	public function setUserId($user_id){
		$this->attributes['user_id'] = $user_id;
	}

	public function getFishId(){
		return $this->attributes['fish_id'];
	}

	public function setFishId($fish_id){
		$this->attributes['fish_id'] = $fish_id;
	}
	
	public function user(){
		return $this->belongsTo(User::class);
	}

	public function fish(){
		return $this->belongsToMany(Fish::class,'wish_lists_fish','wish_lists_id','fish_id');
	}
	
}