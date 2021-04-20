<div class="header">
	<h1 class="page-title">Edit Parkiran</h1>
		<ul class="breadcrumb">
		<li><a href="?page=home">Home</a></li>
		<li><a href="?page=admin">Data Parkiran</a></li>
		<li class="active">Edit Parkiran</li>
	</ul>
</div>
<div class="col-sm-6 col-md-6">
	<div class="panel panel-default" >
        <p class="panel-heading no-collapse">Form Edit Parkiran</p>
        <div class="panel-body">
            <form action="aksi-mobil.php?hal=tempat_parkir&act=edit_parkiran" method="post">
				<?php
					$query=mysqli_query($con,"SELECT * FROM tempat_parkir where id_parkir='$_GET[id]'");
					$nsb=mysqli_fetch_row($query);
				?>
				<div class="form-group">
					<label>ID Parkiran</label>
					<input name="id_parkir" value=<?=$nsb[0]?> type="text" readonly class="form-control span12">
				</div>
				<div class="form-group">
					<label>Reservasi</label><br/>
					<?php
						if($nsb[1]=="N")
						{
							echo"<input type='radio' name='blokir' value='Y' class='minimal'/> Ya ";
							echo"<input type='radio' name='blokir' value='N' class='minimal-red' checked/> Tidak <br/><br/>";
						}
						else
						{
							echo"<input type='radio' name='blokir' value='Y' class='minimal' checked/> Ya ";
							echo"<input type='radio' name='blokir' value='N' class='minimal-red'/> Tidak <br/><br/>";
						}
					?>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
            </form>
        </div>
    </div>
</div>