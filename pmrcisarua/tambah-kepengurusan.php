<?php
include 'config/app.php';
$title = 'Tambah Kepengurusan';
include 'layout/header.php'; // Menyertakan file header

// Proses form submit
if (isset($_POST['tambah'])) {
    if (create_data_kepengurusan($_POST) > 0) {
        echo "<script>
               alert('Data kepengurusan berhasil ditambahkan');
               document.location.href = 'data-kepengurusan.php';
               </script>";
    } else {
        echo "<script>
               alert('Data kepengurusan gagal ditambahkan');
               document.location.href = 'data-kepengurusan.php';
               </script>";
    }
}
?>
<div class="container " style="padding-bottom: 100px;">
    <h1>Tambah Kepengurusan</h1>
    <hr>
    <div class="container">
    <form action="" method="post" >
        <div class="mb-3" >
            <label for="nama_anggota" class="form-label">Nama Anggota</label>
            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" placeholder="Nama anggota..." required>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan..." required>
        </div>

        <div class="mb-3">
            <label for="thn_memulai" class="form-label">Tahun Memulai</label>
            <input type="date" class="form-control" id="thn_memulai" name="thn_memulai" required>
        </div>

        <div class="mb-3">
            <label for="thn_selesai" class="form-label">Tahun Selesai</label>
            <input type="date" class="form-control" id="thn_selesai" name="thn_selesai" required>
        </div>

        <!-- Menambahkan margin bottom untuk jarak dari footer -->
        <div class="clearfix">
            <button type="submit" name="tambah" class="btn btn-primary " style="float: right;">Tambah</button>
        </div>
</form>
</div>
</div>
<?php include 'layout/footer.php'; ?>
