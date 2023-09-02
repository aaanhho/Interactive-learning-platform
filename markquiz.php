<?php
include_once "connect-to-sql.php";
try {
    $student_id = $_POST['id'];
    $first_name = $_POST['givenname'];
    $last_name = $_POST['familyname'];

    $pattern = "/^[[a-zA-Z- ]+$/";
    $patternStudentId = "/^[0-9]+$/";
    if (preg_match($pattern, $first_name) == 0 || preg_match($pattern, $last_name) == 0 || preg_match($patternStudentId, $student_id) == 0) {
        echo json_encode(['success' => false, 'message' => 'Your information is invalid.']);
    } else {
        // parse object to array 
        $submit_practice = json_decode($_POST['submitPractice'], true);

        // check exist table attempts
        $table = "attempts";
        $result = $connection->query("SHOW TABLES LIKE '" . $table . "'");
        // if not exsit then create table
        if ($result->num_rows == 0) {
            $sql = "CREATE TABLE attempts (
                id int(11) NOT NULL AUTO_INCREMENT,
                date_and_time datetime DEFAULT NULL,
                first_name VARCHAR(255) NOT NULL,
                last_name VARCHAR(255) NOT NULL,
                student_id VARCHAR(255) NOT NULL,
                score INT(4) NOT NULL DEFAULT 0,
                number_of_attempt INT(4) NOT NULL DEFAULT 0,
                PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

            $connection->query($sql);
        }

        // get attempt of student
        $sql_count = "SELECT COUNT(id) 
                FROM attempts 
                WHERE student_id = '" . $student_id . "'";
        $count = $connection->query($sql_count)->fetch_row();
        $count = $count[0];
        // maximum apptemt = 2
        if ($count >= 2) {
            echo json_encode(['success' => false, 'message' => 'You completed 2 attempts already.']);
        } else {
            // get questions
            $sql = "SELECT id, correct_answer, question_type, score FROM quizs ORDER BY display_order ASC";
            $result = $connection->query($sql);
            $total = $result->num_rows;
            if (count($submit_practice) != $total) {
                echo json_encode(['success' => false, 'message' => 'The number of questions is not equal to the number of answers']);
            } else {
                if ($total > 0) {
                    $rows = array();
                    $map_id = array();
                    $map_score = array();
                    $map_question_type = array();
                    // map id, score, correct answer
                    while ($row = $result->fetch_assoc()) {
                        $rows[$row['id']] = json_decode(substr($row['correct_answer'], 1, -1), true);
                        $map_id[] = $row['id'];
                        $map_score[] = $row['score'];
                        $map_question_type[] = $row['question_type'];
                    }

                    $mark = 0;
                    for ($i = 0; $i < $total; $i++) {
                        $answer = $submit_practice[$map_id[$i]];
                        $correct_answer = $rows[$map_id[$i]];
                        $is_correct = true;
                        // if question type is multi choise then compare two array 
                        // if element of array answer exist in array correct answer then pass
                        if ($map_question_type[$i] == 2) {
                            $count_temp = 0;
                            for ($j = 0; $j < count($answer); $j++) {
                                for ($k = 0; $k < count($answer); $k++) {
                                    if ($answer[$j] == $correct_answer[$k]) {
                                        $count_temp = $count_temp + 1;
                                        break;
                                    }
                                }
                            }
                            if ($count_temp == count($answer)) {
                                $mark += $map_score[$i];
                            }
                        } else { // processing for question type is single choice and input text and checkbox 
                            for ($j = 0; $j < count($answer); $j++) {
                                // if value diff correct answer then false
                                if ($answer[$j] != $correct_answer[$j]) {
                                    $is_correct = false;
                                    break;
                                }
                            }
                            if ($is_correct) {
                                $mark += $map_score[$i];
                            }
                        }
                    }

                    // save to db
                    if ($mark == 0) {
                        echo json_encode(['success' => false, 'message' => 'Your score is 0. Please do again!']);
                    } else {
                        $attempt = $count + 1;
                        $sql = "INSERT INTO attempts 
                        VALUES (NULL,'" . date("Y-m-d H:m:s") . "','" . $first_name . "','" . $last_name . "','" . $student_id . "','" . $mark . "','" . $attempt . "')";
                        header('Content-type: application/json');
                        $result = $connection->query($sql);
                        if ($result) {
                            echo json_encode(['success' => true, 'message' => 'Success', 'student_id' => $student_id]);
                        } else {
                            echo json_encode(['success' => false, 'message' => 'Error']);
                        }
                    }
                } else {
                    // total = 0 then return Quizs not found
                    echo json_encode(['success' => false, 'message' => 'Quizs not found']);
                }
            }
        }
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}