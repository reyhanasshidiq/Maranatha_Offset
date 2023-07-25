<?php
// menyertakan file program koneksi.php pada register
require('koneksi.php');
// inisialisasi session
session_start();
$error = '';
$validate = '';

// mengecek apakah session username tersedia atau tidak, jika tersedia maka akan redirect ke halaman index
if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// mengecek apakah form disubmit atau tidak
if (isset($_POST['submit'])) {
    // menghilangkan backslashes
    $username = stripslashes($_POST['username']);
    // cara sederhana mengamankan dari sql injection
    $username = mysqli_real_escape_string($con, $username);
    // menghilangkan backslashes
    $password = stripslashes($_POST['password']);
    // cara sederhana mengamankan dari sql injection
    $password = mysqli_real_escape_string($con, $password);

    // cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
    if (!empty(trim($username)) && !empty(trim($password))) {
        // select data berdasarkan username dari database
        $query = "SELECT * FROM tbl_users WHERE username = '$username'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows != 0) {
            $hash = mysqli_fetch_assoc($result)['password'];
            if (password_verify($password, $hash)) {
                $_SESSION['username'] = $username;

                // Redirect to index.php after successful login
                header('Location: index.php');
                exit();
            } else {
                $error = 'Login Gagal !!';
            }
        } else {
            $error = 'Username tidak terdaftar !!';
        }
    } else {
        $error = 'Data tidak boleh kosong !!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maranata Offset</title>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" href="3_login_page/gaya.css">
</head>

<body>
    <section>
        <div class="imgBox">
            <img src="3_login_page/login.png">
        </div>
        <div class="content">
            <div class="Login">
                <h2>Login Account</h2>
                <form action="login.php" method="post">
                    <?php if ($error != '') { ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                    <div class="input">
                        <div class="icon-container">
                            <img src="img/icon_username.svg" alt="Username icon">
                        </div>
                        <input type="text" name="username" id="username" placeholder="username" required>
                    </div>
                    <div class="input">
                        <div class="icon-container">
                            <img src="3_login_page/icon _lock.png" alt="Lock Icon" id="lock-icon">
                        </div>
                        <input type="password" id="InputPassword" name="password" placeholder="Password" required>
                        <?php if ($validate != '') { ?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php } ?>
                    </div>
                    <div class="submit">
                        <input type="submit" name="submit">
                    </div>
                    <div class="alternative">
                        <p>Atau</p>
                        <button class="Google" href="#">
                            <i class="icon" data-feather="Google"></i> Login dengan Google </button>
                        <button class="Facebook" href="#">
                            <i class="icon" data-feather="Facebook"></i> Login dengan Facebook </button>
                    </div>
                    <div class="input">
                        <p>Belum punya akun ? <a href="sign_up.php">Daftar</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>