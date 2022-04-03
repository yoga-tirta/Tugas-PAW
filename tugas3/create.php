<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Tambah Data Anggota</title>
  </head>

  <body style="background-color:#f5f5f5;">
    <div class="container"><br>
      <h2 class="text-center">Tambah Data</h2>

      <?php
        //Include file koneksi, untuk koneksikan ke database
        include "koneksi.php";

        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $username = $_POST["username"];
          $nama = $_POST["nama"];
          $alamat = $_POST["alamat"];
          $email = $_POST["email"];
          $no_telp = $_POST["no_telp"];

          //Query input menginput data kedalam tabel
          $sql="INSERT INTO tbl_142 VALUES(null,'$username','$nama','$alamat','$email','$no_telp')";

          //Mengeksekusi/menjalankan query diatas
          $hasil = mysqli_query($koneksi,$sql);

          //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
          if ($hasil) {
            header("Location:index.php");
          }
          else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
          }
        }
      ?>

      <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
          <label>Username:</label>
          <input type="text" name="username" class="form-control" placeholder="Masukan Username" required />
        </div>
        <div class="form-group">
          <label>Nama:</label>
          <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>
        </div>
        <div class="form-group">
          <label>Alamat:</label>
          <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>
        </div>
        <div class="form-group">
          <label>Email:</label>
          <input type="email" name="email" class="form-control" placeholder="Masukan Email" required/>
        </div>
        <div class="form-group">
          <label>No HP:</label>
          <input type="text" name="no_telp" class="form-control" placeholder="Masukan No HP" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus"></i> Submit</button>
      </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>