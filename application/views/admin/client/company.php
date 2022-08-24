<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= mblang('Company') ?></h1>
            </div>
        </div>
    </div>
    <?php
    if (isset($error_upload)) {
        echo '<div class="alert alert-danger" role="alert">' . $error_upload . '</div>';
    }
    ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-8">
            <?php if ($action == 'add') { ?>
                <div class="card widget widget-list">
                    <div class="card-header">
                        <div class="card-title"><?= mblang('Add New Company') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('administration/add-company') ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Company Name') ?></label>
                                <input type="text" name="company_name" class="form-control m-b-md" value="<?= set_value('company_name') ?>" placeholder="<?= mblang('Company Name') ?>">
                                <small class="text-danger"><?= form_error('company_name') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Company Location') ?></label>
                                <input type="text" name="company_location" class="form-control m-b-md" value="<?= set_value('company_location') ?>" placeholder="<?= mblang('Company Location') ?>">
                                <small class="text-danger"><?= form_error('company_location') ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Company Field') ?></label>
                                <input type="text" name="company_field" class="form-control m-b-md" value="<?= set_value('company_field') ?>" placeholder="<?= mblang('Company Field') ?>">
                                <small class="text-danger"><?= form_error('company_field') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Company Logo') ?></label>
                                <input id="preview_image" type="file" name="company_logo" class="form-control m-b-md" placeholder="<?= mblang('Company Logo') ?>" required>
                                <img src="<?= base_url('assets/images/other/no_image.png') ?>" id="image_load" width="100" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-4 float-end"><?= mblang('Save') ?></button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            <?php } else if ($action == 'edit') { ?>
                <div class="card widget widget-list">
                    <div class="card-header">
                        <div class="card-title"><?= mblang('Edit Company') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('administration/edit-company/' . $c->id) ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Company Name') ?></label>
                                <input type="text" name="company_name" class="form-control m-b-md" value="<?= $c->company_name ?>" placeholder="<?= mblang('Company Name') ?>">
                                <small class="text-danger"><?= form_error('company_name') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Company Location') ?></label>
                                <input type="text" name="company_location" class="form-control m-b-md" value="<?= $c->company_location ?>" placeholder="<?= mblang('Company Location') ?>">
                                <small class="text-danger"><?= form_error('company_location') ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Company Field') ?></label>
                                <input type="text" name="company_field" class="form-control m-b-md" value="<?= $c->company_field ?>" placeholder="<?= mblang('Company Field') ?>">
                                <small class="text-danger"><?= form_error('company_field') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Company Logo') ?></label>
                                <input id="preview_image" type="file" name="company_logo" class="form-control m-b-md" placeholder="<?= mblang('Company Logo') ?>">
                                <img src="<?= base_url('assets/images/company/' . $c->company_logo) ?>" id="image_load" width="100" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-4 float-end"><?= mblang('Save') ?></button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            <?php } else {  ?>
                <?php $this->load->view('admin/utilities/no_action'); ?>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <div class="card widget">
                <div class="card-header">
                    <h5 class="card-title"><?= mblang('Action') ?></h5>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('administration/add-company') ?>" class="btn btn-primary w-100 mt-3"><?= mblang('Add New Company') ?></a>
                    <a href="" class="btn btn-primary w-100 mt-3"><?= mblang('Report') ?></a>
                    <a href="" class="btn btn-danger w-100 mt-3"><?= mblang('Delete All') ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table id="datatable1" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th><?= mblang('Company Name') ?></th>
                                <th><?= mblang('Company Location') ?></th>
                                <th><?= mblang('Company Field') ?></th>
                                <th><?= mblang('Company Logo') ?></th>
                                <th><?= mblang('Action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($company as $c) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $c->company_name ?></td>
                                    <td><?= $c->company_location ?></td>
                                    <td><?= $c->company_field ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/images/company/' . $c->company_logo) ?>" width="100" alt="">
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('administration/edit-company/' . $c->id)  ?>" class="btn btn-success btn-sm"><span class="material-icons-outlined">edit</span></a>
                                        <button type="button" class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#delete<?= $c->id ?>">
                                            <span class="material-icons-outlined">delete</span>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($company as $p) { ?>
    <div class="modal fade" id="delete<?= $p->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= mblang('Delete Company') ?> <?= $p->company_name ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= mblang('Are you sure') ?> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= mblang('Cancel') ?></button>
                    <a href="<?= base_url('admin/client/deleteCompany/' . $p->id) ?>" class="btn btn-primary"><?= mblang('Yes') ?></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>