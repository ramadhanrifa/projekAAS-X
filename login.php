<?php
// ini buat jaga jaga kalo session error taro di file
session_start();
if(isset($_SESSION['user_name'])){
    header("location: index.php");
    exit;
}elseif((isset($_SESSION['admin_name']))){
    header("location: admin.php");
    exit;
}
 
 require "function.php";
 if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $nis = $_POST['nis'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND nis = '$nis'");
    echo mysqli_error($conn);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['user_type'] == 'user')  {
            $_SESSION['user_name'] = $row['username'];
            $_SESSION['username'] =$username;
            $_SESSION['nama'] =$row['nama'];
            $_SESSION['rayon'] =$row['rayon'];
            $_SESSION['rombel'] =$row['rombel'];
            $_SESSION['nis'] =$nis;
            $_SESSION['user'] = true;
            
            header("Location: index.php");
            exit;
        }elseif($row['user_type'] == 'admin'){
            $_SESSION['admin_name'] = $row['name'];
            header("location: admin.php");
            exit;
        }

    }else{$error = true;}
    
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body{
  background-size: 100%;;
  background-repeat:no-repeat ;
  background-image: url(style/img/Login-bg.png)

}
    </style>
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <div class="main-title">
            <p>WeLend</p>
            <p>Peminjaman menjadi lebih mudah</p>
        </div>
        <div class="sidebar">
            <div class="text">
                <p>Silahkan login terlebih dahulu</p>
                 <?php  if(isset($error)) : ?>
                <p style="color:red; font-size:15px; ">username / password anda salah</p>
                
            <?php  endif; ?> 
            </div>
            <form action="" method="post">
                <label for="username">username</label> <br>
                <input class="input-container" type="text" name="username" id="username" placeholder="Masukan username anda">
                <br>
                <label for="nis">password</label><br>
                <input class="input-container" type="password" name="nis" id="nis" placeholder="Masukan nis anda"><br>
                <div class="button-container">
                <button type="submit" class="btn btn-secondary" name="login" id="login">Login</button><br>
                </div><br>
                <label for="">Tidak Punya akun ?<a href="register.php">Klik di sini</a></label><br>
                <label for="">Hubungi CS bila ada masalah. <a href="kontak.php">CS</a></label>

            </form>
        </div>
    </div>
</body>
</html>