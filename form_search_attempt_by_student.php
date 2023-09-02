<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: form_login.php");
} 
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Supervisor</title>
  <link rel="shortcut icon" type="image" href="public/blog/images/icon.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="public/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="public//bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="public/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet"
    href="public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="public/datatable_js/jquery.dataTables.min.css">
  

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="logout.php"><span style="padding: 5px 61px;" class="glyphicon glyphicon-log-out"></span>Logout</a></li>
            </ul>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-laptop"></i> <span>Attempts Management</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="manage_attempt.php"><i class="fa fa-list-alt"></i>List attempts</a></li>
              <li><a href="form_search_attempt_by_student.php"><i class="fa fa-newspaper-o"></i>Search attempts by student</a></li>
              <li><a href="form_search_attempt_by_score.php"><i class="fa fa-star"></i>Search attempts by score</a></li>
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">SEARCH ATTEMPT BY SCORE</h3>
              </div>

              <div class="row">
              <div class="col-md-12">
                <div style="margin-bottom: 30px; margin-top: 50px;">
                  <div class="col-md-4">
                    <label for="">Enter student id or name</label>
                    <input type="text" class="form-control" id="student_id_name">
                  </div>
                  
                  <div class="col-md-4">
                  <button type="button" class="btn btn-info btn-search" style="margin-top: 25px; margin-right: 20px;">Search Attempt</button>
                  </div>
                </div>
              </div>
            </div>

              <!-- /.box-header -->
              <div class="box-body">
                <table id="search-result" class="table table-bordered table-striped" style="margin-top : 10px;">
                  <thead>
                    <tr>
                      <th class="col-sm-2 text-center">Student ID</th>
                      <th class="col-sm-2 text-center">First Name</th>
                      <th class="col-sm-2 text-center">Last Name</th>
                      <th class="col-sm-2 text-center">Time of the attempt</th>
                      <th class="col-sm-1 text-center">Score</th>
                      <th class="col-sm-3 text-center">Number of the attempt</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <div class="tab-pane" id="control-sidebar-home-tab">

      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- jQuery 3 -->
    <script src="public/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="public/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="public/bower_components/raphael/raphael.min.js"></script>
    <script src="public/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="public/bower_components/moment/min/moment.min.js"></script>
    <script src="public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="public/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="public/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="public/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="public/dist/js/demo.js"></script>
    <script src="public/js/sweetalert.min.js"></script>
    <script src="public/datatable_js/jquery.dataTables.min.js"></script>
    <script>
		$(document).ready(function() {
			$('#search-result').DataTable( {
				"lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]]
			} );
		} );

    $('.btn-search').click(function(){
      var student_id_name = $('input[id="student_id_name"]').val();
      window.location.href = `search_attempt_by_student.php?student_id_name=${student_id_name}`; 
    });
    </script>
</body>

</html>