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
    <link rel="stylesheet" href="CSS/edit_agenda.css">
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
            <?php
            $id = $_GET['id'];
            $query = mysqli_query($konek, "SELECT * FROM pertandingan WHERE id = '$id'");
            $data = mysqli_fetch_array($query);
            ?>
            <h1>EDIT AGENDA NOBAR</h1>
            <div class="kotak">
                <form action="update_agenda.php" method="POST">
                    <input name="id" value="<?php echo $data['id']; ?> " type="hidden">
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col-2 pilih-tim">
                                PILIH TIM
                            </div>
                            <div class="col-sm-1">:</div>
                            <div class="col-4">
                                <select name="home" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected><?php echo $data['home']; ?></option>
                                    <option value="AMERIKA">Amerika</option>
                                    <option value="ARAB">Arab</option>
                                    <option value="ARGENTINA">Argentina</option>
                                    <option value="AUSTRALIA">Australia</option>
                                    <option value="BELANDA">Belanda</option>
                                    <option value="BELGIA">Belgia</option>
                                    <option value="BRAZIL">Brazil</option>
                                    <option value="DENMARK">Denmark</option>
                                    <option value="EKUADOR">Ekuador</option>
                                    <option value="GHANA">Ghana</option>
                                    <option value="INGGRIS">Inggris</option>
                                    <option value="IRAN">Iran</option>
                                    <option value="JEPANG">Jepang</option>
                                    <option value="JERMAN">Jerman</option>
                                    <option value="KAMERUN">Kamerun</option>
                                    <option value="KANADA">Kanada</option>
                                    <option value="KOREA">Korea Selatan</option>
                                    <option value="KOSTARIKA">Kosta Rika</option>
                                    <option value="KROASIA">Kroasia</option>
                                    <option value="MEKSIKO">Meksiko</option>
                                    <option value="MOROKO">Moroko</option>
                                    <option value="PERANCIS">Perancis</option>
                                    <option value="POLANDIA">Polandia</option>
                                    <option value="PORTUGAL">Portugal</option>
                                    <option value="QATAR">Qatar</option>
                                    <option value="SENEGAL">Senegal</option>
                                    <option value="SERBIA">Serbia</option>
                                    <option value="SPANYOL">Spanyol</option>
                                    <option value="SWISS">Swiss</option>
                                    <option value="TUNISIA">Tunisia</option>
                                    <option value="URUGUAY">Uruguay</option>
                                    <option value="WALES">Wales</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <p>VS</p>
                            </div>
                            <div class="col-4">
                                <select name="away" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected><?php echo $data['away']; ?></option>
                                    <option value="AMERIKA">Amerika</option>
                                    <option value="ARAB">Arab</option>
                                    <option value="ARGENTINA">Argentina</option>
                                    <option value="AUSTRALIA">Australia</option>
                                    <option value="BELANDA">Belanda</option>
                                    <option value="BELGIA">Belgia</option>
                                    <option value="BRAZIL">Brazil</option>
                                    <option value="DENMARK">Denmark</option>
                                    <option value="EKUADOR">Ekuador</option>
                                    <option value="GHANA">Ghana</option>
                                    <option value="INGGRIS">Inggris</option>
                                    <option value="IRAN">Iran</option>
                                    <option value="JEPANG">Jepang</option>
                                    <option value="JERMAN">Jerman</option>
                                    <option value="KAMERUN">Kamerun</option>
                                    <option value="KANADA">Kanada</option>
                                    <option value="KOREA">Korea Selatan</option>
                                    <option value="KOSTARIKA">Kosta Rika</option>
                                    <option value="KROASIA">Kroasia</option>
                                    <option value="MEKSIKO">Meksiko</option>
                                    <option value="MOROKO">Moroko</option>
                                    <option value="PERANCIS">Perancis</option>
                                    <option value="POLANDIA">Polandia</option>
                                    <option value="PORTUGAL">Portugal</option>
                                    <option value="QATAR">Qatar</option>
                                    <option value="SENEGAL">Senegal</option>
                                    <option value="SERBIA">Serbia</option>
                                    <option value="SPANYOL">Spanyol</option>
                                    <option value="SWISS">Swiss</option>
                                    <option value="TUNISIA">Tunisia</option>
                                    <option value="URUGUAY">Uruguay</option>
                                    <option value="WALES">Wales</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2 g-sm-1">
                                WAKTU
                            </div>
                            <div class="col-sm-1">:</div>
                            <div class="col-auto">
                                <div class="input-group">
                                    <input name="tanggal" value="<?php echo $data['tanggal']; ?> " type="date" class="form-control form-control-sm" oninvalid="this.setCustomValidity('Silahkan Masukkan Tanggal Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="input-group">
                                    <input name="jam" value="<?php echo $data['jam']; ?> " type="time" class="form-control form-control-sm" oninvalid="this.setCustomValidity('Silahkan Masukkan Jam Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-2 g-sm-0 ">DAERAH</div>
                            <div class="col-1 g-sm-0">:</div>
                            <div class="col-4">
                                <input name="provinsi" value="<?php echo $data['provinsi']; ?> " type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-1 g-sm-1 ps-3 " id="status">STATUS</div>
                            <div class="col-1 g-sm-1 text-center " id="status2">:</div>
                            <div class="col-3 text-right">
                                <?php
                                if ($data['status'] == 'SELESAI') {
                                ?>
                                    <input type="radio" class="btn-check" name="status" id="laki" value="SEGERA">
                                    <label class="btn btn-success tes segera" for="laki">SEGERA</label>
                                    <input type="radio" class="btn-check" name="status" id="selesai" value="SELESAI" checked="checked">
                                    <label class="btn btn-success tes selesai" for="selesai">SELESAI</label>
                                    <input type="radio" class="btn-check" name="status" id="batal" value="BATAL">
                                    <label class="btn btn-success tes batal" for="batal">BATAL</label>
                                <?php } else if ($data['status'] == 'SEGERA') { ?>
                                    <input type="radio" class="btn-check" name="status" id="laki" value="SEGERA" checked="checked">
                                    <label class="btn btn-success tes segera" for="laki">SEGERA</label>
                                    <input type="radio" class="btn-check" name="status" id="selesai" value="SELESAI">
                                    <label class="btn btn-success tes selesai" for="selesai">SELESAI</label>
                                    <input type="radio" class="btn-check" name="status" id="batal" value="BATAL">
                                    <label class="btn btn-success tes batal" for="batal">BATAL</label>
                                <?php } else { ?>
                                    <input type="radio" class="btn-check" name="status" id="laki" value="SEGERA">
                                    <label class="btn btn-success tes segera" for="laki">SEGERA</label>
                                    <input type="radio" class="btn-check" name="status" id="selesai" value="SELESAI">
                                    <label class="btn btn-success tes selesai" for="selesai">SELESAI</label>
                                    <input type="radio" class="btn-check" name="status" id="batal" value="BATAL" checked="checked">
                                    <label class="btn btn-success tes batal" for="batal">BATAL</label>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                TEMPAT
                            </div>
                            <div class="col-sm-1">:</div>
                            <div class="col-9">
                                <input name="tempat" value="<?php echo $data['tempat']; ?>" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                LOKASI
                            </div>
                            <div class="col-sm-1">:</div>
                            <div class="col-9">
                                <input name="lokasi" value="<?php echo $data['lokasi']; ?>" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-2">
                                HARGA
                            </div>
                            <div class="col-sm-1">:</div>
                            <div class="col-7">
                                <input name="harga" value="<?php echo $data['harga']; ?>" type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-2">
                                <button class="submit" type="submit">EDIT AGENDA</button>
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