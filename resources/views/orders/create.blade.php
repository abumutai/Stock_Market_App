@extends('layouts.app')
@section('content')
    <div class="container">
     <div class="row justify-content-center">
         <div class="card uper">
             <div class="card-header">
                <h1>Purchase stock</h1>
                Quantity Available: {{$shares->share_qty}}
             </div>
             <div class="card-body">
                    @if(session()->get('info'))
                    <div class="alert alert-danger">
                        {{session()->get('info')}}
                    </div> <br>
                    @endif
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors as $error)
                    <li>{{$error}}</li>
                        @endforeach
                        
                    </ul>
                </div>
                @endif
             <form method="POST" action="{{route('orders.store')}}">
                    <div class="form-group">
                         @csrf
                    
                        <label for="quantity">Enter quantity:</label>
                        <input type="text" class="form-control" name="quantity">
                    <input type="hidden"  name="seller_id" value="{{$shares->user_id}}">
                    <input type="hidden"  name="share_id" value="{{$shares->id}}">
                    <input type="hidden"  name="buyer_id" value="{{Auth::user()->id}}">
                    <input type="hidden"  name="available_qty" value="{{$shares->share_qty}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Purchase </button>
                </form>
             </div>
         </div>
    </div>   
    </div>
@endsection