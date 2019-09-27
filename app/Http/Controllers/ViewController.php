<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;

class ViewController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }

    public function purchase($id){
        $shares=Share::find($id);
        return view('orders.create',compact('shares'));
    }
}
