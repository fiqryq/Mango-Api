<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $nama = $_POST['nama'];
  $username = $_POST['username']; 
  $password = $_POST['password']; 
  $no_tlpn = $_POST['no_tlpn']; 
  $jenis_kelamin = $_POST['jenis_kelamin']; 
  $tempat_tgl_lahir = $_POST['tempat_tgl_lahir']; 
  $alamat = $_POST['alamat']; 

   if ($save->execute()) {
          
          $response['error'] = false; 
          $response['message'] = 'Successfully'; 
          $response['id'] = $id_mahasiswa; 

    } else {

        $response['error'] = true; 
        $response['message'] = 'Gagal'; 
        $response['id'] = $id_mahasiswa; 

    }

  $stmt = $mysqli->prepare("SELECT id_mahasiswa FROM mahasiswa WHERE username = ?");

  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();

  if($stmt->num_rows > 0){

    $response['error'] = true;
    $response['message'] = 'Username Sudah Digunakan';
    $stmt->close();

  } else {

  $nama = $_POST['nama'];
  $username = $_POST['username']; 
  $password = $_POST['password']; 
  $no_tlpn = $_POST['no_tlpn']; 
  $jenis_kelamin = $_POST['jenis_kelamin']; 
  $tempat_tgl_lahir = $_POST['tempat_tgl_lahir']; 
  $alamat = $_POST['alamat']; 

    $save = "INSERT INTO mahasiswa (id_mahasiswa, nama, username, password, no_tlpn, jenis_kelamin, tempat_tgl_lahir, alamat) VALUES ('$id_mahasiswa', '$nama', '$username', '$password', '$no_tlpn', '$jenis_kelamin', '$tempat_tgl_lahir', '$alamat')";

      if ($mysqli->query($save)) {
          
          $response['error'] = false; 
          $response['message'] = 'mahasiswa registered successfully'; 
          $response['id'] = $id_kasir; 

      } else {

      $response['error'] = true; 
      $response['message'] = 'Gagal'; 

      }
  }

  echo json_encode($response);
