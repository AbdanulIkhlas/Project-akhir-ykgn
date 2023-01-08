<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belum_login");
}

include "database.php";

$user = $_SESSION['username'];
$id_pertandingan = $_GET['id'];
$query_biodata = mysqli_query($konek, "SELECT * FROM biodata WHERE username = '$user'");
$data = mysqli_fetch_array($query_biodata);

$id_biodata = $data['id_biodata'];

$query = mysqli_query($konek, "INSERT INTO diikuti VALUES
        ( '', '$id_pertandingan', '$id_biodata')")
    or die(mysqli_error($konek));

if ($query) {
    header("location:beranda_afterlogin.php?pesan=join_berhasil");
} else {
    header("location:beranda_afterlogin.php?pesan=join_gagal");
}
