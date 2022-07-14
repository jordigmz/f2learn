    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                 <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <?php foreach($courses ?? [] as $course) : ?>
                                <div class="col-md-6 col-lg-4 col-sm-6 m-b30">
                                    <div class="cours-bx">
                                        <div class="action-box">
                                            <img src="/<?= $course->getUrlCourse() ?>" alt="">
                                            <a href="/courses/<?= $course->getId() ?>" class="btn">Read More</a>
                                        </div>
                                        <div class="info-bx text-center">
                                            <h5><a href="/courses/<?= $course->getId() ?>"><?= $course->getTitle() ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
</div>
<!-- Content END-->