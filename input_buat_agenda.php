<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belum_login");
}
include "database.php";
$home = $_POST['home'];
$away = $_POST['away'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$tempat = $_POST['tempat'];
$provinsi = strtoupper($_POST['provinsi']);
$lokasi = $_POST['lokasi'];
$harga = $_POST['harga'];
$status = "SEGERA";

$user = $_SESSION['username'];
$query_biodata = mysqli_query($konek, "SELECT * FROM biodata WHERE username = '$user'");
$data = mysqli_fetch_array($query_biodata);

$id_biodata = $data['id_biodata'];

$query = mysqli_query($konek, "INSERT INTO pertandingan VALUES
        ( '', '$home', '$away', '$tanggal', '$jam', '$tempat','$lokasi' ,'$harga' ,'$status' ,'$id_biodata' ,'$provinsi')")
    or die(mysqli_error($konek));

if ($query) {
    header("location:beranda_afterlogin.php?pesan=edit_agenda_berhasil");
} else {
    header("location:beranda_afterlogin.php?pesan=edit_agenda_gagal");
}
