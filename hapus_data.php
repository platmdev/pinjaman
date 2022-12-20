<?php
include 'config.php';
session_start();
require_once 'components/flash_msg.php';
if (isset($_GET['nomor_nasabah'])) {
    $sql = "DELETE FROM nasabah WHERE nomor_nasabah ='" . $_GET['nomor_nasabah'] . "'";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
        echo mysqli_error($koneksi);
    } else {
        set_msg('Hapus data Nasabah berhasil.');
        header("location: nasabah.php");
    }
}
if (isset($_GET['id_fintech'])) {
    $sql = "DELETE FROM fintech WHERE id_fintech =" . $_GET['id_fintech'];
    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
        echo mysqli_error($koneksi);
    } else {
        set_msg('Hapus data Fintech berhasil.');
        header("location: fintech.php");
    }
}