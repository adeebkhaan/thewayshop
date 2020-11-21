@extends('admin_files.master')

@section('content')

<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
                <h3 class="card-title">Add New Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('/admin/add-product') }}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Under Category</label>
                   <select name="category_id" id="category_id" class="form-control">
                     <?php echo $categories_dropdown; ?>
                   </select>
                  </div>
                  <div class="form-group">
                    <label >Product Name</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name">
                  </div>
                  <div class="form-group">
                    <label >Product Code</label>
                    <input type="text" class="form-control" name="product_code" placeholder="Enter Product Code">
                  </div>
                  <div class="form-group">
                    <label >Product Colour</label>
                    <input type="text" class="form-control" name="product_colour" placeholder="Enter Product Colour">
                  </div>
                  <div class="form-group">
                    <label >Product Description</label>
                    <br>
                    <textarea name="product_description" class="form-control">
                    	
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label >Product Price</label>
                    <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <div class="input-group">
                      <div class=" form-control custom-file">
                        <input type="file"  name="product_image">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
      </div><!-- /.container-fluid -->
    </div>
</div>

@endsection