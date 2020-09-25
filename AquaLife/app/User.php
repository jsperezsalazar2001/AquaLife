<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address_user',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole()
    {
        return $this->attributes['role'];
    }

    public function getName(){
        return $this->attributes['name'];
    }

    public function getEmail(){
        return $this->attributes['email'];
    }

    public function getAddressUser(){
        return $this->attributes['address_user'];
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function setEmail($email){
        $this->attributes['email'] = $email; 
    }

    public function setAddressUser($address_user){
        $this->attributes['address_user'] = $address_user;
    }

     public function getWishlistId(){
        return $this->attributes['wish_list_id']; 
    }

    public function setWishlistId($wish_list_id){
        $this->attributes['wish_list_id'] = $wish_list_id; 
    }

    public function wishLists(){
        return $this->hasOne(WishList::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public static function validate(Request $request)
    {
        $request->validate([
            "name" => ['required','string','min:1','max:255'],
            'address_user' => ['required', 'string', 'max:255'],
            'email' => ['required','email',Rule::unique('users')->ignore($request->id)],
        ]);
    }
}
