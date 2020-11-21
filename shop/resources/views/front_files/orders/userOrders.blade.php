@extends('front_files.master')

@section('content')
<header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('resources/frontend/images/logo.png')}}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                    </ul>
                </div>  
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <!-- End Atribute Navigation -->
            </div>
            
        </nav>
        <!-- End Navigation -->
    </header>

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">   
                <div class="col-lg-12">
                   <h1 align="center"><b>Your Orders</b></h1>
                   <br>
                   <br>
                </div>
                <div class="col-lg-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                               
                                <th>Ordered Product</th>
                                <th>Payment Method</th>
                                <th>Grand Total</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($Orders as $order)
                           <tr>
                              
                               <td>
                                   @foreach($order->user_orders as $pro)
                                   
                                       {{ $pro->product_name }}
                                       (Size:  {{ $pro->product_size }})
                                       (Quantity: {{ $pro->product_quantity }})
                                       <br>
                                   
                                   @endforeach
                               </td>
                               <td>{{ $order->payment_method }}</td>
                               <td>{{ $order->grand_total }}</td> 
                           </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
@endsection
