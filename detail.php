<?php
session_start();

// if(!isset($_SESSION['login'])){
//   header("location: login.php");
//   exit;
// }
require 'function.php';
$id = $_GET['id'];
$data = query("SELECT * FROM admin WHERE id = '$id'")[0];




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="position-absolute top-50 start-50 translate-middle">

<div class="card" style="width: 18rem;">
  <div class="card-header">
    Featured
  </div>
  <ul class="list-group list-group-flush">
    <p>nama Barang</p>
    <li class="list-group-item"><?= $data['nama_barang'] ?></li>
    <p>No Barang</p>
    <li class="list-group-item"><?= $data['no_barang'] ?></li>
    <p>status</p>
    <li class="list-group-item"><?= $data['status'] ?></li>
    <p>nama</p>
    <li class="list-group-item"><?= $data['nama'] ?></li>
    <p>NIS</p>
    <li class="list-group-item"><?= $data['nis'] ?></li>
    <p>Rayon</p>
    <li class="list-group-item"><?= $data['rayon'] ?></li>
    <p>Rombel</p>
    <li class="list-group-item"><?= $data['rombel'] ?></li>
    <p>Alasan</p>
    <li class="list-group-item"><?= $data['alasan'] ?></li>
    <!-- <p>Kembali</p> -->
    <li class="list-group-item"><a href="admin.php"><button type="button" class="btn btn-info">Kembali</button>
</a></li>


  </ul>
</div>
</div>
</body>
</html>