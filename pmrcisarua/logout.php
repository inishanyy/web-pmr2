<?php
session_start();

// Mengakhiri semua sesi
session_destroy();

// Redirect ke halaman login
header("Location: login.php");
exit();
?>
