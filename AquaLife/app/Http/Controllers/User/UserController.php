<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $data = []; //to be sent to the view
        
        try{
            $user = User::findOrFail(auth()->user()->id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }

        $data["title"] = $user->getName();
        $data["user"] = $user;
        return view('user.show')->with("data",$data);
    }

    public function update(Request $request)
    {
        $data = [];
        $data["title"] = __('user_update.title');

        try{
            $user = User::findOrFail($request->input('id'));
        }catch(Exception $e){
            return redirect()->route('user.show');
        }

        $data["user"] = $user;

        return view('user.update')->with("data", $data);
    }

    public function updateSave(Request $request){

        try{
            $user = User::findOrFail($request->input('id'));
            User::validate($request);
        }catch(Exception $e){
            return redirect()->route('user.show');
        }
        
        if($user->getName() != $request->input('name')){
            $user->setName($request->input('name'));
        }
        if($user->getAddressUser() != $request->input('address_user')){
            $user->setAddressUser($request->input('address_user'));
        }
        if($user->getEmail() != $request->input('email')){
            $user->setEmail($request->input('email'));
        }
        
        $user->save();
        
        return back()->with('success', __('user_update.succesful'));

    }

    public function adminShow($id)
    {
        $data = []; //to be sent to the view
        
        try{
            $user = User::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }

        $data["title"] = $user->getName();
        $data["user"] = $user;
        return view('user.show')->with("data",$data);
    }
}