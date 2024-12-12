<?php
include 'layout/header.php'; 
?>
<div class="content-wrapper">
    <div class="container mt-5">
        <h1>Data Kepengurusan</h1>
        <hr>
        <?php if ($_SESSION['level'] == 1) : // Admin ?>
        <a href="tambah-kepengurusan.php" class="btn btn-primary mb-1">
            <i class="fas fa-plus-circle"></i> Tambah
        </a>
        <?php endif?>
        <table id="serverside" class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Jabatan</th>
                    <th>Tahun Memulai</th>
                    <th>Tahun Selesai</th>
                    <?php if ($_SESSION['level'] == 1) : // Admin ?>
                    <th>Aksi</th>
                    <?php endif?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menghubungkan ke database
                include 'config/koneksi.php';
                
                // Query untuk mengambil data kepengurusan
                $result = mysqli_query($db, "SELECT * FROM data_kepengurusan");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama_anggota']); ?></td>
                    <td><?= htmlspecialchars($row['jabatan']); ?></td>
                    <td><?= htmlspecialchars($row['thn_memulai']); ?></td>
                    <td><?= htmlspecialchars($row['thn_selesai']); ?></td>
                    <td>
                    <?php if ($_SESSION['level'] == 1) : // Admin ?>
                        <a href="edit-kepengurusan.php?id=<?= $row['id_kepengurusan']; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="hapus-kepengurusan.php?id=<?= $row['id_kepengurusan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
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

<?php include 'layout/footer.php'; ?>
