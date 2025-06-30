<?php
session_start();

// Hapus semua data sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman utama
header("Location: ../index.php?login=success");
exit();
?>