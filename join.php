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
    <link rel="stylesheet" href="CSS/join.css">
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
            <h1>NOBAR KUYYY</h1>
            <div class="kotak container-fluid ">
                <?php
                $id = $_GET['id'];
                $query = mysqli_query($konek, "SELECT * FROM pertandingan INNER JOIN biodata USING(id_biodata) WHERE id = '$id'");
                $data = mysqli_fetch_array($query);
                ?>
                <div class="row mb-4">
                    <div class="col-3">NAMA</div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <div class="isi-kotak">
                            <?php echo $data['nama'] ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3 label">PERTANDINGAN</div>
                    <div class="col-1 label">:</div>
                    <div class="col-8">
                        <div class="pertandingan">
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
                    </div>
                </div>
                <div class="row mb-4">
                    <?php $data['tanggal'] = formatTanggal($data['tanggal']); ?>
                    <div class="col-3">TANGGAL</div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <div class="isi-kotak">
                            <?php echo $data['tanggal']; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3">JAM</div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <div class="isi-kotak">
                            <?php echo $data['jam']; ?> WIB
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-3">TEMPAT</div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <div class="isi-kotak">
                            <?php echo $data['tempat']; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-3">HARGA</div>
                    <div class="col-1">:</div>
                    <div class="col-8">
                        <div class="isi-kotak">
                            <?php
                            if ($data['harga'] == 0) {
                                echo  "FREE";
                            } else {
                                echo "Rp " . $data['harga'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"></div>
                    <div class="col-8">
                        <a href="input_join.php?id=<?php echo $data['id']; ?>">
                            <button type="button" class="button-join">JOIN</button>
                        </a>
                        <a href="pertandingan_AL.php?">
                            <button type="button" class="button-back">BACK</button>
                        </a>
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