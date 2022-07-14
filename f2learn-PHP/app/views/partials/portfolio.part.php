<div class="feature-filters clearfix center m-b40">
    <ul class="filters" data-toggle="buttons">
        <li data-filter="" class="btn active">
            <input type="radio">
            <a href="#"><span>All</span></a>
        </li>
        <li data-filter="book" class="btn">
            <input type="radio">
            <a href="#"><span>Book</span></a>
        </li>
        <li data-filter="courses" class="btn">
            <input type="radio">
            <a href="#"><span>Courses</span></a>
        </li>
        <li data-filter="education" class="btn">
            <input type="radio">
            <a href="#"><span>Education</span></a>
        </li>
    </ul>
</div>
<div class="clearfix">
    <ul id="masonry" class="ttr-gallery-listing magnific-image row">
        <?php foreach ($images ?? [] as $image) : ?>
            <li class="action-card col-lg-3 col-md-4 col-sm-6 <?= $imgRepository->getCategoria($image)->getName() ?>">
                <div class="ttr-box portfolio-bx">
                    <div class="ttr-media media-ov2 media-effect">
                        <a href="javascript:void(0);">
                            <img src="<?= $image->getUrlPortfolio() ?>" alt="<?= $image->getDescription() ?>">
                        </a>
                        <div class="ov-box">
                            <p class="imgStatus"><i class="fa fa-eye" aria-hidden="true"></i> <?= $image->getNumVisualizations() ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-heart" aria-hidden="true"></i> <?= $image->getNumLikes() ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-download" aria-hidden="true"></i> <?= $image->getNumDownloads() ?></p>
                            <div class="overlay-icon align-m">
                                <a href="/<?= $image->getUrlPortfolio() ?>" class="magnific-anchor" title="<?= $image->getDescription() ?>">
                                    <i class="ti-search"></i>
                                </a>
                            </div>
                            <div class="portfolio-info-bx bg-primary">
                                <div class="row">
                                    <div class="col-auto" style="padding: 0; margin: auto;"><a href="/<?= $image->getUrlPortfolio() ?>" class="magnific-anchor portfolioAction" title="<?= $image->getDescription() ?>"><button type="button" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button></a></div>
                                    <div class="col-auto" style="padding: 0; margin: auto;"><button type="button" class="btn btn-warning"><i class="fa fa-heart" aria-hidden="true"></i></button></div>
                                    <div class="col-auto" style="padding: 0; margin: auto;">
                                        <a href="" class="magnific-anchor portfolioAction" title="Download">
                                            <button type="button" class="btn btn-warning"><i class="fa fa-download" aria-hidden="true"></i></button>
                                        </a>
                                    </div>
                                    <div class="col-auto" style="padding: 0; margin: auto;"><button type="button" class="btn btn-warning"><i class="fa fa-info" aria-hidden="true"></i></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<!-- contact area END -->