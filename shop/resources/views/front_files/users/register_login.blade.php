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
    			<div class="col-lg-5 col-sm-12">
    				@if(session('error'))
              		<div class="alert alert-danger">
                    {{ session('error') }}
              		</div>
        			@endif
    				<div class="contact-form-right">
    					<h2>User Registration</h2>
    					<form action="{{ url('/user-register') }}" method="post" id="contactForm userRegister">
    						@csrf
    						<div class="row">
    							<div class="col-md-12">
    								<div class="form-group">
    									<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required data-error="Please enter your name">
    									<div class="help-block with-errors"></div>
    									
    								</div>
    							</div>
    							<div class="col-md-12">
    								<div class="form-group">
    									<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required data-error="Please enter your email">
    									<div class="help-block with-errors"></div>
    									
    								</div>
    							</div>
    							<div class="col-md-12">
    								<div class="form-group">
    									<input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required data-error="Please enter password">
    									<div class="help-block with-errors"></div>
    									
    								</div>
    							</div>
    							<div class="col-md-12">
    								<div class="submit-button text-center">
    									<button class="btn hvr-hover" id="submit" type="submit">Register</button>
    									<div id="msgSubmit" class="h3 text-center hidden"></div>
    									<div class="clearfix"></div>
    								</div>
    								
    							</div>
    						</div>
    					</form>
    				</div>
    			</div>
    			<div class="col-lg-1 col-sm-12" id="or">
    				OR
    			</div>
    			<div class="col-lg-5 col-sm-12">
    				@if(session('loginError'))
              		<div class="alert alert-danger">
                    {{ session('loginError') }}
              		</div>
        			@endif
    				<div class="contact-form-right">
    					<h2>Already a Member ? Just Login</h2>
    					<form action="{{ url('/user-login') }}" id="contactForm userLogin" method="post">
    						@csrf
    						<div class="row">
    							<div class="col-md-12">
    								<div class="form-group">
    									<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required data-error="Please enter your email">
    									<div class="help-block with-errors"></div>
    									
    								</div>
    							</div>
    							<div class="col-md-12">
    								<div class="form-group">
    									<input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required data-error="Please enter password">
    									<div class="help-block with-errors"></div>
    									
    								</div>
    							</div>
    							<div class="col-md-12">
    								<div class="submit-button text-center">
    									<button class="btn hvr-hover" id="submit" type="submit">Login</button>
    									<div id="msgSubmit" class="h3 text-center hidden"></div>
    									<div class="clearfix"></div>
    								</div>
    								
    							</div>
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    		
    	</div>
    	
    </div>

@endsection