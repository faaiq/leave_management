@php 
  $user = Auth::user(); 
  $user_type = $user->user_type;
  $name = $user->name; 
  $id =   $user->id; 
  
  
@endphp

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">

                @if(empty($name_phpto))
                <img src="{{url('/')}}/public/theme/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> @else
                <img src="{{url('public/document')}}/{{$name_phpto}}" class="img-circle" alt="User Image"> @endif
            </div>
            <div class="pull-left info">
                <p>{{ $name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          @if($user_type == 'super_admin')
          <li><a href="{{url('users')}}"><i class="fa fa-circle-o"></i> Users</a></li>
          <li><a href="{{url('leaveapplications')}}"><i class="fa fa-circle-o"></i> Leave Applications</a></li>
          @else
          <li><a href="{{url('myprofile')}}"><i class="fa fa-circle-o"></i> My Profile</a></li>
          <li><a href="{{url('myleaves')}}"><i class="fa fa-circle-o"></i> My Leave </a></li>
          @endif;
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>