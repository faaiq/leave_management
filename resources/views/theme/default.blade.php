<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leave Management | Dashboard</title>
  <meta name="google-site-verification" content="odUcpgUsAfvjkJAmWWsrUIlboT88CGnuQ4aaayEbP4E" />
  <!-- Tell the browser to be responsive to screen width -->
 

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{!! asset('public/theme/vendor/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! asset('public/theme/vendor/bower_components/font-awesome/css/font-awesome.min.css') !!}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{!! asset('public/theme/vendor/bower_components/Ionicons/css/ionicons.min.css') !!}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{!! asset('public/theme/vendor/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!! asset('public/theme/dist/css/AdminLTE.min.css') !!}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{!! asset('public/theme/dist/css/skins/_all-skins.min.css') !!}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{!! asset('public/theme/vendor/bower_components/morris.js/morris.css') !!}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{!! asset('public/theme/vendor/bower_components/jvectormap/jquery-jvectormap.css') !!}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{!! asset('public/theme/vendor/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{!! asset('public/theme/vendor/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}">
<!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{!! asset('public/theme/vendor/plugins/timepicker/bootstrap-timepicker.min.css') !!}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{!! asset('public/theme/vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel='stylesheet' href="{!! asset('public/theme/dist/css/fullcalendar.min.css') !!}" />

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	


<!-- Global site tag (gtag.js) - Google Analytics -->

@include('theme.alljs')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   @include('theme.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('theme.sidebar')

  <!-- Content Wrapper. Contains page content -->
	@yield('content')

  </div>  
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


</body>
</html>
