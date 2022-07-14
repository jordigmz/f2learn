    <!-- Footer ==== -->
    <footer>
        <div class="footer-top">
            <div class="pt-exebar">
                <div class="container">
                    <div class="d-flex align-items-stretch">
                        <div class="pt-logo mr-auto">
                            <a href="/"><img src="/assets/images/logo-white.png" alt=""/></a>
                        </div>
                        <div class="pt-social-link">
                            <ul class="list-inline m-a0">
                                <li><a href="https://twitter.com/" target="_blank" class="btn-link"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://es-es.facebook.com/" target="_blank" class="btn-link"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://es.linkedin.com/" target="_blank" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="pt-btn-join">
                            <a href="/membership" class="btn ">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!--<div class="col-lg-4 col-md-12 col-sm-12 footer-col-4">
                        <div class="widget">
                            <h5 class="footer-title">Sign Up For A Newsletter</h5>
                            <p class="text-capitalize m-b20">Weekly Breaking news analysis and cutting edge advices on job searching.</p>
                            <div class="subscribe-form m-b20">
                                <form class="subscription-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                                    <div class="ajax-message"></div>
                                    <div class="input-group">
                                        <input name="email" required="required"  class="form-control" placeholder="Your Email Address" type="email" />
                                        <span class="input-group-btn">
                                                <button name="submit" value="Submit" type="submit" class="btn"><i class="fa fa-arrow-right"></i></button>
                                            </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-12 col-lg-7 col-md-7 col-sm-12">
                        <div class="row">
                            <div class="col-4 col-lg-4 col-md-4 col-sm-4">
                                <div class="widget footer_widget">
                                    <h5 class="footer-title">Company</h5>
                                    <ul>
                                        <li><a href="/about">About</a></li>
                                        <li><a href="/contact">Contact</a></li>
                                        <li><a href="/faqs">FAQ's</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-4 col-lg-4 col-md-4 col-sm-4">
                                <div class="widget footer_widget">
                                    <h5 class="footer-title">Knowing Us</h5>
                                    <ul>
                                        <li><a href="/blog">Blog</a></li>
                                        <li><a href="/portfolio">Portfolio</a></li>
                                        <li><a href="/gallery-images">Gallery Images</a></li>
                                        <!--<li><a href="/events">Events</a></li>-->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-4 col-lg-4 col-md-4 col-sm-4">
                                <div class="widget footer_widget">
                                    <h5 class="footer-title">Courses</h5>
                                    <ul>
                                        <li><a href="/our-courses">Our Courses</a></li>
                                        <li><a href="/partners">Partners</a></li>
                                        <li><a href="/membership">Membership</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-12 col-lg-3 col-md-5 col-sm-12 footer-col-4">
                        <div class="widget widget_gallery gallery-grid-4">
                            <h5 class="footer-title">Our Gallery</h5>
                            <ul class="magnific-image">
                                <li><a href="/assets/images/gallery/pic1.jpg" class="magnific-anchor"><img src="/assets/images/gallery/pic1.jpg" alt=""></a></li>
                                <li><a href="/assets/images/gallery/pic2.jpg" class="magnific-anchor"><img src="/assets/images/gallery/pic2.jpg" alt=""></a></li>
                                <li><a href="/assets/images/gallery/pic3.jpg" class="magnific-anchor"><img src="/assets/images/gallery/pic3.jpg" alt=""></a></li>
                                <li><a href="/assets/images/gallery/pic4.jpg" class="magnific-anchor"><img src="/assets/images/gallery/pic4.jpg" alt=""></a></li>
                                <li><a href="/assets/images/gallery/pic5.jpg" class="magnific-anchor"><img src="/assets/images/gallery/pic5.jpg" alt=""></a></li>
                                <li><a href="/assets/images/gallery/pic6.jpg" class="magnific-anchor"><img src="/assets/images/gallery/pic6.jpg" alt=""></a></li>
                                <li><a href="/assets/images/gallery/pic7.jpg" class="magnific-anchor"><img src="/assets/images/gallery/pic7.jpg" alt=""></a></li>
                                <li><a href="/assets/images/gallery/pic8.jpg" class="magnific-anchor"><img src="/assets/images/gallery/pic8.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center"> © <?php echo date("Y") ?> <span class="text-white">F2Learn</span>.  All Rights Reserved.</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END ==== -->
    <button class="back-to-top fa fa-chevron-up" ></button>
    </div>

    <?php include __DIR__ . '/externalJS.part.php'; ?>

    <?php if ($_SERVER['REQUEST_URI'] === '/' || str_contains($_SERVER['REQUEST_URI'], '/?')) : ?>
        <?php include __DIR__ . '/indexJS.part.php'; ?>
    <?php endif ; ?>

</body>
</html>
