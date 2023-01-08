<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belum_login");
}

include "database.php";
$id = $_GET['id'];
$query = mysqli_query($konek, " DELETE FROM pertandingan where id=$id");
if ($query) {
    header("location:akun.php?pesan=hapusberhasil");
} else {
    header("location:akun.php?pesan=hapusgagal");
}
