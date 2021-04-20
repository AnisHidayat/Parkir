<?php
include "config/koneksi.php";
include "config/library.php";
error_reporting(E_ALL ^ E_NOTICE);

$username = $_POST['username'];
$pass     = $_POST['password'];

$login=mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_assoc($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "config/timeout.php";
  
  $_SESSION[namauser]     = $r[username];
  $_SESSION[passuser]     = $r[password];
  
  // session timeout
  $_SESSION[login] = 1;
  timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();
	echo "<script>window.location='index.php?page=admin'</script>";
}
else{
   echo "<script>alert('Maaf, Username & Password Salah! Atau ID Anda Sedang Di Blokir Oleh Admin');window.location = 'javascript:history.go(-1)'</script>";
}
?>