<?php session_start(); ?>

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

    <!-- Style -->
    <link rel="stylesheet" href="css/gaya.css">
</head>
<body>
<?php
include("koneksi.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

    if($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("Could not execute the select query.");
		
        $row = mysqli_fetch_assoc($result);
		
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        }

        if(isset($_SESSION['valid'])) {
            header('Location: index.php');			
        }
    }
} else {
?>
    <section>
        <div class="imgBox">
            <img src="img/login.png">
        </div>

        <div class="content">
            <div class="Login">
                <h2>Login Account</h2>
                <form method="POST" action="">
                    <div class="input">
                        <div class="icon-container">
                            <img src="img/icon _mail_.png" alt="E-mail icon">
                        </div>
                        <input type="text" name="username" placeholder="E-mail" required>
                    </div>
                    <div class="input">
                        <div class="icon-container">
                            <img src="img/icon _lock.png" alt="Lock Icon" id="lock-icon">
                        </div>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="submit">
                        <input type="submit" value="Log In" name="proses_login">
                    </div>
                    <div class="alternative">
                        <p>Atau</p>
                        <button class="Google" href="#">
                            <i class="icon" data-feather="Google"></i> Login dengan Google </button>
                        <button class="Facebook" href="#">
                            <i class="icon" data-feather="Facebook"></i> Login dengan Facebook </button>
                    </div>
                    <div class="input">
                        <p>Belum punya akun ? <a href="#">Daftar</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
<?php
}
?>