<?php
include "config.php";
session_start();
require_once 'components/flash_msg.php';
if (isset($_POST['edit_nasabah'])) {
    $nomor_nasabah =  $_POST['nomor_nasabah'];
    $nama =  $_POST['nama'];
    $alamat =  $_POST['alamat'];
    $pinjaman_pokok =  str_replace('.', '', $_POST['pinjaman_pokok']);
    $bunga =  $_POST['bunga'];
    $fintech =  $_POST['fintech'];
    $tgl_cair =  $_POST['tgl_cair'];
    $jangka_waktu =  $_POST['jangka_waktu'];
    $sql = "UPDATE nasabah SET `nomor_nasabah`='" . $nomor_nasabah . "', `nama`='" . $nama . "', `alamat`='" . $alamat . "', `pinjaman_pokok`='" . $pinjaman_pokok . "', `bunga`='" . $bunga . "', `fintech`='" . $fintech . "', `tanggal_cair`=STR_TO_DATE('" . $tgl_cair . "','%d/%m/%Y'), `jangka_waktu`='" . $jangka_waktu . "' WHERE nomor_nasabah='" . $nomor_nasabah . "'";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
        echo mysqli_error($koneksi);
    } else {
        set_msg('Edit data Nasabah berhasil.');
        header("location: nasabah.php");
    }
}
if (isset($_POST['edit_fintech'])) {
    $id_fintech =  $_POST['id_fintech'];
    $nama_fintech =  $_POST['nama_fintech'];
    $sql = "UPDATE fintech SET `nama_fintech`='" . $nama_fintech . "' WHERE id_fintech=" . $id_fintech;
    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
        echo mysqli_error($koneksi);
    } else {
        set_msg('Edit data Fintech berhasil.');
        header("location: fintech.php");
    }
}
if (isset($_POST['updatePass'])) {
    $curPass = $_POST['passwordlama'];
    $newPass = $_POST['passwordbaru'];
    $confPass = $_POST['konfirmasipassword'];
    $sql = "SELECT * FROM user WHERE username = 'admin' and password =md5('" . $curPass . "')";
    $result = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($result) < 1) {
        set_msg('Password saat ini salah.', 'error');
        header("location: ubah_password.php");
    } else {
        if ($newPass != $confPass) {
            set_msg('Password Baru dan Konfirmasi Password tidak sama.', 'error');
            header("location: ubah_password.php");
        } else {
            $sql2 = "UPDATE user SET `password`=md5('" . $newPass . "') WHERE username='admin'";
            $result2 = mysqli_query($koneksi, $sql2);
            set_msg('Password berhasil diubah. Silahkan login ulang!');
            unset($_SESSION['login']);
            header("location: login.php");
        }
    }
}