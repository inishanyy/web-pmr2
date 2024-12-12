<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMR SMKN 1 CISARUA</title>
    <link rel="icon" href="assets/img/pmr.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .icon-red {
            color: red;
            font-size: 3rem;
        }
        .icon-text {
            margin-top: 10px;
        }
        /* Aturan untuk gambar di carousel agar responsif dan tidak terlalu besar */
        .carousel-image {
    height: 100%;        /* Memastikan gambar mengisi penuh kontainer */
    max-height: 600px;   /* Membatasi tinggi maksimum gambar */
    object-fit: cover;   /* Memastikan gambar tidak terdistorsi, mengisi penuh kontainer */
    width: 100%;         /* Memastikan gambar selalu selebar kontainer */
    padding-top: 10px;   /* Menambahkan sedikit padding di atas untuk proporsi */
    padding-bottom: 10px; /* Menambahkan sedikit padding di bawah untuk proporsi */
}

@media (max-width: 800px) {
    .carousel-image {
        max-height: 400px; /* Membatasi tinggi gambar pada 300px untuk layar kecil */
        padding-top: 5px;   /* Padding kecil untuk layar kecil */
        padding-bottom: 5px;
    }
}

@media (min-width: 992px) {
    .carousel-image {
        max-height: 700px;  /* Membatasi tinggi gambar pada 500px untuk layar besar */
        padding-top: 15px;   /* Tambahkan sedikit ruang di atas dan bawah */
        padding-bottom: 15px;
    }
}

    </style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container ">
        <a class="navbar-brand" href="#">
            <img src="assets/img/pmrlogo.png" alt="logo" width="120" height="75">
            <img src="assets/img/logosmk.png" alt="logo" width="80" height="75"> 
            SMK NEGERI 1 CISARUA
        </a>
        <!-- Button for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-database"></i> Data
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="data-anggota.php"><i class="fas fa-users"></i> Data Anggota</a></li>
                        <li><a class="dropdown-item" href="data-kepengurusan.php"><i class="fas fa-user-tie"></i> Data Kepengurusan</a></li>
                        <li><a class="dropdown-item" href="data-kegiatan.php"><i class="fas fa-calendar-alt"></i> Data Kegiatan</a></li>
                        <li><a class="dropdown-item" href="data-kompetisi.php"><i class="fas fa-sitemap"></i> Data Kompetisi</a></li>
                        <li><a class="dropdown-item" href="data-grafik.php"><i class="fas fa-chart-bar"></i> Data Grafik</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="profil.php"><i class="fas fa-user"></i> Profil </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="activity.php"><i class="fas fa-image"></i> Activity
                    </a>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="akun.php"><i class="bi bi-person-circle"></i></i>  Akun </a>
                </li>
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout
                       </a>
                     </li>
                </li>
            </ul>
        </div>
    </div>
</nav>
</head>