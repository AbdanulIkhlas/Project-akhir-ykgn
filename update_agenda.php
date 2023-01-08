<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belum_login");
}

include "database.php";
$id = $_POST['id'];
$home = $_POST['home'];
$away = $_POST['away'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$tempat = $_POST['tempat'];
$provinsi = strtoupper($_POST['provinsi']);
$lokasi = $_POST['lokasi'];
$harga = $_POST['harga'];
$status = $_POST['status'];

$user = $_SESSION['username'];
$query_biodata = mysqli_query($konek, "SELECT * FROM biodata WHERE username = '$user'");
$data = mysqli_fetch_array($query_biodata);

$id_biodata = $data['id_biodata'];
$query = mysqli_query($konek, "UPDATE pertandingan SET
        home='$home', 
        away='$away', 
        tanggal='$tanggal', 
        jam='$jam', 
        tempat='$tempat', 
        lokasi='$lokasi', 
        harga='$harga', 
        status='$status', 
        id_biodata='$id_biodata', 
        provinsi='$provinsi' WHERE id = $id")
    or die(mysqli_error($konek));

if ($query) {
    header("location:akun.php?pesan=edit_agenda_berhasil");
} else {
    header("location:akun.php?pesan=edit_agenda_gagal");
}
