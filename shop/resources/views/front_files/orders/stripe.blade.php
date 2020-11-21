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
            @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
            @endif
            <div class="row">	
                <div class="col-lg-6">
                   <h1 align="center"><b>Thanks for Shopping!</b></h1>
                   <br>
                   <br>
                
                    <h2 align="center">YOUR ORDER HAS BEEN PLACED</h2>
                    <p align="center">Your order has placed successfully and total payable amount is PKR {{
                    Session::get('grand_total')}}.</p>
                    <p align="center">Please make payment by entering debit or credit card.</p>
                </div>
                <div class="col-lg-6">
                    <script src="https://js.stripe.com/v3/"></script>

                    <form action="{{url('/stripe')}}" method="post" id="payment-form">
                        @csrf
                      <div class="form-row">
                        <b>Total Amount</b>
                        <input type="text" name="total_amount" value="{{
                    Session::get('grand_total')}}" placeholder="Enter Total Amount" class="form-control">
                        <b>Your Name</b>
                        <input type="text" name="name" placeholder="Enter Your Name" class="form-control">
                        <b>Card Number</b>
                        <div id="card-element" class="form-control">
                            
                        </div>
                      </div>

                      <button class="btn btn-success btn-mini" style="float: right; margin-top: 10px;">Submit Payment</button>
                    </form>
                    <div id="card-error" role="alert"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51HNE9kHFGm1B1AUmf0xigWd41hxmTjyikUxkWgRz2QBaEThaUN7AuzsWQJfoybM0rk5D8aZtkHs91v2jADsUT7EL00H1PM2VCr');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
          base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
              color: '#aab7c4'
            }
          },
          invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
          }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
          var displayError = document.getElementById('card-errors');
          if (event.error) {
            displayError.textContent = event.error.message;
          } else {
            displayError.textContent = '';
          }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
          event.preventDefault();

          stripe.createToken(card).then(function(result) {
            if (result.error) {
              // Inform the user if there was an error.
              var errorElement = document.getElementById('card-errors');
              errorElement.textContent = result.error.message;
            } else {
              // Send the token to your server.
              stripeTokenHandler(result.token);
            }
          });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
          // Insert the token ID into the form so it gets submitted to the server
          var form = document.getElementById('payment-form');
          var hiddenInput = document.createElement('input');
          hiddenInput.setAttribute('type', 'hidden');
          hiddenInput.setAttribute('name', 'stripeToken');
          hiddenInput.setAttribute('value', token.id);
          form.appendChild(hiddenInput);

          // Submit the form
          form.submit();
        }
    </script>
@endsection

<?php 
    
    Session::forget('order_id');
    Session::forget('grand_total');
?>