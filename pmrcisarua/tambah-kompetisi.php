<?php
include 'config/app.php';
$title = 'Tambah Kompetisi';
include 'layout/header.php'; // Menyertakan file header

// Proses form submit
if (isset($_POST['tambah'])) {
    if (create_data_kompetisi($_POST) > 0) {
        echo "<script>
               alert('Data kompetisi berhasil ditambahkan');
               document.location.href = 'data-kompetisi.php';
               </script>";
    } else {
        echo "<script>
               alert('Data kompetisi gagal ditambahkan');
               document.location.href = 'data-kompetisi.php';
               </script>";
    }
}
?>
<div class="container mt-5" style="padding-bottom: 100px;">
    <h1>Tambah Kompetisi</h1>
    <hr>
    <div class="container">
    <form action="" method="post" >
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama lengkap..." required>
        </div>

        <div class="mb-3">
            <label for="nama_kompetisi" class="form-label">Nama Kompetisi</label>
            <input type="text" class="form-control" id="nama_kompetisi" name="nama_kompetisi" placeholder="Nama kompetisi..." required>
        </div>

        <div class="mb-3">
            <label for="lokasi_kompetisi" class="form-label">Lokasi Kompetisi</label>
            <input type="text" class="form-control" id="lokasi_kompetisi" name="lokasi_kompetisi" placeholder="Lokasi kompetisi..." required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kompetisi" class="form-label">Tanggal Kompetisi</label>
            <input type="date" class="form-control" id="tanggal_kompetisi" name="tanggal_kompetisi" required>
        </div>

        <div class="mb-3">
            <label for="kejuaraan" class="form-label">Kejuaraan</label>
            <input type="text" class="form-control" id="kejuaraan" name="kejuaraan" placeholder="Kejuaraan..." required>
        </div>

        <!-- Tombol Submit -->
        <div class="clearfix">
            <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
        </div>
    </form>
    </div>
</div>
<?php include 'layout/footer.php'; ?>
