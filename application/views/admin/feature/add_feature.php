<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= $title ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?= form_open('admin/feature/processAdd') ?>
                    <?php for ($i = 1; $i <= $count; $i++) { ?>
                        <div class="row">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="hidden" name="count" value="<?= $count ?>">
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Feature Title') ?></label>
                                <input type="text" name="feature_title<?= $i ?>" class="form-control m-b-md" value="<?= set_value('feature_title') ?>" placeholder="<?= mblang('Feature Title') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Feature Description') ?></label>
                                <textarea name="feature_description<?= $i ?>" class="form-control m-b-md"><?= set_value('feature_description') ?></textarea>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col">
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary"><?= mblang('Save') ?></button>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>