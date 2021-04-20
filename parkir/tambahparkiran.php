<div class="header">
	<h1 class="page-title">Tambah Data Parkiran</h1>
		<ul class="breadcrumb">
		<li><a href="?page=home">Home</a></li>
		<li><a href="?page=admin">Admin Parkir</a></li>
		<li class="active">Tambah Data Parkiran</li>
	</ul>
</div>
<div class="row">
	<div class="col-sm-6 col-md-6">
		<div class="panel panel-default" >
			<p class="panel-heading no-collapse">Form Tambah Data Parkiran</p>
			<div class="panel-body">
				<form action="aksi-mobil.php?hal=tempat_parkir&act=input_tempat_parkir" method="post">
					<?php
					
							$cek_id=mysqli_query($con,"SELECT * FROM tempat_parkir order by id_parkir desc");
							$h1=mysqli_fetch_row($cek_id);
							$h2=mysqli_num_rows($cek_id);
							$id = substr($h1[0],0,3); // ambil sebanyak 3 karakter
							$nomor = substr($h1[0],3,3);
							$nomor++;
								
							if($h2 < 1)
							{
								$id_baru="PKR001";
							}
							elseif($nomor < 10)
							{
								$id_baru="PKR00".$nomor;
							}
							elseif($nomor < 100 && $nomor > 9)
							{
								$id_baru="PKR0".$nomor;
							}
							elseif($nomor < 1000 && $nomor > 99)
							{
								$id_baru="PKR".$nomor;
							}
							
						  ?>
					<div class="form-group">
						<label>ID Parkiran</label>
						<input name="id_parkir" value=<?=$id_baru?> type="text" readonly class="form-control span12">
					</div>
					<div class="form-group">
						<label>Tipe Parkir</label><br/>
						<input name="tipe_parkir" value="Mobil" type="radio"> Mobil<br/>
						<input name="tipe_parkir" value="Motor" type="radio"> Motor<br/>
					</div>
					<div class="form-group">
						<label>Blokir</label>
						<div class="ui-widget">
						<input name="blokir" value="N" type="text" readonly class="form-control span12">
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
			</div>
		</div>
	</div>
</div>