<?php
session_start();

if(!isset($_SESSION['user'])){
  header("location: login.php");
  exit;
}
require 'function.php';
$result = query("SELECT * FROM user");




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/40161e5049.js" crossorigin="anonymous"></script>
    <title>Welend</title>
    <style>
      .logout {
        margin: 10px 65px;
      }
      .logout a{
        color: lightblue;
       
      }
      .logout a:hover{
        background-color: #294f8d;
      }
      a{
        text-decoration: none;
      }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
           <img src="style/img/User-icon.png" alt="">
            <div class="logout">
              <a href="logout.php">Keluar</a>
            </div>
            <ul>
                <li><a href="index.php"><i class="fa-solid fa-house"></i>Utama</a></li>
                <li><a href="pengembalian.php"><i class="fa-solid fa-file-contract fa-lg"></i>Pengembalian</a></li>
                <li><a href="kontak.php"><i class="fa-solid fa-phone"></i>Kontak</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="header"><h3>Selamat Datang</h3>
            <br>
            <h1><?= $_SESSION['username'];?></h1><br>
            <h3><?= $_SESSION['rayon']; ?> - <?= $_SESSION['rombel']; ?> - <?= $_SESSION['nis']; ?></h3>
            </div>
            <div class="info"><h2>Pinjam apa hari ini?</h2>
                <hr>
            </div>
            <div class="contain">
            <div class="card" style="width: 12rem;">
                <a href="peminjamanA.php"><img src="style/img/acer.png" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <p class="card-text">avaible - </p>
                  <p class="card-text">in-use - </p>
                </div>
              </div>
            <div class="card" style="width: 12rem;">
                <a href="peminjamanL.php"><img src="style/img/lenovo.png" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <p class="card-text">avaible - </p>
                  <p class="card-text">in-use - </p>
                </div>
              </div>
            <div class="card" style="width: 12rem;">
                <a href="peminjamanH.php"><img src="style/img/Card hp.png" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <p class="card-text">avaible - </p>
                  <p class="card-text">in-use - </p>
                </div>
              </div>
            </div>
        </div>
    </div>

</body>
</html>