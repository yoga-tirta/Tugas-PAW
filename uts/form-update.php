<?php
    include "koneksi.php";
    $id = $_GET["id"];
    $tampil = "SELECT * FROM tbl_yoga WHERE id_yoga = $id";
    // var_dump($tampil);
    $hasil = mysqli_query($koneksi, $tampil);
    // var_dump($hasil);die;
    
    // if($hasil){
    //     echo 'berhasil';
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h2 class="text-center">Update Data Anggota</h2>

            <!-- form tambah data -->
            <?php
                While ($row = mysqli_fetch_array($hasil)){
            ?>
            <form action='action-update.php' method="POST">
            <input type="hidden" class="form-control" id="nama" name="id_data" value="<?php echo $row['id_yoga'];?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama_data" value="<?php echo $row['nama_yoga'];?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email_data" value="<?php echo $row['email_yoga'];?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="alamat" class="form-control" id="alamat" name="alamat_data" value="<?php echo $row['alamat_yoga'];?>">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success sm">Update</button>
                </div>
            </form>
            <?php 
            }?>

    </div>
</body>
</html>