<?php
// Created by: Juan Sebastián Pérez Salazar

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAccessoryController extends Controller
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
        $data = []; 
        $data["title"] = __('accessory_list.title');
        $data["accessories"] = Accessory::orderBy('id')->get();

        return view('customer.accessory.list')->with("data",$data);

    }

    public function listBy($value)
    {
        $data = [];
        $data["title"] = __('accessory_list.title');
        $data["accessories"] = Accessory::orderBy('id')->where('category', $value)->get();

        return view('customer.accessory.list')->with("data",$data);
    }

}