<?= $this->extend('layouts/main') ?>

<?= $this->section('page_title') ?>Categorías<?= $this->endSection() ?>

<?= $this->section('header') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Categorías</h1>
                <p>Esta sección le permite gestionar las categorías registradas en el sistema</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v3</li>
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
                    <div class="card-header d-flex align-items-center">
                        <h3 class="card-title mr-4">Categorías publicadas</h3>
                        <a href="<?= route_to('admin.categories.create') ?>" class="btn btn-success">Registrar categoría</a>
                    </div>
                    <div class="card-body">
                        <table id="categories-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Color de etiqueta</th>
                                <th>Fecha de registro</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?= $category->name ?></td>
                                    <td><span class="p-1" style="background: <?= $category->background ?>; color: <?= $category->color ?>"><?= $category->name ?></span></td>
                                    <td><?= $category->created_at ?></td>
                                    <td>
                                        <a href="<?= route_to('admin.categories.edit', $category->id) ?>" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="" class="btn btn-sm btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>


<?= $this->section('styles') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/libs/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- DataTables -->
<script src="<?= base_url('public/libs/adminLTE/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('public/libs/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<script>
    $(function () {
        $('#categories-table').DataTable();
    });
</script>

<?= $this->endSection() ?>
