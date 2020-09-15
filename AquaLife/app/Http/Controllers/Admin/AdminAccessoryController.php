<?php
// Created by: Juan Sebastián Pérez Salazar

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
Use Exception;


class AdminAccessoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getRole()=="Customer"){
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function show($id)
    {
        $data = []; //to be sent to the view
        
        try{
            $accessory = Accessory::findOrFail($id);
        }catch(Exception $e){
            return redirect()->route('home.index');
        }

        $data["title"] = $accessory->getName();
        $data["accessory"] = $accessory;
        return view('admin.accessory.show')->with("data",$data);
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = __('accessory_list.title');
        $data["accessories"] = Accessory::orderBy('id')->get();

        return view('admin.accessory.list')->with("data",$data);

    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = __('accessory_create.title');

        return view('admin.accessory.create')->with("data",$data);

    }

    public function update(Request $request)
    {
        $data = [];
        $data["title"] = __('accessory_update.title');

        try{
            $accessory = Accessory::findOrFail($request->input('id'));
        }catch(Exception $e){
            return redirect()->route('admin.accessory.list');
        }

        $data["accessory"] = $accessory;

        return view('admin.accessory.update')->with("data", $data);
    }

    public function updateSave(Request $request){
        $accessory = Accessory::findOrFail($request->input('id'));
        $name = Accessory::validate($request);

        if($accessory->getName() != $request->input('name')){
            $accessory->setName($request->input('name'));
        }
        if($accessory->getCategory() != $request->input('category')){
            $accessory->setCategory($request->input('category'));
        }
        if($accessory->getPrice() != $request->input('price')){
            $accessory->setPrice($request->input('price'));
        }
        if($accessory->getInStock() != $request->input('in_stock')){
            $accessory->setInStock($request->input('in_stock'));
        }
        if(null != $request->input('new_description')){
            $accessory->setDescription($request->input('new_description'));
        }

        if($request->hasFile('new_image')){
            File::delete(asset('/images/'.$accessory->getImage()));
            $file = $request->file('new_image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $accessory->setImage($name);
        }

        $accessory->save();

        return back()->with('success', __('accessory_update.succesful'));

    }

    public function save(Request $request)
    {
        Accessory::validate($request);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }

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