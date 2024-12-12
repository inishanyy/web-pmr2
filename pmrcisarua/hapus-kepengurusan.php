<?php
include 'config/app.php';
// Ambil ID kepengurusan dari parameter URL
$id_kepengurusan = $_GET['id'] ?? '';

if (empty($id_kepengurusan)) {
    echo "<script>
           alert('ID kepengurusan tidak valid.');
           document.location.href = 'data-kepengurusan.php';
           </script>";
    exit;
}
// Proses penghapusan data
if (delete_data_kepengurusan($id_kepengurusan) > 0) {
    echo "<script>
           alert('Data kepengurusan Berhasil Dihapus');
           document.location.href = 'data-kepengurusan.php';
           </script>";
} else {
    echo "<script>
           alert('Data kepengurusan Gagal Dihapus');
           document.location.href = 'data-kepengurusan.php';
           </script>";
}


?>

<?php include 'layout/footer.php'; ?>
