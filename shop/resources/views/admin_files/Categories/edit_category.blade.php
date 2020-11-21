@extends('admin_files.master')

@section('content')

<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Categories</li>
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
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('/admin/edit-category') }}/{{ $category->id }}" method="post">
                <input type="hidden" name="id" id="id" value="{{ $category->id }}">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Category Name</label>
                    <input type="text" class="form-control" name="category_name" value="{{ $category->name }}">
                  </div>
                  <div class="form-group">
                    <label >Parent Category</label>
                    <select name="parent_id" id="parent_id" class="form-control" >
                      <option value="0">Parent Category</option>
                     @foreach($levels as $val)
                      <option value="{{ $val->id }}" @if($val->id == $category->parent_id) selected @endif>{{ $val->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Url</label>
                    <input type="text" class="form-control" name="url" value="{{ $category->url }}">
                  </div>
                  <div class="form-group">
                    <label >Category Description</label>
                    <br>
                    <textarea name="category_description" class="form-control">
                    	{{ $category->description }}
                    </textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Category</button>
                  <a href="{{ url('admin/view-categories') }}" class="btn btn-default">Cancel</a>
                </div>
              </form>
            </div>
      </div><!-- /.container-fluid -->
    </div>
</div>

@endsection