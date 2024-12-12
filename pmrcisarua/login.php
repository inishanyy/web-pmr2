<?php
session_start();
include 'config/app.php';

// cek apakah tombol login sudah ditekan
if (isset($_POST['login'])) {
    // ambil input username dan password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifikasi reCAPTCHA
    $secret_key = "6LdivXYqAAAAAPr7f2yN0ziBXu53lmKwESqHcNj7";
    $verifikasi = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response']);
    $response = json_decode($verifikasi);

    // Cek apakah reCAPTCHA berhasil diverifikasi
    if (isset($response->success) && $response->success) {
        // menggunakan prepared statements untuk mencegah SQL Injection
        $stmt = mysqli_prepare($db, "SELECT * FROM akun WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // jika ada usernya
        if (mysqli_num_rows($result) == 1) {
            $hasil = mysqli_fetch_assoc($result);

            // cek passwordnya
            if (password_verify($password, $hasil['password'])) {
                // set session
                $_SESSION['login'] = true;
                $_SESSION['id_akun'] = $hasil['id_akun'];
                $_SESSION['nama'] = $hasil['nama'];
                $_SESSION['username'] = $hasil['username'];
                $_SESSION['email'] = $hasil['email'];
                $_SESSION['level'] = $hasil['level'];

                // jika login benar arahkan ke file index.php
                header("Location: index.php");
                exit;
            } else {
                $error = true;
            }
        } else {
            $error = true;
        }
    } else {
        $captcha_error = "Verifikasi reCAPTCHA gagal. Silakan coba lagi.";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login · PMR SMKN 1 Cisarua</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Favicons -->
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#ED3EF7">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;      
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .login-page {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #FBFBFB;
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <div class="text-center">
            <img class="mb-4" src="assets/img/pmr.png" alt="" width="100" height="100">
        </div>
    </div>
    <!-- /.login logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Selamat datang, Silahkan login</p>

            <!-- Tampilkan pesan error jika login gagal -->
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger text-center">
                    <b>Username atau Password salah</b>
                </div>
            <?php endif; ?>

            <!-- Tampilkan pesan error jika reCAPTCHA gagal -->
            <?php if (isset($captcha_error)) : ?>
                <div class="alert alert-danger text-center">
                    <b><?php echo $captcha_error; ?></b>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username" required>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="mb-3">
                    <div class="g-recaptcha" data-sitekey="6LdivXYqAAAAAOt9nciojAQVmhVY5Qh2u0Pnobm8"></div>
                </div>
                <button class="w-100 btn btn-lg btn-danger" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>