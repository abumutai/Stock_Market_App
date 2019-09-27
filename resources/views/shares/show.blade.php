@extends('layouts.app')
@section('content')
<style>
    .uper {
     margin-top: 40px;
    }
</style>
    <div class="container">
     <div class="row justify-content-center">
       
    <div class="card uper">
    
        <div class="card-header">
            <h1>View share </h1>
        </div>
    <div class="card-body">
    <form method="POST" action="">
                <div class="form-group">
                        <label for="name">Share name:</label>
                        <input type="text" class="form-control" name="share_name" readonly value="{{$shares->share_name}}">
                    </div>
                    <div class="form-group">
                            <label for="price">Share price:</label>
                            <input type="text" class="form-control" name="share_price" readonly value="{{$shares->share_price}}">
                    </div>
                    <div class="form-group">
                            <label for="quantity">Share quantity:</label>
                            <input type="text" class="form-control" name="share_qty" readonly value="{{$shares->share_qty}}">
                            <div class="col-1 d-flex">
                                <a class="btn btn-primary m-3 "  href="{{route('home')}}">Back</a>
                                @if((Auth::user()->id)!=($shares->user_id))
                                <a class="btn btn-success m-3"  href="{{route('purchase',$shares->id)}}">Purchase</a>
                                @else
                                <a class="btn btn-success m-3"  href="{{route('shares.edit',$shares->id)}}">Edit</a>
                                @endif
                            </div>
                    </div>
        </form>
    </div>
</div>
</div>
@endsection