<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= mblang('Add New Service') ?></h1>
            </div>
        </div>
    </div>
    <?php
    if (isset($error_upload)) {
        echo '<div class="alert alert-danger" role="alert">' . $error_upload . '</div>';
    }
    ?>
    <div class="row">
        <div class="card">
            <div class="col">
                <?= form_open_multipart('administration/add-service'); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="form-label"><?= mblang('Service Name') ?></label>
                            <input type="text" name="service_name" class="form-control m-b-md" value="<?= set_value('service_name') ?>" placeholder="<?= mblang('Service Name') ?>">
                            <small class="text-danger"><?= form_error('service_name') ?></small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><?= mblang('Category Name') ?></label>
                            <select class="form-control m-b-md" name="category_id">
                                <option value=""><?= mblang('Choose') ?></option>
                                <?php foreach ($category as $c) { ?>
                                    <option value="<?= $c->id_category ?>"><?= $c->category_name ?></option>
                                <?php } ?>
                            </select>
                            <small class="text-danger"><?= form_error('category_id') ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><?= mblang('Service Description') ?></label>
                            <textarea name="service_description" class="form-control m-b-md"><?= set_value('service_description') ?></textarea>
                            <small class="text-danger"><?= form_error('service_description') ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><?= mblang('Service Photo') ?></label>
                            <input type="file" name="service_photo" class="form-control m-b-md" id="preview_image">
                            <img id="image_load" width="150" src="<?= base_url() ?>/assets/images/other/no_image.png" alt="">
                            <small class="text-danger"><?= form_error('service_photo') ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary"><?= mblang('Save') ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>