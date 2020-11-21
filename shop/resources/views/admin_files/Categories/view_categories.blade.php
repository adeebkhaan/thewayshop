@extends('admin_files.master')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">All Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card">
            <div class="card-header">
              <a href="{{ url('admin/add-category') }}" class="btn btn-primary">Add New Category</a>
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
                  <th>Category ID</th>
                  <th>Parent ID</th>
                  <th>Category Name</th>
                  <th>URL</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              @foreach($categories as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->parent_id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->url }}</td>
                  <td>{{ $row->description }}</td>
                  <td>
                    <a href="{{ url('admin/edit-category') }}/{{ $row->id }}" class="btn btn-success">Edit</a>
                    <a href="{{ url('admin/delete-category') }}/{{ $row->id }}" class="btn btn-danger">Delete</a>
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