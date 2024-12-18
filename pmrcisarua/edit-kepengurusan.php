<?php
$title = 'Edit Anggota';
include 'config/app.php';
include 'layout/header.php';

// Ambil ID anggota dari parameter URL
$id_kepengurusan = $_GET['id'] ?? '';

if (empty($id_kepengurusan)) {
    echo "<script>
           alert('ID kepengurusan tidak valid.');
           document.location.href = 'data-kepengurusan.php';
           </script>";
    exit;
}

// Ambil data anggota berdasarkan ID
$result = mysqli_query($db, "SELECT * FROM data_kepengurusan WHERE id_kepengurusan = '$id_kepengurusan'");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>
           alert('Data kepengurusan tidak ditemukan.');
           document.location.href = 'data-kepengurusan.php';
           </script>";
    exit;
}

// Proses form submit
if (isset($_POST['update'])) {
    if (update_data_kepengurusan($_POST) > 0) {
        echo "<script>
               alert('Data kepengurusan berhasil diperbarui');
               document.location.href = 'data-kepengurusan.php';
               </script>";
    } else {
        echo "<script>
               alert('Data kepengurusan gagal diperbarui');
               document.location.href = 'data-kepengurusan.php';
               </script>";
    }
}
?>
<div class="container mt-5" style="padding-bottom: 100px;">
    <h1>Edit Kepengurusan</h1>
    <hr>
    <div class="container">
        <form action="" method="post">
            <input type="hidden" name="id_kepengurusan" value="<?= htmlspecialchars($data['id_kepengurusan']); ?>">

            <div class="mb-3">
                <label for="nama_anggota" class="form-label">Nama Anggota</label>
                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="<?= htmlspecialchars($data['nama_anggota']); ?>" placeholder="Nama anggota..." required>
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= htmlspecialchars($data['jabatan']); ?>" placeholder="Jabatan..." required>
            </div>

            <div class="mb-3">
                <label for="thn_memulai" class="form-label">Tahun Memulai</label>
                <input type="date" class="form-control" id="thn_memulai" name="thn_memulai" value="<?= htmlspecialchars($data['thn_memulai']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="thn_selesai" class="form-label">Tahun Selesai</label>
                <input type="date" class="form-control" id="thn_selesai" name="thn_selesai" value="<?= htmlspecialchars($data['thn_selesai']); ?>" required>
            </div>

            <div class="clearfix">
                <button type="submit" name="update" class="btn btn-primary" style="float: right;">Update</button>
            </div>
        </form>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
