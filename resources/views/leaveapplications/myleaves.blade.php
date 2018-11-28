@extends('theme.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Leave Applications
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Leaves</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	 @php
      
      	$post_url = action('LeaveApplicationsController');
        $add_url = action('LeaveApplicationsController@add');
      @endphp
    <form action="{{$post_url}}" method="POST" class="main-header-form" id="sform">
    	{!! csrf_field() !!}
 	<div class="box">
 		<div class="box-header with-border">
 			<a  class="btn btn-primary" href="{{url('applyforleave')}}">Apply for new Leave</a>
        </div>
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>

        <div class="box-body" >
        </div>
        <div class="box-footer">
        </div>
     </div>   
     </form>
      <!-- /.box -->
		<div class="box">
		<div class="box-header">
		<h3 class="box-title">Applications</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body" >
			<table id="domain_list" class="table " style="overflow:auto;">
                <thead>
                <tr>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Backup Employee</th>
                  <th>Approved</th>
                  <th> </th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach ($rows as $row)
                 @php
      
                  $edit_url = action('LeaveApplicationsController@edit');
                  $delete_url = action('LeaveApplicationsController@delete');
                  
                @endphp
                <tr>
                  <td>{{$row->start_date}}</td>
                  <td>{{$row->end_date}}</td>
                  <td>{{getSelUser($row->backup_employee_id)}}</td>
                  <td>{{getSelApproved($row->approved)}}</td>
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