@extends('admin_files.master')

@section('content')

<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Product Attributes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Add Product Attributes</li>
            </ol>
          </div><!-- /.col -->
       
        </div><!-- /.row -->
        
        <div class="card card-primary col-sm-8">
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
              <div class="card-header">
                <h3 class="card-title">Add Product Attributes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('/admin/add-product-attributes') }}/{{$productDetails->id}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="{{$productDetails->id}}">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Product Name</label> {{$productDetails->product_name}}
                  </div>
                  <div class="form-group">
                    <label >Product Code</label> {{$productDetails->product_code}}
                  </div>
                  <div class="form-group">
                    <label >Product Colour</label> {{$productDetails->product_colour}}
                  </div>
                  <div class="form-group">
                    <div class="field_wrapper" >
                        <div style="display: flex;">
                            <input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" style="width: 150px; margin-right: 5px; margin-bottom: 5px;" />
                            <input type="text" name="size[]" id="size" placeholder="Size" class="form-control" style="width: 150px; margin-right: 5px; margin-bottom: 5px;" />
                            <input type="text" name="price[]" id="price" placeholder="Price" class="form-control" style="width: 150px; margin-right: 5px; margin-bottom: 5px;" />
                            <input type="text" name="stock[]" id="stock" placeholder="Stock" class="form-control" style="width: 150px; margin-right: 5px; margin-bottom: 5px;" />
                            <a href="javascript:void(0)" class="add_button btn btn-success" title="Add Field" style="margin-bottom: 5px;">Add</a>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Attributes</button>
                  <a href="{{ url('admin/all-products') }}" class="btn btn-default">Cancel</a>
                </div>
              </form>
            </div>
            <br>
            <br>
            <br>

            <!-- Attributes Table -->

            <div class="card">
            <div class="card-header">
              <h1> Product Attributes</h1>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table_id" class="table table-bordered table-hover">
                <form action="{{ url('admin/edit-product-attributes/'.$productDetails->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                <thead>
                <tr> 
                  <th>Product ID</th>
                  <th>SKU</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              @foreach($productDetails['attributes'] as $attribute)
                <tr>
                  <td  style="display: none;">
                    <input type="hidden" name="attr[]" value="{{ $attribute->id }}">{{ $attribute->id }}
                  </td>
                  <td style="text-align: center;">{{ $attribute->product_id }}</td>
                  <td><input type="text" name="sku[]" value="{{ $attribute->sku }}" style="text-align: center;"></td>
                  <td><input type="text" name="size[]" value="{{ $attribute->size }}" style="text-align: center;"></td>
                  <td><input type="text" name="price[]" value="{{ $attribute->price }}" style="text-align: center;"></td>
                  <td><input type="text" name="stock[]" value="{{ $attribute->stock }}" style="text-align: center;"></td>
                  <td>
                    <input type="submit" value="Update" class="btn btn-success">
                    <a href="{{ url('admin/delete-product-attributes/'.$attribute->id) }}" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
              @endforeach 
                </tbody>
              </table>
              </form>
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