<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Fish;
use Illuminate\Http\Request;

class AdminFishController extends Controller
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
        return view('admin.fish.show')->with("data",$data);
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Fish list";
        $data["fish"] = Fish::orderBy('id')->get();

        return view('admin.fish.list')->with("data",$data);

    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create fish";
        $data["fish"] = Fish::all();

        return view('admin.fish.create')->with("data",$data);

    }

    public function save(Request $request)
    {
         $imageName = Fish::validate($request);
         $newFish = new Fish();
         $newFish->setName($request->input('name'));
         $newFish->setSpecies($request->input('species'));
         $newFish->setPrice($request->input('price'));
         $newFish->setFamily($request->input('family'));
         $newFish->setColor($request->input('color'));
         $newFish->setSize($request->input('size'));
         $newFish->setTemperament($request->input('temperament'));
         $newFish->setInStock($request->input('in_stock'));
         $newFish->setImage($imageName);
         $newFish->save();
         return back()->with('success', __('fish_create.succesful'));
    }

    public function delete(Request $request){
        $fish = Fish::find($request['id']);
        $fish->delete();
        return redirect()->route('admin.fish.list');
    }

}