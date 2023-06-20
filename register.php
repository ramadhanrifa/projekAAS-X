<?php
    require 'function.php';
    if( isset($_POST['register'])){
        if(register($_POST) > 0){
            echo"<script>
            alert('akun berhasil ditambahkan');
            document.location.href = 'login.php';
            </script>";
        }else{
            mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css">
    <title>Daftar WeLend</title>
</head>
<body>
    <div class="wrapper">
        <div class="judul">
            <p>Daftar WeLend</p>
            <div class="daftar">
                <form action="" method="post">
                    <label for="">Masukan Nama</label><br>
                    <input type="text" name="nama" id="nama"><br>
                    <label for="">Masukan username</label><br>
                    <input type="text" name="username" id="username"><br>
                    <label for="">masukan NIS</label><br>
                    <input type="number" name="nis" id="nis"><br>
                    <label for="">Masukan Rayon</label><br>
                    <input type="text" name="rayon" id="rayon"><br>
                    <label for="">Masukan Rombel</label><br>
                    <input type="text" name="rombel" id="rombel"><br>
                    <input type="hidden" class="form-control" id="user_type" name="user_type" value="user" readonly>
                    <button type="submit" name="register" id="register">Daftar!!!</button><br>
                    <label for="" class="inform">Sudah punya akun ? <a href="login.php">Kembali ke login</a></label>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
