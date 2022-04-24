<?php
    include "koneksi.php";
    $id = $_POST['id_data'];
    $nama = $_POST['nama_data'];
    $email = $_POST['email_data'];
    $alamat = $_POST['alamat_data'];

    $update = "UPDATE tbl_yoga SET nama_yoga='$nama', email_yoga = '$email', alamat_yoga = '$alamat' WHERE id_yoga = $id";
    $hasil = mysqli_query($koneksi,$update);
    header ('location:index.php');

?>