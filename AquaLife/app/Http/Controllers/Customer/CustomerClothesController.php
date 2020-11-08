<?php
// Created by: Juan Sebastián Pérez Salazar

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Http;

class CustomerClothesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getRole()=="Admin"){
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function list()
    {
        $json_call = Http::get('http://ec2-3-89-29-196.compute-1.amazonaws.com/public/api/inbag/products/paginate');
        $response = $json_call->json();
        $clothes = $response['data'];
        $data = [];
        $data['clothes'] = $clothes;
        $data["title"] = __('clothes.title');
        return view('customer.clothes.list')->with("data",$data);
    }
}