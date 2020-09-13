<?php
// Created by: Juan Sebastián Pérez Salazar

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accessory;
use App\Models\Order;
class AccessoryOrder extends Model
{
    //attributes id, name, category, price, created_at, updated_at
    //protected $fillable = ['quantity', 'subtotal', 'accessory_id'];

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

    public function getAccessoryId(){
		return $this->attributes['accessory_id'];
	}

	public function setAccessoryId($accessory_id){
		$this->attributes['accessory_id'] = $accessory_id;
    }
    
    public function getOrderId(){
		return $this->attributes['order_id'];
	}

	public function setOrderId($order_id){
		$this->attributes['order_id'] = $order_id;
    }

    public function accessory(){
        return $this->belongsTo(Accessory::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}