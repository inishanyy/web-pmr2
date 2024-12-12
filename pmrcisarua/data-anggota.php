<?php  
include 'config/koneksi.php';
include 'layout\header.php'; 
?>
<div class="content-wrapper">
    <div class="container mt-5">
        <h1>Data Anggota</h1>
        <hr>
        <?php if ($_SESSION['level'] == 1) : // Admin ?>
        <a href="tambah-anggota.php" class="btn btn-primary mb-1">
            <i class="fas fa-plus-circle"></i> Tambah
        </a>
        <?php endif?>
        <table id="serverside" class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
         <?php if ($_SESSION['level'] == 1) : // Admin ?>
                    <th>Aksi</th>
                    <?php endif?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menghubungkan ke database
                include 'config\koneksi.php';
                
                // Query untuk mengambil data anggota
                $result = mysqli_query($db, "SELECT * FROM data_anggota");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['jk']); ?></td>
                    <td><?= htmlspecialchars($row['kelas']); ?></td>
                    <td><?= htmlspecialchars($row['jurusan']); ?></td>
                    <td><?= htmlspecialchars($row['alamat']); ?></td>
                    <td><?= htmlspecialchars($row['no_tlp']); ?></td>
                    <td>
                    <?php if ($_SESSION['level'] == 1) : // Admin ?>
                        <a href="edit-anggota.php?id=<?= $row['id_anggota']; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="hapus-anggota.php?id=<?= $row['id_anggota']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php endif?>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php  include 'layout\footer.php'; ?>