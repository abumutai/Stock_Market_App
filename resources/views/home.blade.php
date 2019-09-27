@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
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
                                          <td>Stock name</td>
                                          <td>Stock price</td>
                                          <td>Stock quantity</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($shares as $share)
                                          <tr>
                                              <td>{{$share->id}}</td>
                                              <td>{{$share->share_name}}</td>
                                              <td>{{$share->share_price}}</td>
                                              <td>{{$share->share_qty}}</td>
                                              <td><a href="{{route('shares.show',$share->id)}}" class="btn btn-primary">View</a></td>
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
