<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= mblang('Services') ?></h1>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-md-8">
            <?php $this->load->view('admin/utilities/no_action'); ?>
        </div>
        <div class="col-md-4">
            <div class="card widget">
                <div class="card-header">
                    <h5 class="card-title"><?= mblang('Action') ?></h5>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('administration/add-service') ?>" class="btn btn-primary w-100 mt-3"><?= mblang('Add New Service') ?></a>
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
                                <th><?= mblang('Category name') ?></th>
                                <th><?= mblang('Service Name') ?></th>
                                <th><?= mblang('Active') ?></th>
                                <th><?= mblang('Created') ?></th>
                                <th><?= mblang('Action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($service as $s) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $s->category_name ?></td>
                                    <td><?= $s->service_name ?></td>
                                    <td class="text-center">
                                        <?php if ($s->is_active == 1) { ?>
                                            <a href="" class="btn btn-success"><?= mblang('Active') ?></a>
                                        <?php } else { ?>
                                            <a href="" class="btn btn-danger"><?= mblang('Deactive') ?></a>
                                        <?php } ?>
                                    </td>
                                    <td><?= $s->created_date ?> <?= $s->created_time ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('administration/detail-service/' . $s->service_seo)  ?>" class="btn btn-primary btn-sm"><span class="material-icons-outlined">visibility</span></a>
                                        <a href="<?= base_url('administration/edit-service/' . $s->id_service)  ?>" class="btn btn-success btn-sm"><span class="material-icons-outlined">edit</span></a>
                                        <button type="button" class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#delete<?= $s->id_service ?>">
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

<?php foreach ($service as $p) { ?>
    <div class="modal fade" id="delete<?= $p->id_service ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= mblang('Delete') ?> <?= $p->service_name ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= mblang('Are you sure') ?> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= mblang('Cancel') ?></button>
                    <a href="<?= base_url('admin/service/delete/' . $p->id_service) ?>" class="btn btn-primary"><?= mblang('Yes') ?></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>