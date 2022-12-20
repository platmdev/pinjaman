<?php
$title = 'Login';
session_start();
include 'components/header.php';
require_once 'components/flash_msg.php';
if (isset($_SESSION["login"])) {
    header("location: index.php");
}

include "config.php";
if (isset($_POST['login'])) {
    $username =  $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM user WHERE username='" . $username . "' AND password='" . $password . "'";
    $result = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['login'] = $row["nama"];
        }
        set_msg('Login berhasil.');
        header("location: index.php");
        exit;
    } else {
        set_msg('Login gagal. Cek username dan password!', 'error');
    }
}
?>

<body class="hold-transition dark-mode login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1>PINJAMAN</h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan login terlebih dahulu</p>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="login"
                                id="login">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    </script>
    <?php
    get_msg();
    ?>
</body>

</html>