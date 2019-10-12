@extends('layouts.app')
  @section('content')
  <style>
        .uper {
          margin-top: 40px;
        }
    </style>
  <div class="container">
     
      <div class="row justify-content-center">
          
              <div class="card">
              <div class="card-header">Order {{$notification['order_id']}}</div>
  
                  <div class="card-body">
                      @if (session('success'))
                          <div class="alert alert-success" role="alert">
                              {{ session('success') }}
                          </div>
                      @endif
                   
                      <form action="">
                          <div class="form-group">
                            <label for="share_id">Share ID</label>
                            <input type="text" class="form-control" readonly value="{{$notification['share_id']}}">
                          </div>
                          <div class="form-group">
                            <label for="notification">Notification</label>
                            <input type="textarea" class="form-control" readonly value="{{$notification['notification']}}">
                          </div>
                          <div class="form-group w-75">
                            <label for="time">Time</label>
                            <input type="text" class="form-control" readonly value="{{$notification['created_at']->diffForHumans()}}">
                          </div>
                          <div class="d-flex">
                              <a class="btn btn-primary mr-5"  href="{{route('orders.show',$notification['order_id'])}}"> View Order </a>
                              <form method="POST" action="{{route('notifications.destroy',$notification->id)}}"> @method('DELETE') <button class="btn btn-danger" type="submit">Delete</button> </form>
                          </div>
                      </form>
                  </div>
              </div>
      </div>
  </div>
 @endsection