<?php 
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        echo $username;
        echo $password;
        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {
            include "koneksi.php";
            $qry_login=mysqli_query($conn,"select * from pegawai where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>0){
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id']=$dt_login['id'];
                $_SESSION['nama']=$dt_login['nama'];
                $_SESSION['status_login']=true;
                echo "<script>alert('Anda sudah login');location.href='home.php';</script>";
                header("location: home.php");
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    }
?> 

<?php
    // Proses Login
    if($_POST['login']){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {
            include "koneksi.php";
            $qry_login = mysqli_query($conn, "SELECT * FROM pegawai WHERE username = '".$username."' AND password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login) > 0){
                $dt_login = mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id'] = $dt_login['id'];
                $_SESSION['nama'] = $dt_login['nama'];
                $_SESSION['status_login'] = true;
                echo "<script>alert('Anda sudah login');location.href='home.php';</script>";
                header("location: home.php");
                exit();
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    }

    // Proses Register
    if($_POST['register']){
        $nama_lengkap = $_POST['fullname'];
        $username = $_POST['register-username'];
        $email = $_POST['register-email'];
        $password = $_POST['register-password'];

        if(empty($nama_lengkap)){
            echo "<script>alert('Nama lengkap tidak boleh kosong');location.href='register.php';</script>";
        } elseif(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='register.php';</script>";
        } elseif(empty($email)){
            echo "<script>alert('Email tidak boleh kosong');location.href='register.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='register.php';</script>";
        } else {
            include "koneksi.php";
            // Cek apakah username atau email sudah terdaftar
            $qry_check = mysqli_query($conn, "SELECT * FROM pegawai WHERE username = '".$username."' OR email = '".$email."'");
            if(mysqli_num_rows($qry_check) > 0){
                echo "<script>alert('Username atau email sudah terdaftar');location.href='register.php';</script>";
            } else {
                // Insert data user baru ke database
                $qry_register = mysqli_query($conn, "INSERT INTO pegawai (nama, username, email, password) VALUES ('".$nama_lengkap."', '".$username."', '".$email."', '".md5($password)."')");
                if($qry_register){
                    echo "<script>alert('Pendaftaran berhasil, silakan login');location.href='login.php';</script>";
                } else {
                    echo "<script>alert('Gagal mendaftarkan akun');location.href='register.php';</script>";
                }
            }
        }
    }
?>
