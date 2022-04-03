<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "yoga";

	$koneksi = mysqli_connect($host,$user,$password,$db);
	if (!$koneksi){
		echo "Koneksi Gagal";
	}
?>