<?php
require_once "components/flash_msg.php";
session_start();
unset($_SESSION['login']);
set_msg("Berhasil Keluar.");
header("location: login.php");