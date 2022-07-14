<div class="content-block">
    <div class="section-area section-sp1">
        <div class="container">
            <div class="row">
                <!-- left part start -->
                <div class="col-lg-12 col-xl-12 col-md-12">
                    <!-- blog grid -->
                    <div id="masonry" class="ttr-blog-grid-3 row">
                        <?php foreach ($blog ?? [] as $post) : ?>
                            <div class="post action-card col-xl-6 col-lg-6 col-md-12 col-xs-12 m-b40">
                                <div class="recent-news">
                                    <div class="action-box">
                                        <img src="/<?= $post->getUrlPost() ?>" alt="<?= $post->getTitle() ?>" title="<?= $post->getTitle() ?>" />
                                    </div>
                                    <div class="info-bx">
                                        <ul class="media-post">
                                            <li><a href="#"><i class="fa fa-calendar"></i><?= $post->getDateFormated() ?></a></li>
                                            <!--<li><a href="#"><i class="fa fa-user"></i>By William</a></li>-->
                                        </ul>
                                        <h5 class="post-title"><a href="/post/<?= $post->getId() ?>"> <?= $post->getTitle() ?></a></h5>
                                        <p style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><?= $post->getDescription() ?></p>
                                        <div class="post-extra">
                                            <a href="/post/<?= $post->getId() ?>" class="btn-link">READ MORE</a>
                                            <!--<a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>20 Comment</a>-->
                                        </div>
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