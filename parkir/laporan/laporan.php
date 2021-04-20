<?php
	echo"<div class='row'>
			<div class='col-md-6'>
              <div class='box'>
                <div class='box-header'>
                  <i class='fa fa-bar-chart-o'></i>
                  <h3 class='box-title'>Cetak Laporan Jurnal</h3>
                </div>
                <div class='box-body'>
                  <form method=POST action='laporan/jurnal_sekarang.php' target='_blank'>
					<button type='submit' class='btn btn-info'><i class='fa fa-refresh fa-spin'></i> Laporan Hari Ini</button>
				  </form>
				  <form method=POST action='laporan/jurnal_periode.php' target='_blank'>
					<div class='row'><label>&nbsp;&nbsp;&nbsp;&nbsp;<b>Laporan Per Periode</b></label><br/><p/>
						<div class='col-xs-12'>
						  <div class='input-group'>
							<span class='input-group-addon'><i class='fa fa-calendar'></i></span>
							<input type='text' name='tanggal_laporan' onkeypress='return angka(event)' class='form-control pull-right' id='reservation'/>
						  </div>
						</div>
					  </div><br/><button type='submit' class='btn btn-info'>Proses</button>
				  </form>
                </div>
              </div>
            </div>
			<div class='col-md-6'>
              <div class='box'>
                <div class='box-header'>
                  <i class='fa fa-bar-chart-o'></i>
                  <h3 class='box-title'>Cetak Laporan Buku Besar</h3>
                </div>
                <div class='box-body'>
                  <form method=POST action='laporan/buku_besar_sekarang.php' target='_blank'>
					<button type='submit' class='btn btn-info'><i class='fa fa-refresh fa-spin'></i> Laporan Hari Ini</button>
				  </form>
				  <form method=POST action='laporan/buku_besar_periode.php' target='_blank'>
					<div class='row'><label>&nbsp;&nbsp;&nbsp;&nbsp;<b>Laporan Per Periode</b></label><br/><p/>
						<div class='col-xs-12'>
						  <div class='input-group'>
							<span class='input-group-addon'><i class='fa fa-calendar'></i></span>
							<input type='text' name='tanggal_laporan' onkeypress='return angka(event)' class='form-control pull-right' id='reservation4'/>
						  </div>
						</div>
					  </div><br/><button type='submit' class='btn btn-info'>Proses</button>
				  </form>
                </div>
              </div>
            </div>
	    </div>";
?>