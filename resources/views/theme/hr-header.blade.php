<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HRMS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
        
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
 
@php 
if(Auth()->user())
{
$emp_id=DB::table('hr_employee')->where('user_id',\Auth::user()->id)->pluck('id')->first(); 
$emp_data=DB::table('hr_employee_detail')->where('emp_id',$emp_id)->get()->first();
}
@endphp
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(Auth()->user())
              @if($emp_id)
              <img src="{{$emp_data->emp_photo}}" class="user-image" alt="User Image">
              @else
              <img src="{{URL::to('public/theme/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              @endif
              @endif
              <span class="hidden-xs"> @if(Auth::check()){{Auth::user()->name}}@endif</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                  @if(Auth()->user())
                  @if($emp_id)
                <img src="{{$emp_data->emp_photo}}" class="img-circle" alt="User Image">
                @else
                <img src="{{URL::to('public/theme/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                @endif
                 @endif

                <p>
                  @if(Auth::check()){{Auth::user()->name}}@endif
                  
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <!--<a href="#"  class="btn btn-default btn-flat">Sign out</a>-->
		<a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
    {{ csrf_field() }}
</form>

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
