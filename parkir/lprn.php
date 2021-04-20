<?php
	include 'koneksi.php';
?>
<html>
	<head>
		<title> Laporan Transaksi</title>
	</head>
	<body>
		<h3> Tabel Transaksi</h3>
		<table border="1" style="width: 50%">
			<tr>
				<th>Id Tiket</th>
				<th>Id Parkir</th>
				<th>Jam Masuk</th>
				<th>Jam Keluar</th>
				<th>Tarif</th>
			</tr>
			<?php
				$query = mysqli_query ($conn, "SELECT * FROM tiket_parkir");
				while ($data = mysqli_fetch_array($query)){
			?>
			<tr>
				<td><?php echo $data['id_tiket']; ?></td>
				<td><?php echo $data['id_parkir']; ?></td>
				<td><?php echo $data['jam_masuk']; ?></td>
				<td><?php echo $data['jam_keluar']; ?></td>
				<td><?php echo $data['tarif']; ?></td>
			</tr>
				<?php } ?>
		</table>
	</body>

</html>