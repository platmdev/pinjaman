<?php
$koneksi = mysqli_connect("localhost", "root", "", "pinjaman");

// Check connection
if (!$koneksi) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}