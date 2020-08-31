<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Accessory;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
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
        return view('accessory.show')->with("data",$data);
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Accessories list";
        $data["accessories"] = Accessory::orderBy('id')->get();

        return view('accessory.list')->with("data",$data);

    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create accessory";
        $data["accessories"] = Accessory::all();

        return view('accessory.create')->with("data",$data);

    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "category" => "required",
            "price" => "required|numeric|gt:0"
        ]);
        Accessory::create($request->only(["name", "category", "price"]));

        return back()->with('success','Item created successfully!');

    }

    public function delete(Request $request){
        $accessory = Accessory::find($request['id']);
        $accessory->delete();
        //Accessory::destroy($request->only(["id"]));
        return redirect()->route('accessory.list');
    }

}