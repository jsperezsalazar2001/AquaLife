<?php
// Created by: Juan Sebastián Pérez Salazar

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Models\Accessory;
use Illuminate\Http\Request;

class CustomerCartController extends Controller
{
    public static $types = ['fish','accessory'];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }

    public function addToCart($id, $type, Request $request)
    {
        $data = []; //to be sent to the view
        $quantity = $request->quantity;
        
        if($this->typeExists($type)){
            $items = $request->session()->get($type);
        }else{
            return back()->withErrors(['Type_not_found' => ['Site error.']]);
        }
        $items[$id] = $quantity;
        $request->session()->put($type, $items);
        return back()->with('success', __('item.succesful'));
    }

    public function removeFromCart($id, $type, Request $request)
    {
        if($this->typeExists($type)){
            $items = $request->session()->get($type);
            unset($items[$id]);
            $request->session()->put($type, $items);
        }else{ 
            return back()->withErrors(['Type_not_found' => ['Site error.']]);
        }
        return redirect()->route('customer.cart');
    }

    public function cart(Request $request)
    {
        $fish = $request->session()->get("fish");
        $accessories = $request->session()->get("accessory");
        if($fish){
            $keys = array_keys($fish);
            $fishModels = Fish::find($keys);
            $data["fish"] = $fishModels;
        }
        if($accessories){
            $keys = array_keys($accessories);
            $accessoryModels = Accessory::find($keys);
            $data["accessories"] = $accessoryModels;
        }
        if($fish || $accessories){
            $data["title"] = "Cart";
            return view('customer.cart.cart')->with("data",$data);
        }

        return redirect()->route('home.index');
    }

    // public function buy(Request $request)
    // {
    //     $order = new Order();
    //     $order->setTotal("0");
    //     $order->save();

    //     $precioTotal = 0;

    //     $products = $request->session()->get("products");
    //     if($products){
    //         $keys = array_keys($products);
    //         for($i=0;$i<count($keys);$i++){
    //             $item = new Item();
    //             $item->setProductId($keys[$i]);
    //             $item->setOrderId($order->getId());
    //             $item->setQuantity($products[$keys[$i]]);
    //             $item->save();
    //             $productActual = Product::find($keys[$i]);
    //             $precioTotal = $precioTotal + $productActual->getPrice()*$products[$keys[$i]];
    //         }

    //         $order->setTotal($precioTotal);
    //         $order->save();

    //         $request->session()->forget('products');
    //     }

    //     return redirect()->route('product.index');
    // }

    public static function typeExists($type)
    {
        
        return in_array($type, CustomerCartController::$types);
    }

}