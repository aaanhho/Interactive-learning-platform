<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.inc'; ?>
</head>

<body>
    <?php include 'menu.inc'; ?>

    <div class="container white">
        <h2>Enhancements</h2>
        <div class="container" id="margin">
            <ol>
                <li>
                    <h4>Flip image</h4>
                    <p>There are different classes used to flip the
                        image on the index page including flip-box,
                        flip-box-inner, flip-box-front, flip-box-back.</p>
                    <p>The images are also responsive regarding the
                        screen size. With large screen sizes, their width
                        and height are 500px, for screen size less than or
                        equal to 1000px they are 50vh, and for small screen
                        size(max width 600px) they are 32vh.</p>
                    <p>Source: <a href="https://www.w3schools.com/howto/howto_css_flip_image.asp" class="a">W3school
                            Flip Image</a></p>
                    <p>Application on website: <a href="index.html#flip" class="a">Flip images</a></p>
                </li>
                <li>
                    <h4>Fit all screen</h4>
                    <p>There are two responsive interfaces with max-width
                        of 1000px and max-width of 600px.</p>
                    <p>Several classes and elements have been modified
                        according to the screen size. Most of them have
                        resized fonts including heading elements, paragraph, unorder list, etc. </p>
                </li>
                <li>
                    <h4>Materialize</h4>
                    <p>The navbar with four boxes uses grid and column layout to evenly space on the web page. It
                        also helps to resize the navbar when the screen size changes.
                        For a large screen such as desktops, each box takes up only 3 out of 12 columns. For a small
                        screen, each box takes up 12 out of 12 columns.
                    </p>
                    <p>All of the content is inside a container, which makes the layout of the page more consistent and
                        beautiful.</p>
                    <p>Application of nav, row, and colum classes: <a href="index.html#navbar" class="a">Navigation
                            bar</a></p>
                    <p>Application of ontainer class: <a href="index.html#container" class="a">Container</a></p>
                    <p>Source: <a href="https://materializecss.com/grid.html" class="a">Materialize</a></p>
                </li>
            </ol>
        </div>
    </div>

    <?php include 'footer.inc'; ?>

</body>

</html>