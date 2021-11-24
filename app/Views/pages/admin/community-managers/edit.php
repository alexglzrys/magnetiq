<?= $this->extend('layouts/main') ?>

<?= $this->section('page_title') ?>Editar Community Manager<?= $this->endSection() ?>

<?= $this->section('header') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Community Manager</h1>
                <p>Esta sección le permite editar un Community Manager registrado previamente en el sistema</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard') ?>">Panel de Control</a></li>
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.community.index') ?>">Community Managers</a></li>
                    <li class="breadcrumb-item active">Editar Community Manager</li>
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
                        <h3 class="card-title">Editar Community Manager</h3>
                    </div>
                    <form role="form" id="formEditCommunityManager">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">Nombre</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $community->first_name ?>" placeholder="Nombre(s) del Community Manager">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Apellidos</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $community->last_name ?>" placeholder="Apellidos de Community Manager">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= $community->email ?>" placeholder="Correo electrónico para el acceso al sistema">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña para el acceso al sistema">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
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
<script>const ID = '<?= $community->id ?>'</script>
<script src="<?= base_url('public/js/admin/community-managers/edit.js') ?>"></script>
<?= $this->endSection() ?>

