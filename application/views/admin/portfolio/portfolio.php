<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= mblang('Portfolio') ?></h1>
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
                    <a href="<?= base_url('administration/add-portfolio') ?>" class="btn btn-primary w-100 mt-3"><?= mblang('Add New Portfolio') ?></a>
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
                                <th><?= mblang('Portfolio Name') ?></th>
                                <th><?= mblang('Category Name') ?></th>
                                <th><?= mblang('Created') ?></th>
                                <th><?= mblang('Portfolio Photo') ?></th>
                                <th><?= mblang('Action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($port as $p) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p->portfolio_name ?></td>
                                    <td><?= $p->category_name ?></td>
                                    <td><?= $p->created_date ?> <?= $p->created_time ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/images/portfolio/' . $p->portfolio_photo) ?>" width="100" alt="">
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('administration/detail-portfolio/' . $p->portfolio_seo)  ?>" class="btn btn-primary btn-sm"><span class="material-icons-outlined">visibility</span></a>
                                        <a href="<?= base_url('administration/edit-portfolio/' . $p->id_portfolio)  ?>" class="btn btn-success btn-sm"><span class="material-icons-outlined">edit</span></a>
                                        <button type="button" class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#delete<?= $p->id_portfolio ?>">
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
<?php foreach ($port as $p) { ?>
    <div class="modal fade" id="delete<?= $p->id_portfolio ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= mblang('Delete Portfolio') ?> <?= $p->portfolio_name ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= mblang('Are you sure') ?> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= mblang('Cancel') ?></button>
                    <a href="<?= base_url('admin/portfolio/delete/' . $p->id_portfolio) ?>" class="btn btn-primary"><?= mblang('Yes') ?></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>