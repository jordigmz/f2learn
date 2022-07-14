            <div class="container">
                <!-- Content -->
                <div id="partners">
                    <?php include __DIR__ . '/partials/show-error.part.php'; ?>
                    <form class="contact-bx" action="/partners/new" method="post" enctype="multipart/form-data">
                        <div class="heading-bx left">
                            <h2 class="title-head">Add <span>partners</span></h2>
                            <p>Form for aggregate new partners</p>
                        </div>
                        <div class="row placeani">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label style="color: #6C757D; font-weight: normal; user-select: none;">Name *</label>
                                    <input name="name" value="<?= $name ?? '' ?>" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label style="color: #6C757D; font-weight: normal; user-select: none;">Image *</label>
                                    <input name="image" type="file" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label style="color: #6C757D; font-weight: normal; user-select: none;">Description *</label>
                                    <input name="description" value="<?= $description ?? '' ?>" type="text" class="form-control" />
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
                </div>
                <!-- Content END-->
                <?php include __DIR__ . '/partials/partners.part.php'; ?>
            </div>
        </div>
    </main>
    <div class="ttr-overlay"></div>

    <?php include 'partials/externalJS-admin.part.php'; ?>

</body>
</html>