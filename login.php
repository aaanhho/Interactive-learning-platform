<?php
include_once "connect-to-sql.php";
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
  $sql = "SELECT * 
          FROM supervisors 
          WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "'";
  $result = $connection->query($sql);
  header('Content-type: application/json');

  if (isset($_SESSION['time_out']) && date('H:i:s') < $_SESSION['time_out']) {
    echo json_encode(['is' => 'login-failed', 'message' => "You can access after 3 minutes"]);
  } else {
    if ($result->num_rows > 0) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['try_login'] = 0;
      echo json_encode(['is' => 'login-success']);
    } else {
      if ($_SESSION['try_login']) {
        $_SESSION['try_login'] = $_SESSION['try_login'] + 1;
      } else {
        $_SESSION['try_login'] = 1;
      }

      if ($_SESSION['try_login'] >= 5) {
        $date = date("H:m:s");
        $_SESSION['time_out'] = date('H:i:s', strtotime('+3 minutes'));
      }
      echo json_encode(['is' => 'incorrect', 'message' => "Username or password is wrong"]);
    }
  }
}