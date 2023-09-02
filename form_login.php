<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-box-body">
      <p class="login-box-msg" style="font-weight:600; font-size: 18px;">Quiz Assignment</p>
      <form>
        <div class="alert alert-danger login-failed-msg" style="display:none">
          <ul></ul>
        </div>
        <div class="alert alert-warning user-incorrect-msg" style="display:none">
          <ul></ul>
        </div>
        <div class="form-group has-feedback">
          <input type="user_name" id="user_name" class="form-control" placeholder="user_name" name="user_name" required autofocus>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="password" class="form-control" placeholder="password" name="password" required>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="button" class="btn btn-primary btn-block btn-flat btn-login">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  <!-- jQuery 3 -->
  <script src="public/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="public/plugins/iCheck/icheck.min.js"></script>
  <script type="text/javascript">
    $('.btn-login').click(function(){
      const _this = $(this);
      var form_data = new FormData();
      form_data.append("username", $('#user_name').val());
      form_data.append("password", $('#password').val());
      $.ajax({
        type : 'POST',
        url : 'login.php',
        data : form_data,
        dataType : 'json',
        contentType: false,
        processData: false,
        success : function(response){
          if(response.is === 'login-failed'){
            $(".login-failed-msg").find("ul").html('');
            $(".login-failed-msg").css('display','block');
            $(".user-incorrect-msg").css('display','none');
            $(".login-failed-msg").find("ul").append('<li>'+response.message+'</li>');
          }
          
          if(response.is === 'incorrect'){
            $(".user-incorrect-msg").find("ul").html('');
            $(".user-incorrect-msg").css('display','block');
            $(".login-failed-msg").css('display','none');
            $(".user-incorrect-msg").find("ul").append('<li>'+response.message+'</li>');
          }
          if(response.is === 'login-success'){
            setTimeout(function () {
              window.location.href="manage.php";
            },200);
          }
        }
      });
    });
  </script>
</body>
</html>