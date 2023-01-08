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
    <link rel="stylesheet" href="CSS/buat_agenda.css">
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
            <h1>BUAT AGENDA NOBAR</h1>
            <div class="kotak">
                <form action="input_buat_agenda.php" method="POST">
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col-2 pilih-tim">
                                PILIH TIM
                            </div>
                            <div class="col-sm-1">:</div>
                            <div class="col-4">
                                <select name="home" class="form-select form-select-sm" aria-label=".form-select-sm example" oninvalid="this.setCustomValidity('Silahkan Masukkan Tim Kandang Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                                    <option selected>TIM KANDANG</option>
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
                                <select name="away" class="form-select form-select-sm" aria-label=".form-select-sm example" oninvalid="this.setCustomValidity('Silahkan Masukkan Tim Tandang Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                                    <option selected>TIM TANDANG</option>
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
                                    <input name="tanggal" type="date" class="form-control form-control-sm" oninvalid="this.setCustomValidity('Silahkan Masukkan Tanggal Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="input-group">
                                    <input name="jam" type="time" class="form-control form-control-sm" oninvalid="this.setCustomValidity('Silahkan Masukkan Jam Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                DAERAH
                            </div>
                            <div class="col-sm-1">:</div>
                            <div class="col-9">
                                <input name="provinsi" placeholder="Masukkan Daerah " type="text" class="form-control form-control-sm" oninvalid="this.setCustomValidity('Silahkan Masukkan Daerah/Provinsi Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                TEMPAT
                            </div>
                            <div class="col-sm-1">:</div>
                            <div class="col-9">
                                <input name="tempat" placeholder="Masukkan Tempat Agenda Nobar" type="text" class="form-control form-control-sm" oninvalid="this.setCustomValidity('Silahkan Masukkan Tempat Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                LOKASI
                            </div>
                            <div class="col-sm-1">:</div>
                            <div class="col-9">
                                <input name="lokasi" placeholder="Masukkan Lokasi Maps" type="text" class="form-control form-control-sm" oninvalid="this.setCustomValidity('Silahkan Masukkan Lokasi/Link Maps Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-2">
                                HARGA
                            </div>
                            <div class="col-sm-1">:</div>
                            <div class="col-7">
                                <input name="harga" placeholder="Tentukan Harga (0 Jika Gratis)" type="text" class="form-control form-control-sm" oninvalid="this.setCustomValidity('Silahkan Masukkan Harga Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                            </div>
                            <div class="col-2">
                                <button class="submit" type="submit">BUAT AGENDA</button>
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