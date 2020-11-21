@extends('admin_files.master')

@section('content')

<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Banner</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Banner</li>
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
                <h3 class="card-title">Edit Banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('/admin/edit-banner') }}/{{ $banner->id }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="$banner->id">
              	@csrf
                <div class="card-body">
                  
                  <div class="form-group">
                    <label >Banner Name</label>
                    <input type="text" class="form-control" name="banner_name" value="{{ $banner->name }}">
                  </div>
                  <div class="form-group">
                    <label >Text Style</label>
                    <input type="text" class="form-control" name="text_style" value="{{ $banner->text_style }}">
                  </div>
                  <div class="form-group">
                    <label >Sort Order</label>
                    <input type="text" class="form-control" name="sort_order" value="{{ $banner->sort_order }}">
                  </div>
                  <div class="form-group">
                    <label >Content</label>
                    <br>
                    <textarea name="banner_content" class="form-control">
                    	{{ $banner->content }}
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label >Link</label>
                    <input type="text" class="form-control" name="link" value="{{ $banner->link }}">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <br>
                    <img style="width: 200px;" src="{{ url('/') }}/uploads/banners/{{ $banner->image }}">
                    <br><br>
                    <div class="input-group">
                      <div class=" form-control custom-file">
                        <input type="file"  name="banner_image">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ url('/admin/view-banners') }}" class="btn btn-default">Cancel</a>
                </div>
              </form>
            </div>
      </div><!-- /.container-fluid -->
    </div>
</div>

@endsection