<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('page_title') ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('public/libs/adminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public/libs/adminLTE/css/adminlte.min.css') ?>">
    <?= $this->renderSection('styles') ?>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?= $this->include('partials/navbar') ?>

    <!-- Main Sidebar Container -->
    <?= $this->include('partials/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?= $this->renderSection('header') ?>

        <!-- Main content -->
        <?= $this->renderSection('content') ?>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <?= $this->include('partials/controls') ?>

    <!-- Main Footer -->
    <?= $this->include('partials/footer') ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('public/libs/adminLTE/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url('public/libs/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE -->
<script src="<?= base_url('public/libs/adminLTE/js/adminlte.js') ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- AdminLTE for demo purposes -->

<script>
    const BASE_URL = '<?= base_url() ?>'
</script>
<?= $this->renderSection('scripts') ?>
</body>
</html>

