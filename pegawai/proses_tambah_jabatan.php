<?php
    if ($_POST) {
        $nama_jabatan = $_POST['nama_jabatan']; // Sesuaikan dengan form input
        $gaji_pokok = $_POST['gaji_pokok']; // Menggunakan gaji_pokok, sesuai dengan form
        $tunjangan = $_POST['tunjangan'];
        
        // Validasi
        if (empty($nama_jabatan)) {
            echo "<script>alert('Nama jabatan tidak boleh kosong'); location.href='tambah_jabatan.php';</script>";
        } elseif (empty($gaji_pokok)) { // Gunakan gaji_pokok
            echo "<script>alert('Gaji pokok tidak boleh kosong'); location.href='tambah_jabatan.php';</script>";
        } elseif (empty($tunjangan)) {
            echo "<script>alert('Tunjangan tidak boleh kosong'); location.href='tambah_jabatan.php';</script>";
        } else {
            include "koneksi.php"; // Memanggil koneksi

            // Mencegah SQL Injection dengan real_escape_string
            $nama_jabatan = mysqli_real_escape_string($conn, $nama_jabatan);
            $gaji_pokok = mysqli_real_escape_string($conn, $gaji_pokok); // Menggunakan gaji_pokok
            $tunjangan = mysqli_real_escape_string($conn, $tunjangan);

            // Query INSERT
            $insert = mysqli_query($conn, "INSERT INTO `jabatan` (`nama_jabatan`, `gaji_pokok`, `tunjangan`) 
            VALUES ('$nama_jabatan', '$gaji_pokok', '$tunjangan')");
            
            // Cek apakah query berhasil
            if ($insert) {
                echo "<script>alert('Sukses menambahkan jabatan'); location.href='tambah_jabatan.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan jabatan'); location.href='tambah_jabatan.php';</script>";
            }
        }
    }
?>
