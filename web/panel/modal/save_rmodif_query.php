<?php

session_start();

$_SESSION["idusu"];
$_SESSION["usuar"];
$_SESSION["ema_usu"];
$_SESSION["tipusuar"];

date_default_timezone_set('America/Bogota'); 

$hostname_conex="localhost";
$database_conex="teziocom_pdt";
$username_conex="teziocom_pdt";
$password_conex="Tezio159Pdt*";

$conex = mysqli_connect($hostname_conex, $username_conex, $password_conex, $database_conex) or 
die ("No se ha podido conectar al servidor de Base de datos"); 

mysqli_set_charset($conex,'utf8'); 

	if(ISSET($_POST['save_part'])){

			foreach($_POST['selector'] as $key=>$value){
			
			
				echo '
					<script type = "text/javascript">
						alert($value);
					</script>
				';			
			
				$qty = $value;
				$idusu = $_POST['idusu'];
				$respuesta_id = $_POST['respuesta_id'][$key];
				$id_pregmodul = $_POST['id_pregmodul'];	
				
				$fec_respmodul = date('Y-m-d');
				$hor_respmodul = date('H:i:sA'); 
				
				$conex->query("INSERT INTO respmodul VALUES('', '$id_pregmodul', '$idusu', '$respuesta_id', '$fec_respmodul', '$hor_respmodul', '$qty')") or die(mysqli_error());
}

}
			
echo "
<script> 
location.href='dcursos.php?d8st=$_POST[d8st]'
</script>";
	
?>