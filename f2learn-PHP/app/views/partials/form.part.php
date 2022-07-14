<?php include __DIR__ . '/show-error.part.php'; ?>
<form class="contact-bx" method="post" action="/contact/new">
    <div class="heading-bx left">
        <h2 class="title-head">Get In <span>Touch</span></h2>
    </div>
    <div class="row placeani">
        <div class="col-lg-6">
            <div class="form-group">
                <div class="input-group">
                    <!--<label>Your Name *</label>-->
                    <input name="name" value="<?= $name ?? '' ?>" type="text" class="form-control valid-character" placeholder="Your Name *" />
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="input-group">
                    <!--<label>Your Email Address *</label>-->
                    <input name="email" value="<?= $email ?? '' ?>" type="email" class="form-control" placeholder="Your Email Address *" />
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="input-group">
                    <!--<label>Your Phone</label>-->
                    <input name="phone" value="<?= $phone ?? '' ?>" type="text" class="form-control int-value" placeholder="Your Phone" />
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="input-group">
                    <!--<label>Subject *</label>-->
                    <input name="subject" value="<?= $subject ?? '' ?>" type="text" class="form-control" placeholder="Subject *" />
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <div class="input-group">
                    <!--<label>Type Message *</label>-->
                    <textarea name="message" rows="4" class="form-control" placeholder="Type Message *"><?= $message ?? '' ?></textarea>
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
            <input type="submit" name="submit" class="btn button-md" value="Send Message" />
        </div>
    </div>
</form>