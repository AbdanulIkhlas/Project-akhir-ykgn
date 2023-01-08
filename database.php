<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "ykgn";

$konek = new mysqli($hostname, $username, $password, $database);

if ($konek->connect_error) {
    die('Maaf koneksi gagal: ' . $konek->connect_error);
}

function formatTanggal($date) // Mengubah format tanggal
{
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
    return $datetime->format('d-m-Y');
}
