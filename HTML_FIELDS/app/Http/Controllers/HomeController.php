<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session; 
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect('admin/home');
        }else{
                Session::flash('message','This account is not match with our records !');
                return redirect('login');
        }
        // return view('home');
    }
}
