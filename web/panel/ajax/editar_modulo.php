<?php require_once('../Connections/conex.php'); ?>
<?php

date_default_timezone_set('America/Bogota'); 

$fec_respmodul = date('Y-m-d');
$hor_respmodul = date('H:i:sA'); 
$est_respmodul = '1';

foreach($_POST['selector'] as $key=>$value){
				
				$idusu = $_POST['idusu'];
				$respuesta_id = $_POST['respuesta_id'][$key];
				$id_pregmodul = $_POST['id_pregmodul'];				
				
	$insertSQL = sprintf("INSERT INTO respmodul VALUES('', '$id_pregmodul', '$idusu', '$respuesta_id', '$fec_respmodul', '$hor_respmodul', '$est_respmodul')");
    $Result1 = mysqli_query($conex,$insertSQL) or die(mysqli_error($conex));
    
	if($Result1==true){
     	echo  1; 
     } else {
     	echo 0; 
     }

?>