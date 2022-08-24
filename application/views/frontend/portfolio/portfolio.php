<div class="banner banner-inner tc-light">
    <div class="banner-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="banner-content " style="margin-top: 80px;">
                        <h1 class="banner-heading"><?= mblang('We help Clients Create Joyful Digital Experiences') ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-image">
            <img src="<?= base_url() ?>/assets/images/backgrounds/banner5.jpg" alt="banner">
        </div>
    </div>
</div>
<!-- .banner -->

<!-- section -->
<div class="section section-x section-project" id="work">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 text-center text-md-left">
                <div class="section-head mtm-10">
                    <h2><?= mblang('Some highlights of work we\'ve done for forward thinking clients') ?>.</h2>
                </div>
            </div><!-- .col -->
            <div class="col-md-12">
                <!-- project-filter -->
                <ul class="project-filter filter-left project-md text-center text-sm-left">
                    <li class="active" data-filter="all">All</li>
                    <?php foreach ($category as $key => $v) { ?>
                        <li data-filter="<?= $v->id_category ?>"><?= $v->category_name ?></li>
                    <?php } ?>
                </ul>
                <!-- .project-filter -->
            </div>
        </div>
    </div>
    <!-- project -->
    <div class="project-area">
        <div class="container">
            <div class="row project project-s2 gutter-vr-30px" id="project1">
                <?php foreach ($portfolio as $key => $v) { ?>
                    <div class="col-md-4 col-sm-6 filtr-item" data-category="<?= $v->category_id ?>">
                        <a href="<?= base_url() ?>/detail-portfolio/<?= $v->portfolio_seo ?>">
                            <div class="project-item">
                                <div class="project-image">
                                    <img src="<?= base_url() ?>/assets/images/portfolio/<?= $v->portfolio_photo ?>" alt="">
                                </div>
                                <div class="project-over">
                                    <div class="project-content">
                                        <h4><?= $v->portfolio_name ?></h4>
                                        <p><?= $v->category_name ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div><!-- .col -->
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- .section -->

<!-- section / cta -->
<?php $this->load->view("frontend/utilities/cta"); ?>
<!-- .section-cta -->