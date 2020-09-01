<?php
// Created by: Juan Sebastián Pérez Salazar

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
}
