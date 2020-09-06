<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;
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
}