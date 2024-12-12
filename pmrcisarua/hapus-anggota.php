<?php
include 'config/app.php';
$title = 'Hapus Anggota';
include 'layout/header.php'; // Menyertakan file header

// Ambil ID anggota dari parameter URL
$id_anggota = $_GET['id'] ?? '';

if (empty($id_anggota)) {
    echo "<script>
           alert('ID Anggota tidak valid.');
           document.location.href = 'data-anggota.php';
           </script>";
    exit;
}
// Proses penghapusan data
if (delete_data_anggota($id_anggota) > 0) {
    echo "<script>
           alert('Data anggota Berhasil Dihapus');
           document.location.href = 'data-anggota.php';
           </script>";
} else {
    echo "<script>
           alert('Data anggota Gagal Dihapus');
           document.location.href = 'data-anggota.php';
           </script>";
}


?>

<?php include 'layout/footer.php'; ?>
