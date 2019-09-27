<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Order;
use App\Share;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity'=>'integer|required'
        ]);
        $id=$request->get('share_id');
        $available=$request->get('available_qty');
        $quantity=$request->get('quantity');
        if($available>=$quantity){
        $order=new Order([
        'share_id'=>$request->get('share_id'),
        'buyer_id'=>$request->get('buyer_id'),
        'seller_id'=>$request->get('seller_id'),
        'quantity'=>$request->get('quantity'),
        'status'=>'pending'
        ]);
       $new_qty=$available-$quantity;
        $order->save();
        $share_id= $request->get('share_id');
        Share::where('id',$share_id)->update(array('share_qty'=>$new_qty));
        return redirect('/shares')-> with('success','purchase request  successfully!! Please wait for seller to respond');
    }
    else{

        return back()->with('info','Stated quantity is greater than available stock');
    }
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order=Order::find($id);
        return view('orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        $order->delete();
        return redirect('shares')->with('success','order cancelled successfully');
    }
}
