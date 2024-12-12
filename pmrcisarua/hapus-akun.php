<?php
session_start();
include 'config/app.php';
// // Cek level pengguna, jika bukan admin (level 1), redirect ke halaman data anggota
// if ($_SESSION['level'] != 1) {
//     header("Location: data-akun.php");
//     exit;
// }

// menerima id barang yang di pilih pengguna
$id_akun = (int)$_GET['id_akun']; 
 
if(delete_akun($id_akun)>0) {
    echo "<script>
               alert('Data Akun Berhasil Dihapus');
               document.location.href = 'akun.php';
               </script>";
    }else {
        echo "<script>
               alert('Data Akun Gagal Dihapus');
               document.location.href = 'akun.php';
               </script>";
    }
