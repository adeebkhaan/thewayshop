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

<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
        	@if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
            @endif
            <div class="row">	
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $grand_total =0; ?>
                            	@foreach($userCart as $row)
                                <tr>
                                    <td class="thumbnail-img">
                                        
									<img class="img-fluid" src="{{ url('/') }}/uploads/products/{{ $row->product_image }}" alt="" />
								
                                    </td>
                                    <td class="name-pr">
									{{ $row->product_name }}
									<p>Size : {{ $row->product_size }}</p>
                                    </td>
                                    <td class="price-pr">
                                        <p>Rs : {{ $row->product_price }}</p>
                                    </td>
                                    <td class="quantity-box">
                                    	<a href="{{ url('cart/update-product-quantity/'.$row->id.'/1') }}" style="font-size: 25px;">+</a>
                                    	<input type="text" size="4" value="{{ $row->product_quantity }}" min="0" step="1" class="c-input-text qty text">
                                    	
                                    	@if($row->product_quantity > 1)
                                    	<a href="{{ url('cart/update-product-quantity/'.$row->id.'/-1') }}" style="font-size: 25px;">-</a>
                                    	@endif
                                    </td>
                                    <td class="total-pr">
                                        <p>{{ $row->product_price*$row->product_quantity }}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="{{ url('cart/remove-product/'.$row->id) }}" class="delete">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
                                <?php $grand_total = $grand_total + ($row->product_price*$row->product_quantity) ?>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order Summary</h3>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                           
                            <div class="ml-auto h5"> RS : {{ $grand_total }}</div>
                             
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{ url('/checkout') }}" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>

<script type="text/javascript">
  $(document).ready( function(){
    $('.delete').click(function(){

        if(confirm("Are you sure you want to remove it from cart?"))
        {
          return true;
        }
        else
        {
          return false;
        }
    });
  });
</script>

@endsection