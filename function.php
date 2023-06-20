<?php

    $conn = mysqli_connect("sql210.infinityfree.com", "if0_34462375", "Iyczn8u5O2vSY60", "if0_34462375_db_akhirsemester");

    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    function query($query){
        global $conn;
        $result =mysqli_query($conn, $query);
        $wadah = [];
        while($data =mysqli_fetch_assoc($result)){
            $wadah[]= $data;
        }
        return $wadah;
    }

    function register($data){
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $username = htmlspecialchars($data["username"]);
        $nis = htmlspecialchars($data["nis"]);
        $rayon = htmlspecialchars($data["rayon"]); 
        $rombel= htmlspecialchars($data["rombel"]);
        $user_type= htmlspecialchars($data["user_type"]);
        

        $username = strtolower(stripslashes($data['username']));
        // strtolower untuk menghalang semua huruf kapital
        // stripslashes untuk menghalang semua simbol aneh
        $password = $data['nis'];
        $conf_nis =$data['nis'];

        // cek apakah password tersebut sama jika sama password diterima
        if($password !== $conf_nis ){
            echo"<script>
            alert('akun berhasil ditambahkan');
            </script>";
            return false;
        }
        // ubah password menjadi huruf acak menggunakan password_hash
        $password = password_hash($nis, PASSWORD_DEFAULT);

        // input data ke database
        $query= "INSERT INTO user VALUES
        ('', '$nama', '$username', '$nis', '$rayon', '$rombel', '$user_type')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);

    }

    function tambah($data){
        global $conn;
        $nama_barang = htmlspecialchars($data["nama_barang"]);
        $no_barang = htmlspecialchars($data["no_barang"]);
        $status = htmlspecialchars($data["status"]);
        $atas_nama= htmlspecialchars($data["atas_nama"]);
        $nis = htmlspecialchars($data["nis"]);
        $rayon = htmlspecialchars($data["rayon"]);
        $rombel = htmlspecialchars($data["rombel"]);
        $keterangan = htmlspecialchars($data["keterangan"]);
        

        $query = "INSERT INTO admin VALUES 
        ('', '$nama_barang', '$no_barang', '$status', '$atas_nama', '$nis', '$rayon', '$rombel', '$keterangan') ";
            mysqli_query($conn, $query);
            return mysqli_affected_rows($conn);
            

            // ini taro di file function
    }

    
    function search($keyword){
        $query ="SELECT * FROM admin WHERE 
        nama_barang LIKE '%$keyword%' OR
        no_barang LIKE '%$keyword%' OR
        status LIKE '%$keyword%' OR
        nama LIKE '%$keyword%' OR
        nis LIKE '%$keyword%' OR
        rayon LIKE '%$keyword%' OR
        rombel LIKE '%$keyword%' OR
        alasan LIKE '%$keyword%' 
        ";
        return query($query);
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM admin WHERE id =$id");
        return mysqli_affected_rows($conn);
    }



?>