@extends('admin_files.master')

@section('content')

<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Banner</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Add Banner</li>
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
                <h3 class="card-title">Add New Banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('/admin/add-banner') }}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                  
                  <div class="form-group">
                    <label >Banner Name</label>
                    <input type="text" class="form-control" name="banner_name" placeholder="Enter Banner Name">
                  </div>
                  <div class="form-group">
                    <label >Text Style</label>
                    <input type="text" class="form-control" name="text_style" placeholder="Enter Text Style">
                  </div>
                  <div class="form-group">
                    <label >Sort Order</label>
                    <input type="text" class="form-control" name="sort_order" placeholder="Enter Sort Order">
                  </div>
                  <div class="form-group">
                    <label >Content</label>
                    <br>
                    <textarea name="banner_content" class="form-control">
                    	
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label >Link</label>
                    <input type="text" class="form-control" name="link" placeholder="Enter Link">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <div class="input-group">
                      <div class=" form-control custom-file">
                        <input type="file"  name="banner_image">
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