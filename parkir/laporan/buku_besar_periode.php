<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../index.php?page=pendaftaran><b>LOGIN</b></a></center>";
}
else{
error_reporting(0);

include "class1.ezpdf.php";
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";
include "rupiah.php";
  
$pdf = new Cezpdf();
 
// Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 2.7);
$pdf->selectFont('fonts/Courier.afm');

$all = $pdf->openObject();

// Tampilkan logo
$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->addJpegFromFile('logo.jpg',20,800,69);

// Teks di tengah atas untuk judul header
$pdf->addText(188, 820, 16,'<b>Laporan Buku Besar</b>');
$pdf->addText(190, 800, 19,'<b>BMT UGT-SIDOGIRI</b>');
// Garis atas untuk header
$pdf->line(10, 795, 578, 795);

// Garis bawah untuk footer
$pdf->line(10, 50, 578, 50);
// Teks kiri bawah
$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y'));

$pdf->closeObject();

// Tampilkan object di semua halaman
$pdf->addObject($all, 'all');

// Baca input tanggal yang dikirimkan user
$tgl_mulai   = substr($_POST[tanggal_laporan],0,2); // ambil sebanyak 3 karakter
$bln_mulai   = substr($_POST[tanggal_laporan],3,2); // ambil sebanyak 3 karakter
$thn_mulai   = substr($_POST[tanggal_laporan],6,4); // ambil sebanyak 3 karakter

$tgl_selesai   = substr($_POST[tanggal_laporan],13,2); // ambil sebanyak 3 karakter
$bln_selesai   = substr($_POST[tanggal_laporan],16,2); // ambil sebanyak 3 karakter
$thn_selesai   = substr($_POST[tanggal_laporan],19,4); // ambil sebanyak 3 karakter

$mulai   =$thn_mulai."-".$tgl_mulai."-".$bln_mulai;
$selesai =$thn_selesai."-".$tgl_selesai."-".$bln_selesai;

$m = tgl_indo($mulai);
$s = tgl_indo($selesai);

// Query untuk merelasikan kedua tabel di filter berdasarkan tanggal
$sql = mysqli_query($con,"SELECT * FROM buku_besar where tanggal BETWEEN '$mulai' AND '$selesai' order by ref asc");
$jml = mysqli_num_rows($sql);
$pdf->ezText("Nama Laporan : Laporan Buku Besar \n");
$pdf->ezText("Per Tanggal  : {$m} - {$s} \n\n");
if ($jml > 0){
$i = 1;
while($r = mysqli_fetch_assoc($sql)){
  $debet    =rp($r[debet]); 
  $kredit   =rp($r[kredit]);
  $sdebet   =rp($r[saldo_debet]); 
  $skredit  =rp($r[saldo_kredit]);
  $tgl      = tgl_indo($r[tanggal]);
  $data[$i]=array('<b>Tanggal</b>'=>$r[tanggal],
                  '<b>Keterangan</b>'=>$r[keterangan], 
                  '<b>Ref</b>'=>$r[ref], 
				  '<b>Debet</b>'=>$debet, 
                  '<b>Kredit</b>'=>$kredit,
				  '<b>Saldo Debet</b>'=>$sdebet,
                  '<b>Saldo Kredit</b>'=>$skredit);
	$i++;
}

$pdf->ezTable($data, '', '', '');

// Penomoran halaman
$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
}
else{
  $skrg=date('d-M-Y');
  echo "Tidak ada transaksi/order pada Tanggal <b>$skrg</b><br />";
}
}
?>