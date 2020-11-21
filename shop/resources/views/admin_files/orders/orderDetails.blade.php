@extends('admin_files.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Order Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Order Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card">
            <div class="card-header">
              <h1 align="center">Order Details</h>
              <br>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <td>Order ID</td>
                  <td>{{ $orderDetails->id }}</td>
                </tr>
                <tr>
                  <td>Order Date</td>
                  <td>{{ $orderDetails->created_at->format('d-m-y') }}</td>
                </tr>
                <tr>
                  <td>Total Amount</td>
                  <td>{{ $orderDetails->grand_total }}</td>
                </tr>
                <tr>
                  <td>Shipping Charges</td>
                  <td>{{ $orderDetails->shipping_charges }}</td>
                </tr>
                <tr>
                  <td>Payment Method</td>
                  <td>{{ $orderDetails->payment_method }}</td>
                </tr>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          
        <div class="card">
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
        </div>
        </div>   
      </div><!-- /.container-fluid -->
      <a href="{{ url('admin/orders') }}" class="btn btn-info">Back</a>
    </div>
</div>



@endsection