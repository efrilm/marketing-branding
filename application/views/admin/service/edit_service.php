<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= mblang('Edit Service') ?></h1>
            </div>
        </div>
    </div>
    <?php
    if (isset($error_upload)) {
        echo '<div class="alert alert-danger" role="alert">' . $error_upload . '</div>';
    }
    ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <?= form_open_multipart('administration/edit-service/' . $service->id_service) ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label"><?= mblang('Service Name')  ?></label>
                            <input type="text" name="service_name" class="form-control m-b-md" value="<?= $service->service_name ?>">
                            <small class="text-danger"><?= form_error('service_name') ?></small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><?= mblang('Category Name')  ?></label>
                            <select name="category_id" class="form-control m-b-md">
                                <option value="<?= $service->category_id ?>"><?= $service->category_name ?></option>
                                <?php foreach ($category as $c) { ?>
                                    <option value="<?= $c->id_category ?>"><?= $c->category_name ?></option>
                                <?php }  ?>
                            </select>
                            <small class="text-danger"><?= form_error('category_id') ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label"><?= mblang('Service Description') ?></label>
                            <textarea name="service_description" class="form-control m-b-md"><?= $service->service_description ?></textarea>
                            <small class="text-danger"><?= form_error('service_description') ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="" class="form-label"><?= mblang('Service Photo') ?></label>
                            <input type="file" id="preview_image" name="service_photo" class="form-control m-b-md">
                            <img id="image_load" src="<?= base_url() ?>/assets/images/services/<?= $service->service_photo ?>" width="150" alt="">
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