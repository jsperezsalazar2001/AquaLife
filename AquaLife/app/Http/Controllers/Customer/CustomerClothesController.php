<?php
// Created by: Yhoan Alejandro Guzman

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
        try {
            $json_call = Http::timeout(1)->get('http://ec2-3-89-29-196.compute-1.amazonaws.com/public/api/inbag/products/paginate');
            $response = $json_call->json();
            $clothes = $response['data'];
            $data = [];
            $data['clothes'] = $clothes;
            $data["title"] = __('clothes.title');
            return view('customer.clothes.list')->with("data",$data);
        } catch (\Throwable $e) {
            $data = [];
            $data["title"] = __('clothes.title');
            return view('customer.clothes.list')->with("data",$data);
        }
        #$json_call = Http::get("http://aqualife.tk/public/api/accessories", false, $context);
    }
}