@extends('admin_files.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">All Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card">
            <div class="card-header">
              <a href="{{ url('admin/add-product') }}" class="btn btn-primary">Add New Product</a>
              <br>
              <br>
              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
            @endif

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table_id" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Category ID</th>
                  <th>Product Name</th>
                  <th>Code</th>
                  <th>Colour</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            	@foreach($data as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->category_id }}</td>
                	<td>{{ $row->product_name }}</td>
                	<td>{{ $row->product_code }}</td>
                	<td>{{ $row->product_colour }}</td>
                	<td>{{ $row->product_description }}</td>
                	<td>{{ $row->product_price }}</td>
                	<td>
                		<img class="thumbnail" width="100" src="{{ url('/') }}/uploads/products/{{ $row->product_image }}">
                	</td>
                	<td>
                    <a href="{{ url('admin/add-product-attributes') }}/{{ $row->id }}" class="btn btn-warning">Atrributes</a>
                		<a href="{{ url('admin/edit-product') }}/{{ $row->id }}" class="btn btn-success">Edit</a>
                		<a href="{{ url('admin/delete-product') }}/{{ $row->id }}" class="btn btn-danger">Delete</a>
                	</td>
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

<script type="text/javascript">
  $(document).ready( function(){
    $('.btn-danger').click(function(){

        if(confirm("Are you sure you want to delete it?"))
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