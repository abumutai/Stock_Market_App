<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;
use App\Order;
use App\User;
class ShareController extends Controller
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
        $orders=auth()->user()->orders()->get();
        $shares=auth()->user()->shares()->get();
        return view('/shares/index',compact('shares','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('shares.create');
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
            'share_name'=>'required',
            'share_price'=>'required|integer',
            'share_qty'=>'required|integer'
        ]);

        $share= new Share([
            'share_name' => $request->get('share_name'),
            'share_price'=> $request->get('share_price'),
            'share_qty'=> $request->get('share_qty'),
            'user_id'=>$request->get('user_id'),
            'status'=>'on_sale'
          ]);
        $share->save();
        return redirect('/shares')-> with('success','stock added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shares=Share::find($id);
        return view('shares.show',compact('shares'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $share=Share::find($id);
        return view('shares.edit',compact('share'));
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
        $request->validate([
            'share_name'=>'required',
            'share_price'=>'required|integer',
            'share_qty'=>'required|integer'
        ]);
        $share=Share::find($id);
        $share->share_name=$request->get('share_name');
        $share->share_name=$request->get('share_price');
        $share->share_name=$request->get('share_qty');
        $share->save();

        return redirect('/shares')->with('success','Stock update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $share=Share::find($id);
        $order=Order::where('seller_id',$id);
        $share->delete();
        $order->delete();

        return redirect('/shares')->with('success','Stock deleted');
    }
    public function view($id){
        $shares=Share::find($id);
        
        return view('shares.view',compact('shares'));
    }
}
