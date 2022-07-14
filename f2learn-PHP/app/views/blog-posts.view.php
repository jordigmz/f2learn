        <div class="container">
            <!-- Content -->
            <?php include __DIR__ . '/partials/show-error.part.php'; ?>
            <form class="contact-bx" action="/posts/new" method="post" enctype="multipart/form-data">
                <div class="heading-bx left">
                    <h2 class="title-head">New <span>post</span></h2>
                    <p>Form for adding posts to the blog</p>
                </div>
                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <span style="color: #6C757D; user-select: none;">Image *</span>
                                <input name="image" type="file" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <span style="color: #6C757D; font-weight: normal; user-select: none;">Title *</span>
                                <input name="title" type="text" class="form-control" value="<?= $title ?? '' ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <span style="color: #6C757D; font-weight: normal; user-select: none;">Description *</span>
                                <input name="description" type="text" class="form-control" value="<?= $description ?? '' ?>" />
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="g-recaptcha" data-sitekey="6Lf2gYwUAAAAAJLxwnZTvpJqbYFWqVyzE-8BWhVe" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                <input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
                            </div>
                        </div>
                    </div>-->
                    <div class="col-lg-12">
                        <input type="submit" name="submit" class="btn button-md" value="Save" />
                    </div>
                </div>
            </form>
            <!-- Content END-->
            <?php include __DIR__ . '/partials/posts.part.php'; ?>
        </div>
    </div>
</main>
<div class="ttr-overlay"></div>

<?php include 'partials/externalJS-admin.part.php'; ?>

</body>
</html>