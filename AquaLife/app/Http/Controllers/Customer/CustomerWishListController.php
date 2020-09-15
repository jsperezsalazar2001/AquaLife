<?php
// Created by: Daniel Felipe Gomez Martinez

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Models\WishListFish;
use Illuminate\Support\Facades\Auth;
Use Exception;
use Illuminate\Http\Request;

class CustomerWishListController extends Controller
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

    public function add(Request $request)
    {
        try{
          $fish = Fish::findOrFail($request->input('id')); 
          $user_wish_list_id = Auth::user()->getWishlistId();
          $wishlistfish = new WishListFish();
          $wishlistfish->setWishListId($user_wish_list_id);
          $wishlistfish->setFishId($fish->getId());
          $wishlistfish->save();
        }catch(Exception $e){
            return redirect()->route('customer.fish.list');
        }

        return back()->with('success', __('wishListFish.succesful'));

    }

    public function show(){
        $data=[];
        $idArray=[];
        try{ 
          $user_wish_list_id = Auth::user()->getWishlistId();
        }catch(Exception $e){
            return redirect()->route('home.index');
        }
        $data["title"] = "Your list";
        $wishListFishs = WishListFish::where("wish_list_id",$user_wish_list_id)->select('fish_id')->get();
        $idArray = $wishListFishs->pluck('fish_id');
        $data["fish"] = Fish::whereIn('id', $idArray)->get();

        if (empty($data["fish"]->toArray())) {
            return view('customer.wishList.list')->with("data",$data)->withErrors(__('wishListFish.wish_list_is_empty'));;
        }
        return view('customer.wishList.list')->with("data",$data);
    }

    public function delete(Request $request){
        try{ 
          $user_wish_list_id = Auth::user()->getWishlistId();
          $wish_list = WishListFish::where([['wish_list_id','=',$user_wish_list_id],['fish_id',$request['id']]]);
        }catch(Exception $e){
            return redirect()->route('home.index');
        }
        $wish_list->delete();
        
        return redirect()->route('customer.wishList.list');
    }

}