<?php
session_start();
$konek = new mysqli('localhost', 'root', '', 'ykgn');

$username = $_POST['username'];
$password = $_POST['password'];


$data = mysqli_query($konek, "select * from biodata where
    username = BINARY'$username' and password=BINARY'$password'") or die(mysqli_error($konek));
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:beranda_afterlogin.php");
} else {
    header("location:masuk.php?pesan=gagal");
}
