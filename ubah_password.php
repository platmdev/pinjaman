<?php
$title = "Ubah Password";
$page = "UBAH PASSWORD";
session_start();
include "components/header.php";
require_once 'components/flash_msg.php';
include "components/menu.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Password</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="card mt-5">
                        <div class="card-body">
                            <form action="edit_data.php" method="post">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="passwordlama" id="passwordlama"
                                        placeholder="Silahkan masukkan password saat ini">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="passwordbaru" id="passwordbaru" class="form-control"
                                        placeholder="Silahkan masukkan password baru">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-key"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="konfirmasipassword" id="konfirmasipassword"
                                        class="form-control" placeholder="Silahkan masukkan ulang password baru">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-key"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block" name="updatePass"
                                            id="simpan">Simpan</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-3"></div>
            </div>
        </div>
</div>
</section>
</div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<?php
include 'components/footer.php';
?>
</div>
<!-- ./wrapper -->
<?php
// FUNGSI UNTUK MEMUNCULKAN NOTIF
get_msg();
?>
</body>

</html>