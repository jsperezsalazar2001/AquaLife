<?php
// Created by: Juan Sebastián Pérez Salazar

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Models\Accessory;
use App\Models\Order;
use App\Models\FishOrder;
use App\Models\AccessoryOrder;
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

    public function buy(Request $request)
    {
        $userId = auth()->user()->id;
        $paymentType = $request->input('payment_type');
        $order = new Order();
        $order->setTotalPrice("0");
        $order->setPaymentType($paymentType);
        $order->setUserId($userId);
        $order->save();

        $totalPrice = 0;

        $fish = $request->session()->get("fish");
        if($fish){
            $keys = array_keys($fish);
            for($i=0;$i<count($keys);$i++){
                $currentFish = Fish::find($keys[$i]);
                $subTotal = $currentFish->getPrice()*$fish[$keys[$i]];
                $fishOrder = new FishOrder();
                $fishOrder->setFishId($keys[$i]);
                $fishOrder->setOrderId($order->getId());
                $fishOrder->setQuantity($fish[$keys[$i]]);
                $fishOrder->setSubtotal($subTotal);
                $fishOrder->save();
                
                $totalPrice = $totalPrice + $subTotal;
            }
            $request->session()->forget('fish');
        }

        $accessories = $request->session()->get("accessory");
        if($accessories){
            $keys = array_keys($accessories);
            for($i=0;$i<count($keys);$i++){
                $currentAccessory = Accessory::find($keys[$i]);
                $subTotal = $currentAccessory->getPrice()*$accessories[$keys[$i]];
                $accessoryOrder = new AccessoryOrder();
                $accessoryOrder->setAccessoryId($keys[$i]);
                $accessoryOrder->setOrderId($order->getId());
                $accessoryOrder->setQuantity($accessories[$keys[$i]]);
                $accessoryOrder->setSubtotal($subTotal);
                $accessoryOrder->save();
                $totalPrice = $totalPrice + $subTotal;
            }
            $request->session()->forget('accessory');
        }

        $order->setTotalPrice($totalPrice);
        $order->save();

        return redirect()->route('home.index')->with('success', __('order.succesful'));
    }

    public static function typeExists($type)
    {
        
        return in_array($type, CustomerCartController::$types);
    }

}