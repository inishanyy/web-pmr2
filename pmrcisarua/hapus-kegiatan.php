<?php
include 'config/app.php';

// Ambil ID kegiatan dari parameter URL
$id_kegiatan= $_GET['id'] ?? '';

if (empty($id_kegiatan)) {
    echo "<script>
           alert('ID kegiatan tidak valid.');
           document.location.href = 'data-kegiatan.php';
           </script>";
    exit;
}
// Proses penghapusan data
if (delete_data_kegiatan($id_kegiatan) > 0) {
    echo "<script>
           alert('Data kegiatan Berhasil Dihapus');
           document.location.href = 'data-kegiatan.php';
           </script>";
} else {
    echo "<script>
           alert('Data kegiatan Gagal Dihapus');
           document.location.href = 'data-kegiatan.php';
           </script>";
}

?>
<?php include 'layout/footer.php'; ?>
