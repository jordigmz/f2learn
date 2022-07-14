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
                        <h2 class="title-head">Login to your <span>Account</span></h2>
                        <p>Don't have an account? <a href="/register">Create one here</a></p>
                    </div>
                    <?php include __DIR__ . '/partials/show-error.part.php'; ?>
                    <form class="contact-bx" action="/check-login" method="post">
                        <div class="row placeani">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="username" value="<?= $username ?? '' ?>" type="text" class="form-control valid-character" placeholder="Username *" />
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
                            <!--<div class="col-lg-12">
                                <div class="form-group form-forget">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                        <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                    </div>
                                    <a href="/forget-password" class="ml-auto">Forgot Password?</a>
                                </div>
                            </div>-->
                            <div class="col-lg-12 m-b30">
                                <button name="submit" type="submit" value="Submit" class="btn button-md">Login</button>
                            </div>
                            <div class="col-lg-12">
                                <a href="/"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Home</a>
                            </div>
                            <!--<div class="col-lg-12">
                                <h6>Login with Social media</h6>
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