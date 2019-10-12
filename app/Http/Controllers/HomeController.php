<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Share;

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
        $shares=Share::all()->where('share_qty','>','0');
        return view('home',compact('shares'));
    }
}
