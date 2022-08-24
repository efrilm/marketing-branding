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
                    <a href="<?= base_url('administration/add-user') ?>" class="btn btn-primary w-100 mt-3"><?= mblang('Add New User') ?></a>
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
                                    <th><?= mblang('Full Name') ?></th>
                                    <th><?= mblang('Email') ?></th>
                                    <th><?= mblang('No. Phone') ?></th>
                                    <th><?= mblang('Photos') ?></th>
                                    <th><?= mblang('Created') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $user->first_name ?> <?= $user->last_name ?></td>
                                        <td><?= $user->email ?></td>
                                        <td><?= $user->no_phone ?></td>
                                        <td>
                                            <img src="<?= base_url('assets/images/profile/' . $user->image) ?>" width="100" alt="">
                                        </td>
                                        <td><?= $user->created_date ?> <?= $user->created_time ?></td>
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
    <!-- <?php foreach ($port as $p) { ?>
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
    <?php } ?> -->