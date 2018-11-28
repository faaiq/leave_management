@php
$name = Auth::user()->name;
$name_phpto = Auth::user()->user_photo;
@endphp

<style>

.empty-message {
  background: #16D39A !important;
  color:#000000;
  padding: 5px;
  font-size: 12px;
  font-weight: bold;
  text-align: center;
  cursor: pointer;
}


.footer-message {
  background: #16D39A !important;
  color:#000000;
  padding: 5px;
  font-size: 12px;
  font-weight: bold;
  text-align: center;
  cursor: pointer;
}

.twitter-typeahead {
   width: 100%;
}

.tt-menu {
  border:1px solid;
  padding: 0px;
  width: 100%;
  background: #ffffff;
  color: #000000;
}

.suggestion {

   background: #FFFFFF !important;
   font-size: 14px;
   font-weight: bold;
   padding: 3px;
   border-bottom: 1px solid #8FBC8F;
}
.suggestion:hover {

   background: #16D39A !important;
   font-size: 14px;
   font-weight: bold;
   padding: 3px;
   border-bottom: 1px solid #8FBC8F;
}
</style>

<header class="main-header">
    <!-- Logo -->
    <a href="{{url("/")}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>LEAVE</b> MGT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>LEAVE</b> MGT</span>
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
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>

                </ul>
              </li>

            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
              if(empty($name_phpto))
              {
              ?>
              <img src="{{url('/')}}/public/theme/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <?php
              }
              else
              {
              ?>
              <img src="{{url('public/document')}}/{{$name_phpto}}" class="user-image" alt="User Image">
              <?php
              }
             ?>
              <span class="hidden-xs">{{$name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <?php
              if(empty($name_phpto))
              {
              ?>
                <img src="{{url('/')}}/public/theme/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <?php
              }
              else
              {
              ?>
              <img src="{{url('public/document')}}/{{$name_phpto}}" class="img-circle" alt="User Image">
              <?php
              }
             ?>

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
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
