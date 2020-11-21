@extends('admin_files.master')

@section('content')
<div class="content-wrapper">
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Messages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">All Messages</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card">
            <div class="card-header">
              <h2 align="center">All Messages</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table_id" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Message</th>
                </tr>
                </thead>
                <tbody>
            	@foreach($messages as $row)
                <tr>
                 <td>{{ $row->user_name }}</td>
                 <td>{{ $row->user_email }}</td>
                 <td>{{ $row->user_message }}</td>
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