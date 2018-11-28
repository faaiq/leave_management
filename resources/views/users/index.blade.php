@extends('theme.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Users
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	 @php
      
      	$post_url = action('UsersController');
        $add_url = action('UsersController@add');
      @endphp
    <form action="{{$post_url}}" method="POST" class="main-header-form" id="sform">
    	{!! csrf_field() !!}
 	<div class="box">
 		<div class="box-header with-border">
 			<a  class="btn btn-primary" href="{{$add_url}}">Add User</a>
        </div>
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>

        <div class="box-body" >
        	<div class="row">
        	</div>
        </div>
        <div class="box-footer">
     
        </div>
     </div>   
     </form>
      <!-- /.box -->
		<div class="box">
		<div class="box-header">
		<h3 class="box-title">Domain list</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body" >
			<table id="domain_list" class="table " style="overflow:auto;">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Type</th>
                  <th>Designation</th>
                  <th> </th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach ($rows as $row)
                 @php
      
                  $edit_url = action('UsersController@edit');
                  $delete_url = action('UsersController@delete');
                  
                @endphp
                <tr>
                  <td>{{$row->name}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{getSelUserType($row->user_type)}}</td>
                  <td>{{$row->designation}}</td>
                  <td><a href="{{ $edit_url . "/" . $row->id }}">Edit</a></td>
                  <td><a href="{{ $delete_url . "/" . $row->id }}">Delete</a></td>
                </tr>
                @endforeach
                </tfoot>
              </table>
		</div>
		<div class="box-footer">
		{{ $rows->links() }}
		</div>

    </section>
    <!-- /.content -->


  </div>
<script language="javascript">
function reset_fields(sform) {
}


	
 </script>  
  
@endsection