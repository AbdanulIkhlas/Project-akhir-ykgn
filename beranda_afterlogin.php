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
    <link rel="stylesheet" href="CSS/beranda_afterlogin.css">
    <link href='https://fonts.googleapis.com/css?family=Titillium Web' rel='stylesheet'>
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
        <?php
        if (isset($_GET['pesan'])) { ?>
            <div class="notif">
                <?php
                if ($_GET['pesan'] == "edit_agenda_berhasil") {
                ?>
                    <p>BERHASIL BUAT AGENDA NOBAR</p>
                <?php
                } else if ($_GET['pesan'] == "edit_agenda_gagal") {
                ?>
                    <p> GAGAL BUAT AGENDA NOBAR</p>
                <?php
                } else if ($_GET['pesan'] == "join_berhasil") {
                ?>
                    <p> BERHASIL JOIN AGENDA NOBAR</p>
                <?php } else if ($_GET['pesan'] == "join_gagal") { ?>
                    <p> GAGAL JOIN AGENDA NOBAR</p>
                <?php } ?>
                <div class="close">
                    <a href="beranda_afterlogin.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                        </svg>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="left-content cf">
            <h1>MUSIM <br> PIALA DUNIA ?</h1>
            <p>Ya Kali Gak Nobar . . . </p>
            <a href="pertandingan_AL.php">
                <div class="button">
                    PERTANDINGAN
                </div>
            </a>
        </div>
        <div class="right-content">
            <div class="logo-fifa">
                <img src="IMG/fifa.png" alt="fifa">
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