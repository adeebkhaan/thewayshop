@extends('admin_files.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
            </ol>
          </div><!-- /.col -->
       
        </div><!-- /.row -->
        
        <div class="card card-primary col-sm-8">
           @if(session('success'))
              <div class="alert alert-success">
                    {{ session('success') }}
              </div>
        @endif
        @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('admin/edit-product') }}/{{ $product->id }}" method="post" enctype="multipart/form-data">
              	@csrf
              	<input type="hidden" name="id" id="id" value="{{ $product->id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label >Under Category</label>
                   <select name="category_id" id="category_id" class="form-control">
                     <?php echo $categories_dropdown; ?>

                   </select>
                  </div>
                  <div class="form-group">
                    <label >Product Name</label>
                    <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
                  </div>
                  <div class="form-group">
                    <label >Product Code</label>
                    <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}">
                  </div>
                  <div class="form-group">
                    <label >Product Colour</label>
                    <input type="text" class="form-control" name="product_colour" value="{{ $product->product_colour }}">
                  </div>
                  <div class="form-group">
                    <label >Product Description</label>
                    <br>
                    <textarea name="product_description" class="form-control">
                    	{{ $product->product_description }}
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label >Product Price</label>
                    <input type="text" class="form-control" name="product_price" value="{{ $product->product_price }}">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <br>
                    <input type="hidden"  value="$product->product_image">
                        <!-- @if(!empty($product->product_image)) -->
                        <img class="thumbnail" width="100" src="{{ url('/') }}/uploads/products/{{ $product->product_image }}">
                        <!-- @endif -->
                    <div class="input-group ">
                      <div class="custom-file form-control">
                        <input type="file"  name="product_image">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ url('admin/all-products') }}" class="btn btn-default">Cancel</a> 
                </div>
              </form>
            </div>
      </div><!-- /.container-fluid -->
    </div>
</div>
@endsection