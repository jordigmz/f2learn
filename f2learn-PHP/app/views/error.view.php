<body id="bg">
    <div class="page-wraper">
        <div id="loading-icon-bx"></div>
        <div class="account-form">
            <div class="account-head" style="background-image:url(/assets/images/background/bg2.jpg);">
                <a href="/"><img src="/assets/images/logo-white-2.png" alt=""></a>
            </div>
            <div class="account-form-inner">
                <div class="account-container">
                    <div class="error-page">
                        <h3>Ooopps :(</h3>
                        <h2 class="error-title"><?= $httpHeaderMessage ?? '' ?></h2>
                        <p><?= $errorMessage ?? '' ?></p>
                        <!--<h5>The Page you were looking for, couldn't be found.</h5>
                        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>-->
                        <div class="">
                            <a href="/" class="btn outline black">Back To Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>