<?= $this->extend('layouts/main') ?>

<?= $this->section('page_title') ?>Community Managers<?= $this->endSection() ?>

<?= $this->section('header') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Community Managers</h1>
                <p>Esta sección le permite gestionar los Community Managers registrados en el sistema</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard') ?>">Panel de Control</a></li>
                    <li class="breadcrumb-item active">Community Managers</li>
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
                        <h3 class="card-title mr-4">Community Managers publicados</h3>
                        <a href="<?= route_to('admin.community.create') ?>" class="btn btn-success">Registrar Community Manager</a>
                    </div>
                    <div class="card-body">
                        <table id="communities-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Fecha de registro</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($communities as $community): ?>
                                <tr id="tag-<?= $community->id ?>">
                                    <td><?= $community->first_name . ' ' . $community->last_name ?></td>
                                    <td><?= $community->email ?></td>
                                    <td><?= $community->created_at ?></td>
                                    <td>
                                        <a href="<?= route_to('admin.tags.edit', $community->id) ?>" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="<?= route_to('admin.tags.destroy', $community->id) ?>" class="btn btn-sm btn-danger btnDeleteCommunity" data-id="<?= $community->id ?>">Eliminar</a>
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
<script src="<?= base_url('public/js/admin/communities/delete.js') ?>"></script>
<script>
    $(function () {
        $('#communities-table').DataTable();
    });
</script>

<?= $this->endSection() ?>
