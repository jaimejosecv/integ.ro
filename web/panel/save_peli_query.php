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
		$tit_peliculas = $_POST['tit_peliculas'];
		$sip_peliculas = $_POST['sip_peliculas'];
		$ano_peliculas = $_POST['ano_peliculas'];

	    $carpetaDestino="images/"; 
	    $target_path = $carpetaDestino. basename($_FILES['archivo']['name']);

		$ima_peliculas = basename($_FILES['archivo']['name']);

		$link->query("INSERT INTO peliculas VALUES('', '$tit_peliculas', '$sip_peliculas', '$ima_peliculas', '$ano_peliculas')") or die(mysqli_error());

   if(@move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)) {
      $result = 1;
   }
   
   sleep(1);
		
		echo'
			<script type = "text/javascript">
				window.location = "alert_query.php?idquery=speliculas";
			</script>

		';	
		
	}