<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.inc'; ?>
</head>

<body>
    <?php include 'menu.inc'; ?>

    <div class="container white">
        <div>
            <h2>Related Information</h2>
            <div class="container" id="margin">
                <section>
                    <h4>What is the technology?</h4>
                    <p>WebGL stands for Web Graphic Library, a JavaScript API that allows any compatible
                        web browser to generate high-performance interactive 3D and 2D vector graphics.
                        It enables developers to perform hardware-accelerated graphics using the client's
                        GPU directly inside an html canvas, eliminating the need for additional plugins. <sup>[1]</sup>
                    </p>
                    <p>
                        What set WebGL apart was its capacity to execute operations that were challenging
                        to complete on other platforms. Its ability to produce intricate lighting and reflecting
                        material effects is one of the greatest examples of this. WebGL's canvas aspect allowed
                        it to work compatibly with other internet technologies. <sup>[3]</sup>
                    </p>

                    <h5>Major features: <sup>[3]</sup></h5>
                    <div class="display">
                        <dl>
                            <dt>The most user-friendly and well-tested 3D API:</dt>
                            <dd>for people working with 3D applications, they have to set up before any usage with
                                many templates and codes, which is laborious and challenging sometimes. However,
                                with WebGL, they no longer have to worry about windows, GLX/ GLU, makefiles, etc.
                            </dd>
                            <dt>Interactiveness:</dt>
                            <dd>WebGL allows more interaction of users with the websites. They can effortlessly
                                view a product with all feasible views as if they were holding it in their hands.
                                They may also create their own simulations to evaluate how the product will perform
                                in various scenarios and settings.</dd>
                        </dl>
                        <aside>
                            Range of applications:<sup>[3]</sup>
                            <ol>
                                <li>3D web design</li>
                                <li>Interactive games</li>
                                <li>Physics simulations</li>
                                <li>Data visualization</li>
                                <li>Artwork</li>
                            </ol>
                        </aside>
                    </div>
                    <div>
                        <figure>
                            <img src="images/fluid1.png" alt="Fluid" id="img">
                            <figcaption>Interactive fluid simulation by
                                WebGL <sup>[7]</sup></figcaption>

                        </figure>
                    </div>

                </section>
                <section>
                    <h4>Who developed it? When? Why? </h4>
                    <p>In the past, the web technology’s content including images was static only, and then
                        came the rise of new features in technology. WebGL emerged from the Canvas 3D studies
                        begun at Mozilla by Vladimir Vukievi, who first showed a Canvas 3D prototype in 2006.
                        <sup>[4]</sup>
                    </p>
                </section>

                <section>
                    <h4>What groups are responsible for managing it? </h4>
                    <p>The WebGL Working Group was founded in early 2009 by the non-profit technology consortium
                        Khronos Group, with Apple, Google, Mozilla, Opera, and others as preliminary members. Ken
                        Russel is known to be the leader of the group from March, 2012. <sup>[4]</sup></p>
                </section>

                <section>
                    <h4>Explain its growth or decline. Predict the future for the technology.</h4>
                    <p>WebGL became famous when it started to be compatible with mobile systems such as iOS.
                        What set WebGL apart was its capacity to execute things that were tough to complete on
                        other platforms. It could be said that WebGL lead the future’s technology. <sup>[3]</sup>
                    </p>
                </section>

                <section>
                    <h4>What are related technologies? Compare / contrast with other technologies.</h4>
                    <p>OpenGL (Open Graphics Library) is an application programming interface (API). Similar
                        to WebGl, it is used for rendering 2D and 3D vector graphics. However, there are certain
                        differences between them.<sup>[5]</sup>
                    </p>
                    <table>
                        <caption class="font">WebGL vs. OpenGL <sup>[6]</sup></caption>
                        <tr>
                            <th></th>
                            <th>WebGL</th>
                            <th>OpenGL</th>
                        </tr>
                        <tr>
                            <th>Origin</th>
                            <td>OpenGL ES2</td>
                            <td>Complex System</td>
                        </tr>
                        <tr>
                            <th>Features</th>
                            <td>Fragment & vertex shaders</td>
                            <td>Greater variety of shader types</td>
                        </tr>
                        <tr>
                            <th>Installation</th>
                            <td>Operates in browsers</td>
                            <td>Requires drives and installation</td>
                        </tr>
                        <tr>
                            <th>Programming language</th>
                            <td>JavaScript</td>
                            <td>C</td>
                        </tr>
                        <tr>
                            <th>Learning curve</th>
                            <td>Medium</td>
                            <td>More Complex</td>
                        </tr>
                        <tr>
                            <th>Use cases</th>
                            <td>Web services</td>
                            <td>Video games</td>
                        </tr>
                    </table>
                </section>
            </div>
        </div>
    </div>
    <?php include 'footer.inc'; ?>

</body>

</html>