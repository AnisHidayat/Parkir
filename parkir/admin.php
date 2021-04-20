<?php
session_start();

if(!isset($_SESSION[login])){ //if login in session is not set
	echo '<meta http-equiv="refresh" content="3;url=login.php" />';
    //header("Location: login.php");
	echo 'Anda belum login, anda akan diarahkan dalam 3 detik...';
}
else {

?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

	<div class="header">
		<h1 class="page-title">Admin Parkir</h1>
			<ul class="breadcrumb">
			<li><a href="?page=home">Home</a></li>
			<li class="active">Admin Parkiran</li>
		</ul>
	</div>

	<div class="btn-toolbar list-toolbar">
		<a href="?page=tambahparkiran"><button class="btn btn-success"><i class="fa fa-plus"></i> Tempat Parkir baru</button></a>
		<a href="periode.php"><button class="btn btn-warning"><i class="fa fa-clipboard"></i> Laporan </button></a>
		<a href="logout.php"><button class="btn btn-danger"><i class="fa fa-sign-out"></i> Logout</button></a>
	</div> <br/>		

<script>
	function ConfirmDelete(){
      var x = confirm("Apakah Anda yakin mau menghapus data lokasi parkir ini?");
      if (x)
          return true;
      else
        return false;
    }
</script>

	<table id="example1" class="table table-bordered table-hover">
  <thead>
    <tr>
		<th>ID Parkir</th>
		<th>Tipe Parkir</th>
        <th>Sedang Tersedia?</th>
		<th>ID Tiket</th>
		<th>Jam Masuk</th>
		<th>Aksi</th>
	</tr>
  </thead>
  <tbody>
	<?php
		$query=mysqli_query($con,"SELECT * FROM tempat_parkir order by id_parkir desc");
					
		while($p=mysqli_fetch_row($query)):
			$query2=mysqli_query($con,"SELECT * FROM tiket_parkir where id_parkir='$p[0]'");
			$p2=mysqli_fetch_row($query2);
				echo"<tr>
				<td>$p[0]</td>";
				echo
				"<td>$p[1]</td>";
				if ($p[2] == 'Y'){
					echo "<td> Sedang Digunakan / Direservasi </td>";
				}
				else {
					echo "<td> Tersedia </td>";
				}
				echo "<td>$p2[0]</td>
				<td>$p2[2]</td>";
				if ($p2 > 0) {
					echo "<td><a href='?page=keluarparkir&id=$p2[0]'><i class='fa fa-minus'></i> Keluar</a></td>";
				}
				else {
					echo "<td><a href='?page=editparkiran&id=$p[0]'><i class='fa fa-pencil'></i> Edit</a> | <a></td>";
				}
			echo "</tr>";
		endwhile;
	?>
  </tbody>
</table>
<?php } ?>