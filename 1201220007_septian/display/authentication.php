<?php
session_start();
if (!isset($_SESSION['Nama']) || $_SESSION['Nama'] == null) {
    header('Location: ../login.php?pesan= anda belum login');
    exit();
}
$keranjang = $_SESSION['keranjang'] ?? [];
?>