@extends('admin_files.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">All Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card">
            <div class="card-header">
              <h1 align="center">All Orders</h>
              <br>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table_id" class="table table-bordered table-hover">
                <thead>

                <tr>
                  <th>Order ID</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Ordered Products</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($Orders as $order)
                <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->name }}</td>
                  <td>{{ $order->user_email }}</td>
                  <td>
                      @foreach($order->user_orders as $pro)
                                       {{ $pro->product_name }}
                                       (Size: {{ $pro->product_size }})
                                       (Quantity: {{ $pro->product_quantity }})
                                       (Code: {{ $pro->product_code }})
                                       <br>
                      @endforeach
                  </td>
                  
                  <td><a href="{{ url('admin/orders/'.$order->id) }}" class="btn btn-primary">View Order Details</a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
      </div><!-- /.container-fluid -->
    </div>
</div>


@endsection