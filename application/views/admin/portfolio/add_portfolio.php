<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= mblang('Add New Portfolio') ?></h1>
            </div>
        </div>
    </div>
    <?php
    if (isset($error_upload)) {
        echo '<div class="alert alert-danger" role="alert">' . $error_upload . '</div>';
    }
    ?>
    <div class="row">
        <div class="card widget widget-list">
            <div class="card-body">
                <?= form_open_multipart('administration/add-portfolio') ?>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label"><?= mblang('Portfolio Name') ?></label>
                        <input type="text" name="portfolio_name" class="form-control m-b-md" value="<?= set_value('portfolio_name') ?>" placeholder="<?= mblang('Portfolio Name') ?>">
                        <small class="text-danger"><?= form_error('portfolio_name') ?></small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><?= mblang('Category Name') ?></label>
                        <select class="form-select m-b-md" name="category_id">
                            <option value=""><?= mblang('Choose') ?></option>
                            <?php foreach ($category as $c) { ?>
                                <option value="<?= $c->id_category ?>"><?= $c->category_name ?></option>
                            <?php } ?>
                        </select>
                        <small class="text-danger"><?= form_error('category_id') ?></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label"><?= mblang('Client Name') ?> / <?= mblang('Client Company') ?></label>
                        <input type="text" name="client_name" class="form-control m-b-md" value="<?= set_value('client_name') ?>" placeholder="<?= mblang('Client Name') ?> / <?= mblang('Client Company') ?>">
                        <small class="text-danger"><?= form_error('client_name') ?></small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><?= mblang('Client Location') ?> </label>
                        <input type="text" name="client_location" class="form-control m-b-md" value="<?= set_value('client_location') ?>" placeholder="<?= mblang('Client Location') ?> ">
                        <small class="text-danger"><?= form_error('client_location') ?></small>
                    </div>
                </div>
                <div class="row m-b-md">
                    <div class="col-md-6">
                        <label class="form-label"><?= mblang('Year') ?></label>
                        <select class="form-control m-b-md" name="year">
                            <option value=""><?= mblang('Choose') ?></option>
                            <option value="2021"><?= mblang('2021') ?></option>
                            <option value="2022"><?= mblang('2022') ?></option>
                            <option value="2023"><?= mblang('2023') ?></option>
                            <option value="2024"><?= mblang('2024') ?></option>
                        </select>
                        <small class="text-danger"><?= form_error('year') ?></small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><?= mblang('Time Frame') ?></label>
                        <input type="text" name="time_frame" class="form-control m-b-md" value="<?= set_value('time_frame') ?>" placeholder="<?= mblang('Time Frame') ?>">
                        <small class="text-danger"><?= form_error('time_frame') ?></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col m-b-md">
                        <label class="form-label"><?= mblang('Portfolio Photo') ?></label>
                        <input id="preview_image" type="file" name="portfolio_photo" class="form-control m-b-md" placeholder="<?= mblang('Portfolio Photo') ?>">
                        <small class="text-danger m-b-md"><?= form_error('portfolio_photo') ?></small>
                        <img src="<?= base_url('assets/images/other/no_image.png') ?>" id="image_load" width="100" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label"><?= mblang('Description') ?> </label>
                        <small class="text-danger m-b-md"><?= form_error('description') ?></small>
                        <textarea id="summernote" type="text" name="description" value="<?= set_value('description') ?> "></textarea>
                    </div>
                </div>
                <div class=" row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mt-4 float-end"><?= mblang('Save') ?></button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>