<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= $service->service_name ?></h1>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url() ?>/assets/images/services/<?= $service->service_photo ?>" class="card-img-top" alt="...">
                <div class="card-header">
                    <h5 class="card-title"><?= $service->service_name ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="float-start">
                            <b><?= mblang('Category') ?></b>
                        </div>
                        <div class="float-end">
                            <?= $service->category_name ?>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="float-start">
                            <b><?= mblang('Created') ?></b>
                        </div>
                        <div class="float-end">
                            <?= $service->created_date ?> <?= $service->update_time ?>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="float-start">
                            <b><?= mblang('Updated') ?></b>
                        </div>
                        <div class="float-end">
                            <?= $service->update_date ?> <?= $service->update_time ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        <h5 class="card-title"><?= mblang('Feature') ?></h5>
                    </div>
                    <div class="float-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generate">
                            <?= mblang('Add Feature') ?>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (empty($feature)) { ?>
                        <center>
                            <h5><?= mblang('No Features') ?></h5>
                        </center>
                    <?php } else { ?>
                        <div class="accordion accordion-separated" id="accordionSeparatedExample">
                            <div class="row">
                                <?php foreach ($feature as $key => $value) { ?>
                                    <div class="col-md-6 mb-3">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingSeparatedOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeparated<?= $value->id_feature ?>" aria-expanded="true" aria-controls="collapsSeparatede<?= $value->id_feature ?>">
                                                    <?= $value->feature_title ?>
                                                </button>
                                            </h2>
                                            <div id="collapseSeparated<?= $value->id_feature ?>" class="accordion-collapse collapse" aria-labelledby="headingSeparated<?= $value->id_feature ?>" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <?= $value->feature_description ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="float-end">
                                                                <a href="<?= base_url('administration/edit-feature/' . $value->id_feature)  ?>" class="btn btn-success btn-sm"><span class="material-icons-outlined">edit</span></a>
                                                                <button type="button" class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#deleteFeature<?= $value->id_feature ?>">
                                                                    <span class="material-icons-outlined">delete</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="generate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?= form_open('administration/add-feature/' . $service->id_service) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= mblang('Generate') ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label"><?= mblang('Number of Features to be Added') ?></label>
                <input type="text" name="count" class="form-control" maxlength="2" pattern="[0-9]+" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= mblang('Cancel') ?></button>
                <button type="submit" class="btn btn-primary"><?= mblang('Save') ?></button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?php foreach ($feature as $key => $value) { ?>
    <div class="modal fade" id="deleteFeature<?= $value->id_feature ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= mblang('Delete') ?> <?= $value->feature_title ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= mblang('Are you sure') ?> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= mblang('Cancel') ?></button>
                    <a href="<?= base_url('admin/feature/deleteFeature/' . $value->id_feature . '/' . $service->service_seo) ?>" class="btn btn-primary"><?= mblang('Yes') ?></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>