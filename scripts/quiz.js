"use strict";

function checkedCheckbox() {  // validate if at least 1 checkbox has been checked for question 3
    var apple = document.getElementById("Apple").checked;
    var google = document.getElementById('Google').checked;
    var mozilla = document.getElementById('Mozilla').checked;
    var opera = document.getElementById('Opera').checked;

    if (!(apple || google || mozilla || opera)) {
        alert('Please select an answer for question 3!');
        return false;
    }
    else {
        return true;
    }
}

function checkedHidden() {  // validate if question 4 has been answered
    var language = document.getElementById("fav_language").value;

    if (language == "") {
        alert('Please select an answer for question 4!');
        return false;
    }
    else {
        return true;
    }
}

function checkedNumber() {  // validate if question 5 has been answered
    var number = document.getElementById("rate").value;
    if (number == "") {
        alert('Please select an answer for question 5!');
        return false;
    }
    else {
        return true;
    }
}

// take value of input for ques3
function ques3Answer(ques3Apple, ques3Google, ques3Mozilla, ques3Opera) {
    var ques3 = "";
    if (ques3Apple) {
        ques3 = "apple";
    }
    if (ques3Apple && ques3Google) {
        ques3 += ", google";
    } else if (!ques3Apple && ques3Google) {
        ques3 = "google";
    }
    if ((ques3Apple || ques3Google) && ques3Mozilla) {
        ques3 += ", mozilla";
    } else if (!ques3Apple && !ques3Google && ques3Mozilla) {
        ques3 = "mozilla";
    }
    if ((ques3Apple || ques3Google || ques3Mozilla) && ques3Opera) {
        ques3 += ", opera";
    } else if (!ques3Apple && !ques3Google && !ques3Mozilla && ques3Opera) {
        ques3 = "opera";
    }
    return ques3;
}

function storeInfo(studentid, givenname, familyname, score, attempt) {
    sessionStorage.studentid = studentid;
    sessionStorage.givenname = givenname;
    sessionStorage.familyname = familyname;
    sessionStorage.score = score;
    sessionStorage.attempt = attempt;
}

function storeInfomation(studentid, givenname, familyname, score, attempt) {
    localStorage.studentid = studentid;
    localStorage.givenname = givenname;
    localStorage.familyname = familyname;
    localStorage.score = score;
    localStorage.attempt = attempt;
}

function getInfo() {
    // fill-in info in result page
    document.getElementById("full_name").textContent = sessionStorage.givenname + " " + sessionStorage.familyname;
    document.getElementById("submit_id").textContent = sessionStorage.studentid;
    document.getElementById("final_score").textContent = sessionStorage.score;
    document.getElementById("total_attempts").textContent = sessionStorage.attempt;

    // save info (hidden displayed) in result page
    document.getElementById("givenname").value = sessionStorage.givenname;
    document.getElementById("familyname").value = sessionStorage.familyname;
    document.getElementById("studentid").value = sessionStorage.studentid;
    document.getElementById("score").value = sessionStorage.score;
    document.getElementById("attempt").value = sessionStorage.attempt;

    if (sessionStorage.attempt == 2) {
        var retake = document.getElementById("retake");
        retake.parentNode.removeChild(retake);
    }
}

function validation() {  // general function of validation
    var checkbox = checkedCheckbox();
    var language = checkedHidden();
    var rateNumber = checkedNumber();
    var result = true;
    if (checkbox == true && language == true && rateNumber == true) {

        var score = 0;

        var studentid = document.getElementById("studentid").value;
        var givenname = document.getElementById("givenname").value;
        var familyname = document.getElementById("familyname").value;

        var attempt = 0;
        if (sessionStorage.attempt == null) {  // check if there is no attempt saved in storage then attempt = 0
            attempt = 0;
        } else {
            attempt = Number(sessionStorage.attempt);  // if there is something in storage then attempt is not 0
        }

        if (attempt <= 1) {  // first attempt will be counted as 0, second one will be 1
            // check input of question 1
            var ques1 = document.getElementById('textinput').value;
            if (ques1.match(/javascript api/i)) score += 1;

            // check input of question 2
            var ques2;
            var vladimir = document.getElementById('vladimir').checked;
            var ken = document.getElementById('ken').checked;
            var aron = document.getElementById('aron').checked;
            var marc = document.getElementById('marc').checked;

            if (vladimir) {
                ques2 = "vladimir";
                score += 1;
            }
            else if (ken) ques2 = "ken";
            else if (aron) ques2 = "aron";
            else if (marc) ques2 = "marc";

            // check input of question 3
            var ques3Apple = document.getElementById("Apple").checked;
            var ques3Google = document.getElementById('Google').checked;
            var ques3Mozilla = document.getElementById('Mozilla').checked;
            var ques3Opera = document.getElementById('Opera').checked;
            var ques3 = ques3Answer(ques3Apple, ques3Google, ques3Mozilla, ques3Opera);

            if (ques3 == "apple, google, mozilla, opera") score += 1;

            // check input of question 4
            var ques4 = document.getElementById("fav_language").value;
            if (ques4 == "JavaScript") score += 1;

            // check input of question 5
            var ques5 = document.getElementById("rate").value;
            if (ques5 >= 5) score += 1;

            // check if score = 0 --> if yes do the quiz again (only proceed if score > 0)
            if (score == 0) {
                alert("Your score is 0. Please do the quiz again.\n");
                result = false;
            }
            else {
                attempt += 1;
                storeInfo(studentid, givenname, familyname, score, attempt);
            }
            sessionStorage.attempt = attempt;

        } else {
            alert("You have finished 2 attempts.\n");
            result = false;
        }
    }
    else {
        result = false;
    }
    return result;
}

function init() {
    var path = window.location.pathname; // take the path name of the page
    var page = path.split("/").pop(); // assign last part of the path name to variable page
    if (page == "quiz.php" || page == "quiz2.php") { // run the validation function if it's quiz page
        // var formValidation = document.getElementById("form");
        // formValidation.onsubmit = validation;
        // validation();
        enhancement(); // timer
    }
    if (page == "result.php") { // run getInfo() function if it's result page
        // getInfo(); // transfer info from quiz page to result page
        const score = document.getElementById("resultScore").value;
        document.getElementById("canvas").style.display = "none";
        if (score == 5 || score == 100) {  // displaye fireworks if the score is 5
            document.getElementById("canvas").style.display = "block";
            firework_display();  // fireworks
        }
    }
}

window.onload = init;  