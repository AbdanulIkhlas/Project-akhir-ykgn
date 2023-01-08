<!-- 

    Nama  : Muhammad Riyadhy
    NIM   : 123210002

    Nama  : Muhammad Abdanul Ikhlas
    NIM   : 123210009
    
    kelas : IF-C

-->
<?php
session_start();
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
    <link rel="stylesheet" href="CSS/daftar.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome.min.css" />
</head>

<body>
    <header>
        <div class="navbar-menu cf">
            <div class="logo">
                <a href="beranda.php">
                    <img src="IMG/Newlogo.png" alt="YKGN">
                </a>
            </div>
            <div class="menu">
                <a href="beranda.php">BERANDA</a>
                <a href="pertandingan.php">PERTANDINGAN</a>
                <a href="buat_agenda.php">BUAT</a>
                <a href="">|</a>
                <a href="daftar.php">DAFTAR</a>
                <a href="">/</a>
                <a href="masuk.php">MASUK</a>
            </div>
        </div>
    </header>
    <section>
        <?php
        if (isset($_GET['pesan'])) { ?>
            <div class="notif">
                <?php
                if ($_GET['pesan'] == "PasswordBeda") {
                ?>
                    <p> PASSWORD DAN RE-PASSWORD BEDA!!!</p>
                <?php
                } else if ($_GET['pesan'] == "RegistGagal") {
                ?>
                    <p> DAFTAR GAGAL</p>
                <?php
                } else if ($_GET['pesan'] == "UsernameSama") {
                ?>
                    <p> USERNAME SUDAH DIGUNAKAN!!!</p>
                <?php } else if ($_GET['pesan'] == "PasswordBeda") { ?>

                <?php } ?>
                <div class="close">
                    <a href="daftar.php">
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
            <h1>DAFTAR</h1>
            <div class="kotak">
                <form action="cek_daftar.php" method="POST">
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col-2 g-md-2 ">Nama</div>
                            <div class="col-1 g-md-2 text-center">:</div>
                            <div class="col-9">
                                <input name="nama" class="form-control form-control-sm" type="text" placeholder="Masukkan Nama" oninvalid="this.setCustomValidity('Silahkan Masukkan Nama Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2 g-md-2 ">No. HP</div>
                            <div class="col-1 g-md-2 text-center">:</div>
                            <div class="col-3">
                                <input name="no_hp" class="form-control form-control-sm" type="text" placeholder="Masukkan Nomor HP" oninvalid="this.setCustomValidity('Silahkan Masukkan Nomor HP Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                            </div>
                            <div class="col-2 g-md-2 ps-4">Jenis Kelamin</div>
                            <div class="col-1 g-md-2 text-center">:</div>
                            <div class="col-3">
                                <input type="radio" class="btn-check" name="jenis_kelamin" id="laki" value="Laki-Laki">
                                <label class="btn btn-success tes laki" for="laki">Laki-Laki</label>
                                <input type="radio" class="btn-check" name="jenis_kelamin" id="perempuan" value="Perempuan">
                                <label class="btn btn-success tes perempuan" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2 g-md-2">Alamat</div>
                            <div class="col-1 g-md-2 text-center">:</div>
                            <div class="col-9">
                                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat" rows="3" oninvalid="this.setCustomValidity('Silahkan Masukkan Alamat Terlebih Dahulu')" oninput="setCustomValidity('')" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2 g-md-2 ">Username</div>
                            <div class="col-1 g-md-2 text-center">:</div>
                            <div class="col-9">
                                <input name="username" class="form-control form-control-sm" type="text" placeholder="Masukkan Username" oninvalid="this.setCustomValidity('Silahkan Masukkan Username Terlebih Dahulu')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2 g-md-2 ">Password</div>
                            <div class="col-1 g-md-2 text-center">:</div>
                            <div class="col-9">
                                <input name="password" class="form-control form-control-sm" type="password" placeholder="Masukkan Password" oninvalid="this.setCustomValidity('Silahkan Masukkan Password Terlebih Dahulu')" oninput="setCustomValidity('')" required id="user_password">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-2 g-md-2 ">Re-Password</div>
                            <div class="col-1 g-md-2 text-center">:</div>
                            <div class="col-9">
                                <input name="repassword" class="form-control form-control-sm" type="password" placeholder="Masukkan Re-Password" oninvalid="this.setCustomValidity('Silahkan Masukkan Re-Password Terlebih Dahulu')" oninput="setCustomValidity('')" required id="user_repassword">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-2 g-md-2 "></div>
                            <div class="col-1 g-md-2 text-center"></div>
                            <div class="col-9">
                                <input type="checkbox" onclick="showPassword();">Tampilkan Password
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <button type="submit" class="button-daftar">DAFTAR</button>
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
    <script type="text/javascript">
        function showPassword() {
            var user_password = document.getElementById('user_password');
            if (user_password.type == 'password') {
                user_password.type = 'text';
            } else {
                user_password.type = 'password';
            }

            var user_repassword = document.getElementById('user_repassword');
            if (user_repassword.type == 'password') {
                user_repassword.type = 'text';
            } else {
                user_repassword.type = 'password';
            }
        }
    </script>
</body>

</html>