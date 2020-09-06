<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
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

    public function index()
    {
        return view('admin.home.index');
    }
}