<?php
// Created by: Yhoan Alejandro Guzman

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminOrderController extends Controller
{
    public function show($id)
    {
        $data = []; //to be sent to the view
        
        try{
            $order = Order::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }

        $data["title"] = $order->getName();
        $data["order"] = $order;
        return view('admin.order.show')->with("data",$data);
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] =  __('order_list.title');
        $data["order"] = order::orderBy('id')->get();

        return view('admin.order.list')->with("data",$data);

    }

    public function update(Request $request)
    {
        $data = [];
        $data["title"] = __('order_update.title');

        try{
            $order = Order::findOrFail($request->input('id'));
        }catch(ModelNotFoundException $e){
            return redirect()->route('admin.order.list');
        }

        $data["order"] = $order;

        return view('admin.order.update')->with("data", $data);
    }

    public function updateSave(Request $request){
        $order = Order::findOrFail($request->input('id'));
        Order::validate($request);
        if($order->getStatus() != $request->input('status')){
            $order->setName($request->input('status'));
        }

        $order->save();

        return back()->with('success', __('order_update.succesful'));

    }

}