<?php
if ($_POST) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_tlp = $_POST['no_tlp'];
    $id_jabatan = $_POST['id_jabatan'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($nama)) {
        echo "<script>alert('Nama pegawai tidak boleh kosong');location.href='register.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='register.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='register.php';</script>";
    } else {
        include "koneksi.php";
        
        // Hash password menggunakan password_hash()
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Menggunakan prepared statements untuk keamanan
        $stmt = $conn->prepare("INSERT INTO pegawai (nik, nama, alamat, jenis_kelamin, no_tlp, id_jabatan, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nik, $nama, $alamat, $jenis_kelamin, $no_tlp, $id_jabatan, $username, $hashed_password);

        if ($stmt->execute()) {
            echo "<script>alert('Sukses menambahkan Pegawai');location.href='register.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan Pegawai');location.href='register.php';</script>";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
