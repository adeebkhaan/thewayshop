@extends('front_files.master')

@section('content')

    <div class="contact-box-main">
    	<div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
            @endif
    		<div class="row">
                <div class="col-md-3"></div>
    			<div class="col-md-6">
    				
    				<div class="contact-form-right">
    					<h2>Change Password</h2>
    					<form action="{{ url('/change-password') }}" method="post" id="contactForm userRegister">
    						@csrf
    						<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="old_password" id="old_password" placeholder="Old Password" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                        
                                    </div>
                                </div>
    							<div class="col-md-12">
    								<div class="form-group">
    									<input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password" required data-error="Please enter your email">
    									<div class="help-block with-errors"></div>
    									
    								</div>
    							</div>
    							<div class="col-md-12">
    								<div class="form-group">
    									<input type="password" class="form-control" name="new_password" id="new_password" placeholder="New password" required data-error="Please enter password">
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