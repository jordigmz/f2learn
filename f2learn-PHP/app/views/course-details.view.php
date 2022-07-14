    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                 <div class="row d-flex flex-row-reverse">
                    <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                        <div class="course-detail-bx">
                            <div class="course-price">
                                <h4 class="price"><?= $course->getPrice() ?> €</h4>
                            </div>
                            <?php if ($enroll ?? false) : ?>
                                <div class="course-buy-now text-center">
                                    <a href="/enroll/<?= $course->getId() ?>" class="btn radius-xl text-uppercase">Enroll Now</a>
                                </div>
                            <?php endif; ?>
                            <div class="teacher-bx">
                                <div class="teacher-info">
                                    <div class="teacher-thumb">
                                        <img src="/<?= $instructor->getUrlUsuario() ?>" alt=""/>
                                    </div>
                                    <div class="teacher-name">
                                        <h5><?= $instructor->getName() ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="course-info-list scroll-page">
                                <ul class="navbar">
                                    <li><a class="nav-link" href="#description"><i class="ti-zip"></i>Overview</a></li>
                                    <li><a class="nav-link" href="#instructor"><i class="ti-user"></i>Instructor</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <div class="courses-post">
                            <div class="ttr-post-media media-effect">
                                <a href="#"><img src="" alt=""></a>
                            </div>
                            <div class="ttr-post-info">
                                <div class="ttr-post-title ">
                                    <h2 class="post-title"><?= $course->getTitle() ?></h2>
                                </div>
                                <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                            </div>
                        </div>
                        <div class="courese-overview" id="description">
                            <h4>Overview</h4>
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <ul class="course-features">
                                        <li><i class="ti-time"></i> <span class="label">Duration</span> <span class="value"><?= $course->getDuration() ?> hours</span></li>
                                        <li><i class="ti-stats-up"></i> <span class="label">Skill level</span> <span class="value"><?= $cursoRepository->getLevel($course)->getName() ?></span></li>
                                        <li><i class="ti-smallcap"></i> <span class="label">Language</span> <span class="value"><?= $cursoRepository->getLanguage($course)->getName() ?></span></li>
                                        <li><i class="ti-user"></i> <span class="label">Students</span> <span class="value"><?= $course->getStudents() ?></span></li>
                                        <li><i class="ti-check-box"></i> <span class="label">Assessments</span> <span class="value"><?= $cursoRepository->getAssessment($course)->getName() ?></span></li>
                                    </ul>
                                </div>
                                <div class="col-md-12 col-lg-8">
                                    <h5 class="m-b5">Course Description</h5>
                                    <p><?= $course->getDescription() ?></p>
                                </div>
                            </div>
                            <div class="row" style="width: 100%; justify-content: center">
                                <img src="/<?= $course->getUrlCourse() ?>" alt="<?= $course->getTitle() ?>" title="<?= $course->getTitle() ?>" style="border-radius: 20px" />
                            </div>
                            <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                        </div>

                        <div class="" id="instructor">
                            <h4>Instructor</h4>
                            <div class="instructor-bx">
                                <div class="instructor-author">
                                    <img src="/<?= $instructor->getUrlUsuario() ?>" alt="">
                                </div>
                                <div class="instructor-info">
                                    <h6><?= $instructor->getName() ?></h6>
                                    <span>Professor</span>
                                    <ul class="list-inline m-tb10">
                                        <li><a href="https://es-es.facebook.com/" target="_blank" class="btn sharp-sm facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://www.instagram.com/" target="_blank" class="btn sharp-sm instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="https://es.linkedin.com/" target="_blank" class="btn sharp-sm linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="https://twitter.com/" class="btn sharp-sm twitter"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
</div>
<!-- Content END-->