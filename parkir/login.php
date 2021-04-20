<?php
	error_reporting(E_ALL ^ E_NOTICE);
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Aplikasi Tukang Parkir Management System</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/structure.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>

<body class=" theme-blue">
<center> <img style="width: 1200px;" src="assets/img/mobil-dan-motor.jpg"/></center><br /><br /><br />
	<form action="cek_login.php" method="post" role="form" class="box login">
		<fieldset class="boxBody">
		  <center><label style="font-size: 24px; "><b>Login</b></label></center>
		  <input class="fa fa-user" placeholder="User Name" type="text" name="username" required>
		  
		  <input class="fa fa-user" placeholder="Password" type="password" name="password" type="password" required>
		</fieldset>
		<footer>
		  <input type="submit" class="btnLogin" value="Login" tabindex="4">
		</footer>
	</form>

</body>
</html>