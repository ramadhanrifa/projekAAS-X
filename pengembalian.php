<?php
session_start();
require 'function.php';
if(!isset($_SESSION['user_name'])){
    header("location: login.php");
    exit;
}

$datahp = mysqli_query($conn, "SELECT * FROM hp");
$datala = mysqli_query($conn, "SELECT * FROM laptop_asus");
$datall = mysqli_query($conn, "SELECT * FROM laptop_lenovo");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/40161e5049.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
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
            <div class="header">
                <h5>Pengembalian Barang</h5>
            </div>
          <h1 style="margin-top: 50px;">SEMUA PENGEMBALIAN BARANG DI ATUR OLEH ADMIN :)</h1>

           
    </div>

</body>
</html>
