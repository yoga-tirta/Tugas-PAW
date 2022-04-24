<?php
    include "koneksi.php";

    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];
    
    $tambahData = "INSERT INTO tbl_yoga VALUES ('null','$nama','$email','$alamat')";
    $hasil = mysqli_query($koneksi,$tambahData);
    // var_dump($hasil);die;
    header ('location:index.php')

?>