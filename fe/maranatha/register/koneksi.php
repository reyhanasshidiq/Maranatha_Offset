<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "db_users";

$koneksi = mysqli_connect($host, $user, $pass, $data);
if ($koneksi) {
    $buka = mysqli_select_db($koneksi, $database);
    echo "Database dapat terhubung";
    if (!$buka) {
        echo "Database tidak dapat terhubung";
    }
} else {
    echo "MySQL tidak terhubung";
}

$username = $_POST['username'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$password = $_POST['password'];

// Melakukan query ke database untuk memeriksa apakah data login benar
// $query = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";
$query = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password' AND telephone = '$telephone'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 1) {
    // Jika data cocok, berikan akses ke halaman setelah login
    echo "Login berhasil!";
} else {
    // Jika data tidak cocok, berikan pesan error
    echo "Login gagal. Periksa kembali username dan password Anda.";
}

// Menutup koneksi ke database
mysqli_close($koneksi);

?>