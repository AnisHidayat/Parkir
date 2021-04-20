<?php
session_start();

include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
error_reporting(E_ALL ^ E_NOTICE);

$page=$_GET[page];
$hal=$_GET[hal];
$act=$_GET[act];
$id=$_GET[id];

if ($page=='tambahparkir' AND $act=='parkiran'){
					$cek_id=mysqli_query($con,"SELECT * FROM tiket_parkir order by id_tiket desc");
					$h1=mysqli_fetch_row($cek_id);
					$h2=mysqli_num_rows($cek_id);
					$id = substr($h1[0],0,3); // ambil sebanyak 1 karakter [P]
					$nomor = substr($h1[0],3,3);
					$nomor++;
						
					if($h2 < 2)
					{
						$id_baru="TKP001";
					}
					elseif($nomor < 10)
					{
						$id_baru="TKP00".$nomor;
					}
					elseif($nomor < 100 && $nomor > 9)
					{
						$id_baru="TKP0".$nomor;
					}
					elseif($nomor < 1000 && $nomor > 99)
					{
						$id_baru="TKP".$nomor;
					}
					$cek_parkir=mysqli_query($con, "SELECT id_parkir from tempat_parkir WHERE blokir='N' AND tipe_parkir='Mobil' ORDER BY RAND() LIMIT 1");
					$parkir=mysqli_fetch_row($cek_parkir);
					$cek_parkiran=mysqli_num_rows($cek_parkir);
					if ($cek_parkiran > 0)
					{
					$now=(new \DateTime())->format('Y-m-d H:i:s');
	mysqli_query($con, "INSERT INTO tiket_parkir (id_tiket, id_parkir, jam_masuk, jenis_kendaraan) VALUES ('$id_baru', '$parkir[0]', '$now', 'Mobil')");
	mysqli_query($con, "UPDATE tempat_parkir SET blokir='Y' WHERE id_parkir='$parkir[0]'");
	echo "<script>alert('Input Parkiran Berhasil !');window.location = 'newtab.php?id_tiket=$id_baru'</script>";
	}
	else {
		echo "<script>alert('Maaf parkiran penuh :( silakan parkir di pinggir jalan :D');window.location = 'index.php?page=pengguna-mobil'</script>";
	}
}

	elseif ($hal=='tempat_parkir' AND $act=='delete_parkir'){
		mysqli_query($con,"DELETE FROM tempat_parkir WHERE id_parkir='$_GET[id_parkir]'");
										
	echo "<script>alert('Data telah dihapus...');window.location = 'index.php?page=admin'</script>";
	}

	elseif ($hal=='tempat_parkir' AND $act=='input_tempat_parkir'){
		mysqli_query($con,"INSERT INTO tempat_parkir(id_parkir, tipe_parkir, blokir) VALUES('$_POST[id_parkir]', '$_POST[tipe_parkir]', '$_POST[blokir]')");
										
	echo "<script>alert('Input Tempat Parkir Berhasil !');window.location = 'index.php?page=admin'</script>";
	}
	
	elseif ($hal=='tempat_parkir' AND $act=='edit_parkiran'){
		mysqli_query($con, "UPDATE tempat_parkir SET blokir='$_POST[blokir]', id_parkir='$_POST[id_parkir]' WHERE id_parkir='$_POST[id_parkir]'");
										
	echo "<script>alert('Update Tempat Parkiran Berhasil !');window.location = 'index.php?page=admin'</script>";
	}
	
	elseif ($hal=='tiket_parkir' AND $act=='bayar_parkiran'){
		$now=(new \DateTime())->format('Y-m-d H:i:s');
		mysqli_query($con, "UPDATE tiket_parkir SET jam_keluar='$now',tarif='$_POST[totaltarif]' WHERE id_tiket='$_POST[id_tiket]'");
		
		$parkir=mysqli_query($con, "select id_parkir from tiket_parkir where id_tiket='$_POST[id_tiket]'");
		$p=mysqli_fetch_row($parkir);
		mysqli_query($con, "UPDATE tempat_parkir SET blokir='N' WHERE id_parkir='$p[0]'");

		mysqli_query($con, "UPDATE tiket_parkir SET id_parkir='' WHERE id_tiket='$_POST[id_tiket]'");
	echo "<script>alert('Pembayaran Berhasil...');window.location = 'index.php?page=admin'</script>";
	}
?>