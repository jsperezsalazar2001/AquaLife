<?php
// Created by: Juan Sebastián Pérez Salazar

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Accessory extends Model
{
    //attributes id, name, category, price, created_at, updated_at
    protected $fillable = ['name', 'category', 'price', 'image'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getCategory()
    {
        return $this->attributes['category'];
    }

    public function setCategory($category)
    {
        $this->attributes['category'] = $category;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getImage()
    {
        return $this->attributes['price'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public static function validate(Request $request)
    {
        $request->validate([
            "name" => ['required', 'string', 'min:1', 'max:255'],
            "category" => ['required', 'string', 'min:1', 'max:255'],
            "price" => ['required', 'numeric', 'gt:0'],
            "image" => ['required', 'string', 'min:1', 'max:255']
        ]);
    }
}
