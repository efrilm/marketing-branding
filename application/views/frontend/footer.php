<!-- footer -->
<footer class="section footer bg-dark-alt tc-light footer-s1">
    <div class="container">
        <div class="row gutter-vr-30px">
            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <div class="wgs-logo">
                            <a href="./">
                                <img src="images/logo-white.png" srcset="images/logo-white2x.png" alt="logo">
                            </a>
                        </div>
                        <p>&copy; 2022. All rights reserved.</p>
                    </div>
                </div><!-- .wgs -->
            </div><!-- .col -->
            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <h3 class="wgs-title"><?= mblang('Company') ?></h3>
                        <ul class="wgs-menu">
                            <li><a href="dallas-about.html"><?= mblang('About') ?></a></li>
                            <li><a href="texas-about.html"><?= mblang('Contact') ?></a></li>
                            <li><a href="dallas-team.html"><?= mblang('Blog') ?></a></li>
                        </ul>
                    </div>
                </div><!-- .wgs -->
            </div><!-- .col -->
            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <h3 class="wgs-title"><?= mblang('Services') ?></h3>
                        <ul class="wgs-menu">
                            <?php
                            $category = $this->category->getCategoryAll()->result();
                            foreach ($category as $key => $v) {
                            ?>

                                <li><a href="dallas-services.html"><?= $v->category_name ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div><!-- .wgs -->
            </div><!-- .col -->
            <div class="col-lg-3 col-sm-6">
                <div class="wgs">
                    <div class="wgs-content">
                        <h3 class="wgs-title">Get our staff</h3>
                        <form class="genox-form" action="form/subscribe.php" method="POST">
                            <div class="form-results"></div>
                            <div class="field-group btn-inline">
                                <input name="s_email" type="email" class="input" placeholder="Your  Email">
                                <input type="text" class="d-none" name="form-anti-honeypot" value="">
                                <button type="submit" class="far fa-paper-plane button"></button>
                            </div>
                        </form>
                    </div>
                </div><!-- .wgs -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</footer>
<!-- .footer -->