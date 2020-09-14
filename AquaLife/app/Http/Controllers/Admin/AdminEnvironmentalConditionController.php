<?php
// Created by: Daniel Felipe Gomez Martinez

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnvironmentalCondition;
Use Exception;
use Illuminate\Http\Request;

class AdminEnvironmentalConditionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = __('environmentalCondition_create.title');
        $data["fish"] = EnvironmentalCondition::all();

        return view('admin.environmentalCondition.create')->with("data",$data);

    }

    public function save(Request $request)
    {
         EnvironmentalCondition::validate($request);

         $newFish = new EnvironmentalCondition();
         $newFish->setPhLR($request->input('ph_lr'));
         $newFish->setPhHR($request->input('ph_hr'));
         $newFish->setTemperatureLR($request->input('temperature_lr'));
         $newFish->setTemperatureHR($request->input('temperature_hr'));
         $newFish->setHardnessLR($request->input('hardness_lr'));
         $newFish->setHardnessHR($request->input('hardness_hr'));
         $newFish->save();
         return back()->with('success', __('environmentalCondition_create.succesful'));
    }

    public function show($id)
    {
        $data = []; //to be sent to the view
        
        try{
            $environmental_condition = EnvironmentalCondition::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }

        $data["title"] =  __('environmentalCondition_show.title');;
        $data["environmental_condition"] = $environmental_condition;
        return view('admin.environmentalCondition.show')->with("data",$data);
    }

    public function delete(Request $request){
        $fish = EnvironmentalCondition::find($request['id']);
        $fish->delete();
        return redirect()->route('admin.environmentalCondition.list');
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] =  __('environmentalCondition_list.title');
        $data["environmental_condition"] = EnvironmentalCondition::orderBy('id')->get();

        return view('admin.environmentalCondition.list')->with("data",$data);
    }

    public function updateSave(Request $request){
        /*
        $fish = Fish::findOrFail($request->input('id'));
        $name = Fish::validate($request);
        if($fish->getName() != $request->input('name')){
            $fish->setName($request->input('name'));
        }
        if($fish->getSpecies() != $request->input('species')){
            $fish->setSpecies($request->input('species'));
        }
        if($fish->getPrice() != $request->input('price')){
            $fish->setPrice($request->input('price'));
        }

        if($fish->getFamily() != $request->input('family')){
            $fish->setFamily($request->input('family'));
        }

        if($fish->getColor() != $request->input('color')){
            $fish->setColor($request->input('color'));
        }

        if($fish->getSize() != $request->input('size')){
            $fish->setSize($request->input('size'));
        }

        if($fish->getTemperament() != $request->input('temperament')){
            $fish->setTemperament($request->input('temperament'));
        }

        if($fish->getInStock() != $request->input('in_stock')){
            $fish->setInStock($request->input('in_stock'));
        }

        if($request->hasFile('new_image')){
            File::delete(asset('/images/'.$fish->getImage()));
            $file = $request->file('new_image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $fish->setImage($name);
        }

        $fish->save();
        */
        return back()->with('success', __('fish_update.succesful'));

    }
}