@extends('layouts.app')
  @section('content')
  <style>
        .uper {
          margin-top: 40px;
        }
    </style>
  <div class="container mb-3">
     
      <div class="row justify-content-center">
          <div class="col-md-2">
                <a  class="btn btn-primary" href={{route('shares.create')}}>Add New Stock</a>
          </div>
        
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">My Stocks</div>
  
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
                                            <td>Stock name</td>
                                            <td>Stock price</td>
                                            <td>Stock quantity</td>
                                            <td colspan="2" >Action</td>
                                            <td> Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shares  as $share)
                                            <tr>
                                                <td>{{$share->id}}</td>
                                                <td>{{$share->share_name}}</td>
                                                <td>{{$share->share_price}}</td>
                                                <td>{{$share->share_qty}}</td>
                                                <td><a href="{{route('shares.edit',$share->id)}}" class="btn btn-primary">Edit</a></td>
                                                <td>
                                                    <form action="{{route('shares.destroy',$share->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    
                                                </td>
                                                <td>
                                                    @if($share->status=='on_sale')
                                                    <button class="btn btn-success">On Sale</button>
                                                    @elseif($share->status=='pending')
                                                    <button class="btn btn-info">Pending</button>
                                                    @else
                                                    <button class="btn btn-warning">Sold</button>
                                                    @endif
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



  <div class="container mt-5" >
     
    <div class="row justify-content-center">
        <div class="col-md-2">
              <a  class="btn btn-primary" href={{route('home')}}>Available stocks</a>
        </div>
      
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Purchases</div>

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
                                          <td>Order ID</td>
                                          <td>Stock ID</td>
                                          <td>Order Quantity</td>
                                          <td>Seller ID</td>
                                          <td colspan="2" >Action</td>
                                          <td> Status</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($orders  as $order)
                                          <tr>
                                              <td>{{$order->id}}</td>
                                              <td>{{$order->share_id}}</td>
                                              <td>{{$order->quantity}}</td>
                                              <td>{{$order->seller_id}}</td>
                                              <td><a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">View</a></td>
                                              <td>
                                                  <form action="{{route('orders.destroy',$order->id)}}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      @if($order->status!='complete')
                                                      <button type="submit" class="btn btn-danger">Cancel</button>
                                                      @endif
                                                  </form>
                                                  
                                              </td>
                                              <td>
                                                  @if($order->status=='approved')
                                                  <button class="btn btn-success">Approved</button>
                                                  @elseif($order->status=='pending')
                                                  <button class="btn btn-info">Pending</button>
                                                  @else
                                                  <button class="btn btn-warning">Complete</button>
                                                  @endif
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




  <div class="container mt-5" >
     
        <div class="row justify-content-center">
                <div class="col-md-2">
                        
                  </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Sales</div>
    
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
                                              <td>Order ID</td>
                                              <td>Stock ID</td>
                                              <td>Order Quantity</td>
                                              <td>Buyer ID</td>
                                              <td>Action</td>
                                              <td> Status</td>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($orders  as $order)
                                              <tr>
                                                  <td>{{$order->id}}</td>
                                                  <td>{{$order->share_id}}</td>
                                                  <td>{{$order->quantity}}</td>
                                                  <td>{{$order->buyer_id}}</td>
                                                  <td><a href="{{route('orders.show',$order->id)}}" class="btn btn-primary">View</a></td>
        
                                                  <td>
                                                      @if($order->status=='approved')
                                                      <button class="btn btn-success">Approved</button>
                                                      @elseif($order->status=='pending')
                                                      <button class="btn btn-info">Pending</button>
                                                      @else
                                                      <button class="btn btn-warning">Complete</button>
                                                      @endif
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
  