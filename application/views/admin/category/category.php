<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= mblang('Category') ?></h1>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-8">
            <?php if ($action == 'add') { ?>
                <div class="card widget widget-list">
                    <div class="card-header">
                        <div class="card-title"><?= mblang('Add New Category') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open('administration/add-category') ?>
                        <div class="row">
                            <div class="col-md-8">
                                <label class="form-label"><?= mblang('Category Name') ?></label>
                                <input type="text" name="category_name" class="form-control m-b-md" value="<?= set_value('category_name') ?>" placeholder="<?= mblang('Category Name') ?>">
                                <small class="text-danger"><?= form_open('category_name') ?></small>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary mt-4 float-end"><?= mblang('Save') ?></button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            <?php } else if ($action  == 'edit') { ?>
                <div class="card widget widget-list">
                    <div class="card-header">
                        <div class="card-title"><?= mblang('Edit New Category') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open('administration/edit-category/' . $c->id_category) ?>
                        <div class="row">
                            <div class="col-md-8">
                                <label class="form-label"><?= mblang('Category Name') ?></label>
                                <input type="text" name="category_name" class="form-control m-b-md" value="<?= $c->category_name ?>" placeholder="<?= mblang('Category Name') ?>">
                                <small class="text-danger"><?= form_open('category_name') ?></small>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary mt-4 float-end"><?= mblang('Save') ?></button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            <?php } else { ?>
                <?php $this->load->view('admin/utilities/no_action'); ?>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <div class="card widget">
                <div class="card-header">
                    <h5 class="card-title"><?= mblang('Action') ?></h5>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('administration/add-category') ?>" class="btn btn-primary w-100 mt-3"><?= mblang('Add New Category') ?></a>
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
                                <th><?= mblang('Category Name') ?></th>
                                <th><?= mblang('Action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($category as $c) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $c->category_name ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('administration/edit-category/' . $c->id_category) ?>" class="btn btn-success btn-sm"><span class="material-icons-outlined">edit</span></a>
                                        <button type="button" class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#delete<?= $c->id_category ?>">
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

<!-- Modal Delete -->
<?php foreach ($category as $c) { ?>
    <div class="modal fade" id="delete<?= $c->id_category ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= mblang('Delete Category') ?> <?= $c->category_name ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= mblang('Are you sure') ?> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= mblang('Cancel') ?></button>
                    <a href="<?= base_url('admin/category/delete/' . $c->id_category) ?>" class="btn btn-primary"><?= mblang('Yes') ?></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>