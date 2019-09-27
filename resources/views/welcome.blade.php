<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
         <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
       
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                   
                    @auth
                        <a class="p-2 text-dark" href="{{ url('/shares') }}">Home</a>
                        <a class="p-2 text-dark" href="{{ url('/home') }}"> Shares</a>
                    @else
                      <a class="p-2 text-dark" href="{{ url('/') }}">Home</a>
                      <a class="p-2 text-dark" href="{{ url('/home') }}"> Shares</a>
                      <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
       
            <div class="content">
                    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                            <h1 class="display-4">Trending Stocks</h1>
                            <p class="lead">Quickly have a view of trending stocks with effective pricing from your potential sellers currently on the market. The quality of the stocks is quaranteed with affordable shipping fee. Order your stock now.</p>
                          </div>
                          
                          <div class="container">
                            <div class="card-deck mb-3 text-center">
                              @foreach ($shares as $share)
                              <div class="card mb-4 shadow-sm">
                                  <div class="card-header">
                                  <h4 class="my-0 font-weight-normal">{{$share->share_name}}</h4>
                                  </div>
                                  <div class="card-body row-2">
                                    <h1 class="card-title pricing-card-title">Price: ${{$share->share_price}} </h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                    <li>Total Quantity: {{$share->share_qty}}</li>
                                      <li>Available Quantity: 0</li>
                                      <li>Purchased Quantity: 0</li>
                                    </ul>
                                  <a  class="btn btn-lg btn-block btn-primary" href="{{route('shares.show',$share->id)}}">View Stock</a>
                                  </div>
                                </div>
                                
                              @endforeach
                              
                            </div>
                          

            
            </div>
        </div>
       
    </body>
</html>
