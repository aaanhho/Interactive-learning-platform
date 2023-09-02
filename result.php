<?php
session_start();
include_once "connect-to-sql.php";
$student_id = $_GET['student_id'];
// get last record apptemt by student id
$sql = "SELECT * FROM attempts WHERE student_id = '" . $student_id . "' ORDER BY id DESC LIMIT 1";
$data = $connection->query($sql)->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Introduction of WebGL" />
  <meta name="keywords" content="WebGL" />
  <meta name="author" content="Anh Ho" />
  <title>WebGL - </title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="styles/style.css">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="scripts/quiz.js"></script>
  <script src="scripts/enhancements.js"></script>
</head>

<body>
  <header>
    <div>
      <h1 class="color">
        <a href="index.php">WebGL - Web Graphic Library</a>
      </h1>
    </div>
    <nav class="nav" id="index">
      <div class="row">
        <div class="col s12 l3 center-align">
          <a href="topic.php">Topic</a>
        </div>
        <div class="col s12 l3 center-align">
          <a href="quiz.php">Quiz</a>
        </div>
        <div class="col s12 l3 center-align">
          <a href="references.php">References</a>
        </div>
        <div class="col s12 l3 center-align">
          <a href="enhancements2.php">Enhancements 2</a>
        </div>
      </div>
    </nav>
  </header>


  <div class="container white" id="container">
    <h2>Quiz result</h2>
    <div class="container" id="margin">
      <div>
        <p>Your Name: <span id="full_name"></span><?php echo $data['first_name'] . " " . $data['last_name']; ?></p>
        <p>Your ID: <span id="submit_id"></span><?php echo $data['student_id']; ?></p>
        <p>Your Score: <span id="final_score"></span><?php echo $data['score']; ?></p>
        <p>Your attempts: <span id="total_attempts"></span><?php echo $data['number_of_attempt']; ?>/2</p>
        <p><a href="quiz.php" id="retake">Try again</a></p>

        <!-- <input type="hidden" name="givenname" id="givenname" />
        <input type="hidden" name="familyname" id="familyname" />
        <input type="hidden" name="studentid" id="studentid" /> -->
        <input type="hidden" name="score" id="resultScore" value="<?php echo $data['score']; ?>"/>
        <!-- <input type="hidden" name="attempt" id="attempt" /> -->
      </div>
      <canvas id="canvas"></canvas>
    </div>
    <!-- <div><canvas id="canvas"></canvas></div> -->
  </div>


  <footer>
    <a href="mailto:103171611@student.swin.edu.au">© Anh Ho 2022</a>
  </footer>

</body>

</html>