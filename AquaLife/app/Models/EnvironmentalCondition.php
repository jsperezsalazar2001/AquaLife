<?php
// Created by: Daniel Felipe Gomez Martinez

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EnvironmentalCondition extends Model
{
    //attributes id, ph_l_r, ph_h_r, temperature_l_r,temperatura_h_r,hardness_l_r,hardness_h_r, created_at, updated_at
    protected $fillable = ['ph_l_r', 'ph_h_r', 'temperature_l_r', 'temperature_h_r', 'hardness_l_r', 'hardness_h_r'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getPhLR()
    {
        return $this->attributes['ph_l_r'];
    }

    public function setPhLR($ph_l_r)
    {
        $this->attributes['ph_l_r'] = $ph_l_r;
    }

    public function getPhHR()
    {
        return $this->attributes['ph_h_r'];
    }

    public function setPhHR($ph_h_r)
    {
        $this->attributes['ph_h_r'] = $ph_h_r;
    }

    public function getTemperatureLR()
    {
        return $this->attributes['temperature_l_r'];
    }

    public function setTemperatureLR($temperature_l_r)
    {
        $this->attributes['temperature_l_r'] = $temperature_l_r;
    }

    public function getTemperatureHR()
    {
        return $this->attributes['temperature_h_r'];
    }

    public function setTemperatureHR($temperature_h_r)
    {
        $this->attributes['temperature_h_r'] = $temperature_h_r;
    }

    public function getHardnessLR()
    {
        return $this->attributes['hardness_l_r'];
    }

    public function setHardnessLR($hardness_l_r)
    {
        $this->attributes['hardness_l_r'] = $hardness_l_r;
    }

    public function getHardnessHR()
    {
        return $this->attributes['hardness_h_r'];
    }

    public function setHardnessHR($hardness_h_r)
    {
        $this->attributes['hardness_h_r'] = $hardness_h_r;
    }

    public static function validate(Request $request)
    {
        $request->validate([
            "ph_l_r" => ['required', 'numeric', 'gt:0'],
            "ph_h_r" => ['required', 'numeric', 'gt:0'],
            "temperature_l_r" => ['required', 'numeric', 'gt:0'],
            "temperature_h_r" => ['required', 'numeric', 'gt:0'],
            "hardness_l_r" => ['required', 'numeric', 'gt:0'],
            "hardness_h_r" => ['required', 'numeric', 'gt:0'],
        ]);
    }
}