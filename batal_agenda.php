<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belum_login");
}

include "database.php";
$id_diikuti = $_GET['id_diikuti'];
$query = mysqli_query($konek, " DELETE FROM diikuti where id_diikuti=$id_diikuti");
if ($query) {
    header("location:akun.php?pesan=bataljoin");
} else {
    header("location:akun.php?pesan=bataljoingagal");
}
