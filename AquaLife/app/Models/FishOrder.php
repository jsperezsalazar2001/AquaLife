<?php
// Created by: Yhoan Alejandro Guzman

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fish;
use App\Models\Order;

class FishOrder extends Model
{
    //attributes id, quantity, category, subtotal, fish_id, 'order_id', created_at, updated_at

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getSubtotal()
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal($subtotal)
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function getFishId(){
		return $this->attributes['fish_id'];
	}

	public function setFishId($fish_id){
		$this->attributes['fish_id'] = $fish_id;
	}
    
    public function getOrderId(){
		return $this->attributes['order_id'];
	}

	public function setOrderId($order_id){
		$this->attributes['order_id'] = $order_id;
    }
    
    public function fish(){
        return $this->belongsTo(Fish::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}