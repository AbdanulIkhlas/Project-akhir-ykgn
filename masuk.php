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
    <link rel="stylesheet" href="CSS/masuk.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>
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
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                $kondisi = 0;
        ?> <div class="notif">
                    <p>LOGIN GAGAL!!</p>
                    <p>USERNAME ATAU PASSWORD SALAH!!</p>
                <?php
            } else if ($_GET['pesan'] == "logout") {
                $kondisi = 1;
                ?> <div class="notif-sebaris">
                        <p> ANDA TELAH BERHASIL LOGOUT</p>
                    <?php
                } else if ($_GET['pesan'] == "belum_login") {
                    $kondisi = 1;
                    ?>
                        <div class="notif-sebaris">
                            <p> SILAHKAN LOGIN TERLEBIH DAHULU!! </p>
                        <?php
                    } else if ($_GET['pesan'] == "RegistBerhasil") {
                        $kondisi = 1;
                        ?>
                            <div class="notif-sebaris">
                                <p>DAFTAR BERHASIL</p>
                            <?php
                        }

                        if ($kondisi == 0) {
                            ?>
                                <div class="close">
                                    <a href="masuk.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                        </svg>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="close-sebaris">
                                    <a href="masuk.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                        </svg>
                                    </a>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
            ?>

            <div class="content">
                <h1>MASUK</h1>
                <div class="kotak-login">
                    <form action="cek_masuk.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">USERNAME</label>
                            <input type="text" name="username" class="form-control" oninvalid="this.setCustomValidity('Silahkan Masukkan Username Terlebih Dahulu')" oninput="setCustomValidity('')" id="username" placeholder="Masukkan Username" required>
                        </div>
                        <div class="mb-2">
                            <label for="user_password" class="form-label">PASSWORD</label>
                            <input type="password" name="password" class="form-control" oninvalid="this.setCustomValidity('Silahkan Masukkan Password Terlebih Dahulu')" oninput="setCustomValidity('')" placeholder="Masukkan Password" required id="user_password">
                        </div>
                        <div class="mb-4">
                            <input type="checkbox" onclick="showPassword();">Tampilkan Password
                        </div>
                        <div class="mb-4">
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <button type="submit" class="button-login">MASUK</button>
                            </div>
                        </div>
                    </form>
                    <div class="belum-daftar">
                        <p>
                            Belum Punya Akun ? <span class="garis">|</span>
                            <span class="daftar"><a href="daftar.php">Daftar</a></span>
                        </p>
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

    <script type="text/javascript">
        function showPassword() {
            var user_password = document.getElementById('user_password');
            if (user_password.type == 'password') {
                user_password.type = 'text';
            } else {
                user_password.type = 'password';
            }
        }
    </script>
</body>

</html>