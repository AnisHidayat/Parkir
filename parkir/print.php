<?php ob_start(); ?>
<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
	<?php
	// Load file koneksi.php
	include "config/koneksi.php";

	if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
		$filter = $_GET['filter']; // Ambil data filder yang dipilih user

		if($filter == '1'){ // Jika filter nya 1 (per tanggal)
			$tgl = date('d-m-y', strtotime($_GET['tanggal']));

			echo '<b>Data Transaksi Tanggal '.$tgl.'</b><br /><br />';

			$query = "SELECT * FROM tiket_parkir WHERE DATE(jam_masuk)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
		}else if($filter == '2'){ // Jika filter nya 2 (per bulan)
			$nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

			echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';

			$query = "SELECT * FROM tiket_parkir WHERE MONTH(jam_masuk)='".$_GET['bulan']."' AND YEAR(jam_masuk)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
		}else{ // Jika filter nya 3 (per tahun)
			echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b><br /><br />';

			$query = "SELECT * FROM tiket_parkir WHERE YEAR(jam_masuk)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
		}
	}else{ // Jika user tidak memilih filter
		echo '<b>Semua Data Transaksi</b><br /><br />';

		$query = "SELECT * FROM tiket_parkir ORDER BY jam_masuk"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal

	}
	?>
	<table border="1" cellpadding="8">
	<tr>
		<th>ID Parkir</th>
        <th>ID Tiket</th>
        <th>Jam Masuk</th>
        <th>Tarif</th>
    </tr>
    <tr>
        <th>Total</th>
	</tr>

	<?php
	$tot_tarif = 0;
	$sql = mysqli_query($con, $query); // Eksekusi/Jalankan query dari variabel $query
	$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

	if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
		while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
			$tgl = date('d-m-Y', strtotime($data['jam_masuk'])); // Ubah format tanggal jadi dd-mm-yyyy
			$tot_tarif += $data['tarif'];
			echo "<tr>";
            echo "<td>".$data['id_parkir']."</td>";
            echo "<td>".$data['id_tiket']."</td>";
            echo "<td>".$tgl."</td>";
            echo "<td>".$data['tarif']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>".$tot_tarif."</td>";
            echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('plugins/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Transaksi.pdf', 'D');
?>
