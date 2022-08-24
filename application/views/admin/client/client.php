<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= mblang('Client') ?></h1>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-8">
            <?php if ($action == 'add') { ?>
                <div class="card widget widget-list">
                    <div class="card-header">
                        <div class="card-title"><?= mblang('Add New Client') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('administration/add-client') ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Client Name') ?></label>
                                <input type="text" name="client_name" class="form-control m-b-md" value="<?= set_value('client_name') ?>" placeholder="<?= mblang('Client Name') ?>">
                                <small class="text-danger"><?= form_error('client_name') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Client Email') ?></label>
                                <input type="text" name="client_email" class="form-control m-b-md" value="<?= set_value('client_email') ?>" placeholder="<?= mblang('Client Company') ?>">
                                <small class="text-danger"><?= form_error('client_email') ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Company') ?></label>
                                <select name="company_id" class="form-control">
                                    <option value=""><?= mblang('Choose') ?></option>
                                    <?php foreach ($company as $c) { ?>
                                        <option value="<?= $c->id ?>"><?= $c->company_name ?></option>
                                    <?php } ?>
                                </select>
                                <small class="text-danger"><?= form_error('client_location') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Cooperation Date')  ?></label>
                                <input type="date" name="cooperation_date" class="form-control" value="<?= set_value('cooperation_date') ?>" placeholder="<?= mblang('Cooperation Date') ?>" id="">
                                <small class="text-danger"><?= form_error('cooperation_date') ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label"><?= mblang('Client Photo') ?></label>
                                <input id="preview_image" type="file" name="client_photo" class="form-control m-b-md" placeholder="<?= mblang('Client Photo') ?>">
                                <small class="text-danger m-b-md"><?= form_error('client_photo') ?></small>
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
                        <div class="card-title"><?= mblang('Edit Client') ?></div>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('administration/edit-client/' . $c->id_client) ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Client Name') ?></label>
                                <input type="text" name="client_name" class="form-control m-b-md" value="<?= $c->client_name ?>" placeholder="<?= mblang('Client Name') ?>">
                                <small class="text-danger"><?= form_error('client_name') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Client Email') ?></label>
                                <input type="text" name="client_email" class="form-control m-b-md" value="<?= $c->client_email ?>" placeholder="<?= mblang('Client Email') ?>">
                                <small class="text-danger"><?= form_error('client_email') ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Company') ?></label>
                                <select name="company_id" class="form-control" id="">
                                    <option value="<?= $c->id ?>"><?= $c->company_name ?></option>
                                    <?php foreach ($company as $com) { ?>
                                        <option value="<?= $com->id ?>"><?= $com->company_name ?></option>
                                    <?php } ?>
                                </select>
                                <small class="text-danger"><?= form_error('company_id') ?></small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><?= mblang('Cooperation Date')  ?></label>
                                <input type="date" name="cooperation_date" class="form-control" value="<?= $c->cooperation_date ?>" placeholder="<?= mblang('Cooperation Date') ?>" id="">
                                <small class="text-danger"><?= form_error('cooperation_date') ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label"><?= mblang('Client Photo') ?></label>
                                <input id="preview_image" type="file" name="client_photo" class="form-control m-b-md" placeholder="<?= mblang('Client Photo') ?>">
                                <img src="<?= base_url('assets/images/clients/' . $c->client_photo) ?>" id="image_load" width="100" alt="">
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
                    <a href="<?= base_url('administration/add-client') ?>" class="btn btn-primary w-100 mt-3"><?= mblang('Add New Client') ?></a>
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
                                <th><?= mblang('Company') ?></th>
                                <th><?= mblang('Client Name') ?></th>
                                <th><?= mblang('Client Email') ?></th>
                                <th><?= mblang('Client Logo') ?></th>
                                <th><?= mblang('Cooperation Date') ?></th>
                                <th><?= mblang('Action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($client as $c) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $c->company_name ?></td>
                                    <td><?= $c->client_name ?></td>
                                    <td><?= $c->client_email ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/images/clients/' . $c->client_photo) ?>" width="100" alt="">
                                    </td>
                                    <td><?= $c->cooperation_date ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('administration/edit-client/' . $c->id_client)  ?>" class="btn btn-success btn-sm"><span class="material-icons-outlined">edit</span></a>
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

<?php foreach ($client as $c) { ?>
    <div class="modal fade" id="delete<?= $c->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= mblang('Delete Client') ?> <?= $c->client_name ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= mblang('Are you sure') ?> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= mblang('Cancel') ?></button>
                    <a href="<?= base_url('admin/client/deleteClient/' . $c->id) ?>" class="btn btn-primary"><?= mblang('Yes') ?></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>