<?php 
session_start();
require_once '../setting/koneksi.php';
require_once '../setting/crud.php';

 $response = array();
 

    $username=$_POST['username'];
    $password=$_POST['password']; 


     $stmt= $mysqli->prepare("SELECT id_mahasiswa, nama, username, password, no_tlpn, jenis_kelamin, tempat_tgl_lahir, alamat FROM mahasiswa WHERE username= ? AND password= ?");

     $stmt->bind_param("ss",$username, $password);

     $stmt->execute();
 
     $stmt->store_result();
     
     if($stmt->num_rows > 0) {
     
         $stmt->bind_result($id_mahasiswa, $nama, $username, $password, $no_tlpn, $jenis_kelamin, $tempat_tgl_lahir, $alamat);
         $stmt->fetch();
         
         $user = array(
         'username'=>$username, 
         'password'=>$password, 
         'id'=>$id_mahasiswa,
         'no_tlpn'=>$no_tlpn     

         );

         $response['error'] = false; 
         $response['message'] = 'Login successfull';
         $response['user'] = $user;  


     } else {

       $response['error'] = true; 
       $response['message'] = 'Invalid username or password';

       echo "Invalid username or password";

     }


   echo json_encode($response);
 