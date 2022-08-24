<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1><?= $port->portfolio_name ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><?= mblang('Project Details') ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="float-start">
                            <b><?= mblang('Client') ?></b>
                        </div>
                        <div class="float-end">
                            <?= $port->client_name ?>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="float-start">
                            <b><?= mblang('Year') ?></b>
                        </div>
                        <div class="float-end">
                            <?= $port->year ?>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="float-start">
                            <b><?= mblang('Time Frame') ?></b>
                        </div>
                        <div class="float-end">
                            <?= $port->time_frame ?>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="float-start">
                            <b><?= mblang('Category') ?></b>
                        </div>
                        <div class="float-end">
                            <?= $port->category_name ?>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="float-start">
                            <b><?= mblang('Location') ?></b>
                        </div>
                        <div class="float-end">
                            <?= $port->client_location ?>
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
                            <?= $port->created_date ?> <?= $port->created_time ?>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="float-start">
                            <b><?= mblang('Updated') ?></b>
                        </div>
                        <div class="float-end">
                            <?= $port->update_date ?> <?= $port->update_time ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        <?= mblang('Images') ?>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="lightbox-example">
                        <a data-fslightbox="gallery" href="<?= base_url() ?>/assets/images/portfolio/<?= $port->portfolio_photo ?>">
                            <img src="<?= base_url() ?>/assets/images/portfolio/<?= $port->portfolio_photo ?>" width="200">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <?= mblang('Description') ?>
                    </div>
                </div>
                <div class="card-body">
                    <?= $port->description ?>
                </div>
            </div>
        </div>
    </div>
</div>