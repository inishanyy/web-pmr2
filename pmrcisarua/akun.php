<?php
$title = 'Daftar Akun';
include 'config/app.php';
include 'layout/header.php';

// tampil seluruh data
$data_akun = select("SELECT * FROM akun");

// jika tombol tambah di tekan jalankan script berikut
if (isset($_POST['tambah'])) {
    if (create_akun($_POST) > 0) {
        echo "<script>
               alert('Data Akun Berhasil Ditambahkan');
               document.location.href = 'akun.php';
               </script>";
    } else {
        echo "<script>
               alert('Data Akun Gagal Ditambahkan');
               document.location.href = 'akun.php';
               </script>";
    }
}
// jika tombol ubah di tekan jalankan script berikut
if (isset($_POST['ubah'])) {
    if (update_akun($_POST) > 0) {
        echo "<script>
               alert('Data Akun Berhasil Diubahkan');
               document.location.href = 'akun.php';
               </script>";
    } else {
        echo "<script>
               alert('Data Akun Gagal Diubahkan');
               document.location.href = 'akun.php';
               </script>";
    }
}
?>
<div class="content-wrapper">
    <div class="container mt-5">
        <h1>Data Akun</h1>
        <?php if ($_SESSION['level'] == 1) : // Admin ?>
            <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah</button>
            <?php endif?>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <?php if ($_SESSION['level']== 1) : //Admin?>
                <th>Aksi</th>
                <?php endif ?>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                    <?php foreach ($data_akun as $akun): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($akun['nama']); ?></td>
                            <td><?= htmlspecialchars($akun['username']); ?></td>
                            <td><?= htmlspecialchars($akun['email']); ?></td>
                            <td>Password Ter-enkripsi</td>
                            <td class="text-center">
                                <?php if ($_SESSION['level']== 1) : //Admin ?>
                                <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>">Ubah</button>
                                <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun']; ?>">Hapus</button>
                            </td>
                        </tr>
                        <?php endif ?>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div> 
    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required minlength="6">
                        </div>
                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="">--pilih level--</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <!-- Modal Ubah -->
<?php foreach ($data_akun as $akun): ?>
    <div class="modal fade" id="modalUbah<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($akun['nama']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= htmlspecialchars($akun['username']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($akun['email']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password <small>(Masukkan password baru/lama)</small></label>
                            <input type="password" name="password" id="password" class="form-control" required minlength="6">
                        </div>
                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="1" <?= $akun['level'] == '1' ? 'selected' : '' ?>>Admin</option>
                                <option value="2" <?= $akun['level'] == '2' ? 'selected' : '' ?>>User</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
    <!-- Modal Hapus -->
    <?php foreach ($data_akun as $akun): ?>
        <div class="modal fade" id="modalHapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin Ingin Menghapus Data Akun: <?= htmlspecialchars($akun['nama']); ?>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php include 'layout/footer.php'; ?>
