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
    
    <title>Update Data Anggota</title>
  </head>

  <body style="background-color:#f5f5f5;">
    <div class="container"><br>
      <h2 class="text-center">Update Data</h2>

      <?php
        //Include file koneksi, untuk koneksikan ke database
        include "koneksi.php";

        //Cek apakah ada nilai yang dikirim menggunakan method GET dengan nama id_anggota
        if (isset($_GET['id_anggota'])) {
          $id_anggota = $_GET["id_anggota"];
          $sql = "SELECT * FROM tbl_142 WHERE id_anggota=$id_anggota";
          $hasil = mysqli_query($koneksi,$sql);
          $data = mysqli_fetch_assoc($hasil);
        }

        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $id_anggota = htmlspecialchars($_POST["id_anggota"]);
          $username = $_POST["username"];
          $nama = $_POST["nama"];
          $alamat = $_POST["alamat"];
          $email = $_POST["email"];
          $no_telp = $_POST["no_telp"];

          //Query update data pada tabel tbl_142
          $sql="UPDATE tbl_142 SET
          username='$username',
          nama='$nama',
          alamat='$alamat',
          email='$email',
          no_telp='$no_telp'
          WHERE id_anggota=$id_anggota";

          //Mengeksekusi atau menjalankan query diatas
          $hasil=mysqli_query($koneksi,$sql);

          //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
          if ($hasil) {
            header("Location:index.php");
          }
          else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";
          }
        }
      ?>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
          <label>Username:</label>
          <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" placeholder="Masukan Username" required />
        </div>
        <div class="form-group">
          <label>Nama:</label>
          <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" required/>
        </div>
        <div class="form-group">
          <label>Alamat:</label>
          <textarea name="alamat" class="form-control" rows="5" placeholder="Masukan Alamat" required><?php echo $data['alamat']; ?></textarea>
        </div>
        <div class="form-group">
          <label>Email:</label>
          <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" placeholder="Masukan Email" required/>
        </div>
        <div class="form-group">
          <label>No HP:</label>
          <input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" placeholder="Masukan No HP" required/>
        </div>

        <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>" />
        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
      </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>