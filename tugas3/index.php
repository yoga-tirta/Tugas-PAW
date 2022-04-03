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

    <title>Tampil Data Anggota</title>
  </head>

  <body style="background-color:#f5f5f5;">
    <div class="container"><br>
      <h2 class="text-center">Tampil Data Anggota</h2>
      <h3><small class="text-muted">Tabel Anggota</small></h3>

      <?php
        //Include file koneksi, untuk koneksikan ke database
        include "koneksi.php";

        //Cek apakah ada nilai dari method GET dengan nama id_anggota
        if (isset($_GET['id_anggota'])) {
          $id_anggota=htmlspecialchars($_GET["id_anggota"]);
          $sql="delete from tbl_142 where id_anggota='$id_anggota' ";
          $hasil=mysqli_query($koneksi,$sql);

          //Kondisi apakah berhasil atau tidak
          if ($hasil) {
            header("Location:index.php");
          }
          else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
          }
        }
      ?>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>ID User</th>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>Nomor Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <?php
                include "koneksi.php";
                $sql="SELECT * FROM tbl_142";
                $hasil=mysqli_query($koneksi,$sql);
                $no=0;
                while ($data = mysqli_fetch_array($hasil)) {
                  $no++;
              ?>

              <tbody>
                <tr>
                  <th><?=$no;?></th>
                  <td><?=$data["id_anggota"];?></td>
                  <td><?=$data["username"];?></td>
                  <td><?=$data["nama"];?></td>
                  <td><?=$data["alamat"];?></td>
                  <td><?=$data["email"];?></td>
                  <td><?=$data["no_telp"];?></td>
                  <td>
                      <a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-primary btn-sm" role="button"><i class="fa fa-edit"></i> Edit</a>
                      <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger btn-sm" role="button"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
              </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

      <a href="create.php" class="btn btn-success" role="button"><i class="fa fa-male"></i> Tambah User</a>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>