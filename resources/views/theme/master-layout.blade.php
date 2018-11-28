<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="{{URL::to('public/theme/vendor/bower_components/jquery/dist/jquery.min.js')}}"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{URL::to('public/theme/vendor/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::to('public/theme/vendor/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{URL::to('public/theme/vendor/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{URL::to('public/theme/vendor/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::to('public/theme/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{URL::to('public/theme/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{URL::to('public/theme/vendor/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{URL::to('public/theme/vendor/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{URL::to('public/theme/vendor/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{URL::to('public/theme/vendor/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
<!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{URL::to('public/theme/vendor/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{URL::to('public/theme/vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

@yield('header-section')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('theme.hr-header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('theme.hr-sidebar')

  <!-- Content Wrapper. Contains page content -->
	@yield('body-section')
  
  <!-- /.content-wrapper --> 
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
      <strong>Copyright &copy; 2018 </strong>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<!-- jQuery UI 1.11.4 -->
<script src="{{URL::to('public/theme/vendor/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{URL::to('public/theme/vendor/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{URL::to('public/theme/vendor/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::to('public/theme/vendor/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{URL::to('public/theme/vendor/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{URL::to('public/theme/vendor/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{URL::to('public/theme/vendor/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{URL::to('public/theme/vendor/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{URL::to('public/theme/vendor/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{URL::to('public/theme/vendor/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker aarif-->
<script src="{{URL::to('public/theme/vendor/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{URL::to('public/theme/vendor/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{URL::to('public/theme/vendor/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{URL::to('public/theme/vendor/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{URL::to('public/theme/vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{URL::to('public/theme/vendor/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::to('public/theme/vendor/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::to('public/theme/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{URL::to('public/theme/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::to('public/theme/dist/js/demo.js')}}"></script>

<script src="{{URL::to('public/theme/vendor/plugins/select2/select2.full.min.js')}}"></script>


<script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    /*$('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })*/
 
$('#datetimepicker6').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
 $('#datetimepicker7').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })   
$('#timepicker').timepicker({
      showInputs: true
    })	      
      
  })
</script>
<script>
function selectProject(val) {
   
			$("#search-project").val(val);
			$("#suggesstion-box").hide();
			}    
</script>  
</body>
</html>
