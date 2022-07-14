<body id="bg">
    <div class="page-wraper">
        <div id="loading-icon-bx"></div>
        <div class="account-form">
            <div class="account-head" style="background-image:url(/assets/images/background/bg2.jpg);">
                <a href="/"><img src="/assets/images/logo-white-2.png" alt=""></a>
            </div>
            <div class="account-form-inner">
                <div class="account-container">
                    <div class="heading-bx left">
                        <h2 class="title-head">Sign Up <span>Now</span></h2>
                        <p>Login Your Account <a href="/login">Click here</a></p>
                    </div>
                    <?php include __DIR__ . '/partials/show-error.part.php'; ?>
                    <form class="contact-bx" action="/check-register" method="post" enctype="multipart/form-data">
                        <div class="row placeani">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="name" type="text" value="<?= $name ?? '' ?>" class="form-control" placeholder="Name *" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="email" type="text" value="<?= $email ?? '' ?>" class="form-control" placeholder="Email *" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label style="color: #6C757D; font-size: 13px; font-weight: normal; user-select: none;">Image</label>
                                    <input name="image" type="file" class="form-control" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="username" type="text" value="<?= $username ?? '' ?>" class="form-control" placeholder="Username *" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="password" type="password" class="form-control valid-character" placeholder="Password *" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="re-password" type="password" class="form-control valid-character" placeholder="Repeat password *" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <img src="captcha.php" alt="Captcha" />
                                    <div class="input-group">
                                        <input name="captcha" type="text" class="form-control valid-character" placeholder="Captcha *" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 m-b30">
                                <button name="submit" type="submit" value="Submit" class="btn button-md">Sign Up</button>
                            </div>
                            <div class="col-lg-12">
                                <a href="/"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Home</a>
                            </div>
                            <!--<div class="col-lg-12">
                                <h6>Sign Up with Social media</h6>
                                <div class="d-flex">
                                    <a class="btn flex-fill m-r5 facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a>
                                    <a class="btn flex-fill m-l5 google-plus" href="#"><i class="fa fa-google-plus"></i>Google Plus</a>
                                </div>
                            </div>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>