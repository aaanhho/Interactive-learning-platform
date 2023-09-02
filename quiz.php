<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.inc'; ?>
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/sweetalert.min.js"></script>
    <script src="scripts/quiz.js"></script>
    <script src="scripts/enhancements.js"></script>
</head>

<body>
    <?php include 'menu.inc'; ?>

    <?php
    session_start();
    include_once "connect-to-sql.php";
    $sql = "SELECT * 
            FROM quizs 
            ORDER BY display_order ASC";
    $result = $connection->query($sql);

    $list_quiz = array();
    $pattern = "__________";

    // normalize content and list answer to html
    while ($row = $result->fetch_assoc()) {
        $answer = "";
        if ($row['question_type'] == 1) { // radio button ~ single choice
            $content = '<p class="bold">' . $row['content'] . '</p> <p>Please select your answer:</p>';
            $temp_answers = explode($pattern, $row['answers']);
            for ($i = 0; $i < count($temp_answers); $i++) {
                $answer = $answer . ' <input type="radio" name="' . 0 . '" id="' . $row['id'] . '" value="' . trim($temp_answers[$i]) . '" required="required" /><label> ' . $temp_answers[$i] . '</label><br />';
            }
        } else if ($row['question_type'] == 2) { // multi choice
            $content = '<p class="bold">' . $row['content'] . '</p>';
            $temp_answers = explode($pattern, $row['answers']);
            for ($i = 0; $i < count($temp_answers); $i++) {
                $answer = $answer . ' <input type="checkbox" name="' . $i . '" id="' . $row['id'] . '" value="' . trim($temp_answers[$i]) . '" /><label> ' . $temp_answers[$i] . '</label><br />';
            }
        } else if ($row['question_type'] == 3) { // checkbox
            $content = '<p class="bold">' . $row['content'] . '</p>';
            $answer = $answer . '<select name="0" id="' . $row['id'] . '" required="required"> <option value="">Please select</option>';
            $temp_answers = explode($pattern, $row['answers']);
            for ($i = 0; $i < count($temp_answers); $i++) {
                $answer = $answer . ' <option value="' . $temp_answers[$i] . '">' . $temp_answers[$i] . ' </option>';
            }
            $answer = $answer . ' </select>';
        } else if ($row['question_type'] == 4) { // input text
            $content = "";
            $arr_content = explode(" ", $row['content']);
            $j = 0;
            for ($i = 0; $i < count($arr_content); $i++) {
                if ($arr_content[$i] == $pattern) {
                    $arr_content[$i] = ' <input type="text" name="' . $j . '" id="' . $row['id'] . '" required="required" /> <br />';
                    $j = $j + 1;
                }
                $content = $content . " " . $arr_content[$i];
            }
            $content = $content . " <br />";
        }

        // push list quiz
        $list_quiz[] = array(
            'id' => $row['id'],
            'content'  => $content,
            'answers'  => $answer
        );
    }
    ?>

    <div class="container white">
        <h2 id="quiz">Quiz</h2>
        <h3 id="countdown">10:00</h3>
        <div class="container" id="margin">
            <form id="form" name="myForm" onsubmit="return validateMyForm();" autocomplete="off">
                <fieldset>
                    <legend>Information</legend>
                    <p class="text-align">
                        <label for="givenname">Given Name</label>
                        <input type="text" name="name[]" id="givenname" maxlength="30" size="30" required="required" pattern="^[a-zA-Z- ]+$">
                    </p>
                    <p class="text-align">
                        <label for="familyname">Family Name</label>
                        <input type="text" name="name[]" id="familyname" maxlength="30" size="30" required="required" pattern="^[a-zA-Z- ]+$">
                    </p>
                    <p class="text-align">
                        <label for="studentid">Student ID</label>
                        <input type="text" name="studentid" id="studentid" maxlength="10" size="10" pattern="\d{7,10}" required="required" />
                    </p>
                </fieldset>

                <fieldset>
                    <legend>Questions</legend>
                    <ol>
                        <?php
                        foreach ($list_quiz as $row) {
                        ?>
                            <li>
                                <?php echo $row['content']; ?>
                                <?php echo $row['answers']; ?>
                            </li>
                        <?php
                        }
                        ?>
                        <li style="list-style-type: none;">
                            <input type="submit" value="Submit" id="btnSubmit">
                            <input type="reset" value="Reset Form">
                        </li>
                    </ol>
                    <!-- <input type="hidden" name="browsers" id="browsers" /> -->
                </fieldset>
            </form>
        </div>
    </div>

    <?php include 'footer.inc'; ?>
    <script>
        function validateMyForm() {
            return false;
        }

        // variable save practice to submit
        const submitPractice = {};
        // event list input change value
        $("input").change(function() {
            if (this.type == 'checkbox') {
                if (!submitPractice[this.id]) {
                    submitPractice[this.id] = [];
                }
                if (this.checked) {
                    submitPractice[this.id].push((this.value || '').trim());
                } else {
                    let tempArr = [];
                    for (let item of submitPractice[this.id]) {
                        if (item == this.value) {
                            continue;
                        }
                        tempArr.push(item);
                    }
                    submitPractice[this.id] = tempArr;
                }
            } else {
                if (!+this.id) return;
                if (!submitPractice[this.id]) {
                    submitPractice[this.id] = [];
                }
                submitPractice[this.id][this.name] = (this.value || '').trim();
            }
            console.log(submitPractice);
        });

        // event list select change value
        $("select").on("change", function() {
            if (!+this.id) return;
            if (!submitPractice[this.id]) {
                submitPractice[this.id] = [];
            }
            submitPractice[this.id][this.name] = (this.value || '').trim();
            console.log(submitPractice);
        });

        // event radio change value
        $("radio").on("change", function() {
            if (!+this.id) return;
            if (!submitPractice[this.id]) {
                submitPractice[this.id] = [];
            }
            submitPractice[this.id][this.name] = (this.value || '').trim();
            console.log(submitPractice);
        });

        // send submit
        $("#btnSubmit").click(function() {
            try {
                // student id
            const id = document.getElementById("studentid").value;
            const givenname = document.getElementById("givenname").value;
            const familyname = document.getElementById("familyname").value;

            let flag = true;
            // validate fill information
            if (!id || !givenname || !familyname) {
                flag = false;
                alert("Your information is invalid");
                return false;
            }

            // regex student id
            let pattern = /^[0-9]{7,10}/;
            if (pattern.test(id) == false) {
                flag = false;
                alert("Student Id is invalid");
                return false;
            }

            pattern = /[A-Za-z\s_-]/;
            if (!pattern.test(givenname)) {
                flag = false;
                alert("Given Name is invalid");
                return false;
            }

            if (givenname.length > 30) {
                flag = false;
                alert("Given Name is invalid");
                return false;
            }

            if (!pattern.test(familyname)) {
                flag = false;
                alert("Family Name is invalid");
                return false;
            }

            if (familyname.length > 30) {
                flag = false;
                alert("Family Name is invalid");
                return false;
            }

            if (flag) {
                const form_data = new FormData();
                form_data.append("id", id);
                form_data.append("givenname", givenname);
                form_data.append("familyname", familyname);
                form_data.append("submitPractice", JSON.stringify(submitPractice));
                // use ajax call
                $.ajax({
                    type: "POST",
                    url: "markquiz.php",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        let res = {};
                        try {
                            res = JSON.parse(response);
                        } catch (error) {
                            console.log(error)
                            res = response;
                        }
                        console.log("====================>", res)
                        console.log("====================>", res.message)
                        if (res.success) {
                            // if success then redirect to result page
                            window.location.href = "result.php" + `?student_id=${res.student_id}`;
                        } else {
                            // alert message fail
                            swal({
                                title: "Fail!",
                                text: res.message || "Submit error!",
                                icon: "error",
                                buttons: false,
                                timer: 5000,
                            });
                        }
                    },
                });
            }
            } catch (error) {
                console.log(error)
            }

        });
    </script>
</body>

</html>