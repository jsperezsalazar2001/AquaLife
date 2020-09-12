<?php
//Created by: Yhoan Alejandro Guzman
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Fish extends Model
{
    protected $fillable = ['name', 'species', 'price', 'family', 'color', 'size', 'temperament'];

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

    public function getSpecies()
    {
        return $this->attributes['species'];
    }

    public function setSpecies($species)
    {
        $this->attributes['species'] = $species;
    }

    public function getFamily()
    {
        return $this->attributes['family'];
    }

    public function setFamily($family)
    {
        $this->attributes['family'] = $family;
    }

    public function getColor()
    {
        return $this->attributes['color'];
    }

    public function setColor($color)
    {
        $this->attributes['color'] = $color;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getSize()
    {
        return $this->attributes['size'];
    }

    public function setSize($size)
    {
        $this->attributes['size'] = $size;
    }

    public function getTemperament()
    {
        return $this->attributes['temperament'];
    }

    public function setTemperament($temperament)
    {
        $this->attributes['temperament'] = $temperament;
    }

    
    public function getInStock()
    {
        return $this->attributes['in_stock'];
    }

    public function setInStock($in_stock)
    {
        $this->attributes['in_stock'] = $in_stock;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getWishlistId(){
        return $this->attributes['wish_list_id']; 
    }

    public function setWishlistId($wish_list_id){
        $this->attributes['wish_list_id'] = $wish_list_id; 
    }

    public function wishLists(){
        return $this->belongsToMany(WishList::class,'wish_lists_fish','fish_id','wish_lists_id');
    }
    
    public static function validate(Request $request)
    {
        $request->validate([
            "name" => ['required','string','min:1','max:255'],
            "species" => ['required','string','min:1','max:255'],
            "family" => ['required','string','min:1','max:255'],
            "color" => ['required','string','min:1','max:255'],
            "price" => ['required','numeric','gt:0','between:0.0001,999999999999999.9999'],
            "size" => ['required','string','min:1','max:255'],
            "temperament" => ['required','string','min:1','max:255'],
            "in_stock" => ['required', 'numeric'],
            "image" => ['required', 'file']
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            return $name;
        }
    }

}