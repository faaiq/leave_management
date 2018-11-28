@extends('theme.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
    @php

			$LeaveApplicationsController_url = action('LeaveApplicationsController');
			$id = isset($rows->id) ? $rows->id : "";
			$user_id = isset($rows->user_id) ? $rows->user_id : "";
			$start_date = isset($rows->start_date) ? DateMysqlToJs($rows->start_date) : "";
			$end_date = isset($rows->end_date) ? DateMysqlToJs($rows->end_date) : "";
			$reason = isset($rows->reason) ? $rows->reason : "";
			$backup_employee_id = isset($rows->backup_employee_id) ? $rows->backup_employee_id : "";
			$approved = isset($rows->approved) ? $rows->approved : "";

    @endphp
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$title_text}}
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{$LeaveApplicationsController_url}}">Leave Applications</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @php
      	$post_url = action('LeaveApplicationsController@add');
      	$csrf_token = csrf_token();
      @endphp
      {!! Form::model($LeaveApplication, ['action' => 'LeaveApplicationsController@add', 'method' => 'post', 'class' => 'main-header-form']) !!}
    	{!! csrf_field() !!}
			<input type="hidden" name="id" value="{{$id}}" />
 	<div class="box">
 		<div class="box-header with-border">
          <h3 class="box-title">{{$title_text}}</h3>
        </div>

        <div class="box-body" >
        	@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
				<div class="row">
	        		<div class=" col-lg-3 ">
                        <div class="form-group">
                            {!! Form::label('user_id', 'User') !!}
                            @php $options =  getUsersDom();  
                            echo Form::select('user_id', $options, old('user_id', $user_id), ['class' => 'form-control','id' => 'user_id',"placeholder" => "User"])
                            @endphp
                        </div>
			        </div>
					<div class="col-lg-3">
							<div class="form-group">
								{!! Form::label('start_date', 'Start Date') !!}
								<div class='input-group date' >
								 	{!! Form::text('start_date', old('start_date', $start_date), ['class' => 'form-control','id' => 'start_date',"placeholder" => "Start Date"]) !!}
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
							</div>
					</div>
					<div class=" col-lg-3 ">
							<div class="form-group">
								{!! Form::label('end_date', 'End Date') !!}
								<div class='input-group date' >
								 	{!! Form::text('end_date', old('end_date', $end_date), ['class' => 'form-control','id' => 'end_date',"placeholder" => "End Date"]) !!}
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
							</div>
					</div>
	        		<div class=" col-lg-8 ">
							<div class="form-group">
								{!! Form::label('reason', 'Reason') !!}
								{!! Form::textarea('reason', old('reason', $reason), ['class' => 'form-control','id' => 'reason',"placeholder" => "Reason"]) !!}
							</div>
			        </div>
				</div>
				<div class="row">
	        		<div class=" col-lg-6 ">
							<div class="form-group">
								{!! Form::label('backup_employee_id', 'Backup Employee') !!}
								@php $options =  getEmployeeList();  
								echo Form::select('backup_employee_id', $options, old('backup_employee_id', $backup_employee_id),['class' => 'form-control','id' => 'backup_employee_id'])
                                @endphp
                            </div>
			        </div>
	        		<div class=" col-lg-6 ">
							<div class="form-group">
								{!! Form::label('approved', 'Approved') !!}
								@php $options =  getApprovedList();  
								echo Form::select('approved', $options,old('approved', $approved),['class' => 'form-control','id' => 'approved'])
                                @endphp
                            </div>
			        </div>
				</div>


        </div>


        </div>
        <div class="box-footer">
        	<button type="submit" class="btn btn-info">{{$submit_text}}</button>
        </div>
     </div>   
     {!! Form::close() !!}
      <!-- /.box -->
	
    </section>
    <!-- /.content -->


  </div>
<script language="javascript">
function reset_fields(sform) {
}

//Date picker
$('#start_date').datepicker({
  autoclose: true,
  format: 'dd/mm/yyyy',
	startDate:new Date()
})
//Date picker
$('#end_date').datepicker({
  autoclose: true,
  format: 'dd/mm/yyyy',
	startDate:new Date()
})
</script>  
  
@endsection