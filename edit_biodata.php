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
    <link rel="stylesheet" href="CSS/edit_biodata.css">
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
            <h1>EDIT BIODATA</h1>
            <div class="kotak">
                <?php
                $query = mysqli_query($konek, "SELECT * FROM biodata WHERE username = '$user'");
                $data = mysqli_fetch_array($query);
                ?>
                <form action="update_biodata.php" method="POST">
                    <input name="id_biodata" class="form-control form-control-sm" type="hidden" value="<?php echo $data['id_biodata']; ?>">
                    <div class="container-flui">
                        <div class="row mb-3">
                            <div class="col-3 g-md-2 ">Nama</div>
                            <div class="col-1 g-md-2">:</div>
                            <div class="col-8">
                                <input name="nama" class="form-control form-control-sm" type="text" value="<?php echo $data['nama']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 g-md-2">No. HP</div>
                            <div class="col-1 g-md-2">:</div>
                            <div class="col-8">
                                <input name="no_hp" class="form-control form-control-sm" type="text" value="<?php echo $data['no_hp']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 g-md-2">Jenis Kelamin</div>
                            <div class="col-1 g-md-2">:</div>
                            <div class="col-8">
                                <?php
                                if ($data['jenis_kelamin'] == 'Perempuan') {
                                ?>
                                    <input type="radio" class="btn-check" name="jenis_kelamin" id="laki" value="Laki-Laki">
                                    <label class="btn btn-success tes laki" for="laki">Laki-Laki</label>
                                    <input type="radio" class="btn-check" name="jenis_kelamin" id="perempuan" value="Perempuan" checked="checked">
                                    <label class="btn btn-success tes perempuan" for="perempuan">Perempuan</label>
                                <?php } else { ?>
                                    <input type="radio" class="btn-check" name="jenis_kelamin" id="laki" value="Laki-Laki" checked="checked">
                                    <label class="btn btn-success tes laki" for="laki">Laki-Laki</label>
                                    <input type="radio" class="btn-check" name="jenis_kelamin" id="perempuan" value="Perempuan">
                                    <label class="btn btn-success tes perempuan" for="perempuan">Perempuan</label>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3 g-md-2">Alamat</div>
                            <div class="col-1 g-md-2">:</div>
                            <div class="col-8">
                                <input name="alamat" class="form-control form-control-sm" type="text" value="<?php echo $data['alamat']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <button type="submit" class="button-ubah">UBAH</button>
                            </div>
                        </div>
                    </div>
                </form>

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