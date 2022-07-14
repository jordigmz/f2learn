<!-- Left sidebar menu start -->
<div class="ttr-sidebar">
    <div class="ttr-sidebar-wrapper content-scroll">
        <!-- side menu logo start -->
        <div class="ttr-sidebar-logo">
            <a href="#"><img alt="" src="/assets/admin/images/logo.png" width="122" height="27"></a>
            <div class="ttr-sidebar-toggle-button">
                <i class="ti-arrow-left"></i>
            </div>
        </div>
        <!-- side menu logo end -->
        <!-- sidebar menu start -->
        <nav class="ttr-sidebar-navi">
            <ul>
                <!--<li>
                    <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('dashboard') ? '#' : '/dashboard'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('dashboard') ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-home"></i></span>
                        <span class="ttr-label">Dashboard</span>
                    </a>
                </li>-->
                <li>
                    <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('courses') ? '#' : '/courses'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('courses') ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-layout-accordion-list"></i></span>
                        <span class="ttr-label">Courses</span>
                    </a>
                </li>
                <li>
                    <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('gallery-images') ? '#' : '/gallery-images'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('gallery-images') ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-image"></i></span>
                        <span class="ttr-label">Gallery Images</span>
                    </a>
                </li>
                <li>
                    <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('posts') ? '#' : '/posts'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('posts') ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-pin-alt"></i></span>
                        <span class="ttr-label">Blog Posts</span>
                    </a>
                </li>
                <!--<li>
                    <a href="#" class="ttr-material-button">
                        <span class="ttr-icon"><i class="ti-email"></i></span>
                        <span class="ttr-label">Mailbox</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('mailbox') ? '#' : '/mailbox'?>" class="ttr-material-button"><span class="ttr-label">Mail Box</span></a>
                        </li>
                        <li>
                            <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('mailbox-compose') ? '#' : '/mailbox-compose'?>" class="ttr-material-button"><span class="ttr-label">Compose</span></a>
                        </li>
                        <li>
                            <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('mailbox-read') ? '#' : '/mailbox-read'?>" class="ttr-material-button"><span class="ttr-label">Mail Read</span></a>
                        </li>
                    </ul>
                </li>-->
                <li>
                    <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('partners') ? '#' : '/partners'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('partners') ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-pie-chart"></i></span>
                        <span class="ttr-label">Partners</span>
                    </a>
                </li>
                <li>
                    <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('users') ? '#' : '/users'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('users') ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-user"></i></span>
                        <span class="ttr-label">Users</span>
                    </a>
                </li>
                <li>
                    <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('articulos') ? '#' : '/articulos'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('articulos') || str_contains($_SERVER['REQUEST_URI'], 'articulo') ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-shopping-cart"></i></span>
                        <span class="ttr-label">Artículos</span>
                    </a>
                </li>
                <!--<li>
                    <a href="#" class="ttr-material-button <?= f2learn\app\utils\Utils::existeOpcionMenuActivaEnArray(['calendar', 'list-calendar']) ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-calendar"></i></span>
                        <span class="ttr-label">Calendar</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('calendar') ? '#' : '/calendar'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('calendar') ? 'active' : ''?>"><span class="ttr-label">Calendar</span></a>
                        </li>
                        <li>
                            <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('list-calendar') ? '#' : '/list-calendar'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('list-calendar') ? 'active' : ''?>"><span class="ttr-label">List View</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('bookmarks') ? '#' : '/bookmarks'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('bookmarks') ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-bookmark-alt"></i></span>
                        <span class="ttr-label">Bookmarks</span>
                    </a>
                </li>
                <li>
                    <a href="/review" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('review') ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-comments"></i></span>
                        <span class="ttr-label">Review</span>
                    </a>
                </li>
                <li>
                    <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('user') ? '#' : '/user'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::existeOpcionMenuActivaEnArray(['user', 'teacher']) ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-user"></i></span>
                        <span class="ttr-label">My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="ttr-material-button <?= f2learn\app\utils\Utils::existeOpcionMenuActivaEnArray(['user', 'teacher']) ? 'active' : ''?>">
                        <span class="ttr-icon"><i class="ti-user"></i></span>
                        <span class="ttr-label">My Profile</span>
                        <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('user') ? '#' : '/user'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('user') ? 'active' : ''?>"><span class="ttr-label">User Profile</span></a>
                        </li>
                        <li>
                            <a href="<?= f2learn\app\utils\Utils::esOpcionMenuActiva('teacher') ? '#' : '/teacher'?>" class="ttr-material-button <?= f2learn\app\utils\Utils::esOpcionMenuActiva('teacher') ? 'active' : ''?>"><span class="ttr-label">Teacher Profile</span></a>
                        </li>
                    </ul>
                </li>-->
                <li class="ttr-seperate"></li>
            </ul>
            <!-- sidebar menu end -->
        </nav>
        <!-- sidebar menu end -->
    </div>
</div>
<!-- Left sidebar menu end -->
