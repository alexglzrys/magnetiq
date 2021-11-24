<?= $this->extend('layouts/main') ?>

<?= $this->section('page_title') ?>Registrar Categoría<?= $this->endSection() ?>

<?= $this->section('header') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Registrar Categoría</h1>
                <p>Esta sección le permite registrar una categoría en el sistema</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard') ?>">Panel de Control</a></li>
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.categories.index') ?>">Categorías</a></li>
                    <li class="breadcrumb-item active">Registrar categoría</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Registrar Categoría</h3>
                    </div>
                    <form role="form" id="formCreateCategory">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de la categoría">
                            </div>
                            <div class="form-group">
                                <label for="color">Color de Texto</label>
                                <input type="text" name="color" id="color" class="form-control" placeholder="Color del texto de etiqueta">
                            </div>
                            <div class="form-group">
                                <label for="background">Color de Fondo</label>
                                <input type="text" name="background" id="background" class="form-control" placeholder="Color de fondo de etiqueta">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>


<?= $this->section('styles') ?>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= base_url('public/libs/adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- SweetAlert2 -->
<script src="<?= base_url('public/libs/adminLTE/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('public/js/admin/categories/create.js') ?>"></script>
<?= $this->endSection() ?>

