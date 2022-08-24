<div class="banner banner-inner tc-light" style="margin-top: 100px;">
    <div class="banner-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="banner-content">
                        <h1 class="banner-heading"><?= $service->service_name ?></h1>
                        <a href="https://wa.me/<?= $config->no_whatsapp ?>" class="btn">Whatsapp</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-image">
            <img src="<?= base_url() ?>/assets/images/backgrounds/<?= $bg->bg_service ?>" alt="banner">
        </div>
    </div>
</div>

<!-- section -->

<div class="section section-l bg-light tc-grey-alt">
    <div class="container">
        <div class="row align-items-center gutter-vr-30px">
            <div class="col-12 col-md-6 order-md-last">
                <img src="<?= base_url() ?>/assets/images/services/<?= $service->service_photo ?>">
            </div><!-- .col -->
            <div class="col-12 col-md-6">
                <div class="text-block">
                    <h2 class="fw-4"><?= $service->service_name ?></h2>
                    <p class="lead"><?= $service->service_description ?></p>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!-- .section -->

<!-- code -->
<div class="section section-l">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-head section-md tc-light">
                    <h5 class="heading-xs dash dash-both"><?= mblang('Feature') ?></h5>
                    <h2><?= mblang('Features We Provide For You') ?>.</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center gutter-vr-30px">
            <?php
            $no = 1;
            foreach ($feature as $key => $v) {
            ?>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="feature feature-s2 feature-s2-alt-inner bg-light">
                        <div class="icon-box">
                            <strong class="icon"><?= $no++ ?></strong>
                            <div class="icon-box-content">
                                <h6 class="tc-primary"><?= $v->feature_title ?></h6>
                            </div>
                        </div>
                        <div class="feature-content">
                            <p><?= $v->feature_description ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div><!-- .row-->
    </div><!-- .container -->
    <!-- bg -->
    <div class="bg-image bg-fixed overlay-dark" data-opacity="50">
        <img src="<?= base_url() ?>/assets/images/backgrounds/<?= $bg->bg_service_feature ?>" alt="">
    </div>
    <!-- end bg -->
</div>
<!-- end code -->
<!-- section -->
<div class="section section-x">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-head section-sm mtm-10">
                    <h2><?= mblang("Recent Service") ?></h2>
                </div>
            </div>
        </div>
        <!-- .row -->
        <div class="row justify-content-center gutter-vr-30px">
            <?php
            foreach ($recentService as $key => $v) {
            ?>
                <div class="col-10 col-md-4">
                    <a href="dallas-work-single.html">
                        <div class="project-item">
                            <div class="project-image">
                                <img src="<?= base_url() ?>/assets/images/services/<?= $v->service_photo ?>" alt="">
                            </div>
                            <div class="project-over">
                                <div class="project-content">
                                    <h4><?= $v->service_name ?></h4>
                                    <p><?= $v->category_name ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div><!-- .row -->
    </div><!-- .container -->
</div>
<!-- .section -->

<?php $this->load->view('frontend/utilities/cta.php'); ?>