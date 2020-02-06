<?php
//error_reporting(0);
//set koneksi ke basis data
$host = "localhost:3308"; //Berjalan di local
$username = "root";
$password = "";
$db_name = "presensi";

//koneksi ke basis data
$mysqli = new mysqli($host, $username, $password, $db_name);

//Cek koneksi basis data
if(mysqli_connect_errno()) {

	echo "Error: Tidak terhubung ke database";
	exit;
	
	}
?>