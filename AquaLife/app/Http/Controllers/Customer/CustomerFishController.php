<?php
// Created by: Juan Sebastián Pérez Salazar

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use Illuminate\Http\Request;

class CustomerFishController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Fish list";
        $data["fish"] = Fish::orderBy('id')->get();

        return view('customer.fish.list')->with("data",$data);

    }

    public function addToCart($id, Request $request)
    {
        $data = []; //to be sent to the view
        $quantity = $request->quantity;
        $fish = $request->session()->get("fish");
        $fish[$id] = $quantity;
        $request->session()->put('fish', $fish);
        return back()->with('success', __('fish.succesful'));
    }

    public function removeFromCart(Request $request)
    {
        $request->session()->forget('fish');
        return redirect()->route('customer.fish.list');
    }

}