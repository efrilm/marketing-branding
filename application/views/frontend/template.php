<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo/<?= $config->logo ?>">
    <!-- Site Title  -->
    <title><?= $title; ?></title>
    <!-- Bundle and Base CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendor.bundle.css?ver=141">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css?ver=141">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/theme.css?ver=141">


</head>

<body class="body-wider">

    <?php $this->load->view('frontend/navbar'); ?>

    <?= $contents ?>

    <?php $this->load->view('frontend/footer'); ?>

    <!-- JavaScript -->
    <script src="<?= base_url() ?>/assets/js/jquery.bundle.js?ver=141"></script>
    <script src="<?= base_url() ?>assets/js/scripts.js?ver=141"></script>
</body>

</html>