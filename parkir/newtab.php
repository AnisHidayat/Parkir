<?php

$id_tiket = $_GET['id_tiket'];
include "config/koneksi.php";

echo '<meta http-equiv="refresh" content="10;url=index.php?page=pengguna-mobil" />';
echo '<meta http-equiv="refresh" content="10;url=index.php?page=pengguna-motor" />';
    //header("Location: login.php");
	echo 'This page will closed in 10 seconds...';
	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	  <title> Selamat datang di Parkiran </title>
	  <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/structure.css">
     
	 <!-- DATA TABLES -->
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="dist/js/app.min.js" type="text/javascript"></script>
	</head>
	
	<body> <center>
	<div class="header">
	<h1 class="page-title">TIKET PARKIR STING CEPLAK</h1>
		<ul class="breadcrumb">
		<li><a href="http://localhost/ucups/?page=pengguna-mobil">Home</a></li>
		<li><a href="http://localhost/ucups/?page=pengguna-motor">Home</a></li>
		<li class="active">TIKET PARKIR</li>
	</ul>
</div>

<?php 

$query=mysqli_query($con, "SELECT * FROM tiket_parkir where id_tiket='$_GET[id_tiket]'");
$cek_parkir=mysqli_fetch_row($query);
?>
<div class="box login">
	<br /><br />
	<strong> TIKET PARKIR STING CEPLAK </strong>
	<br /><br />
	Tanggal/Waktu: <?=$cek_parkir[2]?><br />
	<br />
	<h3>No. Tiket : <?=$cek_parkir[0]?></h3>
	<h3>Kode Parkir: <?=$cek_parkir[1]?></h3>
	<br />
	<strong>Simpan tiket ini dengan aman <br />
	Denda Rp. 10.000,- apabila tiket ini hilang</strong>
	</div>

</body>
</html>