<?php
// Created by: Yhoan Alejandro Guzman

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Models\Accessory;
use App\Models\Order;
use App\Models\FishOrder;
use App\Models\AccessoryOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerCartController extends Controller
{
    public static $types = ['fish','accessory'];

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

    public function addToCart($id, $item_type, Request $request)
    {
        $data = []; //to be sent to the view
        $quantity = $request->quantity;
        
        if($this->typeExists($item_type)){
            $items = $request->session()->get($item_type);
        }else{
            return back()->withErrors(__('cart.type_not_found',['type' => $item_type]));
        }
        $items[$id] = $quantity;
        $request->session()->put($item_type, $items);
        return back()->with('success', __('item.successful'));
    }

    public function removeFromCart($id, $item_type, Request $request)
    {
        if($this->typeExists($item_type)){
            $items = $request->session()->get($item_type);
            unset($items[$id]);
            $request->session()->put($item_type, $items);
        }else{ 
            return back()->withErrors(__('cart.type_not_found',['type' => $item_type]));
        }
        return redirect()->route('customer.cart')->with('success', __('item.remove_successful'));
    }

    public function cart(Request $request)
    {
        $fish = $request->session()->get("fish");
        $accessories = $request->session()->get("accessory");
        $data["title"] = "Cart";
        $totalPrice = 0;
        if($fish){
            $keys = array_keys($fish);
            $fishModels = Fish::find($keys);
            $data["fish"] = $fishModels;
            for($i=0;$i<count($keys);$i++){
                $currentFish = Fish::find($keys[$i]);
                $subTotal = $currentFish->getPrice()*$fish[$keys[$i]];
                $totalPrice = $totalPrice + $subTotal;
            }
        }
        if($accessories){
            $keys = array_keys($accessories);
            $accessoryModels = Accessory::find($keys);
            $data["accessories"] = $accessoryModels;
            for($i=0;$i<count($keys);$i++){
                $currentAccessory = Accessory::find($keys[$i]);
                $subTotal = $currentAccessory->getPrice()*$accessories[$keys[$i]];
                $totalPrice = $totalPrice + $subTotal;
            }
        }
        $data["total"] = $totalPrice;
        if($fish || $accessories){
            //dd($data);
            return view('customer.cart.cart')->with("data",$data);
        }
        return view('customer.cart.cart')->with("data",$data)->withErrors(__('cart.cart_is_empty'));;
    }

    public function buy(Request $request)
    {
        $userId = auth()->user()->id;
        $paymentType = $request->input('payment_type');
        $order = new Order();
        $order->setTotalPrice("0");
        $order->setPaymentType($paymentType);
        $order->setUserId($userId);
        $order->setStatus('Pending');

        $totalPrice = 0;


        $fish = $request->session()->get("fish");
        $accessories = $request->session()->get("accessory");
        if($fish){
            $keys = array_keys($fish);
            for($i=0;$i<count($keys);$i++){
                $currentFish = Fish::find($keys[$i]);
                if($currentFish->getInStock()-$fish[$keys[$i]] < 0){
                    return back()->withErrors(__('cart.not_enough_stock',['stock' => $currentFish->getInStock(), 'item' => $currentFish->getName()]));
                }
            }
        }

        if($accessories){
            $keys = array_keys($accessories);
            for($i=0;$i<count($keys);$i++){
                $currentAccessory = Accessory::find($keys[$i]);
                if($currentAccessory->getInStock()-$accessories[$keys[$i]] < 0){
                    return back()->withErrors(__('cart.not_enough_stock',['stock' => $currentAccessory->getInStock(), 'item' => $currentAccessory->getName()]));
                }
            }
        }

        $order->save();
        
        if($fish){
            $keys = array_keys($fish);
            for($i=0;$i<count($keys);$i++){
                $currentFish = Fish::find($keys[$i]);
                $currentFish->setInStock($currentFish->getInStock()-$fish[$keys[$i]]);
                $currentFish->save();
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


        if($accessories){
            $keys = array_keys($accessories);
            for($i=0;$i<count($keys);$i++){
                $currentAccessory = Accessory::find($keys[$i]);
                $currentAccessory->setInStock($currentAccessory->getInStock()-$accessories[$keys[$i]]);
                $currentAccessory->save();
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

        return redirect()->route('home.index')->with('success', __('order.success'));
    }

    public static function typeExists($type)
    {
        return in_array($type, CustomerCartController::$types);
    }

}