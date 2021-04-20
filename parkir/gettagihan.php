<?php
session_start();
$_SESSION['tarif'];
$server = "localhost";
$username = "root";
$password = "";
$database = "parkir";

if(!isset($_SESSION['tarif']))
{
    $_SESSION['tarif'] = $totaltarif;
	echo $_SESSION['tarif'];
}
else {
	echo 'WTF!!';
}

// $con=mysqli_connect($server,$username,$password,$database);	
// if (!$con) {
// 	// Jika koneksi gagal, hentikan semua proses dan tampilkan pesan kesalahan
// 	die("Tidak dapat membuat koneksi dengan server database!");
// }

$cek = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tiket_parkir WHERE id_tiket = '$_GET[q]' AND jenis_kendaraan = 'Mobil'"))

if ($cek > 0) {
	
	$q = intval($_GET['q']);

	$result = mysqli_query($con,"SELECT jam_masuk FROM tiket_parkir WHERE id_tiket = '$_GET[q]'");
	$h1=mysqli_fetch_row($result);

	$now = (new \DateTime())->format('Y-m-d H:i:s');

	$semiran2 = strtotime($now) - strtotime($h1[0]);
	//echo $diff ."n";
	$diff_in_hrs = $semiran2/3600;
	$semiran = ceil($diff_in_hrs);

	$tarif1Jam = 3000;
	$tarifSelanjutnya = 1000;
	$totaltarif = 0;

	if ($semiran <= 1 ) {
		$totaltarif = $tarif1Jam * $semiran;
	}
	elseif ($semiran > 1 ) {
		$totaltarif = ($semiran * $tarifSelanjutnya - 1000) + $tarif1Jam;
	}

	echo "";
	echo ("===--- TARIF PARKIR KENDARAAN ---===");
	echo ("<br>Jam Masuk    	= $h1[0]");
	echo ("<br>Jam Keluar   	= $now");
	echo ("<br>Lama Parkir  	= $semiran Jam");
	echo ("<br>Tarif 1 Jam   = Rp. $tarif1Jam,-");
	if ($semiran > 1 ) {
	echo ("<br>Tarif Selanjutnya   = Rp. $tarifSelanjutnya,-");
	}
	else {
	}
	echo("<br>-------------------------------------(+)");
	echo("<br>Total Tarif    = Rp. $totaltarif,-");

	$cookie_name = "Tarif";
	$cookie_value = $totaltarif;

	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day.

}else{

	$q = intval($_GET['q']);

	$result = mysqli_query($con,"SELECT jam_masuk FROM tiket_parkir WHERE id_tiket = '$_GET[q]'");
	$h1=mysqli_fetch_row($result);

	$now = (new \DateTime())->format('Y-m-d H:i:s');

	$semiran2 = strtotime($now) - strtotime($h1[0]);
	//echo $diff ."n";
	$diff_in_hrs = $semiran2/3600;
	$semiran = ceil($diff_in_hrs);

	$tarif1Jam = 2000;
	$tarifSelanjutnya = 1000;
	$totaltarif = 0;

	if ($semiran <= 1 ) {
		$totaltarif = $tarif1Jam * $semiran;
	}
	elseif ($semiran > 1 ) {
		$totaltarif = ($semiran * $tarifSelanjutnya - 1000) + $tarif1Jam;
	}

	echo "";
	echo ("===--- TARIF PARKIR KENDARAAN ---===");
	echo ("<br>Jam Masuk    	= $h1[0]");
	echo ("<br>Jam Keluar   	= $now");
	echo ("<br>Lama Parkir  	= $semiran Jam");
	echo ("<br>Tarif 1 Jam   = Rp. $tarif1Jam,-");
	if ($semiran > 1 ) {
	echo ("<br>Tarif Selanjutnya   = Rp. $tarifSelanjutnya,-");
	}
	else {
	}
	echo("<br>-------------------------------------(+)");
	echo("<br>Total Tarif    = Rp. $totaltarif,-");

	$cookie_name = "Tarif";
	$cookie_value = $totaltarif;

	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}
//json_encode($totaltarif);

//echo $semiran;
?>