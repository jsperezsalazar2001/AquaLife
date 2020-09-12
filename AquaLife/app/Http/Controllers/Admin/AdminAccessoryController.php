<?php
// Created by: Juan Sebastián Pérez Salazar

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Accessory;
use Illuminate\Http\Request;

class AdminAccessoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }

    public function show($id)
    {
        $data = []; //to be sent to the view
        
        try{
            $accessory = Accessory::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }

        $data["title"] = $accessory->getName();
        $data["accessory"] = $accessory;
        return view('admin.accessory.show')->with("data",$data);
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Accessories list";
        $data["accessories"] = Accessory::orderBy('id')->get();

        return view('admin.accessory.list')->with("data",$data);

    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create accessory";
        $data["accessories"] = Accessory::all();

        return view('admin.accessory.create')->with("data",$data);

    }

    public function save(Request $request)
    {
        $name = Accessory::validate($request);
        $accessory = new Accessory();
        $accessory->setName($request->input('name'));
        $accessory->setCategory($request->input('category'));
        $accessory->setPrice($request->input('price'));
        $accessory->setInStock($request->input('in_stock'));
        $accessory->setDescription($request->input('description'));
        $accessory->setImage($name);
        $accessory->save();

        return back()->with('success', __('accessory_create.succesful'));
    }

    public function delete(Request $request){
        $accessory = Accessory::find($request['id']);
        $accessory->delete();
        return redirect()->route('admin.accessory.list');
    }

}