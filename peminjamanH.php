<?php 
session_start();
    require 'function.php';
    if(!isset($_SESSION['user_name'])){
        header("location: login.php");
        exit;
    }

   $data = mysqli_query($conn, "SELECT * FROM hp");

   $query = "SELECT COUNT(*) as total FROM hp";
   $result = mysqli_query($conn, $query);
       $row = mysqli_fetch_assoc($result);
        $row['total'];
   if(isset($_POST["submit"])){
       $totalS = $row['total']-1;
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style3.css">
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
                <h5>HandPhone</h5>
                <div class="card-check" style="margin-right: 60px ;">
                    <div class="card1">
                        <p class="angka"><?= $row['total']; ?></p>
                        <p class="stat">Avaible</p>
                    </div>
                    <div class="card2">
                        <p class="angka">-</p>
                        <p class="stat">In - Use</p>
                    </div>
                </div><br>
            </div>
            <div class="contain">
            <?php $i = 1 ?>
                <?php foreach($data as $dt) :?>
            <table>
                <tr>
                    <td> <div class="card">
                <div class="card-body">
                    <p class="card-text"><i class="fa-solid fa-mobile fa-2xl"></i></p>
                    <p class="card-text">no HandPhone : <?= $dt['no_hp'] ?></p>
                    <p class="card-text">status : <?= $dt['status'] ?></p>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Klik Di Sini
                        </button>
                    </form>
             </div>
            </div></td>
                </tr>
                <?php $i++ ?>
                <div class="row">
                    
                </div>
            </table>
            <?php endforeach;?>
        </div>
        </div>
    </div>

</body>
</html>


<!-- Button trigger modal -->

<!-- Modal -->

<?php  
  if (isset($_POST["submit"])){
    if (tambah ($_POST) > 0){
        echo"<script>
        alert('peminjaman berhasil didata');
        window.location.href = 'index.php';
        </script>";
    }else {
        echo"<script>
        alert('peminjaman gagal didata');
        window.location.href = 'index.php';
        </script>";
    }
}
?>
<?php
$result = mysqli_query($conn, "SELECT * FROM admin");
echo mysqli_error($conn);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
     if (isset($_POST["submit"])){
        $status = $_POST['status'];
        $_SESSION['nama'] =$row['nama'];
        $_SESSION['rayon'] =$row['rayon'];
        $_SESSION['rombel'] =$row['rombel'];
        $_SESSION['nis'] =$row['nis'];
        
}
}
?>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" autofocus require value="HandPhone" readonly>
            </div>
            <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_barang">No Barang</label>
                        <input type="number" name="no_barang" id="no_barang" class="form-control"  require max='5' min ='1'placeholder="Silahkan di isi no berapa anda ingin meminjam" >
                    </div>
                </div>
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status Barang</label>
                        <input type="text" name="status" id="status" class="form-control" value="Siap Digunakan" require readonly>
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="atas_nama">Atas Nama</label>
                        <input type="text" name="atas_nama" id="atas_nama" class="form-control"  require value="<?= $_SESSION['nama'] ?>"readonly>
                    </div>
                </div>
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" name="nis" id="nis" class="form-control"  require value="<?= $_SESSION['nis'] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="rayon">Rayon</label>
                        <input type="text" name="rayon" id="rayon" class="form-control"  require value="<?= $_SESSION['rayon'] ?>"readonly>
                    </div>
                </div>
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="rombel">Rombel</label>
                        <input type="text" name="rombel" id="rombel" class="form-control"  require value="<?= $_SESSION['rombel'] ?>" readonly>
                    </div>
                </div>
            </div>
               <div class="row">
                    <div class="form-group">
                        <label for="keterangan">Untuk ...</label>
                        <textarea name="keterangan" id="keterangan" cols="35" rows="5" placeholder="Masukkan keterangan" class="form-control"></textarea>
                    </div>
                </div>
             <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit"  class="btn btn-primary" name="submit" id="submit">Pinjam</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>