<?php
include 'config/app.php';
$title = 'Tambah Anggota';
include 'layout/header.php'; // Menyertakan file header

// Proses form submit
if (isset($_POST['tambah'])) {
    if (create_data_anggota($_POST) > 0) {
        echo "<script>
               alert('Data anggota berhasil ditambahkan');
               document.location.href = 'data-anggota.php';
               </script>";
    } else {
        echo "<script>
               alert('Data anggota gagal ditambahkan');
               document.location.href = 'data-anggota.php';
               </script>";
    }
}
?>
<div class="container mt-5" style="padding-bottom: 100px;">
    <h1>Tambah Anggota</h1>
    <hr>
    <div class="container">
    <form action="" method="post" >
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama anggota..." required>
        </div>

        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control" required>
                <option value="">--Pilih Jenis Kelamin--</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas..." required>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan..." required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat..." required></textarea>
        </div>

        <div class="mb-3">
            <label for="no_tlp" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Nomor Telepon..." required>
        </div>

        <div class="clearfix">
            <button type="submit" name="tambah" class="btn btn-primary " style="float: right;">Tambah</button>
        </div>
    </form>
    </div>
</div>
<?php include 'layout/footer.php'; ?>
