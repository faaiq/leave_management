@extends('theme.default')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
    @php
      	$UsersController_url = action('UsersController');
        $id = isset($rows->id) ? $rows->id : "";
		$name = isset($rows->name) ? $rows->name : "";
		$email = isset($rows->email) ? $rows->email : "";
		$password = isset($rows->password) ? $rows->password : "";
		$user_type = isset($rows->user_type) ? $rows->user_type : "";
		$designation = isset($rows->designation) ? $rows->designation : "";
		$department = isset($rows->department) ? $rows->department : "";
		$mobile = isset($rows->mobile) ? $rows->mobile : "";
		$address = isset($rows->address) ? $rows->address : "";
		$city = isset($rows->city) ? $rows->city : "";
		$state = isset($rows->state) ? $rows->state : "";

    @endphp
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$title_text}}
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{$UsersController_url}}">Users</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @php
      	$post_url = action('UsersController@add');
      	$csrf_token = csrf_token();
      @endphp
      {!! Form::model($User, ['action' => 'UsersController@add', 'method' => 'post', 'class' => 'main-header-form']) !!}
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
	        		<div class=" col-lg-6 ">
							<div class="form-group">
								{!! Form::label('name', 'Name') !!}
								{!! Form::text('name', old('name', $name), ['class' => 'form-control','id' => 'name',"placeholder" => "Name"]) !!}
							</div>
			        </div>
	        		<div class=" col-lg-6 ">
							<div class="form-group">
								{!! Form::label('email', 'Email') !!}
								{!! Form::text('email', old('email', $email), ['class' => 'form-control','id' => 'email',"placeholder" => "Email"]) !!}
							</div>
			        </div>
				</div>
				<div class="row">
	        		<div class=" col-lg-6 ">
							<div class="form-group">
								{!! Form::label('user_type', 'User Type') !!}
								@php 
                                $options =  userTypeDom();  
								echo Form::select('user_type', $options, old('user_type', $user_type), ['class' => 'form-control','id' => 'user_type',"placeholder" => "User Type"])
                                @endphp
							</div>
			        </div>
				</div>
				<div class="row">
	        		<div class=" col-lg-6 ">
							<div class="form-group">
								{!! Form::label('designation', 'Designation') !!}
								{!! Form::text('designation', old('designation', $designation), ['class' => 'form-control','id' => 'designation',"placeholder" => "Designation"]) !!}
							</div>
			        </div>
	        		<div class=" col-lg-6 ">
							<div class="form-group">
								{!! Form::label('department', 'Department') !!}
								{!! Form::text('department', old('department', $department), ['class' => 'form-control','id' => 'department',"placeholder" => "Department"]) !!}
							</div>
			        </div>
				</div>
				<div class="row">
	        		<div class=" col-lg-6 ">
							<div class="form-group">
								{!! Form::label('mobile', 'Mobile') !!}
								{!! Form::text('mobile', old('mobile', $mobile), ['class' => 'form-control','id' => 'mobile',"placeholder" => "Mobile"]) !!}
							</div>
			        </div>
	        		<div class=" col-lg-6 ">
							<div class="form-group">
								{!! Form::label('address', 'Address') !!}
								{!! Form::text('address', old('address', $address), ['class' => 'form-control','id' => 'address',"placeholder" => "Address"]) !!}
							</div>
			        </div>
				</div>
				<div class="row">
	        		<div class=" col-lg-6 ">
							<div class="form-group">
								{!! Form::label('city', 'City') !!}
								{!! Form::text('city', old('city', $city), ['class' => 'form-control','id' => 'city',"placeholder" => "City"]) !!}
							</div>
			        </div>
	        		<div class=" col-lg-6 ">
							<div class="form-group">
								{!! Form::label('state', 'State') !!}
								{!! Form::text('state', old('state', $state), ['class' => 'form-control','id' => 'state',"placeholder" => "State"]) !!}
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

</script>  
  
@endsection