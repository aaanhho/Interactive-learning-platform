<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.inc'; ?>
</head>

<body>
    <?php include 'menu.inc'; ?>

    <div class="container white" id="container">
        <h2>Introduction</h2>
        <div class="container" id="margin">
            <div>
                <p>WebGL stands for Web Graphic Library, a JavaScript API that allows any compatible web browser to
                    generate high-performance interactive 3D and 2D vector graphics.
                    It enables developers to perform hardware-accelerated graphics using the client's GPU directly
                    inside an html canvas, eliminating the need for additional plugins. <sup>[1]</sup></p>
            </div>
            <div>
                <div class="flip-box" id="flip">
                    <div class="flip-box-inner">
                        <div class="flip-box-front">
                            <img src="images/water.png" alt="Water image created by WebGL" class="imgindex">
                            Water image created by WebGL <sup>[2]</sup>
                        </div>
                        <div class="flip-box-back">
                            <img src="images/logo.png" alt="Water image created by WebGL" class="imgindex">
                            Fluid simulation created by WebGL <sup>[8]</sup>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.inc'; ?>

</body>

</html>