<?php
$title = 'Edit Anggota';
include 'layout/header.php'; // Menyertakan file header
include 'config/app.php'; // Menghubungkan ke database

// Ambil ID anggota dari parameter URL
$id_anggota = $_GET['id'] ?? '';

if (empty($id_anggota)) {
    echo "<script>
           alert('ID Anggota tidak valid.');
           document.location.href = 'data-anggota.php';
           </script>";
    exit;
}

// Ambil data anggota berdasarkan ID
$result = mysqli_query($db, "SELECT * FROM data_anggota WHERE id_anggota = '$id_anggota'");
$data = mysqli_fetch_assoc($result);
if (!$data) {
    echo "<script>
           alert('Data anggota tidak ditemukan.');
           document.location.href = 'data-anggota.php';
           </script>";
    exit;
}

// Proses form submit
if (isset($_POST['update'])) {
    if (update_data_anggota($_POST) > 0) {
        echo "<script>
               alert('Data anggota Berhasil Diperbarui');
               document.location.href = 'data-anggota.php';
               </script>";
    } else {
        echo "<script>
               alert('Data anggota Gagal Diperbarui');
               document.location.href = 'data-anggota.php';
               </script>";
    }
}
?>

<div class="container mt-5" style="padding-bottom: 100px;">
    <h1>Edit Anggota</h1>
    <hr>
    <div class="container">
    <form action="" method="post" >
        <input type="hidden" name="id_anggota" value="<?= htmlspecialchars($data['id_anggota']); ?>">
        
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" placeholder="Nama anggota..." required>
        </div>

        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control" required>
                <option value="">--Pilih Jenis Kelamin--</option>
                <option value="laki-laki" <?= $data['jk'] === 'laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="perempuan" <?= $data['jk'] === 'perempuan' ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="<?= htmlspecialchars($data['kelas']); ?>" placeholder="Kelas..." required>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= htmlspecialchars($data['jurusan']); ?>" placeholder="Jurusan..." required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= htmlspecialchars($data['alamat']); ?>" placeholder="Alamat..." required>
        </div>

        <div class="mb-3">
            <label for="no_tlp" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= htmlspecialchars($data['no_tlp']); ?>" placeholder="No Telepon..." required>
        </div>
        <div class="clearfix">
            <button type="submit" name="update" class="btn btn-primary " style="float: right;">Update</button>
        </div>
    </form>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
