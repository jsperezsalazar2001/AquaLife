<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','addressUser',
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
        return $this->attributes['addressUser'];
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

    public function setAddressUser($addressUser){
        $this->attributes['addressUser'] = $addressUser;
    }

}
