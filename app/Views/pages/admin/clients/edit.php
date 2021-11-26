<?= $this->extend('layouts/main') ?>

<?= $this->section('page_title') ?>Editar Cliente<?= $this->endSection() ?>

<?= $this->section('header') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Cliente</h1>
                <p>Esta sección le permite editar un cliente registrado previamente en el sistema</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard') ?>">Panel de Control</a></li>
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.clients.index') ?>">Clientes</a></li>
                    <li class="breadcrumb-item active">Editar Cliente</li>
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
                        <h3 class="card-title">Editar Cliente</h3>
                    </div>
                    <form role="form" id="formEditClient">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?= $client->name ?>" placeholder="Nombre del Cliente">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= $client->email ?>" placeholder="Correo electrónico para el acceso al sistema">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña para el acceso al sistema">
                            </div>
                            <div class="form-group">
                                <label for="categories">Categorías asociadas con el cliente</label>
                                <?php if (count($categories)): ?>
                                    <select name="categories[]" id="categories" class="custom-select" multiple required>
                                        <?php foreach($categories as $index => $category): ?>
                                            <option value="<?= $category->id ?>"
                                                <?= array_search($category->id, array_column($currentCategories, 'category_id')) !== false ? 'selected' : '' ?> >
                                                    <?= esc($category->name) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php else: ?>
                                    <select name="categories[]" id="categories" class="custom-select" multiple required>
                                        <option value="" selected disabled>Seleccione una o varias categorías</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
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
<script>const ID = '<?= $client->id ?>'</script>
<script src="<?= base_url('public/js/admin/clients/edit.js') ?>"></script>
<?= $this->endSection() ?>


