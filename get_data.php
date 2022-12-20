<?php
include 'config.php';
if (isset($_POST['nomor_nasabah'])) {
    $sql = "SELECT * FROM nasabah, fintech WHERE nomor_nasabah ='" . $_POST['nomor_nasabah'] . "' and id_fintech = fintech";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
        echo mysqli_error($koneksi);
    } else {
        echo json_encode(mysqli_fetch_assoc($result));
    }
    exit;
}
if (isset($_POST['id_fintech_detail'])) {
    $sql = "SELECT * FROM nasabah, fintech WHERE id_fintech = fintech and fintech =" . $_POST['id_fintech_detail'];
    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
        echo mysqli_error($koneksi);
    } else {
        echo json_encode(mysqli_fetch_all($result));
    }
    exit;
}
if (isset($_POST['id_fintech'])) {
    $sql = "SELECT * FROM fintech WHERE id_fintech ='" . $_POST['id_fintech'] . "'";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
        echo mysqli_error($koneksi);
    } else {
        echo json_encode(mysqli_fetch_assoc($result));
    }
    exit;
}