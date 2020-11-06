<?php

namespace App\Http\Controllers;
//Created by: Daniel Felipe Gómez Martínez
use Illuminate\Http\Request;
use Http;
//use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $json_call = Http::get('http://api.openweathermap.org/data/2.5/weather?id=3682631&appid=5fe77857218a2d89eedfd87b9e44adf5');
        $weather = $json_call->json();
        $temperature = $weather['main']['temp'];
        $temperature = $temperature - 273.15;
        $city = $weather['name'];
        $data = [];
        $data['temperature'] = $temperature;
        $data['city'] = $city;
        $information = session()->get('data');
        $information[0] = $data;
        session()->put('data',$information);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
    }
}
