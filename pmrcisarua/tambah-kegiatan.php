<?php
include 'config/app.php';
$title = 'Tambah kegiatan';
include 'layout/header.php'; // Menyertakan file header

// Proses form submit
if (isset($_POST['tambah'])) {
    if (create_data_kegiatan($_POST) > 0) {
        echo "<script>
               alert('Data kegiatan berhasil ditambahkan');
               document.location.href = 'data-kegiatan.php';
               </script>";
    } else {
        echo "<script>
               alert('Data kegiatan gagal ditambahkan');
               document.location.href = 'data-kegiatan.php';
               </script>";
    }
}
?>
<div class="container mt-5" style="padding-bottom: 100px;">
    <h1>Tambah kegiatan</h1>
    <hr>
    <div class="container">
    <form action="" method="post" >
        <div class="mb-3">
            <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama kegiatan..." required>
        </div>

        <div class="mb-3">
            <label for="tgl_kegiatan" class="form-label">Tanggal Kegiatan</label>
            <input type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan" required>
        </div>

        <div class="mb-3">
            <label for="lokasi_kegiatan" class="form-label">Lokasi Kegiatan</label>
            <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan" placeholder="Lokasi kegiatan..." required>
        </div>

        <div class="clearfix">
            <button type="submit" name="tambah" class="btn btn-primary " style="float: right;">Tambah</button>
        </div>
    </form>
    </div>
</div>
<?php include 'layout/footer.php'; ?>
