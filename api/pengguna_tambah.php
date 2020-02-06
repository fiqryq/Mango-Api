<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $id_dosen= KodeOtomatis($mysqli,"dosen","id_dosen","22", "5", "6");

  $nama = $_POST['nama']; 
  $username = $_POST['username']; 
  $password = $_POST['password']; 
  $level = $_POST['level']; 

  $stmt = $mysqli->prepare("SELECT id_dosen FROM dosen WHERE username = ?");

  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();

  if($stmt->num_rows > 0){

    $response['error'] = true;
    $response['message'] = 'Username Sudah Digunakan';
    $stmt->close();

  } else {

    $save = "INSERT INTO dosen (id_dosen, nama, username, password, level) VALUES ('$id_dosen', '$nama', '$username', '$password', '$level')";

      if ($mysqli->query($save)) {
          
          $response['error'] = false; 
          $response['message'] = 'dosen registered successfully'; 
          $response['id'] = $id_dosen; 

      } else {

      $response['error'] = true; 
      $response['message'] = 'Gagal'; 

      }

  }

  echo json_encode($response);
