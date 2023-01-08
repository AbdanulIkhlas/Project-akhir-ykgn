<!-- 

    Nama  : Muhammad Riyadhy
    NIM   : 123210002

    Nama  : Muhammad Abdanul Ikhlas
    NIM   : 123210009
    
    kelas : IF-C

-->
<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ya Kali Gak Nobar</title>
    <link rel="shortcut icon" href="IMG/titleicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/akun.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css" />
</head>

<body>
    <header>
        <div class="navbar-menu cf">
            <div class="logo">
                <a href="beranda_afterlogin.php">
                    <img src="IMG/Newlogo.png" alt="YKGN">
                </a>
            </div>
            <?php
            include 'database.php';
            $user = $_SESSION['username'];
            $query = mysqli_query($konek, "select * from biodata where username = '$user'");
            $data = mysqli_fetch_array($query);
            $username_capital = strtoupper($data['username']);
            ?>
            <div class="menu">
                <a href="beranda_afterlogin.php">BERANDA</a>
                <a href="pertandingan_AL.php">PERTANDINGAN</a>
                <a href="buat_agenda.php">BUAT</a>
                <a href="">|</a>
                <a href="akun.php">
                    AKUN
                </a>
                <a href="">/</a>
                <a href="logout.php">KELUAR</a>
                <div class="hover-akun">
                    <p><?php echo $username_capital ?></p>
                </div>
            </div>
        </div>
    </header>
    <section>
        <?php
        if (isset($_GET['pesan'])) { ?>
            <div class="notif">
                <?php
                if ($_GET['pesan'] == "hapusberhasil") {
                ?>
                    <p>BERHASIL MENGHAPUS AGENDA NOBAR</p>
                <?php
                } else if ($_GET['pesan'] == "hapusgagal") {
                ?>
                    <p> GAGAL MENGHAPUS AGENDA NOBAR</p>
                <?php
                } else if ($_GET['pesan'] == "bataljoin") {
                ?>
                    <p> MEMBATALKAN JOIN NOBAR</p>
                <?php } else if ($_GET['pesan'] == "bataljoingagal") { ?>
                    <p> GAGAL MEMBATALKAN JOIN NOBAR</p>
                <?php } else if ($_GET['pesan'] == "edit_agenda_berhasil") { ?>
                    <p>BERHASIL EDIT AGENDA</p>
                <?php } else if ($_GET['pesan'] == "edit_agenda_gagal") { ?>
                    <p> GAGAL EDIT AGENDA</p>
                <?php } else if ($_GET['pesan'] == "edit_biodata_berhasil") { ?>
                    <p> BERHASIL EDIT BIODATA</p>
                <?php } else if ($_GET['pesan'] == "edit_biodata_gagal") { ?>
                    <p> GAGAL EDIT BIODATA</p>
                <?php } ?>
                <div class="close">
                    <a href="akun.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                        </svg>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="content">
            <div class="kotak">
                <div class="kotak-header cf">
                    <h1>BIODATA</h1>
                    <a href="edit_biodata.php">
                        <button type="button" class="button-edit-biodata">EDIT BIODATA</button>
                    </a>
                </div>
                <?php
                $query = mysqli_query($konek, "SELECT * FROM biodata WHERE username = '$user'");
                $data = mysqli_fetch_array($query);
                ?>
                <div class="kotak-isi">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6">
                                <div class="row mb-3">
                                    <div class="col-sm-2">Nama</div>
                                    <div class="col-sm-1">:</div>
                                    <div class="col-sm-9 ">
                                        <div class="isi-data">
                                            <?php echo $data['nama'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row mb-3">
                                    <div class="col-sm-4">Jenis kelamin</div>
                                    <div class="col-sm-1">:</div>
                                    <div class="col-sm-7 ">
                                        <div class="isi-data">
                                            <?php echo $data['jenis_kelamin'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row mb-3">
                                    <div class="col-sm-2">Alamat</div>
                                    <div class="col-sm-1">:</div>
                                    <div class="col-sm-9 ">
                                        <div class="isi-data">
                                            <?php echo $data['alamat'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row mb-3">
                                    <div class="col-sm-4">No. HP</div>
                                    <div class="col-sm-1">:</div>
                                    <div class="col-sm-7 ">
                                        <div class="isi-data">
                                            <?php echo $data['no_hp'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="diselenggarakan-header">
                    <h1>YANG DISELENGGARAKAN</h1>
                </div>
                <div class="diselenggarakan-isi">
                    <div class="kotak-body">
                        <table id="productSizes" class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">BERLANGSUNG</th>
                                    <th scope="col">WAKTU</th>
                                    <th scope="col">TEMPAT</th>
                                    <th scope="col">LOKASI</th>
                                    <th scope="col">HARGA</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($konek, "SELECT * FROM pertandingan INNER JOIN biodata USING(id_biodata) WHERE username = '$user' ORDER BY tanggal,jam ");
                                while ($data = mysqli_fetch_array($query)) :
                                ?>
                                    <tr>
                                        <td class="align-middle">
                                            <div class="berlangsung">
                                                <div class="bendera">
                                                    <img src="IMG/BENDERA/<?php echo $data['home']; ?>.jpg" alt="<?php echo $data['home'] ?>">
                                                    <p> <?php echo $data['home']; ?> </p>
                                                </div>
                                                <div class="vs">
                                                    <p>VS</p>
                                                </div>
                                                <div class="bendera">
                                                    <img src="IMG/BENDERA/<?php echo $data['away']; ?>.jpg" alt="<?php echo $data['away'] ?>">
                                                    <p> <?php echo $data['away']; ?> </p>
                                                </div>
                                            </div>
                                        </td>
                                        <?php $data['tanggal'] = formatTanggal($data['tanggal']); ?>
                                        <td class="align-middle">
                                            <div class="tanggal">
                                                <?php echo $data['tanggal']; ?> <br> <?php echo $data['jam']; ?> WIB
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="tempat">
                                                <?php echo $data['tempat']; ?>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="<?php echo $data['lokasi']; ?>" target="blank">
                                                <div class="lokasi">
                                                    <p>
                                                        LOKASI
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                                            </svg>
                                                        </span>
                                                    </p>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <div class="harga">
                                                <?php
                                                if ($data['harga'] == 0) {
                                                    echo  "FREE";
                                                } else {
                                                    echo "Rp " . $data['harga'];
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td class="align-middle status">
                                            <div class="centering">
                                                <?php
                                                if ($data['status'] == 'SEGERA') {
                                                ?>
                                                    <div class="status-segera">
                                                        <p>SEGERA</p>
                                                    </div>
                                                <?php
                                                } else if ($data['status'] == 'SELESAI') {
                                                ?>
                                                    <div class="status-selesai">
                                                        <p>SELESAI</p>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="status-batal">
                                                        <p>DIBATALKAN</p>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="aksi">
                                                <a href="edit_agenda.php?id=<?php echo $data['id']; ?>">
                                                    <div class="edit-agenda">
                                                        <p>EDIT</p>
                                                    </div>
                                                </a>
                                                <a href="notif_hapus_agenda.php?id=<?php echo $data['id']; ?>">
                                                    <div class="hapus-agenda">
                                                        <p>HAPUS</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="diselenggarakan-header">
                    <h1>YANG DIIKUTI</h1>
                </div>
                <div class="diselenggarakan-isi">
                    <div class="kotak-body">
                        <table id="productSizes" class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">BERLANGSUNG</th>
                                    <th scope="col">WAKTU</th>
                                    <th scope="col">TEMPAT</th>
                                    <th scope="col">LOKASI</th>
                                    <th scope="col">HARGA</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($konek, "SELECT * FROM diikuti INNER JOIN biodata b USING(id_biodata) INNER JOIN pertandingan ON id_pertandingan = id WHERE b.username = '$user' ORDER BY tanggal,jam ");
                                while ($data = mysqli_fetch_array($query)) :
                                ?>
                                    <tr>
                                        <td class="align-middle">
                                            <div class="berlangsung">
                                                <div class="bendera">
                                                    <img src="IMG/BENDERA/<?php echo $data['home']; ?>.jpg" alt="<?php echo $data['home'] ?>">
                                                    <p> <?php echo $data['home']; ?> </p>
                                                </div>
                                                <div class="vs">
                                                    <p>VS</p>
                                                </div>
                                                <div class="bendera">
                                                    <img src="IMG/BENDERA/<?php echo $data['away']; ?>.jpg" alt="<?php echo $data['away'] ?>">
                                                    <p> <?php echo $data['away']; ?> </p>
                                                </div>
                                            </div>
                                        </td>
                                        <?php $data['tanggal'] = formatTanggal($data['tanggal']); ?>
                                        <td class="align-middle">
                                            <div class="tanggal">
                                                <?php echo $data['tanggal']; ?> <br> <?php echo $data['jam']; ?> WIB
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="tempat">
                                                <?php echo $data['tempat']; ?>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="<?php echo $data['lokasi']; ?>" target="blank">
                                                <div class="lokasi">
                                                    <p>
                                                        LOKASI
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                                            </svg>
                                                        </span>
                                                    </p>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <div class="harga">
                                                <?php
                                                if ($data['harga'] == 0) {
                                                    echo  "FREE";
                                                } else {
                                                    echo "Rp " . $data['harga'];
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td class="align-middle status">
                                            <div class="centering">
                                                <?php
                                                if ($data['status'] == 'SEGERA') {
                                                ?>
                                                    <div class="status-segera">
                                                        <p>SEGERA</p>
                                                    </div>
                                                <?php
                                                } else if ($data['status'] == 'SELESAI') {
                                                ?>
                                                    <div class="status-selesai">
                                                        <p>SELESAI</p>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="status-batal">
                                                        <p>DIBATALKAN</p>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="aksi">
                                                <a href="cetak_agenda.php?id=<?php echo $data['id']; ?>">
                                                    <div class="cetak-agenda">
                                                        <p>CETAK</p>
                                                    </div>
                                                </a>
                                                <a href="notif_batal_agenda.php?id_diikuti=<?php echo $data['id_diikuti']; ?>">
                                                    <div class="batal-agenda">
                                                        <p>BATAL</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-main cf">
            <div class="copyright">
                <p>
                    Copyright <span class="copy-icon">&copy;</span> 2022 &nbsp;&nbsp; |&nbsp;&nbsp; YKGN
                </p>
            </div>
            <?php if (!empty($_SESSION['terkini'])) { ?>
                <div class="lokasi-terkini">
                    <p>LOKASI &nbsp;&nbsp; | &nbsp;&nbsp; <?php echo $_SESSION['terkini'] ?></p>
                </div>
            <?php } ?>
        </div>
    </footer>
</body>

</html>