<?php
if ($_POST) {
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_tlp = $_POST['no_tlp'];
    $password = $_POST['password'];
    $id_jabatan = $_POST['id_jabatan'];

    // Validasi input
    if (empty($nama)) {
        echo "<script>alert('Nama pegawai tidak boleh kosong');location.href='tambah_pegawai.php';</script>";
    } elseif (empty($nik)) {
        echo "<script>alert('NIK tidak boleh kosong');location.href='tambah_pegawai.php';</script>";
    } else {
        include "koneksi.php";
        // Menghapus koma yang tidak perlu setelah id_jabatan
        if (empty($password)) {
            $update = mysqli_query($conn, "UPDATE pegawai SET nik='" . $nik . "', nama='" . $nama . "', jenis_kelamin='" . $jenis_kelamin . "', alamat='" . $alamat . "', no_tlp='" . $no_tlp . "', id_jabatan='" . $id_jabatan . "' WHERE id='" . $id . "'") or die(mysqli_error($conn));
        } else {
            $update = mysqli_query($conn, "UPDATE pegawai SET nik='" . $nik . "', nama='" . $nama . "', jenis_kelamin='" . $jenis_kelamin . "', alamat='" . $alamat . "', no_tlp='" . $no_tlp . "', id_jabatan='" . $id_jabatan . "', password='" . md5($password) . "' WHERE id='" . $id . "'") or die(mysqli_error($conn));
        }

        if ($update) {
            echo "<script>alert('Sukses update pegawai');location.href='tampil_pegawai.php';</script>";
        } else {
            echo "<script>alert('Gagal update pegawai');location.href='ubah.php?id=" . $id . "';</script>";
        }
    }
}
?>
