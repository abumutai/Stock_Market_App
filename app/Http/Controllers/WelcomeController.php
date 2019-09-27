<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;

class WelcomeController extends Controller
{
    public function index(){
        $shares=Share::all()->take(5);
        return view('welcome',compact('shares'));
    }
}
