<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    header("Location: form_login.php");
  } 
  include_once "connect-to-sql.php";
  $sql="SELECT * 
        FROM attempts";
  $data = $connection->query($sql); 
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
                <h3 class="box-title">LIST ATTEMPTS</h3>
              </div>

              <div class="row">
              <div class="col-md-12">
                <div style="margin-bottom: 30px; margin-top: 50px;">
                  <div class="col-md-4">
                    <label for="">Enter student id</label>
                    <input type="text" class="form-control" id="student_id">
                  </div>
                  
                  <div class="col-md-4">
                    <button type="button" class="btn btn-danger btn-delete" style="margin-top: 25px;">Delete Attempts</button>
                  </div>
                </div>
              </div>
            </div>

              <!-- /.box-header -->
              <div class="box-body">
                <table id="list-attempts" class="table table-bordered table-striped" style="margin-top : 10px;">
                  <thead>
                    <tr>
                      <th class="col-sm-2 text-center">Student ID</th>
                      <th class="col-sm-2 text-center">First Name</th>
                      <th class="col-sm-2 text-center">Last Name</th>
                      <th class="col-sm-2 text-center">Time of the attempt</th>
                      <th class="col-sm-1 text-center">Score</th>
                      <th class="col-sm-3 text-center">Number of the attempt</th>
                      <th class="col-sm-2 text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($data->num_rows > 0) {
                      while ($row = $data->fetch_assoc()) { ?>
                        <tr>
                          <td class="col-sm-2 text-center"><?= $row['student_id'] ?></td>
                          <td class="col-sm-2 text-center"><?= $row['first_name'] ?></td>
                          <td class="col-sm-2 text-center"><?= $row['last_name'] ?></td>
                          <td class="col-sm-2 text-center"><?= $row['date_and_time'] ?></td>
                          <td class="col-sm-1 text-center"><?= $row['score'] ?></td>
                          <td class="col-sm-3 text-center"><?= $row['number_of_attempt'] ?></td>
                          <td class="col-sm-2 text-center">
                            <a href="#" type="button" data-id="<?= $row['id'] ?>" class="btn btn-warning btn-edit" id="btn-edit" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                          </td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="col-xs-12">
          <div class="modal fade" id="editAttempt" tabindex="-1" role="dialog" aria-labelledby="formManufacture" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="border-radius : 10px;">
                <div class="modal-header">
                  <h4 class="modal-title">Change the score for a quiz attempt</h4>
                </div>
                <form action="" id="formEditAttempt">
                  <div class="modal-body">
                    <input type="hidden" class="form-control" id="id"><br>

                    <input type="text" class="form-control" id="student_id" disabled><br>

                    <input type="text" class="form-control" id="first_name" disabled><br>

                    <input type="text" class="form-control" id="last_name" disabled><br>

                    <input type="text" class="form-control" id="date_and_time" disabled><br>

                    <input id="score" class="form-control" required="" type="number" placeholder="enter score" min="0" max="100"><br>

                    <input type="text" class="form-control" id="number_of_attempt" disabled><br>
                  </div>

                  <div class="modal-footer">
                    <button type="button" id ="btn-execute-edit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
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
			$('#list-attempts').DataTable( {
				"lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]]
			} );
		} );

    $('.btn-edit').click(function(){
      var id = $(this).attr('data-id');
      $.ajax({
        type : "GET",
        url : "get_attempt_by_id.php",
        data : {
          id,
          _token :$('[name="_token"]').val(),
        },
        success : function(response){
          try {
            response = JSON.parse(response);
          } catch (error) {
            response = {};
          }
          $('#id').val(response.id);
          $('#student_id').val(response.student_id);
          $('#first_name').val(response.first_name);
          $('#last_name').val(response.last_name);
          $('#date_and_time').val(response.date_and_time);
          $('#score').val(response.score);
          $('#number_of_attempt').val(response.number_of_attempt);
        }
      });

      $('#editAttempt').modal('show');
    });

    $('#btn-execute-edit').click(function(){
      var form_data = new FormData();
      form_data.append("score", $('#score').val());
      form_data.append("id", $('#id').val());
      $.ajax({
        type: 'POST',
        url: 'edit_score_for_attempt.php',
        data: form_data,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(response){
          if (response.is === 'success') {
            swal({
              title: response.complete,
              text: "Change the score for quiz attempt successfully",
              icon: "success"
            })
            setTimeout(function () {
              window.location.href = 'manage_attempt.php';
            },500);
          } else {
            swal({
              title: response.uncomplete,
              text: "Change the score for quiz attempt unsuccessfully",
              icon: "error",
              buttons: false,
              timer: 2000,
            })
          }
        }
      });
    });

    $('.btn-delete').click(function(){
      var form_data = new FormData();
      form_data.append("student_id", $('#student_id').val());
      swal({
        title: "Confirm Delete",
        text: "Do you want to delete?",
        icon: "warning",
        buttons: true,
        buttons: ["Cancel", "OK"]
      })
      .then(confirm => {
        if(confirm){
          $.ajax({
            type: 'POST',
            url : 'delete_attempt_by_student_id.php',
            data: form_data,
            contentType: false,
            processData: false,
            success: function (response) {
              if(response.is == 'success'){
                swal({
                  title: response.complete,
                  text: "Delete attempts successfully",
                  icon: "success"
                })
                setTimeout(function () {
                    window.location.href = 'manage_attempt.php';
                },500);
              }
              if(response.is === 'fails'){
                swal({
                  title: response.uncomplete,
                  text: "Delete attempts unsuccessfully",
                  icon: "error"
                })
              }
            }
          })
        }
      })
    });
	</script>
</body>

</html>