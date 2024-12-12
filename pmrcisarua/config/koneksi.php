<?php
$servername = "localhost";  // Sesuaikan dengan server database
$username   = "root";       // Sesuaikan dengan username database
$password   = "";           // Sesuaikan dengan password database
$dbname     = "pmr"; // Ganti dengan nama database kamu

$db = mysqli_connect('localhost', 'root', '', 'pmr');
if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}


?>