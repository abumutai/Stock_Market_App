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
        Edit share
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->any() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div><br>
        @endif
        <form method="POST" action="{{route('shares.update',$share->id)}}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="name">Share name:</label>
                <input type="text" class="form-control" name="share_name" value="{{$share->share_name}}">
            </div>
            <div class="form-group">
                    <label for="price">Share price:</label>
                    <input type="text" class="form-control" name="share_price" value="{{$share->share_price}}">
            </div>
            <div class="form-group">
                    <label for="quantity">Share quantity:</label>
                    <input type="text" class="form-control" name="share_qty" value="{{$share->share_qty}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection