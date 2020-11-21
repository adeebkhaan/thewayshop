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
            </div>
        </nav>
    </header>	

    <div class="contact-box-main">
    	<div class="container">
           
    		<div class="row">
    			<div class="col-lg-6 col-sm-12">
    				
    				<div class="contact-form-right">
    					<h2>Billing Details</h2>
    						<div class="row">
    							<div class="col-md-12">
    								<div class="form-group">
    									{{ $userDetails->name }}
    								</div>
    							</div>
    							<div class="col-md-12">
                                    <div class="form-group">
                                        {{ $userDetails->address }}
                                    </div>
                                </div>
    							<div class="col-md-12">
                                    <div class="form-group">
                                        {{ $userDetails->city }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                       {{ $userDetails->country }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                       {{ $userDetails->phone }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ $userDetails->pincode }}
                                    </div>
                                </div>
    							
    						</div>    
    				</div>
    			</div>
    			
    			<div class="col-lg-6 col-sm-12">
    				<div class="contact-form-right">
    					<h2>Shipping Details</h2>

    						<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ $shippingDetails->name }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ $shippingDetails->address }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ $shippingDetails->city }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ $userDetails->country }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                       {{ $shippingDetails->phone }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ $shippingDetails->pincode }}
                                    </div>
                                </div>
                            </div>
    					
    				</div>
    			</div>
    		</div>
    		<hr>
            <div class="row">
                <div class="col-lg-12">
                	<h1 align="center">Order Summary</h1>
                	<hr>	
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    
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
                                    	{{ $row->product_quantity }}
                                    </td>
                                    <td class="total-pr">
                                        <p>{{ $row->product_price*$row->product_quantity }}</p>
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
                <div class="col-lg-12 col-sm-12">
                	<div class="order-box">
                        <div class="d-flex gr-total">
                            <h5>Total Amount</h5>
                            <div class="ml-auto h5"> RS : {{ $grand_total }}</div>
                             
                        </div>
                        <hr></div>
                </div>
                <div class="col-lg-4 col-sm-12"></div>
            </div>

        <form name="paymentForm" id="paymentForm" action="{{url('/place-order')}}" method="post"> {{csrf_field()}}
           <input type="hidden" value="{{$grand_total}}" name="grand_total">
           
            <div class="title-left">
                <h3>Payments</h3>
            </div>
            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" name="payment_method" value="Cash on Delivery"  type="radio" class="custom-control-input cod">
                    <label class="custom-control-label" for="credit">Cash On Delivery</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="debit" name="payment_method" value="stripe" type="radio" class="custom-control-input stripe" >
                    <label class="custom-control-label" for="debit">Stripe</label>
                </div>
                <div class="col-12 d-flex shopping-box">
                    <button  type="submit" class="ml-auto btn hvr-hover" onclick="return selectPaymentMethod();" style="color:white;">Place Order</button> 
                </div>
            </div>
        </form>

        </div>
    </div>

@endsection