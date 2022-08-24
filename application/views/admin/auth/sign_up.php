<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?= $title ?></title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/plugins/pace/pace.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="<?= base_url() ?>/assets/admin/css/main.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/admin/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/assets/admin/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/admin/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="<?= base_url() ?>">MarketingBranding</a>
            </div>
            <p class="auth-description"><?= mblang("Please enter your credentials to create an account") ?>.<br><?= mblang("Already have an account") ?>? <a href="<?= base_url("administration/sign-in") ?>"><?= mblang("Sign In") ?></a></p>

            <?= form_open("administration/sign-up") ?>
            <div class="auth-credentials m-b-xxl">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label"><?= mblang("First Name") ?></label>
                        <input type="text" class="form-control m-b-md" name="first_name" value="<?= set_value("first_name") ?>" placeholder="<?= mblang("Enter First Name") ?>">
                        <small class="text-danger"><?= form_error("first_name") ?></small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><?= mblang("Last Name") ?></label>
                        <input type="text" class="form-control m-b-md" name="last_name" value="<?= set_value("last_name") ?>" placeholder="<?= mblang("Enter Last Name") ?>">
                        <small class="text-danger"><?= form_error("last_name") ?></small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label"><?= mblang("Email") ?></label>
                        <input type="text" class="form-control m-b-md" name="email" value="<?= set_value("email") ?>" placeholder="example@mb.com">
                        <small class="text-danger"><?= form_error("email") ?></small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><?= mblang("No. Phone") ?></label>
                        <input type="number" class="form-control m-b-md" name="no_phone" value="<?= set_value("no_phone") ?>" placeholder="628 1267 3273">
                        <small class="text-danger"><?= form_error("no_phone") ?></small>
                    </div>
                </div>

                <label for="signUpPassword" class="form-label"><?= mblang("Password") ?></label>
                <input type="password" class="form-control" name="password" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                <div id="emailHelp" class="form-text m-b-md"><?= mblang("Password must be minimum 8 characters length") ?>*</div>
                <small class="text-danger"><?= form_error("password") ?></small>

                <label class="form-label"><?= mblang("Confirm Password") ?></label>
                <input type="password" class="form-control m-b-md" name="confirm_password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                <small class="text-danger"><?= form_error("confirm_password") ?></small>
            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary"><?= mblang("Sign Up") ?></button>
            </div>
            <?= form_close() ?>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="<?= base_url() ?>/assets/admin/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/plugins/pace/pace.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/js/main.min.js"></script>
    <script src="<?= base_url() ?>/assets/admin/js/custom.js"></script>
</body>

</html>