<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Fish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    public function show($id)
    {
        $data = []; //to be sent to the view
        
        try{
            $fish = Fish::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }

        $data["title"] = $fish->getName();

        $data["fish"] = $fish;
        return view('fish.show')->with("data",$data);
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Fish list";
        $data["fish"] = Fish::orderBy('id')->get();

        return view('fish.list')->with("data",$data);

    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create fish";
        $data["fish"] = Fish::all();

        return view('fish.create')->with("data",$data);

    }

    public function save(Request $request)
    {
         Fish::validate($request);
         Fish::create($request->only(["name", "species", "family", "color", "price", "size", "temperament"]));
         return back()->with('success','Item created successfully!');
    }

    public function delete(Request $request){
        $fish = Fish::find($request['id']);
        $fish->delete();
        return redirect()->route('fish.list');
    }

}