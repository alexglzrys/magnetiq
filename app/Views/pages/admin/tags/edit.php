<?= $this->extend('layouts/main') ?>

<?= $this->section('page_title') ?>Editar Etiqueta<?= $this->endSection() ?>

<?= $this->section('header') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Etiqueta</h1>
                <p>Esta sección le permite editar una etiqueta registrada previamente en el sistema</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard') ?>">Panel de Control</a></li>
                    <li class="breadcrumb-item"><a href="<?= route_to('admin.tags.index') ?>">Etiquetas</a></li>
                    <li class="breadcrumb-item active">Editar etiqueta</li>
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
                        <h3 class="card-title">Editar Etiqueta</h3>
                    </div>
                    <form role="form" id="formEditTag">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?= $tag->name ?>" placeholder="Nombre de la categoría">
                            </div>
                            <div class="form-group">
                                <label for="color">Color de Texto</label>
                                <input type="text" name="color" id="color" class="form-control" value="<?= $tag->color ?>" placeholder="Color del texto de etiqueta">
                            </div>
                            <div class="form-group">
                                <label for="background">Color de Fondo</label>
                                <input type="text" name="background" id="background" class="form-control" value="<?= $tag->background ?>" placeholder="Color de fondo de etiqueta">
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
<script>const ID = '<?= $tag->id ?>'</script>
<script src="<?= base_url('public/js/admin/tags/edit.js') ?>"></script>
<?= $this->endSection() ?>

