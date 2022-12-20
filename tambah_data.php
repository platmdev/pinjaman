<?php
include "config.php";
session_start();
require_once 'components/flash_msg.php';
if (isset($_POST['tambah_nasabah'])) {
    $nomor_nasabah =  $_POST['nomor_nasabah'];
    $nama =  $_POST['nama'];
    $alamat =  $_POST['alamat'];
    $pinjaman_pokok =  str_replace('.', '', $_POST['pinjaman_pokok']);
    $bunga =  $_POST['bunga'];
    $fintech =  $_POST['fintech'];
    $tgl_cair =  $_POST['tgl_cair'];
    $jangka_waktu =  $_POST['jangka_waktu'];
    $sql = "INSERT INTO nasabah(`nomor_nasabah`, `nama`, `alamat`, `pinjaman_pokok`, `bunga`, `fintech`, `tanggal_cair`, `jangka_waktu`) VALUES ('" . $nomor_nasabah . "','" . $nama . "','" . $alamat . "','" . $pinjaman_pokok . "','" . $bunga . "','" . $fintech . "',STR_TO_DATE('" . $tgl_cair . "','%d/%m/%Y'),'" . $jangka_waktu . "')";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
        echo mysqli_error($koneksi);
    } else {
        set_msg('Tambah data Nasabah berhasil.');
        header("location: nasabah.php");
    }
}
if (isset($_POST['tambah_fintech'])) {
    $nama_fintech =  $_POST['nama_fintech'];
    $sql = "INSERT INTO fintech(`nama_fintech`) VALUES ('" . $nama_fintech . "')";
    $result = mysqli_query($koneksi, $sql);
    if (!$result) {
        echo mysqli_error($koneksi);
    } else {
        set_msg('Tambah data Fintech berhasil.');
        header("location: fintech.php");
    }
}