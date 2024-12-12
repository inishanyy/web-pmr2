<?php
$title = 'Edit Kegiatan';
include 'config/app.php';
include 'layout/header.php';

// Ambil ID kegiatan dari parameter URL
$id_kegiatan = $_GET['id'] ?? '';

if (empty($id_kegiatan)) {
    echo "<script>
           alert('ID kegiatan tidak valid.');
           document.location.href = 'data-kegiatan.php';
           </script>";
    exit;
}

// Ambil data kegiatan berdasarkan ID
$result = mysqli_query($db, "SELECT * FROM data_kegiatan WHERE id_kegiatan = '$id_kegiatan'");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>
           alert('Data kegiatan tidak ditemukan.');
           document.location.href = 'data-kegiatan.php';
           </script>";
    exit;
}

// Proses form submit
if (isset($_POST['update'])) {
    if (update_data_kegiatan($_POST) > 0) {
        echo "<script>
               alert('Data kegiatan berhasil diperbarui');
               document.location.href = 'data-kegiatan.php';
               </script>";
    } else {
        echo "<script>
               alert('Data kegiatan gagal diperbarui');
               document.location.href = 'data-kegiatan.php';
               </script>";
    }
}
?>
<div class="container mt-5" style="padding-bottom: 100px;">
    <h1>Edit Kegiatan</h1>
    <hr>
    <div class="container">
    <form action="" method="post" >
        <input type="hidden" name="id_kegiatan" value="<?= htmlspecialchars($data['id_kegiatan']); ?>">
        
        <div class="mb-3">
            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?= htmlspecialchars($data['nama_kegiatan']); ?>" placeholder="Nama kegiatan..." required>
        </div>

        <div class="mb-3">
            <label for="tgl_kegiatan" class="form-label">Tanggal Kegiatan</label>
            <input type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan" value="<?= htmlspecialchars($data['tgl_kegiatan']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="lokasi_kegiatan" class="form-label">Lokasi Kegiatan</label>
            <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan" value="<?= htmlspecialchars($data['lokasi_kegiatan']); ?>" placeholder="Lokasi kegiatan..." required>
        </div>

        <div class="clearfix">
            <button type="submit" name="update" class="btn btn-primary " style="float: right;">Update</button>
        </div>
    </form>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
