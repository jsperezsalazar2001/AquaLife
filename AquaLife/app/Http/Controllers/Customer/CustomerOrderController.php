<?php
// Created by: Yhoan Alejandro Guzman

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerOrderController extends Controller
{
    public function show($id)
    {
        $data = []; //to be sent to the view
        
        try{
            $order = Order::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }

        $data["title"] = __('order_show.cancel').' '.$order->getId();
        $data["order"] = $order;
        return view('customer.order.show')->with("data",$data);
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] =  __('order_list.title');
        $data["order"] = order::orderBy('id')->get();

        return view('customer.order.list')->with("data",$data);

    }


    public function cancel(Request $request){
        $order = Order::findOrFail($request->input('id'));
        $order->setStatus('Canceled');
        $order->save();
        return redirect()->route('customer.order.list')->with('success', __('order_update.cancel_succesful'));

    }

}