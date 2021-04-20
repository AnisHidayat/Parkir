<div class="header">
	<h1 class="page-title">Edit Data Berkas</h1>
		<ul class="breadcrumb">
		<li><a href="?page=home">Home</a></li>
		<li><a href="?page=data-berkas">Data Berkas</a></li>
		<li class="active">Edit Data Berkas</li>
	</ul>
</div>
<div class="col-sm-6 col-md-6">
	<div class="panel panel-default" >
        <p class="panel-heading no-collapse">Form Edit Data Berkas</p>
        <div class="panel-body">
            <form action="aksi_cso.php?hal=berkas&act=edit" method="post">
			<?php
				$query=mysqli_query($con,"SELECT * FROM persyaratan_berkas where id_berkas='$_GET[id]'");
				$bks  =mysqli_fetch_row($query);
			?>
                <div class="form-group">
                    <label>ID Berkas</label>
                    <input name="id_berkas" value=<?=$bks[0]?> type="text" readonly class="form-control span12" />
                </div>
                <div class="form-group">
                    <label>KTP Pemohon</label><br/>
                    <?php
						if($bks[1]=="Belum")
						{
							echo"<input type='radio' name='ktppemohon' value='Belum' class='minimal-red' checked/> Belum ";
							echo"<input type='radio' name='ktppemohon' value='Sudah' class='minimal'/> Sudah <br/><br/>";
						}
						else
						{
							echo"<input type='radio' name='ktppemohon' value='Belum' class='minimal-red'/> Belum ";
							echo"<input type='radio' name='ktppemohon' value='Sudah' class='minimal' checked/> Sudah <br/><br/>";
						}
					?>
                </div>
				<div class="form-group">
                    <label>Kartu Keluarga</label><br/>
                    <?php
						if($bks[2]=="Belum")
						{
							echo"<input type='radio' name='kk' value='Belum' class='minimal-red' checked/> Belum ";
							echo"<input type='radio' name='kk' value='Sudah' class='minimal'/> Sudah <br/><br/>";
							//echo "ini";
						}
						else
						{
							echo "<input type='radio' name='kk' value='Belum' class='minimal-red'/> Belum ";
							echo "<input type='radio' name='kk' value='Sudah' class='minimal' checked/> Sudah <br/><br/>";
							//echo "itu";
						}
					?>
                </div>
				<div class="form-group">
                    <label>Surat Nikah</label><br/>
                    <?php
						if($bks[3]=="Belum")
						{
							echo"<input type='radio' name='nikah' value='Belum' class='minimal-red' checked/> Belum ";
							echo"<input type='radio' name='nikah' value='Sudah' class='minimal' /> Sudah
								<input type='radio' name='nikah' value='Belum Menikah' class='minimal' /> Belum Menikah<br/><br/>";
						}
						if($bks[3]=="Belum Menikah")
						{
							echo"<input type='radio' name='nikah' value='Belum' class='minimal' /> Belum ";
							echo"<input type='radio' name='nikah' value='Sudah' class='minimal-red' /> Sudah
								 <input type='radio' name='nikah' value='Belum Menikah' class='minimal' checked/> Belum Menikah<br/><br/>";
						}
						if($bks[3]=="Sudah")
						{
							echo"<input type='radio' name='nikah' value='Belum' class='minimal-red' /> Belum ";
							echo"<input type='radio' name='nikah' value='Sudah' class='minimal' checked/> Sudah
								 <input type='radio' name='nikah' value='Belum Menikah' class='minimal' /> Belum Menikah<br/><br/>";
						}				
					?>
                </div>
				<div class="form-group">
					<label>Rekening Tabungan</label><br/>
                    <?php
						if($bks[4]=="Belum")
						{
							echo"<input type='radio' name='rek_tab' value='Belum' class='minimal-red' checked/> Belum ";
							echo"<input type='radio' name='rek_tab' value='Sudah' class='minimal'/> Sudah <br/><br/>";
						}
						else
						{
							echo"<input type='radio' name='rek_tab' value='Belum' class='minimal-red'/> Belum ";
							echo"<input type='radio' name='rek_tab' value='Sudah' class='minimal' checked/> Sudah <br/><br/>";
						}
					?>
                </div>
				<div class="form-group">
                    <label>Slip Gaji</label><br/>
                    <?php
						if($bks[5]=="Belum")
						{
							echo"<input type='radio' name='gaji' value='Belum' class='minimal-red' checked/> Belum ";
							echo"<input type='radio' name='gaji' value='Sudah' class='minimal'/> Sudah <br/><br/>";
						}
						else
						{
							echo"<input type='radio' name='gaji' value='Belum' class='minimal-red'/> Belum ";
							echo"<input type='radio' name='gaji' value='Sudah' class='minimal' checked/> Sudah <br/><br/>";
						}
					?>
                </div>
				<div class="form-group">
					<label>Rekening Listrik</label><br/>
                    <?php
						if($bks[6]=="Belum")
						{
							echo"<input type='radio' name='rek_lis' value='Belum' class='minimal-red' checked/> Belum ";
							echo"<input type='radio' name='rek_lis' value='Sudah' class='minimal'/> Sudah <br/><br/>";
						}
						else
						{
							echo"<input type='radio' name='rek_lis' value='Belum' class='minimal-red'/> Belum ";
							echo"<input type='radio' name='rek_lis' value='Sudah' class='minimal' checked/> Sudah <br/><br/>";
						}
					?>
                </div>
                <div class="form-group">
					<button type="submit" class="btn btn-primary">Update</button>
                </div>
                    <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>