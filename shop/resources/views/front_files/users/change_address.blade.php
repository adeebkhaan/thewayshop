@extends('front_files.master')

@section('content')

    <div class="contact-box-main">
    	<div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
            @endif
    		<div class="row">
                <div class="col-md-3"></div>
    			<div class="col-md-6">
    				@if(session('error'))
              		<div class="alert alert-danger">
                    {{ session('error') }}
              		</div>
        			@endif
    				<div class="contact-form-right">
    					<h2>Change Address</h2>
    					<form action="{{ url('/change-address') }}" method="post" id="contactForm userRegister">
    						@csrf
    						<div class="row">
    							<div class="col-md-12">
    								<div class="form-group">
    									<input type="text" class="form-control" name="name" id="name" value="{{$userDetails->name}}" required data-error="Please enter your email">
    									<div class="help-block with-errors"></div>
    									
    								</div>
    							</div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Your Address" name="address" id="address" value="{{$userDetails->address}}" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Your City" value="{{$userDetails->city}}" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                       <select class="form-control" name="country">
                                           <option value="1">Select Country</option>
                                           @foreach($countries as $country)
                                           <option value="{{ $country->country_name }}" @if($country->country_name == $userDetails->country) selected @endif >{{ $country->country_name }}</option>
                                           @endforeach
                                       </select>
                                        
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" value="{{$userDetails->phone}}" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Your Pincode" value="{{$userDetails->pincode}}" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
    							
    							<div class="col-md-12">
    								<div class="submit-button text-center">
    									<button class="btn hvr-hover" id="submit" type="submit">Save</button>
    									<div id="msgSubmit" class="h3 text-center hidden"></div>
    									<div class="clearfix"></div>
                                        <a href="{{ url('/account') }}" class="btn btn-info">Cancel</a>
    								</div>
    								
    							</div>
    						</div>
    					</form>
    				</div>
    			</div>
                <div class="col-md-3"></div>
    		</div>
    		
    	</div>
    	
    </div>

@endsection