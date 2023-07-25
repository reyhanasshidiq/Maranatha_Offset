<?php
require('koneksi.php');
session_start();

$error = '';
$validate = '';

// If the user is already logged in, redirect to login.php
if (isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $repass = $_POST['repassword'];

    if (!empty($name) && !empty($username) && !empty($email) && !empty($password) && !empty($repass)) {
        if ($password === $repass) {
            if (cek_nama($username, $con) == 0) {
                $pass = password_hash($password, PASSWORD_BCRYPT);

                // Using prepared statement to prevent SQL injection
                $query = "INSERT INTO tbl_users (name, username, email, password) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $pass);

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_close($stmt); // Close the prepared statement
                    mysqli_close($con); // Close the database connection
                    header('Location: login.php'); // Redirect to login page after successful registration
                    exit();
                } else {
                    $error = 'Register User Gagal !!';
                }
            } else {
                $error = 'Username sudah terdaftar !!';
            }
        } else {
            $validate = 'Password tidak sama !!';
        }
    } else {
        $error = 'Data tidak boleh kosong !!';
    }
}

function cek_nama($username, $con)
{
    $nama = mysqli_real_escape_string($con, $username);
    $query = "SELECT * FROM tbl_users WHERE username = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $nama);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    return mysqli_stmt_num_rows($stmt);
}
?>
<!-- ... Rest of your HTML code ... -->
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" href="2_signup_page/style.css">
</head>

<body>
    <section>
        <div class="imgBox">
            <img src="img/New Ilustrasi SignUp.svg">
        </div>
        <div class="content">
            <div class="Login">
                <h2>Create Account</h2>
                <form action="sign_up.php" method="POST">
                    <?php if ($error != '') { ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>

                    <!-- Name -->
                    <div class="input">
                        <div class="icon-container">
                            <!-- <img src="img/icon_username.svg" alt="Name icon"> -->
                        </div>
                        <input type="text" name="name" id="name" placeholder="Name" required>
                    </div>

                    <!-- Username -->
                    <div class="input">
                        <div class="icon-container">
                            <!-- <img src="img/icon_username.svg" alt="Username icon"> -->
                        </div>
                        <input type="text" name="username" id="username" placeholder="Username" required>
                    </div>

                    <!-- E-mail -->
                    <div class="input">
                        <div class="icon-container">
                            <!-- <img src="img/icon-email.svg" alt="E-mail Icon" id="email-icon"> -->
                        </div>
                        <input type="email" name="email" id="InputEmail" placeholder="E-mail" required>
                    </div>

                    <!-- Password -->
                    <div class="input">
                        <div class="icon-container">
                            <!-- <img src="img/icon_lock.png" alt="Lock Icon" id="lock-icon"> -->
                        </div>
                        <input type="password" name="password" id="InputPassword" placeholder="Password" required>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="input">
                        <div class="icon-container">
                            <!-- <img src="img/icon_lock.png" alt="Lock Icon" id="lock-icon"> -->
                        </div>
                        <input type="password" name="repassword" id="InputRePassword" placeholder="Confirm Password"
                            required>
                        <?php if ($validate != '') { ?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php } ?>
                    </div>

                    <div class="submit">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                    <div class="alternative">
                        <p>Or</p>
                        <button class="Google" href="#">
                            <i class="icon" data-feather="Google"></i> Login with Google
                        </button>
                        <button class="Facebook" href="#">
                            <i class="icon" data-feather="Facebook"></i> Login with Facebook
                        </button>
                    </div>

                    <div class="input">
                        <p>Already have an account? <a href="login.php">Log In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Bootstrap requirement jQuery at the beginning, then Popper.js, and finally Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>