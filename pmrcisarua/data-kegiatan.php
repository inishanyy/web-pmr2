<?php
include 'layout/header.php'; 
?>
<div class="content-wrapper">
    <div class="container mt-5">
        <h1>Data Kegiatan</h1>
        <hr>
        <?php if ($_SESSION['level'] == 1) : // Admin ?>
        <a href="tambah-kegiatan.php" class="btn btn-primary mb-1">
            <i class="fas fa-plus-circle"></i> Tambah
        </a>
        <?php endif?>
        <table id="serverside" class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Lokasi Kegiatan</th>
                    <?php if ($_SESSION['level'] == 1) : // Admin ?>
                    <th>Aksi</th>
                    <?php endif?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menghubungkan ke database
                include 'config/koneksi.php';
                
                // Query untuk mengambil data kegiatan
                $result = mysqli_query($db, "SELECT * FROM data_kegiatan");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama_kegiatan']); ?></td>
                    <td><?= htmlspecialchars($row['tgl_kegiatan']); ?></td>
                    <td><?= htmlspecialchars($row['lokasi_kegiatan']); ?></td>
                    <td>
                    <?php if ($_SESSION['level'] == 1) : // Admin ?>
                        <a href="edit-kegiatan.php?id=<?= $row['id_kegiatan']; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="hapus-kegiatan.php?id=<?= $row['id_kegiatan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
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
