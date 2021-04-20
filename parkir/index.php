<?php
  session_start();
  include"config/koneksi.php";
  include"config/library.php";
  include"config/fungsi_rupiah.php";
  include"config/fungsi_indotgl.php";
  include "laporan/rupiah.php";
  error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Management Parkir</title>
	   <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     
    <!-- DATA TABLES -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	  <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="dist/js/app.min.js" type="text/javascript"></script>

  <style type="text/css">
    .hovBtn {
     color: rgba(255,255,255,1);
     -webkit-transition: all 0.5s;
     -moz-transition: all 0.5s;
     -o-transition: all 0.5s;
     transition: all 0.5s;
     float: left;
     border: 1px solid rgba(255,255,255,0.5);
     text-decoration: none; 
     margin: 20px
    }
    .hovBtn a{
     color: rgba(51,51,51,1);
     text-decoration: none;
     display: block;
     padding: 8px;
     color: #fff;
    }
    .hovBtn:hover {
     background-color: rgba(255,255,255,0.2);
     -webkit-border-radius: 25px;
     -moz-border-radius: 25px;
     border-radius: 25px; 
    }
  </style>

	<script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
	  
	  function angka(e)
		{
			if(!/^[0-9]+$/.test(e.value))
			{
				e.value=e.value.substring(0,e.value.length-1);
			}
		}	
    </script>
</head>
<body>
    <!-- /. NAV TOP  -->   
    <div id="wrapper">
       <div class="navbar navbar-inverse navbar-fixed-top" style="background-color:#009933">
          <div class="adjust-nav">
              <div class="hovBtn">
                <a href="?page=home"><span class="fa fa-fw fa-home"></span> Dashboard</a>
              </div>
              <div class="hovBtn">
                <a href="?page=pengguna-mobil"><span class="fa fa-fw fa-car"></span> Pengguna Mobil</a>
              </div>
              <div class="hovBtn">
                <a href="?page=pengguna-motor"><span class="fa fa-fw fa-motorcycle"></span> Pengguna Motor</a>
              </div>
              <div class="hovBtn">
                <a href="?page=admin"><span class="fa fa-fw fa-book"></span> Admin</a>
              </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
          </div>
      </div>
      <!-- /. NAV SIDE  -->
      <nav class="navbar-default navbar-side" role="navigation">
          <div class="sidebar-collapse">
              <ul class="nav" id="main-menu">
                <a href="?page=pengguna-motor"><img src="assets/img/motor.png" style="margin: 55px"></a>
                <center><p style="color: #009933; font-size: 20px; font-family: times new roman ">Parkir Motor & Mobil</p></center>
                <a href="?page=pengguna-mobil"><img src="assets/img/mobil.png" style="margin: 30px"></a>
              </ul>
          </div>
      </nav>
      
      <div id="page-wrapper">
          <div id="page-inner">
              
				<?php
					  if ($_GET[page]== "" || $_GET[page]== "home") {
						  include "default.php";
					  }
					  elseif ($_GET[page]== "pengguna-mobil"){
						  include "pengguna-mobil.php";
					  }
            elseif ($_GET[page]== "pengguna-motor"){
              include "pengguna-motor.php";
            }
					  elseif ($_GET[page]== "tabtiket"){
						  include "newtab.php";
					  }
					  elseif ($_GET[page]== "admin"){
						  include "admin.php";
					  }
					  elseif ($_GET[page]== "tambahparkiran"){
						  include "tambahparkiran.php";
					  } 
					  elseif ($_GET[page]== "keluarparkir"){
						  include "keluarparkir.php";
					  }
					  elseif ($_GET[page]== "editparkiran"){
						  include "editparkiran.php";
					  }
					  elseif ($_GET[page]== "bantuan"){
						  include "bantuan.php";
					  }
            elseif ($_GET[page]== "transaksi"){
              include "lprn.php";
            }
					?>
		    </div>
       <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-lg-12" >
                &copy; 2020 -<a href="" style="color:white;">  Sistem Informasi Management Parkir </a>
				    </div>
        </div>
    </div>
	<script src="lib/bootstrap/js/bootstrap.js"></script>
   
</body>
</html>