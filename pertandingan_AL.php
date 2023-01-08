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
    <link rel="stylesheet" href="CSS/pertandingan_AL.css">
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
                <a href="akun.php">AKUN</a>
                <a href="">/</a>
                <a href="logout.php">KELUAR</a>
                <div class="hover-akun">
                    <p><?php echo $username_capital ?></p>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="content">
            <h1>PERTANDINGAN</h1>
            <div class="provinsi">
                <div class="kotak-provinsi">
                    <div class="input-group mb-3 kotak-provinsi">
                        <form action="" id="select" method="post">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">LOKASI</label>
                                <select name="select" class="form-select" id="inputGroupSelect01" onchange="this.form.submit()">
                                    <?php
                                    $query = mysqli_query($konek, "SELECT DISTINCT provinsi FROM pertandingan");
                                    if (empty($_SESSION['terkini'])) {
                                    ?> <option>PILIH LOKASI</option>
                                    <?php
                                    } else {
                                    ?> <option selected disabled><?php echo $_SESSION['terkini']; ?></option>
                                    <?php
                                    }
                                    while ($lokasi = mysqli_fetch_array($query)) :
                                    ?>
                                        <option value="<?php echo $lokasi['provinsi']; ?>" <?php
                                                                                            if (isset($_POST['select'])) {
                                                                                                if ($_POST['select'] == $lokasi['provinsi']) {
                                                                                                    echo "selected";
                                                                                                    $_SESSION['terkini'] = $lokasi['provinsi'];
                                                                                                }
                                                                                            }
                                                                                            ?>>
                                            <?php echo $lokasi['provinsi']; ?> </option>
                                    <?php
                                    endwhile;
                                    ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="kotak-judul">
                <div class="judul">
                    <a href="#">BERLANGSUNG</a>
                    <a href="#">WAKTU</a>
                    <a href="#">TEMPAT</a>
                    <a href="#">LOKASI</a>
                    <a href="#">HARGA</a>
                    <a href="#">STATUS</a>
                </div>
            </div>
            <div class="kotak-body container-fluid">
                <?php if (!(empty($_SESSION['terkini']))) { ?>
                    <table id="productSizes" class="table">
                        <tbody>
                            <?php
                            $target = $_SESSION['terkini'];
                            $query = mysqli_query($konek, "SELECT * FROM pertandingan WHERE provinsi = '$target' ORDER BY tanggal,jam ");
                            while ($data = mysqli_fetch_array($query)) :
                            ?>
                                <tr>
                                    <td colspan="2" class="col-4 align-middle">
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
                                    <td class="col-2 align-middle">
                                        <div class="tanggal">
                                            <?php echo $data['tanggal']; ?> <br> <?php echo $data['jam']; ?> WIB
                                        </div>
                                    </td>
                                    <td class="col-3 align-middle">
                                        <div class="tempat">
                                            <?php echo $data['tempat']; ?>
                                        </div>
                                    </td>
                                    <td class="col-1 align-middle">
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
                                    <td class="col-1 align-middle">
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
                                    <td class="col-1 align-middle status">
                                        <div class="centering">
                                            <?php if ($data['status'] == 'SEGERA') { ?>
                                                <a href="join.php?id=<?php echo $data['id']; ?>">
                                                <?php } ?>
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
                                                </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                <?php } ?>
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