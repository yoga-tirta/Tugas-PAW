<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $hapus = "DELETE FROM tbl_yoga WHERE id_yoga = $id";
    $hasil = mysqli_query($koneksi,$hapus);
    // if($hasil){
    //     echo 'berhasil';
    // }
    echo "<script>alert('data telah dihapus');document.location.href='index.php'</script>";
    // header ('location:data.php')
?>