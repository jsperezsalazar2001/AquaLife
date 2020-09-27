<?php
// Created by: Yhoan Alejandro Guzman

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Models\EnvironmentalCondition;
use App\Models\WishListFish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Exception;

class CustomerFishController extends Controller
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

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = __('fish_list.title');
        $wish_list_id =Auth::user()->getWishlistId();
        $data["fish"] = Fish::orderBy('id')->get();
        $fish_wish = WishListFish::where([["wish_list_id",$wish_list_id]])->select('fish_id')->get();
        $data["fishWishList"] = $fish_wish->pluck('fish_id')->toArray();
        $data["notFishWishList"] = Fish::whereNotIn('id', $data["fishWishList"])->select('id')->get();

        return view('customer.fish.list')->with("data",$data);

    }

    public function listByTemperament($value)
    {
        $data = [];
        $data["title"] = __('fish_list.title');
        $wish_list_id =Auth::user()->getWishlistId();
        $data["fish"] = Fish::orderBy('id')->where('temperament', $value)->get();
        $fish_wish = WishListFish::where([["wish_list_id",$wish_list_id]])->select('fish_id')->get();
        $data["fishWishList"] = $fish_wish->pluck('fish_id')->toArray();
        $data["notFishWishList"] = Fish::whereNotIn('id', $data["fishWishList"])->select('id')->get();

        return view('customer.fish.list')->with("data",$data);
    }

    public function listBySize($value)
    {
        $data = [];
        $data["title"] = __('fish_list.title');
        $wish_list_id =Auth::user()->getWishlistId();
        $data["fish"] = Fish::orderBy('id')->where('size', $value)->get();
        $fish_wish = WishListFish::where([["wish_list_id",$wish_list_id]])->select('fish_id')->get();
        $data["fishWishList"] = $fish_wish->pluck('fish_id')->toArray();
        $data["notFishWishList"] = Fish::whereNotIn('id', $data["fishWishList"])->select('id')->get();

        return view('customer.fish.list')->with("data",$data);
    }

    public function match($id,$temperament){
        $data=[];
        $id_array=[];
        $id_array_fish=[];

        if ($temperament === 'Passive') {
            try{ 
                $fish = Fish::where([["temperament",'Passive']])->select('id')->get();
                $id_array_fish = $fish->pluck('id')->toArray();
                $environmental_condition_fish = EnvironmentalCondition::where([['fish_id',$id]])->get();
            }catch(Exception $e){
                return redirect()->route('home.index');
            }

            try{
                $id_fish = $environmental_condition_fish->pluck('id');       
                $lower_ph = $environmental_condition_fish->pluck('ph_lr')[0];
                $higher_ph = $environmental_condition_fish->pluck('ph_hr')[0];
                $lower_temperature = $environmental_condition_fish->pluck('temperature_lr')[0];
                $higher_temperature = $environmental_condition_fish->pluck('temperature_hr')[0];
                $lower_hardness = $environmental_condition_fish->pluck('hardness_lr')[0];
                $higher_hardness = $environmental_condition_fish->pluck('hardness_hr')[0];
            }catch(Exception $e){
                return back()->with('fail', __('fish_match.not_environmental_condition'));
            }
        
            $data["title"] = "Your match list";
            $list_fish = EnvironmentalCondition::where([
            ["ph_lr",'>=',$lower_ph],
            ["ph_lr",'<=',$higher_ph],
            ["id",'!=',$id_fish]])->orWhere([
            ["ph_hr",'>=',$lower_ph],
            ["ph_hr",'<=',$higher_ph],
            ["id",'!=',$id_fish]])->orWhere([
            ["ph_lr",'<=',$lower_ph],
            ["ph_hr",'>=',$lower_ph],
            ["id",'!=',$id_fish]])->select('fish_id','temperature_lr','hardness_lr','temperature_hr','hardness_hr')->get();

            foreach ($list_fish as $ListFishs_check) {
                $id_fish_check = $ListFishs_check['fish_id'];
                $lower_temperature_check = $ListFishs_check['temperature_lr'];
                $higher_temperature_check = $ListFishs_check['temperature_hr'];
                $lower_hardness_check = $ListFishs_check['hardness_lr'];
                $higher_hardness_check = $ListFishs_check['hardness_hr'];

                if (in_array($id_fish_check, $id_array_fish)) {
                    if ((
                        ($lower_temperature_check >= $lower_temperature) and 
                        ($lower_temperature_check <= $higher_temperature)) or 
                        (($higher_temperature_check >= $lower_temperature) and 
                        ($higher_temperature_check <= $higher_temperature)) or
                        (($lower_temperature_check <= $lower_temperature) and 
                        ($higher_temperature_check >= $lower_temperature))) {

                        if ((
                         ($lower_hardness_check >= $lower_hardness) and 
                         ($lower_hardness_check <= $higher_hardness)) or 
                         (($higher_hardness_check >= $lower_hardness) and 
                         ($higher_hardness_check <= $higher_hardness)) or
                         (($lower_hardness_check <= $lower_hardness) and 
                         ($higher_hardness_check >= $lower_hardness))) {
                             array_push($id_array, $id_fish_check);
                        }
                    }
                }
            }
        
           $data["fish"] = Fish::whereIn('id', $id_array)->get();

           if(empty($data["fish"]->toArray())){
            return back()->with('fail', __('fish_match.no_one'));
           }else{
            return view('customer.fish.match')->with("data",$data);
           }
        }else{
            return back()->with('fail', __('fish_match.aggresive'));
        }
    }
}