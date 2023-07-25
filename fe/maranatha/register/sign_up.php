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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="imgBox">
            <img src="img/New Ilustrasi SignUp.svg">
        </div>
        <div class="content">
            <div class="Login">
                <h2>Create Account</h2>
                <form action="koneksi.php" method="POST">
                    <!--! Username -->
                    <div class="input">
                        <div class="icon-container">
                            <img src="img/icon_username.svg" alt="E-mail icon">
                        </div>
                        <input type="text" name="username" placeholder="username" required>
                    </div>

                    <!-- ! E-mail -->
                    <div class="input">
                        <div class="icon-container">
                            <img src="img/icon-email.svg" alt="Lock Icon" id="email-icon">
                        </div>
                        <input type="text" name="email" placeholder="email" required>
                    </div>

                    <!-- ! Telephone -->
                    <div class="input">
                        <div class="icon-container">
                            <img src="img/icon_telephone.svg" alt="Lock Icon" id="lock-icon">
                        </div>
                        <input type="text" name="telephone" placeholder="telephone" required>
                    </div>

                    <!-- ! Password -->
                    <div class="input">
                        <div class="icon-container">
                            <img src="img/icon _lock.png" alt="Lock Icon" id="lock-icon">
                        </div>
                        <input type="password" name="password" placeholder="password" required>
                    </div>


                    <div class="submit">
                        <input type="submit" value="Sign Up" name="">
                    </div>
                    <div class="alternative">
                        <p>Atau</p>
                        <button class="Google" href="#">
                            <i class="icon" data-feather="Google"></i> Login dengan Google </button>
                        <button class="Facebook" href="#">
                            <i class="icon" data-feather="Facebook"></i> Login dengan Facebook </button>
                    </div>
                    
                    <div class="input">
                        <p>Sudah punya akun ? <a href="../3_login_page/login.html">Log In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>