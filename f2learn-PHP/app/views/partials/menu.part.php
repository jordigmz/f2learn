<?php include __DIR__ . '/head.part.php'; ?>

<?php if ($_SERVER['REQUEST_URI'] === '/' || str_contains($_SERVER['REQUEST_URI'], '/?')) : ?>
    <body id="bg">
        <div class="page-wraper">
            <div id="loading-icon-bx"></div>
            <!-- Header Top ==== -->
            <header class="header rs-nav header-transparent">
                <div class="top-bar">
                    <div class="container">
                        <div class="row d-flex justify-content-between">
                            <div class="topbar-left">
                                <ul>
                                    <li><a href="/faqs"><i class="fa fa-question-circle"></i><?= _("Ask a Question") ?></a></li>
                                    <li><a href="mailto:f2learn.education@gmail.com"><i class="fa fa-envelope-o"></i>f2learn.education@gmail.com</a></li>
                                </ul>
                            </div>
                            <div class="topbar-right">
                                <ul>
                                    <li><a href="?language=en_GB"><img src="/assets/images/flag/united-kingdom.svg" width="18px" alt="en-GB" /> <?= _("English") ?></a></li>
                                    <li><a href="?language=es_ES"><img src="/assets/images/flag/spain.svg" width="18px" alt="es-ES" /> <?= _("Spanish") ?></a></li>
                                    <?php if (is_null($app['user'])) : ?>
                                        <li><a href="/login"><?= _("Login") ?></a></li>
                                        <li><a href="/register"><?= _("Register") ?></a></li>
                                    <?php else : ?>
                                        <li><a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> <b><?= $app['user']->getUsername() ?></b> - <?= _("Exit") ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky-header navbar-expand-lg">
                    <div class="menu-bar clearfix">
                        <div class="container clearfix">
                            <!-- Header Logo ==== -->
                            <div class="menu-logo">
                                <a href="#"><img src="/assets/images/logo-white.png" alt=""></a>
                            </div>
                            <!-- Mobile Nav Button ==== -->
                            <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <!-- Author Nav ==== -->
                            <div class="secondary-menu">
                                <div class="secondary-inner">
                                    <ul>
                                        <li><a href="https://es-es.facebook.com/" target="_blank" class="btn-link"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://www.instagram.com/" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="https://es.linkedin.com/" target="_blank" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
                                        <!-- Search Button ==== -->
                                        <li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Search Box ==== -->
                            <div class="nav-search-bar">
                                <form action="#">
                                    <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                                    <span><i class="ti-search"></i></span>
                                </form>
                                <span id="search-remove"><i class="ti-close"></i></span>
                            </div>
                            <!-- Navigation Menu ==== -->
                            <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
                                <div class="menu-logo">
                                    <a href="/"><img src="/assets/images/logo.png" alt=""></a>
                                </div>
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#"><?= _("Home") ?></i></a></li>
                                    <li><a href="javascript:;"><?= _("About") ?>  <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="/about"><?= _("About Us") ?></i></a></li>
                                            <li><a href="/contact"><?= _("Contact Us") ?></i></a></li>
                                            <!--<li><a href="/events">Events</i></a></li>-->
                                            <li><a href="/faqs"><?= _("FAQ's") ?></i></a></li>
                                            <li><a href="/portfolio"><?= _("Portfolio") ?></a></li>
                                            <!--<li><a href="/profile">Profile</a></li>-->
                                        </ul>
                                    </li>
                                    <li class="add-mega-menu"><a href="javascript:;"><?= _("Courses") ?> <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                                <li><a href="/our-courses"><?= _("Our Courses") ?></a></li>
                                                <li><a href="/membership"><?= _("Membership") ?></a></li>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="/blog"><?= _("Blog") ?></i></a></li>
                                    <li><a href="/articulos"><?= _("Articles") ?></a></li>
                                    <!-- Back Office -->
                                    <?php if (!is_null($app['user'])) : ?>
                                        <li><a href="/profile"><?= _("Profile") ?></i></a></li>
                                        <li class="nav-dashboard"><a href="javascript:;"><?= _("Dashboard") ?> <i class="fa fa-chevron-down"></i></a>
                                            <ul class="sub-menu">
                                                <!--<li><a href="/dashboard">Dashboard</a></li>-->
                                                <li><a href="/courses"><?= _("Courses") ?></a></li>
                                                <!--<li><a href="/bookmarks">Bookmarks</a></li>
                                                <li><a href="javascript:;">Calendar<i class="fa fa-angle-right"></i></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="/calendar">Basic Calendar</a></li>
                                                        <li><a href="/list-calendar">List View Calendar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="/courses">Courses</a></li>-->
                                                <li><a href="/gallery-images"><?= _("Gallery Images") ?></a></li>
                                                <!--<li><a href="javascript:;">Mailbox<i class="fa fa-angle-right"></i></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="/mailbox">Mailbox</a></li>
                                                        <li><a href="/mailbox-compose">Compose</a></li>
                                                        <li><a href="/mailbox-read">Mail Read</a></li>
                                                    </ul>
                                                </li>-->
                                                <li><a href="/posts"><?= _("Blog Posts") ?></i></a></li>
                                                <li><a href="/partners"><?= _("Partners") ?></i></a></li>
                                                <li><a href="/users"><?= _("Users") ?></i></a></li>
                                                <!--<li><a href="/review">Review</a></li>
                                                <li><a href="/teacher">Teacher Profile</a></li>
                                                <li><a href="/user">User Profile</a></li>-->
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                    <!-- END Back Office -->
                                </ul>
                                <div class="nav-social-link">
                                    <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                    <a href="javascript:;"><i class="fa fa-instagram"></i></a>
                                    <a href="javascript:;"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                            <!-- Navigation Menu END ==== -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header Top END ==== -->
<?php else : ?>
    <body id="bg">
        <div class="page-wraper">
            <div id="loading-icon-bx"></div>
            <!-- Header Top ==== -->
            <header class="header rs-nav">
                <div class="top-bar">
                    <div class="container">
                        <div class="row d-flex justify-content-between">
                            <div class="topbar-left">
                                <ul>
                                    <li><a href="/faqs"><i class="fa fa-question-circle"></i><?= _("Ask a Question") ?></a></li>
                                    <li><a href="mailto:f2learn.education@gmail.com"><i class="fa fa-envelope-o"></i>f2learn.education@gmail.com</a></li>
                                </ul>
                            </div>
                            <div class="topbar-right">
                                <ul>
                                    <li><a href="?language=en_GB"><img src="/assets/images/flag/united-kingdom.svg" width="18px" alt="en-GB" /> <?= _("English") ?></a></li>
                                    <li><a href="?language=es_ES"><img src="/assets/images/flag/spain.svg" width="18px" alt="es-ES" /> <?= _("Spanish") ?></a></li>
                                    <?php if (is_null($app['user'])) : ?>
                                        <li><a href="/login"><?= _("Login") ?></a></li>
                                        <li><a href="/register"><?= _("Register") ?></a></li>
                                    <?php else : ?>
                                        <li><a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> <b><?= $app['user']->getUsername() ?></b> - <?= _("Exit") ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky-header navbar-expand-lg">
                    <div class="menu-bar clearfix">
                        <div class="container clearfix">
                            <!-- Header Logo ==== -->
                            <div class="menu-logo <?= f2learn\app\utils\Utils::esOpcionMenuActiva('index') ? 'active' : ''?>">
                                <a href="/"><img src="/assets/images/logo.png" alt=""></a>
                            </div>
                            <!-- Mobile Nav Button ==== -->
                            <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <!-- Author Nav ==== -->
                            <div class="secondary-menu">
                                <div class="secondary-inner">
                                    <ul>
                                        <li><a href="https://es-es.facebook.com/" target="_blank" class="btn-link"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://www.instagram.com/" target="_blank" class="btn-link"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="https://es.linkedin.com/" target="_blank" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
                                        <!-- Search Button ==== -->
                                        <li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Search Box ==== -->
                            <div class="nav-search-bar">
                                <form action="#">
                                    <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                                    <span><i class="ti-search"></i></span>
                                </form>
                                <span id="search-remove"><i class="ti-close"></i></span>
                            </div>
                            <!-- Navigation Menu ==== -->
                            <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
                                <div class="menu-logo">
                                    <a href="/"><img src="/assets/images/logo.png" alt=""></a>
                                </div>
                                <ul class="nav navbar-nav">
                                    <li class="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('index') ? 'active' : ''?>">
                                        <a href="/"><?= _("Home") ?></i></a></li>
                                    <li class="<?= f2learn\app\utils\Utils::existeOpcionMenuActivaEnArray(['about', 'contact', 'events', 'event', 'faqs', 'portfolio']) ? 'active' : ''?>"><a href="javascript:;"><?= _("About") ?>  <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                            <li class="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('about') ? 'active' : ''?>">
                                                <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('about') ? '#' : '/about'?>"><?= _("About Us") ?></i></a></li>
                                            <li class="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('contact') ? 'active' : ''?>">
                                                <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('contact') ? '#' : '/contact'?>"><?= _("Contact Us") ?></i></a></li>
                                            <!--<li class="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('events') ? 'active' : ''?>">
                                                <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('events') ? '#' : '/events'?>">Events</i></a></li>-->
                                            <li class="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('faqs') ? 'active' : ''?>">
                                                <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('faqs') ? '#' : '/faqs'?>"><?= _("FAQ's") ?></i></a></li>
                                            <li class="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('portfolio') ? 'active' : ''?>">
                                                <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('portfolio') ? '#' : '/portfolio'?>"><?= _("Portfolio") ?></a></li>
                                            <!--<li class="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('profile') ? 'active' : ''?>">
                                                <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('profile') ? '#' : '/profile'?>">Profile</a></li>-->
                                        </ul>
                                    </li>
                                    <li class="add-mega-menu
                                        <?= f2learn\app\utils\Utils::existeOpcionMenuActivaEnArray(['our-courses', 'course', 'events', 'membership']) || str_contains($_SERVER['REQUEST_URI'], 'course') ? 'active' : ''?>
                                        "><a href="javascript:;"><?= _("Courses") ?> <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu">
                                            <li class="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('our-courses') || str_contains($_SERVER['REQUEST_URI'], 'course') ? 'active' : ''?>">
                                                <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('our-courses') ? '#' : '/our-courses'?>"><?= _("Our Courses") ?></a></li>
                                            <li class="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('membership') ? 'active' : ''?>">
                                                <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('membership') ? '#' : '/membership'?>"><?= _("Membership") ?></a></li>
                                        </ul>
                                    </li>
                                    <li class="<?= f2learn\app\utils\Utils::existeOpcionMenuActivaEnArray(['blog', 'post']) || str_contains($_SERVER['REQUEST_URI'], 'post') ? 'active' : ''?>">
                                        <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('blog') ? '#' : '/blog'?>"><?= _("Blog") ?></a></li>
                                    <li><a href="/articulos"><?= _("Articles") ?></a></li>
                                    <!-- Back Office -->
                                    <?php if (!is_null($app['user'])) : ?>
                                        <li class="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('profile') ? 'active' : ''?>">
                                            <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('profile') ? '#' : '/profile'?>"><?= _("Profile") ?></a></li>
                                        <li class="nav-dashboard"><a href="javascript:;"><?= _("Dashboard") ?> <i class="fa fa-chevron-down"></i></a>
                                            <ul class="sub-menu">
                                                <!--<li><a href="/dashboard">Dashboard</a></li>-->
                                                <li><a href="/courses"><?= _("Courses") ?></a></li>
                                                <!--<li><a href="/bookmarks">Bookmarks</a></li>
                                                <li><a href="javascript:;">Calendar<i class="fa fa-angle-right"></i></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="/calendar">Basic Calendar</a></li>
                                                        <li><a href="/list-calendar">List View Calendar</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="/courses">Courses</a></li>-->
                                                <li><a href="/gallery-images"><?= _("Gallery Images") ?></a></li>
                                                <!--<li><a href="javascript:;">Mailbox<i class="fa fa-angle-right"></i></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="/mailbox">Mailbox</a></li>
                                                        <li><a href="/mailbox-compose">Compose</a></li>
                                                        <li><a href="/mailbox-read">Mail Read</a></li>
                                                    </ul>
                                                </li>-->
                                                <li><a href="/posts"><?= _("Blog Posts") ?></i></a></li>
                                                <li><a href="/partners"><?= _("Partners") ?></i></a></li>
                                                <li><a href="/users"><?= _("Users") ?></i></a></li>
                                                <!--<li><a href="/review">Review</a></li>
                                                <li><a href="/teacher">Teacher Profile</a></li>
                                                <li><a href="/user">User Profile</a></li>-->
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                    <!-- END Back Office -->
                                </ul>
                                <div class="nav-social-link">
                                    <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                    <a href="javascript:;"><i class="fa fa-instagram"></i></a>
                                    <a href="javascript:;"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                            <!-- Navigation Menu END ==== -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- header END ==== -->
            <!-- Inner Content Box ==== -->
            <div class="page-content">
                <!-- Page Heading Box ==== -->
                <div class="page-banner ovbl-dark" style="background-image:url(/assets/images/banner/banner2.jpg);">
                    <div class="container">
                        <div class="page-banner-entry">
                            <h1 class="text-white">
                                <?php if ($_SERVER['REQUEST_URI'] !== '/faqs' || str_contains($_SERVER['REQUEST_URI'],'/faqs?')) : ?>
                                    <?php if (str_contains($_SERVER['REQUEST_URI'],'?')) : ?>
                                        <?= substr(ucfirst(substr(str_replace(['/', '-'], ' ', $_SERVER['REQUEST_URI']), 1)), 0, strrpos(ucfirst(substr(str_replace(['/', '-'], ' ', $_SERVER['REQUEST_URI']), 1)),'?')) ?>
                                    <?php else : ?>
                                        <?= ucfirst(substr(str_replace(['/', '-'], ' ', $_SERVER['REQUEST_URI']), 1)) ?>
                                    <?php endif ; ?>
                                <?php else : ?>
                                    FAQ's
                                <?php endif ; ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb-row">
                    <div class="container">
                        <ul class="list-inline">
                            <li><a href="#">Home</a></li>
                            <li>
                                <b>
                                    <?php if ($_SERVER['REQUEST_URI'] !== '/faqs' || str_contains($_SERVER['REQUEST_URI'],'/faqs?')) : ?>
                                        <?php if (str_contains($_SERVER['REQUEST_URI'],'?')) : ?>
                                            <?= substr(ucfirst(substr(str_replace(['/', '-'], ' ', $_SERVER['REQUEST_URI']), 1)), 0, strrpos(ucfirst(substr(str_replace(['/', '-'], ' ', $_SERVER['REQUEST_URI']), 1)),'?')) ?>
                                        <?php else : ?>
                                            <?= ucfirst(substr(str_replace(['/', '-'], ' ', $_SERVER['REQUEST_URI']), 1)) ?>
                                        <?php endif ; ?>
                                    <?php else : ?>
                                        FAQ's
                                    <?php endif ; ?>
                                </b>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Page Heading Box END ==== -->
<?php endif ; ?>