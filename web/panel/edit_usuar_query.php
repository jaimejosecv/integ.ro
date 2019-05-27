<?php

session_start();

$_SESSION["idusu"];
$_SESSION["usuar"];
$_SESSION["nickname"];

$hostname_localhost="localhost";
$database_localhost="cine";
$username_localhost="root";
$password_localhost="789789"; 

$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);

	if(ISSET($_POST['edit_usuar'])){

		$nom_usuario = $_POST['nom_usuario'];
		$nickname = $_POST['nickname'];
		$cla_usuario = $_POST['cla_usuario'];
		$ema_usuario = $_POST['ema_usuario'];

	    $carpetaDestino="images/"; 
	    $target_path = $carpetaDestino. basename($_FILES['archivo']['name']);
		$target_path1 = $carpetaDestino. basename($_FILES['archivo1']['name']);   

		$ima_usuario = basename($_FILES['archivo1']['name']);

		$ava_usuario = basename($_FILES['archivo']['name']);


		if ($target_path=="images/") {
			$ava_usuario = $archivox;
		}else{
			$ava_usuario = basename($_FILES['archivo']['name']);
		}

		if ($target_path1=="images/") {
			$ima_usuario = $archivox1;
		}else{
			$ima_usuario = basename($_FILES['archivo1']['name']);
		}
		

		$link->query("UPDATE usuario SET nom_usuario = '$nom_usuario', nickname = '$nickname', cla_usuario = '$cla_usuario', ema_usuario = '$ema_usuario', ava_usuario = '$ava_usuario', ima_usuario = '$ima_usuario' WHERE id_usuario = '$_REQUEST[id_usuario]'") or die(mysqli_error());
		
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
?>	
