                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="page-description page-description-tabbed">
                                    <h1><?= mblang('Website Configuration') ?></h1>

                                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="account-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="hoaccountme" aria-selected="true"><?= mblang('General') ?></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#logo" type="button" role="tab" aria-controls="security" aria-selected="false"><?= mblang('Logo') ?></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="integrations-tab" data-bs-toggle="tab" data-bs-target="#socialMedia" type="button" role="tab" aria-controls="integrations" aria-selected="false"><?= mblang('Social Media') ?></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="account-tab">
                                        <div class="card">
                                            <?= form_open('administration/web-configuration') ?>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label"><?= mblang('Title') ?></label>
                                                        <input type="text" class="form-control m-b-md" name="title" value="<?= $config->title ?>">
                                                        <small class="text-danger"><?= form_error('title') ?></small>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label"><?= mblang('Email') ?></label>
                                                        <input type="text" class="form-control m-b-md" name="email" value="<?= $config->email ?>">
                                                        <small class="text-danger"><?= form_error('email') ?></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label"><?= mblang('Company Name') ?></label>
                                                        <input type="text" class="form-control m-b-md" name="company_name" value="<?= $config->company_name ?>">
                                                        <small class="text-danger"><?= form_error('company_name') ?></small>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label"><?= mblang('Company Field') ?></label>
                                                        <input type="text" class="form-control m-b-md" name="company_field" value="<?= $config->company_field ?>">
                                                        <small class="text-danger"><?= form_error('company_field') ?></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label"><?= mblang('Keywords') ?></label>
                                                        <textarea class="form-control m-b-md" id="settingsAbout" name="keywords" maxlength="500" rows="4"><?= $config->keywords ?></textarea>
                                                        <small class="text-danger"><?= form_error('keywords') ?></small>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label"><?= mblang('Description') ?></label>
                                                        <textarea class="form-control m-b-md" id="settingsAbout" name="description" maxlength="500" rows="4"><?= $config->description ?></textarea>
                                                        <small class="text-danger"><?= form_error('description') ?></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label"><?= mblang('No. Phone') ?></label>
                                                        <input type="text" class="form-control m-b-md" name="no_phone" value="<?= $config->no_phone ?>">
                                                        <small class="text-danger"><?= form_error('no_phone') ?></small>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label"><?= mblang('No. Whatsapp') ?></label>
                                                        <input type="text" class="form-control m-b-md" name="no_whatsapp" value="<?= $config->no_whatsapp ?>">
                                                        <small class="text-danger"><?= form_error('no_whatsapp') ?></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label"><?= mblang('Address') ?></label>
                                                        <textarea class="form-control m-b-md" name="address" id="settingsAbout" maxlength="500" rows="4"><?= $config->address ?></textarea>
                                                        <small class="text-danger"><?= form_error('address') ?></small>
                                                    </div>
                                                </div>
                                                <div class="row m-t-lg">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-primary m-t-sm"><?= mblang('Update') ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?= form_close() ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="security-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="" class="form-label"><?= mblang('Logo') ?></label>
                                                        <input type="file" id="preview_image" name="logo" class="form-control m-b-md" required>
                                                        <img id="image_load" src="<?= base_url() ?>/assets/images/logo/<?= $config->logo ?>" width="150" alt="">
                                                    </div>
                                                </div>
                                                <div class="float-end">
                                                    <button type="submit" class="btn btn-primary"><?= mblang('Update') ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="socialMedia" role="tabpanel" aria-labelledby="integrations-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <?= form_open('admin/config/socialMedia') ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="" class="form-label">Facebook</label>
                                                        <input type="text" class="form-control m-b-md" name="facebook" value="<?= $config->facebook ?>">
                                                        <small class="text-danger"><?= form_error('facebook') ?></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="" class="form-label">Instagram</label>
                                                        <input type="text" class="form-control m-b-md" name="instagram" value="<?= $config->instagram ?>">
                                                        <small class="text-danger"><?= form_error('instagram') ?></small>
                                                    </div>
                                                </div>
                                                <div class="float-end">
                                                    <button class="btn btn-primary" type="submit"><?= mblang('Update') ?></button>
                                                </div>
                                                <?= form_close() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>