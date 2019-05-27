<?php

session_start();

$_SESSION["idusu"];
$_SESSION["usuar"];
$_SESSION["nickname"];

$hostname_localhost="localhost";
$database_localhost="cine";
$username_localhost="root";
$password_localhost="789789";

date_default_timezone_set('America/Bogota'); 

$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);

	if(ISSET($_POST['save_usuar'])){
		$nom_usuario = $_POST['nom_usuario'];
		$nickname = $_POST['nickname'];
		$cla_usuario = $_POST['cla_usuario'];
		$ema_usuario = $_POST['ema_usuario'];

	    $carpetaDestino="images/"; 
	    $target_path = $carpetaDestino. basename($_FILES['archivo']['name']);
		$target_path1 = $carpetaDestino. basename($_FILES['archivo1']['name']);   

		$ima_usuario = basename($_FILES['archivo1']['name']);

		$ava_usuario = basename($_FILES['archivo']['name']);
		$fec_usuario = date('Y-m-d');
		
		$hor_usuario = date('H:i:sA'); 

		$link->query("INSERT INTO usuario VALUES('', '$nom_usuario', '$nickname', '$cla_usuario', '$ema_usuario', '$ava_usuario', '$ima_usuario', '$fec_usuario', '$hor_usuario')") or die(mysqli_error());

   if(@move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)) {
      $result = 1;
   }
   
    if(@move_uploaded_file($_FILES['archivo1']['tmp_name'], $target_path1)) {
      $result = 1;
   }
   
   sleep(1);
		
		echo'
			<script type = "text/javascript">
				window.location = "alerts_query.php?idquery=iusuario";
			</script>

		';	
		
	}