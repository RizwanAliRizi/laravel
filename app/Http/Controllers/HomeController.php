<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->middleware(['auth'=> 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chekRole = auth()->user(); //= Auth::check();
        if($chekRole->hasRole('admin'))
          return view('home');
        else
            echo "<h1> You don't have role/permissions to go further. Thanks for visting us :D </h1>";
    }
}
