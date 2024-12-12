<?php
// session_start();
include 'layout/header.php';
// Cek apakah user sudah login
if (!isset($_SESSION["login"])) {
    echo "<script>
        alert('Login dulu');
        document.location.href = 'login.php';
        </script>";
    exit;
}

// Cek apakah level user ada dan apakah user memiliki hak akses
if (!isset($_SESSION["level"]) || ($_SESSION["level"] != 1 && $_SESSION["level"] != 2)) {
   echo "<script>
       alert ('Anda tidak memiliki hak akses');
       document.location.href = 'akun.php';
       </script>";
   exit;
}
?>
<body>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/pmr4.jpeg" class="d-block w-100 carousel-image" alt="gambar osis1">
                <div class="carousel-caption d-none d-md-block">
                    <h2> PMR SMK NEGERI 1 CISARUA</h2>
                    <p>Selamat Datang Di Website Palang Marah Remaja.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/pmr2.jpeg" class="d-block w-100 carousel-image" alt="PMR Image">
                <div class="carousel-caption d-none d-md-block">
                    <h2>PMR SMK NEGERI 1 CISARUA</h2>
                    <p>Pelatihan siswa dalam kesehatan dan kemanusiaan.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/pmr3.jpeg" class="d-block w-100 carousel-image" alt="PMR Logo">
                <div class="carousel-caption d-none d-md-block">
                    <h2>PMR SMK NEGERI 1 CISARUA</h2>
                    <p>Menjadi peneraju dalam menyediakan bantuan kemanusiaan.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<div class="container mt-5">
    <div class="row align-items-center my-4">
        <div class="col-md-7">
        <h1 class="text-danger">Apa itu PMR?</h1>
            <p>
                Palang Merah Remaja (PMR) adalah suatu organisasi kegiatan ekstrakurikuler yang terdapat di banyak sekolah di Indonesia. 
                Organisasi ini merupakan bagian dari Palang Merah Indonesia (PMI) yang bertujuan untuk melatih siswa-siswa dalam bidang kesehatan, 
                kemanusiaan, dan kebencanaan.
            </p>
        </div>
        <div class="col-md-5 text-center">
            <img src="assets/img/pmrc.png" alt="PMR Image" class="img-fluid">
        </div>
    </div>
    <div class="row bg-light py-4 border-danger border-5">
  <div class="col-md-2">
    <img src="assets/img/pmr.png" alt="logo" class="img-fluid">
  </div>
  <div class="col-md-10">
    <h2 class="text-danger">VISI & MISI</h2>
    <p><strong>“Menjadi peneraju dalam menyediakan bantuan kemanusiaan dan pembangunan masyarakat melalui penglibatan belia yang berdaya saing dan berintegriti.”</strong></p>
    <p><strong>“Mendidik dan melibatkan belia dalam aktiviti kemanusiaan, pertolongan cemas, dan pengurusan bencana untuk memupuk semangat sukarela dan tanggungjawab sosial.”</strong></p>
  </div>
</div>
<div class="container text-center mt-5">
    <h1 class="text-danger">PMI SMK NEGERI 1 CISARUA</h1>
    <p>Menjadi organisasi kemanusiaan terdepan yang memberikan layanan berkualitas kepada masyarakat sesuai Prinsip-prinsip Dasar Gerakan Palang Merah dan Bulan Sabit Merah.</p>
    
    <div class="row text-center mt-5">
        <div class="col-md-3">
            <div class="icon-red">
                <!-- Ganti dengan URL gambar atau ikon yang sesuai -->
                <i class="bi bi-award"></i>
            </div>
            <h5 class="mt-3">PROMOSI KEBERSIHAN DAN KESEHATAN</h5>
            <p class="icon-text">Generasi suatu bangsa sangat bergantung pada tersedianya potensi anak bangsa yang akan memainkan peran dalam kehidupan bernegara dan berbangsa.</p>
        </div>
        <div class="col-md-3">
            <div class="icon-red">
                <!-- Ganti dengan URL gambar atau ikon yang sesuai -->
                <i class="bi bi-truck"></i>
            </div>
            <h5 class="mt-3">PELAYANAN PERTOLONGAN PERTAMA</h5>
            <p class="icon-text">Generasi suatu bangsa sangat bergantung pada tersedianya potensi anak bangsa yang akan memainkan peran dalam kehidupan bernegara dan berbangsa.</p>
        </div>
        <div class="col-md-3">
            <div class="icon-red">
                <!-- Ganti dengan URL gambar atau ikon yang sesuai -->
                <i class="bi bi-headset"></i>
            </div>
            <h5 class="mt-3">DUKUNGAN PELAYANAN COVID-19</h5>
            <p class="icon-text">Generasi suatu bangsa sangat bergantung pada tersedianya potensi anak bangsa yang akan memainkan peran dalam kehidupan bernegara dan berbangsa.</p>
        </div>
        <div class="col-md-3">
            <div class="icon-red">
                <!-- Ganti dengan URL gambar atau ikon yang sesuai -->
                <i class="bi bi-star"></i>
            </div>
            <h5 class="mt-3">PENANGGULANGAN BENCANA</h5>
            <p class="icon-text">Generasi suatu bangsa sangat bergantung pada tersedianya potensi anak bangsa yang akan memainkan peran dalam kehidupan bernegara dan berbangsa.</p>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row justify-content-center align-items-center bg-light py-4 rounded">
        <div class="col-md-6 text-center">
            <!-- Gambar yang harus diganti dengan URL gambar asli -->
            <img src="assets/img/pmrr.png" alt="Image"  width="350" height="300">
        </div>
        <div class="col-md-6">
            <h2 class="text-danger">BERSAMA PMR</h2>
            <p>Mari menciptakan dampak positif dan menjadi remaja relawan yang terampil, tetapi juga mempersiapkan mereka untuk menjadi pemimpin masa depan yang penuh empati dan tanggung jawab.</p>
            <a href="#" class="btn btn-outline-danger">Join us</a>
        </div>
    </div>
</div>
</body>
<?php include 'layout/footer.php'; ?>