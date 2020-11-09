<?php
// Created by: Yhoan Alejandro Guzman

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\Interfaces\OrderBill;
Use Exception;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
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
    
    public function show($id)
    {
        $data = []; //to be sent to the view
        
        try{
            $order = Order::where('user_id', Auth::user()->getId())->findOrFail($id);
        }catch(Exception $e){
            return redirect()->route('home.index');
        }

        $accessories = $order->accessories()->get();
        $fish = $order->fish()->get();
        $data["title"] = __('order_update.title').' '.$order->getId();
        $data["order"] = $order;
        $data["accessories"] = $accessories;
        $data["fish"] = $fish;
        return view('customer.order.show')->with("data",$data);
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] =  __('order_list.title');
        $data["order"] = order::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->getId())->get();

        return view('customer.order.list')->with("data",$data);

    }

    public function listByStatus($value)
    {
        $data = [];
        $data["title"] =  __('order_list.title');
        $data["order"] = Order::orderBy('created_at', 'DESC')->where('status', $value)->where('user_id', Auth::user()->getId())->get();

        return view('customer.order.list')->with("data",$data);
    }


    public function cancel(Request $request){
        $order = Order::findOrFail($request->input('id'));
        $order->setStatus('Canceled');
        $order->save();

        $accessory_orders = $order->accessories;
        
        foreach($accessory_orders as $accessory_order){
            $accessory = $accessory_order->accessory;
            $accessory->setInStock($accessory->getInStock() + $accessory_order->getQuantity());
            $accessory->save();
        }

        $fish_orders = $order->fish;

        foreach($fish_orders as $fish_order){
            $fish = $fish_order->fish;
            $fish->setInStock($fish->getInStock() + $fish_order->getQuantity());
            $fish->save();
        }

        return redirect()->route('customer.order.list')->with('success', __('order_update.cancel_succesful'));

    }

    public function bill(Request $request){
        $data = []; //to be sent to the view

        try{
            $order = Order::where('user_id', Auth::user()->getId())->findOrFail($request->input('id'));
        }catch(Exception $e){
            return redirect()->route('home.index');
        }

        $current_order = session()->get('id_current_order');
        $current_order[0] = $request->input('id');
        session()->put('id_current_order', $current_order);

        $accessories = $order->accessories()->get();
        $fish = $order->fish()->get();
        $data['filename'] = time()."_".Auth::user()->getName();
        $data["title"] = __('order_update.title').' '.$order->getId();
        $data["order"] = $order;
        $data["accessories"] = $accessories;
        $data["fish"] = $fish;

        $bill = $request->input('bill');

        $generateOrderBill = app()->makeWith(OrderBill::class, ['array_bill' => $bill]);
        return $generateOrderBill->generateBill($data);
    }

}