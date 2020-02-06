<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $id_izin = KodeOtomatis($mysqli,"izin","id_izin","44", "5", "6");

  $id_mahasiswa = $_POST['id_mahasiswa']; 
  $tgl_mulai = $_POST['tgl_mulai']; 
  $tgl_akhir = $_POST['tgl_akhir']; 
  $keterangan = $_POST['keterangan']; 
  $jenis = $_POST['jenis']; 


  $lokasi_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
 

  $nama_file = $id_izin.'.jpg';

  if(!empty($lokasi_file)) {
    
      if ($tipe_file != "image/jpeg" && $tipe_file != "image/pjpeg"){

        echo "<script>window.alert('Upload Gagal, Pastikan File Foto yang di Upload Bertipe *.JPG')</script>";
        //ARAHKAN
        echo "<script>window.location='javascript:history.go(-1)';</script>";

      }else {

          //menjalankan
          if(is_dir("../gambar/izin")) {

            $tempat_gambar = "../gambar/izin";

          } else {

            mkdir("../gambar/izin");
            $tempat_gambar = "../gambar/izin";

          }

        UploadImage($nama_file, $tempat_gambar, "gambar");

      }
  
  } else {

    $nama_file = $id_izin.'.jpg';

  }

  $tgl_mulai = $_POST['tgl_mulai']; 
  $tgl_akhir = $_POST['tgl_akhir']; 
  $keterangan = $_POST['keterangan']; 
  $jenis = $_POST['jenis']; 


   $save = "INSERT INTO izin (id_izin, id_mahasiswa, tgl_mulai, tgl_akhir, keterangan, jenis, gambar) VALUES ('$id_izin', '$id_mahasiswa', '$tgl_mulai', '$tgl_akhir', '$keterangan', '$jenis', '$nama_file')";

      if ($mysqli->query($save)) {
          
          $response['error'] = false; 
          $response['message'] = 'izin successfully'; 
          $response['id'] = $id_izin; 

      } else {

      $response['error'] = true; 
      $response['message'] = 'Gagal'; 

      }


  echo json_encode($response);