<?php
include "database.php";
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

$query = mysqli_query($konek, "SELECT * FROM biodata where username = '$username'");
if (mysqli_fetch_assoc($query)) {
    return header("location:daftar.php?pesan=UsernameSama");
}

if ($password != $repassword) {
    return header("location:daftar.php?pesan=PasswordBeda");
}

$query = mysqli_query($konek, "INSERT INTO biodata VALUES
    ('','$nama','$no_hp','$alamat','$jenis_kelamin','$username','$password')
    ") or die(mysqli_error($konek));

if ($query) {
    header("location:masuk.php?pesan=RegistBerhasil");
} else {
    header("location:daftar.php?pesan=RegistGagal");
}
