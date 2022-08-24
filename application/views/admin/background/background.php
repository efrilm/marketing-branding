<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= mblang('Backgrounds') ?></h1>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <?php
    if (isset($error_upload)) {
        echo '<div class="alert alert-danger" role="alert">' . $error_upload . '</div>';
    }
    ?>
    <?php if ($action == 'editBgHome') { ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= mblang('Edit') ?> <?= mblang('Background Home') ?></h5>
            </div>
            <div class="card-body">
                <?= form_open_multipart('administration/edit-bg-home') ?>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><?= mblang('Background Home') ?></label>
                        <input id="preview_image" type="file" name="bg_home" class="form-control m-b-md" placeholder="<?= mblang('Backgroung Home') ?>">
                        <img src="<?= base_url('assets/images/backgrounds/' . $bg->bg_home) ?>" id="image_load" width="100" alt="">
                    </div>
                </div>
                <div class="float-end">
                    <button type="submit" class="btn btn-primary"><?= mblang('Update') ?></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    <?php } else if ($action == 'editBgPd') { ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= mblang('Edit') ?> <?= mblang('Background Digital Product') ?></h5>
            </div>
            <div class="card-body">
                <?= form_open_multipart('administration/edit-bg-pd') ?>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><?= mblang('Background Digital Product') ?></label>
                        <input id="preview_image" type="file" name="bg_pd" class="form-control m-b-md" placeholder="<?= mblang('Backgroung Home') ?>">
                        <img src="<?= base_url('assets/images/backgrounds/' . $bg->bg_product_digital) ?>" id="image_load" width="100" alt="">
                    </div>
                </div>
                <div class="float-end">
                    <button type="submit" class="btn btn-primary"><?= mblang('Update') ?></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    <?php } else if ($action == 'editBgService') { ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= mblang('Edit') ?> <?= mblang('Background Service') ?></h5>
            </div>
            <div class="card-body">
                <?= form_open_multipart('administration/edit-bg-service') ?>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><?= mblang('Background Service') ?></label>
                        <input id="preview_image" type="file" name="bg_service" class="form-control m-b-md" placeholder="<?= mblang('Backgroung Service') ?>">
                        <img src="<?= base_url('assets/images/backgrounds/' . $bg->bg_service) ?>" id="image_load" width="100" alt="">
                    </div>
                </div>
                <div class="float-end">
                    <button type="submit" class="btn btn-primary"><?= mblang('Update') ?></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    <?php } else if ($action == 'editBgServiceFeature') { ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= mblang('Edit') ?> <?= mblang('Background Service Feature') ?></h5>
            </div>
            <div class="card-body">
                <?= form_open_multipart('administration/edit-bg-service-feature') ?>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><?= mblang('Background Service Feature') ?></label>
                        <input id="preview_image" type="file" name="bg_service_feature" class="form-control m-b-md" placeholder="<?= mblang('Backgroung Service') ?>">
                        <img src="<?= base_url('assets/images/backgrounds/' . $bg->bg_service_feature) ?>" id="image_load" width="100" alt="">
                    </div>
                </div>
                <div class="float-end">
                    <button type="submit" class="btn btn-primary"><?= mblang('Update') ?></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    <?php } else if ($action == 'editBgPortfolio') { ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= mblang('Edit') ?> <?= mblang('Background Portfolio') ?></h5>
            </div>
            <div class="card-body">
                <?= form_open_multipart('administration/edit-bg-portfolio') ?>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><?= mblang('Background Portfolio') ?></label>
                        <input id="preview_image" type="file" name="bg_portfolio" class="form-control m-b-md" placeholder="<?= mblang('Backgroung Service') ?>">
                        <img src="<?= base_url('assets/images/backgrounds/' . $bg->bg_portfolio) ?>" id="image_load" width="100" alt="">
                    </div>
                </div>
                <div class="float-end">
                    <button type="submit" class="btn btn-primary"><?= mblang('Update') ?></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    <?php } else if ($action == 'editBgAbout') { ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= mblang('Edit') ?> <?= mblang('Background About') ?></h5>
            </div>
            <div class="card-body">
                <?= form_open_multipart('administration/edit-bg-about') ?>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><?= mblang('Background About') ?></label>
                        <input id="preview_image" type="file" name="bg_about" class="form-control m-b-md" placeholder="<?= mblang('Backgroung Service') ?>">
                        <img src="<?= base_url('assets/images/backgrounds/' . $bg->bg_about) ?>" id="image_load" width="100" alt="">
                    </div>
                </div>
                <div class="float-end">
                    <button type="submit" class="btn btn-primary"><?= mblang('Update') ?></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    <?php } else if ($action == 'editBgContact') { ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= mblang('Edit') ?> <?= mblang('Background Contact') ?></h5>
            </div>
            <div class="card-body">
                <?= form_open_multipart('administration/edit-bg-contact') ?>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><?= mblang('Background Contact') ?></label>
                        <input id="preview_image" type="file" name="bg_contact" class="form-control m-b-md" placeholder="<?= mblang('Backgroung Service') ?>">
                        <img src="<?= base_url('assets/images/backgrounds/' . $bg->bg_contact) ?>" id="image_load" width="100" alt="">
                    </div>
                </div>
                <div class="float-end">
                    <button type="submit" class="btn btn-primary"><?= mblang('Update') ?></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url() ?>/assets/images/backgrounds/<?= $bg->bg_home ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= mblang('Background Home') ?></h5>
                    <a href="<?= base_url('administration/edit-bg-home') ?>" class="btn btn-success btn-sm m-t-sm"><span class="material-icons-outlined">edit</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url() ?>/assets/images/backgrounds/<?= $bg->bg_product_digital ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= mblang('Background Digital Product') ?></h5>
                    <a href="<?= base_url('administration/edit-bg-pd') ?>" class="btn btn-success btn-sm m-t-sm"><span class="material-icons-outlined">edit</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url() ?>/assets/images/backgrounds/<?= $bg->bg_service ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= mblang('Background Service') ?></h5>
                    <a href="<?= base_url('administration/edit-bg-service') ?>" class="btn btn-success btn-sm m-t-sm"><span class="material-icons-outlined">edit</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url() ?>/assets/images/backgrounds/<?= $bg->bg_service_feature ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= mblang('Background Service Feature') ?></h5>
                    <a href="<?= base_url('administration/edit-bg-service-feature') ?>" class="btn btn-success btn-sm m-t-sm"><span class="material-icons-outlined">edit</span></a>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url() ?>/assets/images/backgrounds/<?= $bg->bg_portfolio ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= mblang('Background Portfolio') ?></h5>
                    <a href="<?= base_url('administration/edit-bg-portfolio') ?>" class="btn btn-success btn-sm m-t-sm"><span class="material-icons-outlined">edit</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url() ?>/assets/images/backgrounds/<?= $bg->bg_about ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= mblang('Background About') ?></h5>
                    <a href="<?= base_url('administration/edit-bg-about') ?>" class="btn btn-success btn-sm m-t-sm"><span class="material-icons-outlined">edit</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url() ?>/assets/images/backgrounds/<?= $bg->bg_contact ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= mblang('Background Contact') ?></h5>
                    <a href="<?= base_url('administration/edit-bg-contact') ?>" class="btn btn-success btn-sm m-t-sm"><span class="material-icons-outlined">edit</span></a>
                </div>
            </div>
        </div>
    </div>
</div>