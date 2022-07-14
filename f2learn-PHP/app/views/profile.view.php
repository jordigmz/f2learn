    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                 <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                        <div class="profile-bx text-center">
                            <div class="user-profile-thumb">
                                <img src="/<?= $user->getUrlUsuario() ?>" alt=""/>
                            </div>
                            <div class="profile-info">
                                <h4><?= ucfirst($user->getName()) ?></h4>
                                <span><?= $user->getEmail() ?></span>
                            </div>
                            <div class="profile-social">
                                <ul class="list-inline m-a0">
                                    <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://es-es.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="https://es.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <div class="profile-tabnav">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#courses"><i class="ti-pencil-alt"></i>My Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#edit-profile"><i class="ti-pencil-alt"></i>Edit Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#change-password"><i class="ti-lock"></i>Change Password</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 m-b30">
                        <div class="profile-content-bx">
                            <div class="tab-content">
                                <div class="tab-pane active" id="courses">
                                    <div class="profile-head">
                                        <h3>My Courses</h3>
                                    </div>
                                    <div class="courses-filter">
                                        <div class="clearfix">
                                            <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                <?php foreach($courses ?? [] as $course) : ?>
                                                    <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6">
                                                        <div class="cours-bx">
                                                            <div class="action-box">
                                                                <img src="/<?= $course->getUrlCourse() ?>" alt="">
                                                                <a href="/courses/<?= $course->getId() ?>" class="btn">Read More</a>
                                                            </div>
                                                            <div class="info-bx text-center">
                                                                <h5><a href="/courses/<?= $course->getId() ?>"><?= $course->getTitle() ?></a></h5>
                                                                <span><?= $cursoRepository->getLevel($course)->getName() ?></span>
                                                            </div>
                                                            <!--<div class="cours-more-info">
                                                                <div class="review">
                                                                    <span><?= $course->getDuration() ?> hours</span>
                                                                </div>
                                                                <div class="price">
                                                                    <h5><?= $course->getPrice() ?> €</h5>
                                                                </div>
                                                            </div>-->
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="edit-profile">
                                    <div class="profile-head">
                                        <h3>Edit Profile</h3>
                                    </div>
                                    <?php include __DIR__ . '/partials/show-error.part.php'; ?>
                                    <form class="edit-profile" action="/profile/edit" method="post" enctype="multipart/form-data">
                                        <div class="">
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                                                    <h3>Profile details</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Name</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" name="name" value="<?= ucfirst($user->getName()) ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Email</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" name="email" value="<?= $user->getEmail() ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Image</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="file" name="image" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Username</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" name="username" value="<?= $user->getUsername() ?>">
                                                </div>
                                            </div>

                                            <!--<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                                            <div class="form-group row">
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-10 ml-auto">
                                                    <h3 class="m-form__section">3. Social Links</h3>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Linkedin</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="www.linkedin.com">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Facebook</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="www.facebook.com">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Twitter</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="www.twitter.com">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-3 col-md-3 col-lg-2 col-form-label">Instagram</label>
                                                <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                    <input class="form-control" type="text" value="www.instagram.com">
                                                </div>
                                            </div>-->
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-12 col-sm-3 col-md-3 col-lg-2">
                                                    </div>
                                                    <div class="col-12 col-sm-9 col-md-9 col-lg-7">
                                                        <input type="submit" name="submit" class="btn button-md" value="Save Changes" />
                                                        <!--<button type="reset" class="btn-secondry">Cancel</button>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="change-password">
                                    <div class="profile-head">
                                        <h3>Change Password</h3>
                                    </div>
                                    <?php include __DIR__ . '/partials/show-error.part.php'; ?>
                                    <form class="edit-profile" action="/profile/password/new" method="post">
                                        <div class="">
                                            <div class="form-group row">
                                                <div class="col-12 col-sm-8 col-md-8 col-lg-9 ml-auto">
                                                    <h3>Password</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">New Password</label>
                                                <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                    <input class="form-control" type="password" name="new-password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-12 col-sm-4 col-md-4 col-lg-3 col-form-label">Re Type New Password</label>
                                                <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                    <input class="form-control" type="password" name="re-new-password" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-4 col-md-4 col-lg-3">
                                            </div>
                                            <div class="col-12 col-sm-8 col-md-8 col-lg-7">
                                                <input type="submit" name="submit" class="btn button-md" value="Save Changes" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
</div>
<!-- Content END-->