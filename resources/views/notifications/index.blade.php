@extends('layouts.app')
  @section('content')
  <style>
        .uper {
          margin-top: 40px;
        }
    </style>
  <div class="container mb-3">
     
      <div class="row justify-content-center">
        
        
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Notifications</div>
  
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                              <p>You </p>
                          </div>
                      @endif
  
                      <div class="uper">
                              @if(session()->get('success'))
                              <div class="alert alert-success">
                                  {{session()->get('success')}}
                              </div> <br>
                              @endif
                               <table class="table table-striped">
                                   <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Notification</td>
                                            <td>Time</td>
                                            <td colspan="2" >Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notifications  as $notification)
                                            <tr>
                                                <td>{{$notification->id}} 
                                                </td>
                                                <td>{{$notification->notification}}</td>
                                                <td>{{$notification->created_at->diffForHumans()}} @if ($notification->status=='new')
                                                    <sup class="text-danger"> <strong>new</strong> </sup>  @endif</td>
                                                <td><a href="{{route('notifications.show',$notification->id)}}" class="btn btn-primary">View</a></td>
                                                <td>
                                                    <form action="{{route('notifications.destroy', $notification->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    
                                                </td>
                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                               </table>
                          </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
 @endsection