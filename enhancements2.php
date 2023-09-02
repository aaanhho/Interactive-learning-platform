<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.inc'; ?>
</head>

<body>
    <?php include 'menu.inc'; ?>

    <div class="container white">
        <h2>Enhancements 2</h2>
        <div class="container" id="margin">
            <ol>
                <li>
                    <h4>Quiz timer</h4>
                    <p>If the users click onto "Quiz" page, the timer starts counting immediately.
                        There will be 10 mintues to finish the quiz, and if the users
                        cannot get it done in that time, the quiz will be automatically submitted.</p>
                    <p>Time is displayed as minutes and seconds. For seconds less than 10 (i.e. having
                        one digit), they are still displayed as two-digit numbers with an extra 0 in front.
                        Users will be alerted when there is one minute left.
                    </p>
                    <p>Source: <a href="https://www.youtube.com/watch?v=x7WJEmxNlEs" class="a">Simple Countdown
                            Timer with JavaScript - Day 21</a></p>
                    <p>Source: <a href="https://stackoverflow.com/questions/5517597/plain-count-up-timer-in-javascript" class="a">Plain count up timer in javascript - Stack Overflow</a></p>
                    <p>Application on website: <a href="quiz.php#countdown" class="a">Timer</a></p>
                </li>
                <li>
                    <h4>Fireworks</h4>
                    <p>If the score is 5/5, there will be fireworks displayed on the screen for congratulations.</p>
                    <p>To create the fireworks, a little Math and Physics have been to including velocity and
                        acceleration. Firstly,
                        particles are created and assigned to random positions with different velocities. Furthermore,
                        their positions
                        and velocities will be constantly updated to ensure the "firework appearance" instead of uniform
                        particles.
                        The canvas displaying the fireworks is also responsive.</p>
                    <p>Source: <a href="https://www.youtube.com/watch?v=rutUcHyPFsA&t=287s  " class="a">How to make
                            Firework using HTML and CSS | How to design Firework | CodeSky</a></p>
                    <p>Application on website: <a href="result.html#canvas" class="a">Fireworks</a></p>
                </li>
            </ol>
        </div>
    </div>

    <?php include 'footer.inc'; ?>

</body>

</html>