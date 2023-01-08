<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belum_login");
}
include "database.php";
$id_biodata = $_POST['id_biodata'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];

$query = mysqli_query($konek, "UPDATE biodata SET
        nama='$nama', 
        no_hp='$no_hp',
        alamat='$alamat',
        jenis_kelamin = '$jenis_kelamin' WHERE id_biodata = $id_biodata")
    or die(mysqli_error($konek));

if ($query) {
    header("location:akun.php?pesan=edit_biodata_berhasil");
} else {
    header("location:akun.php?pesan=edit_biodata_gagal");
}
