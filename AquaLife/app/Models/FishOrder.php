<?php
// Created by: Yhoan Alejandro Guzman

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FishOrder extends Model
{
    //attributes id, name, category, price, created_at, updated_at
    protected $fillable = ['quantity', 'subtotal'];

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

    public function accessory(){
        return $this->belongsTo(Fish::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}