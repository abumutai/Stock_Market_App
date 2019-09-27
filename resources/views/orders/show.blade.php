@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card uper">
                <div class="card-header">
                    <h3> View Order Details </h3>
                </div>
                <div class="card-body">
                            <div class="form-group">
                                <label for="orderid">Order Id</label>
                                <input type="text" class="form-control" readonly value="{{$order->id}}">
                            </div>
                            <div class="form-group">
                                    <label for="sellerid">Seller Id</label>
                                    <input type="text" class="form-control" readonly value="{{$order->seller_id}}">
                            </div>
                            <div class="form-group">
                                    <label for="shareid">Share Id</label>
                                    <input type="text" class="form-control" readonly value="{{$order->share_id}}">
                            </div>
                            <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" readonly value="{{$order->quantity}}">
                            </div>
                            <div class="form-group">
                                    <label for="status">Quantity</label>
                                    <input type="text" class="form-control" readonly value="{{$order->status}}">
                            </div>
                            @if($order->status!='complete')
                                <a class="btn btn-primary mr-5" href="{{route('shares.index')}}">Back</a>
                                <form method="POST"  action="{{route('orders.destroy',$order->id)}}" > 
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Cancel </button>
                                </form>
                               
                            @endif
                        
                </div>
            </div>
        </div>
    </div>
@endsection