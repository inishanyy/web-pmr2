<?php
include 'layout/header.php';
include 'config/app.php'; // Pastikan koneksi ke database sudah benar
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grafik Jumlah Anggota OSIS Berdasarkan Tingkatan dan Jenis Kelamin</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Tambahkan CDN Chart.js -->
</head>
<body>
    <style type="text/css">
    body {
        font-family: roboto;
    }
    table {
            width: 50%; /* Tabel menempati 50% dari lebar layar */
            height: auto; /* Tinggi tabel akan otomatis */
            border-collapse: collapse;
            font-size: 18px;
            font-family: Arial, sans-serif;
            text-align: left;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Memberikan efek bayangan */
            border-radius: 8px; /* Membuat sudut tabel agak bulat */
            margin: 0 auto 50px auto; 
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        thead {
            background-color: #7FA1C3;
            color: #ffffff;
        }

        tbody tr:nth-child(even) {
            background-color: #f3f3f3;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* CSS untuk kontainer grafik */
        .chart-container {
            margin: 50px auto;
            width: 80%;
            height: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

    </style>

    <center>
        <h2>Data Jumlah Anggota PMR Berdasarkan Tingkatan dan Jenis Kelamin</h2>
    </center>

    <div class="row justify-content-center">
    <!-- Card Jumlah Tingkatan -->
    <div class="col-md-3">
        <div class="card  text-black shadow-sm" style="background-color: #6482AD">
            <div class="card-body">
                <h1 class="card-title">
                    <i class="bi bi-bar-chart-line"></i>
                    <span class="float-end">
                        <?php
                        $tingkatan = mysqli_query($db, "SELECT DISTINCT kelas FROM data_anggota");
                        echo mysqli_num_rows($tingkatan);
                        ?>
                    </span>
                </h1>
                <p class="card-text">Jumlah Tingkatan</p>
            </div>
        </div>
    </div>

    <!-- Card Jumlah Jenis Kelamin -->
    <div class="col-md-3">
        <div class="card  text-black shadow-sm" style="background-color: #7FA1C3">
            <div class="card-body">
                <h1 class="card-title">
                    <i class="bi bi-person"></i>
                    <span class="float-end">
                        <?php
                        $jenis_kelamin = mysqli_query($db, "SELECT DISTINCT jk FROM data_anggota");
                        echo mysqli_num_rows($jenis_kelamin);
                        ?>
                    </span>
                </h1>
                <p class="card-text">Jumlah Jenis Kelamin</p>
            </div>
        </div>
    </div>
    <!-- Card Jumlah Total Siswa -->
    <div class="col-md-3">
        <div class="card  text-black shadow-sm" style="background-color: #C0D6E8">
            <div class="card-body">
                <h1 class="card-title">
                    <i class="bi bi-people"></i>
                    <span class="float-end">
                        <?php
                        $total_siswa = mysqli_query($db, "SELECT * FROM data_anggota");
                        echo mysqli_num_rows($total_siswa);
                        ?>
                    </span>
                </h1>
                <p class="card-text">Jumlah Total Siswa</p>
            </div>
        </div>
    </div>
</div>
    <div style="width: 800px; margin: 20px auto;">
        <canvas id="myChart"></canvas> <!-- Elemen canvas untuk Chart.js -->
    </div>

    <br/><br/>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $data = mysqli_query($db, "SELECT * FROM data_anggota");
            while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['jk']; ?></td>
                    <td><?php echo $d['kelas']; ?></td>
                    <td><?php echo $d['jurusan']; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <script>
    // Ambil context dari canvas
    var ctx = document.getElementById("myChart").getContext('2d');

    // Buat objek chart baru
    var myChart = new Chart(ctx, {
        type: 'bar', // Tipe chart: Bar chart
        data: {
            labels: ["Kelas X", "Kelas XI", "Kelas XII"], // Label untuk sumbu X
            datasets: [{
                label: 'Laki-laki',
                data: [
                    <?php
                    $jumlah_laki_x = mysqli_query($db, "SELECT * FROM data_anggota WHERE jk='laki-laki' AND kelas='X'");
                    echo mysqli_num_rows($jumlah_laki_x);
                    ?>,
                    <?php
                    $jumlah_laki_xi = mysqli_query($db, "SELECT * FROM data_anggota WHERE jk='laki-laki' AND kelas='XI'");
                    echo mysqli_num_rows($jumlah_laki_xi);
                    ?>,
                    <?php
                    $jumlah_laki_xii = mysqli_query($db, "SELECT * FROM data_anggota WHERE jk='laki-laki' AND kelas='XII'");
                    echo mysqli_num_rows($jumlah_laki_xii);
                    ?>
                ],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }, {
                label: 'Perempuan',
                data: [
                    <?php
                    $jumlah_perempuan_x = mysqli_query($db, "SELECT * FROM data_anggota WHERE jk='perempuan' AND kelas='X'");
                    echo mysqli_num_rows($jumlah_perempuan_x);
                    ?>,
                    <?php
                    $jumlah_perempuan_xi = mysqli_query($db, "SELECT * FROM data_anggota WHERE jk='perempuan' AND kelas='XI'");
                    echo mysqli_num_rows($jumlah_perempuan_xi);
                    ?>,
                    <?php
                    $jumlah_perempuan_xii = mysqli_query($db, "SELECT * FROM data_anggota WHERE jk='perempuan' AND kelas='XII'");
                    echo mysqli_num_rows($jumlah_perempuan_xii);
                    ?>
                ],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</body>
<?php include 'layout/footer.php'; ?>
