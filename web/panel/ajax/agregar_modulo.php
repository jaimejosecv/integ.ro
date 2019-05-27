<?php require_once('../Connections/conex.php')?>

<?php

//if (!isset($_SESSION)) {
//  session_start();
//}

date_default_timezone_set('America/Bogota'); 

$fec_respmodul = date('Y-m-d');
$hor_respmodul = date('H:i:sA'); 
$est_respmodul = '1';

//$respuestaid=$_POST['respuesta_id'];

foreach($_POST['respuesta_id'] as $index => $valor){ 

			//	$idusu = $_POST['idusu'];
				//$respuesta_id = $_POST['respuesta_id'][$key];
			//	$id_pregmodul = $_POST['id_pregmodul'];	
				
			//	$insertSQL=$conex->query("INSERT INTO respmodul VALUES('', '$id_pregmodul', '$idusu', '$valor', '$fec_respmodul', '$hor_respmodul', '$est_respmodul')") or die(mysqli_error());			
			//	$Result1 = mysqli_query($conex,$insertSQL) or die(mysqli_error($conex));
				
				
            //$for_query = substr($for_query, 0, -2);
            //$query = "INSERT INTO tbl_language (name) VALUES ('$for_query')";
            //if(mysqli_query($connect, $query))
            //{
            // echo '<h3>You have select following language</h3>';
               echo '<label class="text-success">' . $valor . '</label>';
            //}
           //}
           //else
           //{
           // echo "<label class='text-danger'>* Please Select Atleast one Programming language</label>";
}


if($Result1==true){ 
  echo '1';
} else { 
  echo '0';
}



?>