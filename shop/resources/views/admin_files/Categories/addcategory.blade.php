@extends('admin_files.master')

@section('content')

<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Add Categories</li>
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
                <h3 class="card-title">Add New Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ url('/admin/add-category') }}" method="post">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Category Name</label>
                    <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name">
                  </div>
                  <div class="form-group">
                    <label >Parent Category</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                      <option value="0">Parent Category</option>
                      @foreach($levels as $val)
                      <option value="{{ $val->id }}">{{ $val->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Url</label>
                    <input type="text" class="form-control" name="url" placeholder="Enter Url">
                  </div>
                  <div class="form-group">
                    <label >Category Description</label>
                    <br>
                    <textarea name="category_description" class="form-control">
                    	
                    </textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
              </form>
            </div>
      </div><!-- /.container-fluid -->
    </div>
</div>

@endsection