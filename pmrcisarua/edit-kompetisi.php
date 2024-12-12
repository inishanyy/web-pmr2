<?php
$title = 'Edit Kompetensi';
include 'config/app.php';
include 'layout/header.php';

// Ambil ID kompetisi dari parameter URL
$id_kompetisi = $_GET['id'] ?? '';

if (empty($id_kompetisi)) {
    echo "<script>
           alert('ID kompetisi tidak valid.');
           document.location.href = 'data-kompetisi.php';
           </script>";
    exit;
}

// Ambil data kompetisi berdasarkan ID
$result = mysqli_query($db, "SELECT * FROM data_kompetisi WHERE id_kompetisi = '$id_kompetisi'");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>
           alert('Data kompetisi tidak ditemukan.');
           document.location.href = 'data-kompetisi.php';
           </script>";
    exit;
}

// Proses form submit
if (isset($_POST['update'])) {
    if (update_data_kompetisi($_POST) > 0) {
        echo "<script>
               alert('Data kompetisi berhasil diperbarui');
               document.location.href = 'data-kompetisi.php';
               </script>";
    } else {
        echo "<script>
               alert('Data kompetisi gagal diperbarui');
               document.location.href = 'data-kompetisi.php';
               </script>";
    }
}
?>

<div class="container mt-5" style="padding-bottom: 100px;">
    <h1>Edit Kompetisi</h1>
    <hr>
    <div class="container">
    <form action="" method="post" >
        <input type="hidden" name="id_kompetisi" value="<?= htmlspecialchars($data['id_kompetisi']); ?>">
        
        <div class="mb-3">
    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= htmlspecialchars($data['nama_lengkap']); ?>" placeholder="Nama lengkap..." required>
</div>
<div class="mb-3">
    <label for="nama_kompetisi" class="form-label">Nama Kompetisi</label>
    <input type="text" class="form-control" id="nama_kompetisi" name="nama_kompetisi" value="<?= htmlspecialchars($data['nama_kompetisi']); ?>" placeholder="Nama kompetisi..." required>
</div>
<div class="mb-3">
    <label for="lokasi_kompetisi" class="form-label">Lokasi Kompetisi</label>
    <input type="text" class="form-control" id="lokasi_kompetisi" name="lokasi_kompetisi" value="<?= htmlspecialchars($data['lokasi_kompetisi']); ?>" placeholder="Lokasi kompetisi..." required>
</div>
<div class="mb-3">
    <label for="tanggal_kompetisi" class="form-label">Tanggal Kompetisi</label>
    <input type="date" class="form-control" id="tanggal_kompetisi" name="tanggal_kompetisi" value="<?= htmlspecialchars($data['tanggal_kompetisi']); ?>" required>
</div>
<div class="mb-3">
    <label for="kejuaraan" class="form-label">Kejuaraan</label>
    <input type="text" class="form-control" id="kejuaraan" name="kejuaraan" value="<?= htmlspecialchars($data['kejuaraan']); ?>" required>
</div>


        <div class="clearfix">
            <button type="submit" name="update" class="btn btn-primary" style="float: right;">Update</button>
        </div>
    </form>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
