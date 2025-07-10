<?php
session_start();
// unset($_SESSION['account']);
// unset($_SESSION['nama']);
session_destroy();
header('Location:login.php?pesan=anda berhasil logout.');
?>