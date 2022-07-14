    <div class="content-block">
        <div class="section-area section-sp1">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-12 col-xl-12">
                        <!-- blog start -->
                        <div class="recent-news blog-lg">
                            <div class="action-box blog-lg">
                                <img src="/<?= $post->getUrlPost() ?>" alt="<?= $post->getTitle() ?>" title="<?= $post->getTitle() ?>" />
                            </div>
                            <div class="info-bx">
                                <ul class="media-post">
                                    <li><a href="#"><i class="fa fa-calendar"></i><?= $post->getDateFormated() ?></a></li>
                                </ul>
                                <h5 class="post-title"><a href="#"><?= $post->getTitle() ?></a></h5>
                                <p><?= $post->getDescription() ?></p>
                                <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                            </div>
                        </div>
                        <!-- blog END -->
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <a href="/blog"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content END-->