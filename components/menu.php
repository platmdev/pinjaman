<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">PINJAMAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">ADMIN</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php
                // SILAHKAN TAMBAHKAN DALAM ARRAY JIKA ADA MENU BARU DI SEBELAH KIRI
                $url = array(
                    'DASHBOARD' => array('url' => 'index.php', 'icon' => 'fas fa-tachometer-alt'),
                    'NASABAH' => array('url' => 'nasabah.php', 'icon' => 'fas fa-users'),
                    'FINTECH' => array('url' => 'fintech.php', 'icon' => 'fas fa-coins'),
                    'DETAIL NASABAH' => array('url' => 'detail_nasabah.php', 'icon' => 'far fa-chart-bar'),
                    'UBAH PASSWORD' => array('url' => 'ubah_password.php', 'icon' => 'fas fa-key')
                );

                foreach ($url as $menu => $item) {
                    echo '<li class="nav-item ';
                    if ($page == $menu) {
                        echo "active";
                    }
                    echo '"><a href="' . $item['url'] . '" class="nav-link"><i class="nav-icon ' . $item['icon'] . '"></i><p>' . $menu . '</p></a></li>';
                }
                ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>