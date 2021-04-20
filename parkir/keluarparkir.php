<script type="text/javascript">

	<script>
	
	function showHarga(str) {
	// $cek = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tiket_parkir WHERE jenis_kendaraan = 'Mobil' "))
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","gettagihan.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<div class="header">
	<h1 class="page-title">Keluar Parkir</h1>
		<ul class="breadcrumb">
		<li><a href="?page=home">Home</a></li>
		<li><a href="?page=admin">Admin Parkiran</a></li>
		<li class="active">Keluar Parkir</li>
	</ul>
</div>
<div class="col-sm-6 col-md-6">
	<div class="panel panel-default" >
        <p class="panel-heading no-collapse">Form Keluar Parkiran</p>
        <div class="panel-body">
            <form action="aksi-mobil.php?hal=tiket_parkir&act=bayar_parkiran" method="post">

                <div class="form-group">
                    <label>ID Tiket</label>
					<?php

					if ($_GET[id] != "") {
						$cek = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tiket_parkir WHERE id_tiket = '$_GET[id]' AND jenis_kendaraan = 'Mobil'"));
						echo "cek : ".$cek;
						if ($cek > 0) {
							$query=mysqli_query($con,"SELECT id_tiket FROM tiket_parkir where id_tiket='$_GET[id]'");
							$pkr=mysqli_fetch_row($query);
							$result = mysqli_query($con,"SELECT jam_masuk FROM tiket_parkir WHERE id_tiket = '$_GET[id]'");
							$h1=mysqli_fetch_row($result);
							$now = (new \DateTime())->format('Y-m-d H:i:s');
							$semiran2 = strtotime($now) - strtotime($h1[0]);
							//echo $diff ."n";
							$diff_in_hrs = $semiran2/3600;
							$semiran = ceil($diff_in_hrs);

							$tarif1Jam = 5000;
							$tarifSelanjutnya = 1000;
							$totaltarif = 0;

							if ($semiran <= 1 ) {
								$totaltarif = $tarif1Jam * $semiran;
							}
							elseif ($semiran > 1 ) {
								$totaltarif = ($semiran * $tarifSelanjutnya - 1000) + $tarif1Jam;
							}
							echo '<input name="id_tiket" value="'.$pkr[0].'" readonly type="text" required class="form-control span12">
							</div>
							<div class="form-group">
								<label>Tagihan Parkir</label>';
								echo "<br />";
								echo ("===--- TARIF PARKIR KENDARAAN ---===");
								echo ("<br>Jam Masuk    	= $h1[0]");
								echo ("<br>Jam Keluar   	= $now");
								// echo ("<br>Tipe Kendaraan   = $pkr[3]");
								echo ("<br>Lama Parkir  	= $semiran Jam");
								echo ("<br>Tarif 1 Jam   = Rp. $tarif1Jam,-");
								if ($semiran > 1 ) {
								echo ("<br>Tarif Selanjutnya   = Rp. $tarifSelanjutnya,-");
								}
								else {
								}
								echo("<br>-------------------------------------(+)");
								echo("<br>Total Tarif    = Rp. $totaltarif,-");
								echo "<br />";
								echo '<label>Total Tarif Parkir</label>
								<input name="totaltarif" value="'.$totaltarif.'" required type="text" readonly class="form-control span12">
							</div>';
							
						}else{
							// echo '<input name="id_tiket" onchange="showHarga(this.value)" type="text" required class="form-control span12">
							// </div>
							// <div class="form-group">
							// 	<label>Tagihan Parkir</label>
							// 	<div id="txtHint"><b>Harga akan tampil disini....</b></div>
							// 	<input name="totaltarif" value="'.$totaltarif.'" required readonly class="form-control span12">
							// </div>';
							$query1=mysqli_query($con,"SELECT id_tiket FROM tiket_parkir where id_tiket='$_GET[id]'");
							$pkr1=mysqli_fetch_row($query1);
							$result1 = mysqli_query($con,"SELECT jam_masuk FROM tiket_parkir WHERE id_tiket = '$_GET[id]'");
							$h11=mysqli_fetch_row($result1);
							$now1 = (new \DateTime())->format('Y-m-d H:i:s');
							$semiran21 = strtotime($now1) - strtotime($h11[0]);
							//echo $diff ."n";
							$diff_in_hrs1 = $semiran21/3600;
							$semiran1 = ceil($diff_in_hrs1);

							$tarif1Jam1 = 2000;
							$tarifSelanjutnya1 = 1000;
							$totaltarif1 = 0;

							if ($semiran1 <= 1 ) {
								$totaltarif1 = $tarif1Jam1 * $semiran1;
							}
							elseif ($semiran1 > 1 ) {
								$totaltarif1 = ($semiran1 * $tarifSelanjutnya1 - 1000) + $tarif1Jam1;
							}
							echo '<input name="id_tiket" value="'.$pkr1[0].'" readonly type="text" required class="form-control span12">
							</div>
							<div class="form-group">
								<label>Tagihan Parkir</label>';
								echo "<br />";
								echo ("===--- TARIF PARKIR KENDARAAN ---===");
								echo ("<br>Jam Masuk    	= $h11[0]");
								echo ("<br>Jam Keluar   	= $now1");
								// echo ("<br>Tipe Kendaraan   = $pkr[3]");
								echo ("<br>Lama Parkir  	= $semiran1 Jam");
								echo ("<br>Tarif 1 Jam   = Rp. $tarif1Jam1,-");
								if ($semiran > 1 ) {
								echo ("<br>Tarif Selanjutnya   = Rp. $tarifSelanjutnya1,-");
								}
								else {
								}
								echo("<br>-------------------------------------(+)");
								echo("<br>Total Tarif    = Rp. $totaltarif1,-");
								echo "<br />";
								echo '<label>Total Tarif Parkir</label>
								<input name="totaltarif" value="'.$totaltarif1.'" required type="text" readonly class="form-control span12">
							</div>';
							
						}
					} ?>
				
                <div class="form-group">
					<button type="submit" class="btn btn-primary">Bayar</button>
                </div>
                    <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>