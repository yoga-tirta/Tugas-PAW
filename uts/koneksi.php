<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "db_142";

	$koneksi = mysqli_connect($host,$user,$password,$db);
	if (!$koneksi){
		echo "Koneksi Gagal";
	}
?>