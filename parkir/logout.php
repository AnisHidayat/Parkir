<?php
  include"config/koneksi.php";
  include"config/library.php";
  session_start();
  session_destroy();
  echo "<script>alert('Anda Telah Keluar Dari Sistem'); window.location = 'index.php'</script>";
?>