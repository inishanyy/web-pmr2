<?php
include 'config/app.php';
// Ambil ID kompetisi dari parameter URL
$id_kompetisi = $_GET['id'] ?? '';

if (empty($id_kompetisi)) {
    echo "<script>
           alert('ID kompetisi tidak valid.');
           document.location.href = 'data-kompetisi.php';
           </script>";
    exit;
}

// Proses penghapusan data
if (delete_data_kompetisi($id_kompetisi) > 0) {
    echo "<script>
           alert('Data kompetisi Berhasil Dihapus');
           document.location.href = 'data-kompetisi.php';
           </script>";
} else {
    echo "<script>
           alert('Data kompetisi Gagal Dihapus');
           document.location.href = 'data-kompetisi.php';
           </script>";
}
?>

<?php include 'layout/footer.php'; ?>
