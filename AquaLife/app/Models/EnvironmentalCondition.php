<?php
// Created by: Daniel Felipe Gomez Martinez

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EnvironmentalCondition extends Model
{
    //attributes id, ph_l_r, ph_h_r, temperature_l_r,temperatura_h_r,hardness_l_r,hardness_h_r, created_at, updated_at
    protected $fillable = ['ph_lr', 'ph_hr', 'temperature_lr', 'temperature_hr', 'hardness_lr', 'hardness_hr'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getPhLR()
    {
        return $this->attributes['ph_lr'];
    }

    public function setPhLR($ph_lr)
    {
        $this->attributes['ph_lr'] = $ph_lr;
    }

    public function getPhHR()
    {
        return $this->attributes['ph_hr'];
    }

    public function setPhHR($ph_hr)
    {
        $this->attributes['ph_hr'] = $ph_hr;
    }

    public function getTemperatureLR()
    {
        return $this->attributes['temperature_lr'];
    }

    public function setTemperatureLR($temperature_lr)
    {
        $this->attributes['temperature_lr'] = $temperature_lr;
    }

    public function getTemperatureHR()
    {
        return $this->attributes['temperature_hr'];
    }

    public function setTemperatureHR($temperature_hr)
    {
        $this->attributes['temperature_hr'] = $temperature_hr;
    }

    public function getHardnessLR()
    {
        return $this->attributes['hardness_lr'];
    }

    public function setHardnessLR($hardness_lr)
    {
        $this->attributes['hardness_lr'] = $hardness_lr;
    }

    public function getHardnessHR()
    {
        return $this->attributes['hardness_hr'];
    }

    public function setHardnessHR($hardness_hr)
    {
        $this->attributes['hardness_hr'] = $hardness_hr;
    }

    public static function validate(Request $request)
    {
        $request->validate([
            "ph_lr" => ['required', 'numeric', 'gt:0'],
            "ph_hr" => ['required', 'numeric', 'gt:0'],
            "temperature_lr" => ['required', 'numeric', 'gt:0'],
            "temperature_hr" => ['required', 'numeric', 'gt:0'],
            "hardness_lr" => ['required', 'numeric', 'gt:0'],
            "hardness_hr" => ['required', 'numeric', 'gt:0'],
        ]);
    }
}