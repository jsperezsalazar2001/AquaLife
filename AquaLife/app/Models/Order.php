<?php
// Created by: Yhoan Alejandro Guzman

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //attributes id, name, category, price, created_at, updated_at
    //protected $fillable = ['payment_type', 'total_price'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getPaymentType()
    {
        return $this->attributes['payment_type'];
    }

    public function setPaymentType($payment_type)
    {
        $this->attributes['payment_type'] = $payment_type;
    }

    public function getTotalPrice()
    {
        return $this->attributes['total_price'];
    }

    public function setTotalPrice($total_price)
    {
        $this->attributes['total_price'] = $total_price;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }

    public function getUserId(){
		return $this->attributes['user_id'];
	}

	public function setUserId($user_id){
		$this->attributes['user_id'] = $user_id;
    }

    public function fish(){
        return $this->hasMany(FishOrder::class);
    }

    public function accessory(){
        return $this->hasMany(AccessoryOrder::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}