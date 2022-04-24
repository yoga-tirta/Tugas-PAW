<?php
    include "koneksi.php";
    $dataTampil = "SELECT*FROM tbl_yoga";
    $hasil = mysqli_query($koneksi,$dataTampil);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    <h2 class="text-center">Tampil Data Anggota</h2>

    <a href="form-create.php" class='btn btn-success sm mt-5'>Tambah</a>
    <!-- table data -->
    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
                while($row = mysqli_fetch_array($hasil)){
            ?>
            <tr>
                <td><?=$row['id_yoga'];?></th>
                <td><?=$row['nama_yoga'];?></td>
                <td><?=$row['email_yoga'];?></td>
                <td><?=$row['alamat_yoga'];?></td>
                <td>
                    <a href="form-update.php?id=<?=$row['id_yoga']?>" class='btn btn-primary sm'>Edit</a>
                    <a href="action-delete.php?id=<?=$row['id_yoga']?>" class='btn btn-danger sm'>Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>