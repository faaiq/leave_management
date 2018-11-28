
<style type="text/css">
  
  body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 13px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
}
</style>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">

@php 
if(Auth()->user())
{
$emp_data=DB::table('users')->where('id',\Auth::user()->id)->get()->first();
}
@endphp

          @if(Auth()->user())
          @if($emp_id)
          <img src="{{$emp_data->user_photo}}" class="img-circle" alt="User Image">
          @else

          <img src="{{URL::to('public/theme/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
          @endif
           @endif
        </div>
        <div class="pull-left info">
          <p>@if(Auth::check()){{Auth::user()->name}}@endif</p>
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

  <!-- Menu -->

@php
use  HRMS\Roles\Models\roles;
use  HRMS\Roles\Models\userHasRoles;

$home_path="/employee-dashboard";

if(Auth()->user())
{

$user_id= Auth()->user()->id;

$roles=userHasRoles::where('user_id', '=', $user_id)->get()->pluck('role_id');
$home_path=roles::whereIn('id', $roles->toArray())->orderBy('weight', 'asc')->get()->first()['login_redirect'];

}

//dd($home_path);

@endphp


      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

         <li class="active">
          <a href="{{url('/')}}">
            <i class="glyphicon glyphicon-menu-left"></i> <span>BACK TO CRM</span>
            
          </a>
        </li>

        <li class="active">
          <a href="{{url($home_path)}}">
            <i class="glyphicon glyphicon-home"></i> <span>Home</span>
            
          </a>
        </li>
       
    
       <!-- <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-cog"></i>
            <span>Manage Company Setup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i>Add Company</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i>Company List</a></li>
           
          </ul>
        </li>-->


        
@php
 use HRMS\Menu\Controllers\menuController;
 $request = new Illuminate\Http\Request;
 $menu_data=menuController::getMenu('hr_menu','');

 if(Auth()->user())
{

   $menu_data_parent=menuController::getMenuParents('hr_menu');

   $menu_data_children=menuController::getMenuChilds('hr_menu');

//dd(count($menu_data_children));
//dd($menu_data_parent);
//dd(sizeof($menu_data));
//dd($request->route()->uri());
//dd(app('request')->route()->uri());

 $LeftMenuHTML="";
foreach ($menu_data_parent as $menu_data_parent_term) 
{
  //get all parents
  
  //show parent only if children exists
if(check_haschildren($menu_data_children,$menu_data_parent_term->tid))
{
   // dd($menu_data_parent_term->name);

   $LeftMenuHTML = $LeftMenuHTML. "<li class=\"treeview\"><a id=\"menu_{$menu_data_parent_term->tid}\"><i class=\"fa fa-pie-chart\"></i><span>".$menu_data_parent_term->name."</span><span class=\"pull-right-container\"><i class=\"fa fa-angle-left pull-right\"></i></span></a>";

}
 if(check_haschildren($menu_data_children,$menu_data_parent_term->tid))
{
    //give ul for children
    $LeftMenuHTML = $LeftMenuHTML. "<ul class=\"treeview-menu\">";

        //loop all children
        foreach ($menu_data_children as $menu_data_children_term)
{

    //if current child is of this parent
    if($menu_data_children_term->parent_id==$menu_data_parent_term->tid)
    {
   //add the li element
   //check if its active link 
   //check if active

  //  dd($menu_data_children->url);
   if($menu_data_children_term->url == '/'.app('request')->route()->uri())
        {


 $LeftMenuHTML =$LeftMenuHTML. "<li class=\"active\"><a class=\"toggled\" href=\"/".$menu_data_children_term->url."\">".$menu_data_children_term->name."</a></li>";

        }
        else
        {
       $LeftMenuHTML =$LeftMenuHTML. "<li><a href=\"/".$menu_data_children_term->url."\"><i class=\"fa fa-circle-o\"></i>".$menu_data_children_term->name."</a></li>";
        }
} //if current child
     

} // foreach end
$LeftMenuHTML = $LeftMenuHTML. "</ul>";

//close parent li
      $LeftMenuHTML = $LeftMenuHTML."</a></li>";
}


}  //end for parent
print $LeftMenuHTML;
} // if auth check

function check_haschildren($term_list,$parent_id)
{
//dd($term_list);
//dd($parent_id);
$has_parent=false;
foreach($term_list as $term)
{
    
   // dd($term->parent_id);
if($term->parent_id==$parent_id)
{
    $has_parent=true;  
}
}

//dd ( $has_parent);
  return  $has_parent; 

}
//old code
$counter=0;
function generateMenu( $menu_data, $counter) 
{
    if($counter== sizeof($menu_data))
    {
    return;
    }


//check has children
$checked=0;
for ($c=$counter+1; $c<sizeof($menu_data); $c++) 
{
if ($menu_data[$c]->parent_id==$menu_data[$counter]->tid)
{
$checked=1;
}
}
    $MenuHTML ="";
    if($checked)
    {
//child found 
    if($counter >0)
    {
//dd($menu_data[$counter]);
        $MenuHTML ="";
        $MenuHTML = $MenuHTML."</ul></li>";
    }
      
    $MenuHTML = $MenuHTML. "<li class=\"treeview\"><a><i class=\"fa fa-pie-chart\"></i><span>".$menu_data[$counter]->name."</span><span class=\"pull-right-container\"><i class=\"fa fa-angle-left pull-right\"></i></span>


    </a><ul class=\"treeview-menu\">";

  $MenuHTML = $MenuHTML .generateMenu( $menu_data,$counter+1);

  $MenuHTML = $MenuHTML."</ul></li>";
  }
    else
    {
        //check if active
        if($menu_data[$counter]->url == '/'.app('request')->route()->uri())
        {
    $MenuHTML =  "<li><a href=\"".url($menu_data[$counter]->url)."\"><i class=\"fa fa-circle-o\"></i>".$menu_data[$counter]->name."</a></li>";
        }
        else
        {
       $MenuHTML =  "<li><a href=\"".url($menu_data[$counter]->url)."\"><i class=\"fa fa-circle-o\"></i>".$menu_data[$counter]->name."</a></li>";
        }
    
    //$MenuHTML = $MenuHTML."</li>";
 $MenuHTML = $MenuHTML . generateMenu( $menu_data,$counter+1);
    }

return $MenuHTML ;
    
}

//print  generateMenu( $menu_data,0 );
@endphp



<!-- List Ends here-->

 <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Salary Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('pf_report')}}"><i class="fa fa-circle-o"></i> PF Report</a></li>
            <li><a href="{{url('esi_report')}}"><i class="fa fa-circle-o"></i> ESI Report</a></li>
            <li><a href="{{url('payslip_details')}}"><i class="fa fa-circle-o"></i> HRA Report</a></li>
          </ul>
        </li>

      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
