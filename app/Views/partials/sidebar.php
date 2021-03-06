<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('public/libs/adminLTE/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Magnetiq 2.0</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('public/libs/adminLTE/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alejandro González</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= route_to('admin.clients.index') ?>" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('admin.community.index') ?>" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>Community</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('admin.tags.index') ?>" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>Etiquetas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('admin.categories.index') ?>" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>Categorías</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
