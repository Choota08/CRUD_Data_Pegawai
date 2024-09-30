<?php
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
    content="width=device-width, 
    initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
    crossorigin="anonymous">
    <title>Document</title> 
    
</head>
<body>
    <?php include "koneksi.php";
    $query_jabatan = mysqli_query($conn, 
    "SELECT * FROM `jabatan`");
    ?>
    

    <table class="table table-hover table-striped">
        <tr>
            <th>No</th>
            <th>Nama Jabatan</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
        </tr>
        <?php while ($data_jabatan = 
        mysqli_fetch_array($query_jabatan)) { ?>

        <tr>
            <td><?=$data_jabatan['id_jabatan']?></td>
            <td><?=$data_jabatan['nama_jabatan']?></td>
            <td><?=$data_jabatan['gaji_pokok']?></td>
            <td><?=$data_jabatan['tunjangan']?></td>
        </tr>
        <?php } ?>

    </table>
            
    <div class="text-left mt-4">
                <a href="tambah_jabatan.php" class="btn btn-danger">tambah jabatan</a>
            </div>
    
</body>
</html>