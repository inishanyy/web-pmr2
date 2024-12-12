<?php
include 'layout/header.php'; 
?>
<div class="content-wrapper">
    <div class="container mt-5">
        <h1>Data Kompetisi</h1>
        <hr>
        <?php if ($_SESSION['level'] == 1) : // Admin ?>
        <a href="tambah-kompetisi.php" class="btn btn-primary mb-1">
            <i class="fas fa-plus-circle"></i> Tambah
        </a>
        <?php endif?>
        <table id="serverside" class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Kompetisi</th>
                    <th>Lokasi Kompetisi</th>
                    <th>Tanggal Kompetisi</th>
                    <th>Kejuaraan</th>
                    <?php if ($_SESSION['level'] == 1) : // Admin ?>
                    <th>Aksi</th>
                    <?php endif?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menghubungkan ke database
                include 'config/koneksi.php';
                
                // Query untuk mengambil data kompetisi
                $result = mysqli_query($db, "SELECT * FROM data_kompetisi");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                    <td><?= htmlspecialchars($row['nama_kompetisi']); ?></td>
                    <td><?= htmlspecialchars($row['lokasi_kompetisi']); ?></td>
                    <td><?= htmlspecialchars($row['tanggal_kompetisi']); ?></td>
                    <td><?= htmlspecialchars($row['kejuaraan']); ?></td>
                    <td>
                    <?php if ($_SESSION['level'] == 1) : // Admin ?>
                    <a href="edit-kompetisi.php?id=<?= $row['id_kompetisi']; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="hapus-kompetisi.php?id=<?= $row['id_kompetisi']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
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
