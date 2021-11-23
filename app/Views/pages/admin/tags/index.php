<?= $this->extend('layouts/main') ?>

<?= $this->section('page_title') ?>Etiquetas<?= $this->endSection() ?>

<?= $this->section('header') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Etiquetas</h1>
                <p>Esta sección le permite gestionar las etiquetas registradas en el sistema</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard') ?>">Panel de Control</a></li>
                    <li class="breadcrumb-item active">Etiquetas</li>
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
                        <h3 class="card-title mr-4">Etiquetas publicadas</h3>
                        <a href="<?= route_to('admin.tags.create') ?>" class="btn btn-success">Registrar etiqueta</a>
                    </div>
                    <div class="card-body">
                        <table id="tags-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Color de etiqueta</th>
                                <th>Fecha de registro</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($tags as $tag): ?>
                                <tr id="tag-<?= $tag->id ?>">
                                    <td><?= $tag->name ?></td>
                                    <td><span class="p-1" style="background: <?= $tag->background ?>; color: <?= $tag->color ?>"><?= $tag->name ?></span></td>
                                    <td><?= $tag->created_at ?></td>
                                    <td>
                                        <a href="<?= route_to('admin.tags.edit', $tag->id) ?>" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="<?= route_to('admin.tags.destroy', $tag->id) ?>" class="btn btn-sm btn-danger btnDeleteTag" data-id="<?= $tag->id ?>">Eliminar</a>
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
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= base_url('public/libs/adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- DataTables -->
<script src="<?= base_url('public/libs/adminLTE/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('public/libs/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('public/libs/adminLTE/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('public/js/admin/tags/delete.js') ?>"></script>
<script>
    $(function () {
        $('#tags-table').DataTable();
    });
</script>

<?= $this->endSection() ?>
