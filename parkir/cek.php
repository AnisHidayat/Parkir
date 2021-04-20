<?php

$from = '2017-09-13';
$now = date("Y-m-d");
echo $from.'<br>';
echo $now.'<br>';

$endTimeStamp = strtotime($from);
$startTimeStamp = strtotime($now);

$timeDiff = abs($endTimeStamp - $startTimeStamp);
$itung = $timeDiff/86400;

$totalday = intval($itung);

echo $totalday.' days has passed';

/////////////////////////////////////////////////////////////

$froms = '2017-09-09 21:29:57';
echo '<br><br>';
$nows = (new \DateTime())->format('Y-m-d H:i:s');
$dt = DateTime::createFromFormat("Y-m-d H:i:s", $froms);
$dn = DateTime::createFromFormat("Y-m-d H:i:s", $nows);

$hours = $dt->format('H'); // '20'
$hours2 = $dn->format('H'); // '20'
echo $hours.'<br>';
echo $hours2;

$totalwaktu = $hours2 - $hours;
 
$hourdiff  = round($totalwaktu);
$jamkeluar = date('H', strtotime ($hours));
if ($hourdiff > 0 ){
		$tarif1jam = 3000;
		$selisihwaktu = $hourdiff-2;
		$tarifberikutnya = $selisihwaktu * 2000;
		$totaltarif = $tarif1jam + $tarifberikutnya;
	}else {
		$totaltarif = 3000;
	}

if ($totalday = 0 && $jamkeluar < 04 )	{
	$hargaakhir = $totaltarif * 10000;	
}
elseif ($totalday = 1 && $jamkeluar > 04 ){
	$tarifberikutnya = $totaltarif + 10000;
	$hargaakhir = $totaltarif + $tarifberikutnya;
}

echo "<br><br>";
echo ("===--- TARIF PARKIR KENDARAAN ---===<br><br>");
echo ("<br>Jam Masuk    	= $hours");
echo ("<br>Jam Keluar   	= $hours2");
echo ("<br>Lama Parkir  	= $hourdiff Jam");
//echo ("<br>Tarif parkir  	= $hourdiff Jam");
echo ("<br><br>Tarif Awal   = Rp. $totaltarif,-");
echo("<br>-------------------------------------(-)");
echo("<br>Setelah Diskon    = Rp. $hargaakhir,-");

echo '<br><br>';
$day = intval($from = date("d"));
echo $day;
echo "<br>";
echo "===============================================================";
echo "<br>";
$semir1="2017-11-04 15:02:22";
//$semir2="2017-04-12 12:30:00";
$semir2 = (new \DateTime())->format('Y-m-d H:i:s');

$semiran = round((strtotime($semir2) - strtotime($semir1))/(60*60));

echo $semiran;

echo "<br>";
echo "===============================================================";
echo "<br>";

$buahjakar = 1000;
$buahdelima = 1000;

$buahbuahan = $buahjakar + $buahdelima;

echo $buahbuahan;

?>