<div class="banner banner-inner tc-light">
    <div class="banner-block">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="banner-content">
                        <h1 class="banner-heading m-0"><?= $portfolio->portfolio_name ?></h1>
                        <p class="lead m-0"><?= mblang('Client') ?> : <?= $portfolio->client_name ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-image">
            <img src="<?= base_url() ?>/assets/images/backgrounds/<?= $bg->bg_portfolio ?>" alt="banner">
        </div>
    </div>

</div>
<!-- .banner -->
</div>
</header>
<!-- end header -->

<!-- section -->
<div class="section section-x">
    <div class="container">
        <div class="content">
            <div class="row gutter-vr-30px">
                <div class="col-xl-6 order-lg-last">
                    <div class="image-block">
                        <img src="<?= base_url() ?>/assets/images/portfolio/<?= $portfolio->portfolio_photo ?>" alt="">
                    </div>
                </div><!-- .col -->
                <div class="col-xl-6">
                    <div class="text-block  project-box-pad bg-primary tc-light h-full">
                        <h2><?= $portfolio->portfolio_name ?></h2>
                        <p><?php echo $portfolio->description ?>.</p>
                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div>
    </div><!-- .container -->
</div>
<!-- .section -->

<!-- section -->
<div class="section section-x pt-0 fw-3">
    <div class="container">
        <div class="row gutter-vr-30px">
            <div class="col-md-4">
                <div class="text-box project-box-content project-box-pad bg-secondary h-full">
                    <p><strong><?= mblang('Client') ?>:</strong> <?= $portfolio->client_name  ?></p>
                    <p><strong><?= mblang('Location') ?>:</strong> <?= $portfolio->client_location ?></p>
                    <p><strong><?= mblang('Time Frame') ?>:</strong> <?= $portfolio->time_frame ?></p>
                    <p><strong><?= mblang('Year') ?> :</strong> <?= $portfolio->year ?> </p>
                    <p><strong><?= mblang('Category') ?> :</strong> <?= $portfolio->category_name ?> </p>
                </div>
            </div><!-- .col -->
            <!-- <div class="col-md-4">
                <div class="text-box project-box-content h-full">
                    <h3>Challenge</h3>
                    <p>With a growing community of millions messaging and sharing photos and videos, Landing page needed to ensure its apps were as high-quality, reliable and smoothly synced as could be.The company brought us on board to accelerate development of both its iOS and Android mobile.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-box project-box-content h-full">
                    <h3>Solution</h3>
                    <p>We onboarded one Genox engineer to start, but Landing was so impressed with our seamless integration into its business, that we quickly scaled to eight dedicated iOS and Android engineers. Working with client, we helped deliver high-quality mobile development and code.</p>
                </div>
            </div> -->
        </div><!-- .row -->
    </div>
</div>
<!-- section. -->