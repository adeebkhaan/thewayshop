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
            <form action="{{ url('/checkout') }}" method="post" id="contactForm userRegister">
            @csrf
    		<div class="row">
    			<div class="col-lg-6 col-sm-12">
    				@if(session('error'))
              		<div class="alert alert-danger">
                    {{ session('error') }}
              		</div>
        			@endif
    				<div class="contact-form-right">
    					<h2>Bill To</h2>
    						<div class="row">
    							<div class="col-md-12">
    								<div class="form-group">
    									<input type="text" class="form-control" name="billing_name" id="billing_name" value="{{ $userDetails->name }}" required data-error="Please enter your name">
    									<div class="help-block with-errors"></div>
    									
    								</div>
    							</div>
    							<div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="billing_address" id="billing_address" value="{{ $userDetails->address }}" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
    							<div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="billing_city" id="billing_city" value="{{ $userDetails->city }}" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="billing_country" id="billing_country" class="form-control">
                                            <option value="1">Select Country</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->country_name }}" @if(!empty($userDetails->country) && $country->country_name == $userDetails->country) selected @endif> {{ $country->country_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="billing_phone" id="billing_phone" value="{{ $userDetails->phone }}" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="billing_pincode" id="billing_pincode" value="{{ $userDetails->pincode }}" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
    							<div class="col-md-12">
    								<div class="form-group" style="margin-left: 30px;">
                                        <input type="checkbox" class="form-check-input" name="billtoshop" id="billtoshop">
                                        <label class="form-check-label" for="billtoshop">Shipping Address same as Billing Address</label>
                                    </div>
    							</div>
    						</div>    
    				</div>
    			</div>
    			
    			<div class="col-lg-6 col-sm-12">
    				<div class="contact-form-right">
    					<h2>Ship To</h2>

    						<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Shipping Name" name="shipping_name" id="shipping_name" @if(!empty($shippingDetails->name)) value="{{ $shippingDetails->name }}" @endif required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Shipping Address" name="shipping_address" id="shipping_address" @if(!empty($shippingDetails->address)) value="{{ $shippingDetails->address }}" @endif required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Shipping City" name="shipping_city" id="shipping_city" @if(!empty($shippingDetails->city)) value="{{ $shippingDetails->city }}" @endif required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                       <select name="shipping_country" id="shipping_country" class="form-control">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->country_name }}" @if(!empty($shippingDetails->country) && $country->country_name == $shippingDetails->country) selected @endif> {{ $country->country_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Shipping Phone" name="shipping_phone" id="shipping_phone" @if(!empty($shippingDetails->phone)) value="{{ $shippingDetails->phone }}" @endif required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Shipping Pincode" name="shipping_pincode" id="shipping_pincode" @if(!empty($shippingDetails->address)) value="{{ $shippingDetails->pincode }}" @endif required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button type="submit" class="btn hvr-hover">Checkout</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
    					
    				</div>
    			</div>
    		</div>
    		</form>
    	</div>
    	
    </div>

@endsection