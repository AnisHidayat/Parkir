<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../index.php?page=pendaftaran><b>LOGIN</b></a></center>";
}
else{
error_reporting(0);

include "class.ezpdf.php";
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";
include "rupiah.php";
  
$pdf = new Cezpdf();
 
// Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('fonts/Courier.afm');

$all = $pdf->openObject();

// Tampilkan logo
$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->addJpegFromFile('/logo_bprs.png',20,800,69);

// Teks di tengah atas untuk judul header
$pdf->addText(188, 820, 16,'<b>Laporan Jurnal Umum</b>');
$pdf->addText(230, 800, 19,'');
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
$bln_mulai   = substr($_POST[tgl_mulai],5,2); // ambil sebanyak 3 karakter
$tgl_mulai   = substr($_POST[tgl_mulai],8,2); // ambil sebanyak 3 karakter
$thn_mulai   = substr($_POST[tgl_mulai],0,4); // ambil sebanyak 3 karakter

$bln_selesai   = substr($_POST[tgl_akhir],5,2); // ambil sebanyak 3 karakter
$tgl_selesai  = substr($_POST[tgl_akhir],8,2); // ambil sebanyak 3 karakter
$thn_selesai   = substr($_POST[tgl_akhir],0,4); // ambil sebanyak 3 karakter

$mulai   =$thn_mulai."-".$bln_mulai."-".$tgl_mulai;
$selesai =$thn_selesai."-".$bln_selesai."-".$tgl_selesai;

$m = tgl_indo($mulai);
$s = tgl_indo($selesai);

// Query untuk merelasikan kedua tabel di filter berdasarkan tanggal
$sql = mysqli_query($con,"SELECT * FROM jurnal where tanggal BETWEEN '$mulai' AND '$selesai'");
$jml = mysqli_num_rows($sql);
$pdf->ezText("Nama Laporan : Laporan Jurnal Umum \n");
$pdf->ezText("Per Tanggal  : {$m} - {$s} \n\n");
if ($jml > 0){
$i = 1;
$total = 0;
while($r = mysqli_fetch_assoc($sql)){
  $debet    =rp($r[debet]); 
  $kredit   =rp($r[kredit]);
  $tgl      = tgl_indo($r[tanggal]);
  $data[$i]=array('<b>ID</b>'=>$r[id_jurnal], 
                  '<b>ID Transaksi</b>'=>$r[id_transaksi],
                  '<b>Debet</b>'=>$debet, 
                  '<b>Kredit</b>'=>$kredit,
				  '<b>Tanggal</b>'=>$tgl,
                  '<b>Keterangan</b>'=>$r[keterangan]);
	$i++;
	$total1 = $r[debet] + $total1;
	$total2 = $r[kredit] + $total2;
}
$total1	=rp($total1);
$total2	=rp($total2);	

$pdf->ezTable($data, '', '', '');
$pdf->ezText("\n\t\t<b>Total debet</b> : {$total1} \n");
$pdf->ezText("\t\t\t\t<b>Total kredit</b> : {$total2} \n");

// Penomoran halaman
$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
}
else{
  echo "Tidak ada transaksi pada Tanggal <b>$_POST[tgl_mulai] - $_POST[tgl_akhir]</b><br />";
}
}
?>