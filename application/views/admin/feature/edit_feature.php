<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= $title ?></h1>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?= form_open('admin/feature/processEdit/' . $feature->id_feature) ?>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label"><?= mblang('Feature Title') ?></label>
                    <input type="text" name="feature_title" class="form-control" value="<?= $feature->feature_title ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label"><?= mblang('Feature Description') ?></label>
                    <textarea name="feature_description" class="form-control m-b-md"><?= $feature->feature_description ?></textarea>
                </div>
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