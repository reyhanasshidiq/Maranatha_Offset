<?php
$host     = 'localhost';
$user     = 'root'; // diisi dengan user database kalian biasanya
// defaultnya bernama root jika kita belum 
// merubahnya
$password = '';  //diisi dengan password database kalian biasanya
// defaultnya kosong
$db       = 'db_user'; //diisi dengan nama database kalian

$con = new mysqli($host, $user, $password, $db);
if ($con->errno) {
    echo $con->error;
    exit;
}
