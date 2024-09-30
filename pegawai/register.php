
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
    crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="container mt-4">
        <h3>Register</h3>
        <form action="proses_register.php" method="post">
            <div class="mb-3">
                <label for="nik" class="form-label">NIK:</label>
                <input type="text" name="nik" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Gender:</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="" disabled selected>Pilih Gender</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_jabatan" class="form-label">Jabatan:</label>
                <select name="id_jabatan" class="form-control" required>
                    <option value="" disabled selected>Pilih Jabatan</option>
                    <?php 
                    include "koneksi.php";
                    $qry_jabatan = mysqli_query($conn, "SELECT * FROM jabatan");
                    while ($data_jabatan = mysqli_fetch_array($qry_jabatan)) {
                        echo '<option value="'.$data_jabatan['id_jabatan'].'">'.$data_jabatan['nama_jabatan'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="no_tlp" class="form-label">No. Telepon:</label>
                <input type="text" name="no_tlp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <input type="submit" name="simpan" value="Register" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
    crossorigin="anonymous"></script>
</body>
</html>
