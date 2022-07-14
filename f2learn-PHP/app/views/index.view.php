<!-- Content -->
<div class="page-content bg-white">
    <div class="content-block">
        <?php include __DIR__ . '/partials/slider.part.php'; ?>
        <!-- Our Services -->
        <div class="section-area content-inner service-info-bx">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="service-bx">
                            <div class="action-box">
                                <img src="/assets/images/our-services/pic1.jpg" alt="">
                            </div>
                            <div class="info-bx text-center">
                                <div class="feature-box-sm radius bg-white">
                                    <i class="fa fa-bank text-primary"></i>
                                </div>
                                <h4><a href="/our-courses">Best Industry Leaders</a></h4>
                                <a href="/our-courses" class="btn radius-xl">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="service-bx">
                            <div class="action-box">
                                <img src="/assets/images/our-services/pic2.jpg" alt="">
                            </div>
                            <div class="info-bx text-center">
                                <div class="feature-box-sm radius bg-white">
                                    <i class="fa fa-book text-primary"></i>
                                </div>
                                <h4><a href="/our-courses">Learn Courses Online</a></h4>
                                <a href="/our-courses" class="btn radius-xl">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="service-bx m-b0">
                            <div class="action-box">
                                <img src="/assets/images/our-services/pic3.jpg" alt="">
                            </div>
                            <div class="info-bx text-center">
                                <div class="feature-box-sm radius bg-white">
                                    <i class="fa fa-file-text-o text-primary"></i>
                                </div>
                                <h4><a href="/our-courses">Book Library & Store</a></h4>
                                <a href="/our-courses" class="btn radius-xl">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services END -->

        <!-- Popular Courses -->
        <div class="section-area section-sp2 popular-courses-bx">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-bx left">
                        <h2 class="title-head">Popular <span>Courses</span></h2>
                        <p>Recommended courses</p>
                    </div>
                </div>
                <div class="row">
                    <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                        <?php foreach($courses ?? [] as $course) : ?>
                            <div class="item">
                                <div class="cours-bx">
                                    <div class="action-box">
                                        <img src="/<?= $course->getUrlCourse() ?>" alt="">
                                        <a href="/courses/<?= $course->getId() ?>" class="btn">Read More</a>
                                    </div>
                                    <div class="info-bx text-center">
                                        <h5><a href="/courses/<?= $course->getId() ?>"><?= $course->getTitle() ?></a></h5>
                                        <span><?= $cursoRepository->getLevel($course)->getName() ?></span>
                                    </div>
                                    <div class="cours-more-info">
                                        <div class="review">
                                            <span><?= $course->getDuration() ?> hours</span>
                                        </div>
                                        <div class="price">
                                            <h5><?= $course->getPrice() ?> €</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Courses END -->

        <!-- Form -->
        <div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url(/assets/images/background/bg1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center text-white">
                        <h2>Online Courses To Learn</h2>
                        <h5>Own Your Feature Learning New Skills Online</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent News -->
        <div class="section-area section-sp2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-bx left">
                        <h2 class="title-head">Recent <span>News</span></h2>
                        <p>Latest blog posts</p>
                    </div>
                </div>
                <div class="recent-news-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                    <?php foreach($blog ?? [] as $post) : ?>
                        <div class="item">
                            <div class="recent-news">
                                <div class="action-box">
                                    <img src="/<?= $post->getUrlPost() ?>" alt="<?= $post->getTitle() ?>">
                                </div>
                                <div class="info-bx">
                                    <ul class="media-post">
                                        <li><a href="#"><i class="fa fa-calendar"></i><?= $post->getDateFormated() ?></a></li>
                                    </ul>
                                    <h5 class="post-title"><a href="/post/<?= $post->getId() ?>"><?= $post->getTitle() ?></a></h5>
                                    <p style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><?= $post->getDescription() ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Recent News End -->

    </div>
    <!-- contact area END -->
</div>
<!-- Content END-->

