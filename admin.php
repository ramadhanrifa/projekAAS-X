
<?php
session_start();

if(isset($_SESSION['admin_name'])){
  header("location: login.php");
  exit;
}
require 'function.php';
$data = query("SELECT * FROM admin");

if( isset($_POST["search"])){
    $data= search($_POST["keyword"]);
   }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style6.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/40161e5049.js" crossorigin="anonymous"></script>
    <title>Halaman Admin</title>
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
      th{
        text-align: center;
      }
      td{
        text-align: center;
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
        </div>
        <div class="main_content">
            <div class="header"><h3>Selamat Datang Admin</h3>
            <br>
            <form action="" method="post">
            <input type="text" name="keyword" id="keyword" placeholder="contoh = rifa">
            <button type="submit" class="btn btn-primary" name="search" id="search">cari</button>
            </form> 
            </div>
            <table class="table" style="margin-top: 150px;">
            <form action="" method="post">
 
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">meminjam</th>
      <th scope="col">no alat</th>
      <th scope="col">status</th>
      <th scope="col">nama peminjam</th>
      <th scope="col">nis peminjam</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php foreach($data as $dt) :?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $dt['nama_barang'] ?></td>
      <td><?= $dt['no_barang'] ?></td>
      <td><?= $dt['status'] ?></td>
      <td><?= $dt['nama'] ?></td>
      <td><?= $dt['nis'] ?></td>
      <td><a href="detail.php?id= <?= $dt['id']; ?>"><button type="button" class="btn btn-primary">selengkapnya</button></a> ||
           <a href="balik.php?id= <?= $dt['id']; ?>" onclick="return confirm('Barang Sudah Dikembalikan ?');"><button type="button" class="btn btn-info" >Sudah Dibalikan ?</button>
</a></td>
    </tr>
    <?php $i++?>
    <?php endforeach?>
  </tbody>
</table>
    </div>

</body>
</html>