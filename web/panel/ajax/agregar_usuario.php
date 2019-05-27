<?php require_once('../Connections/conex.php')?>

<?php

//if (!isset($_SESSION)) {
//  session_start();
//}

date_default_timezone_set('America/Bogota'); 

$id_foro = $_POST['id_foro'];
$id_participante = $_POST['id_participante'];
$id_usuario = $_POST['id_usuario']; 
$tip_usuario = $_POST['tip_usuario']; 
$txt_comentario = $_POST['txt_comentario'];
$nom_comentario = $_POST['nom_comentario'];
$ava_comentario = $_POST['ava_comentario'];
$fec_comentario = date('Y-m-d');
$hor_comentario = date('H:i:sA'); 
$est_comentario = '1'; 

if ($tip_usuario=="Participante") {
	$id_usuario = '0';
	$id_participante = $_POST['id_usuario'];
} else {
	$id_usuario = $_POST['id_usuario'];
	$id_participante = '0';
}
//$query = sprintf("SELECT * FROM comentario  WHERE txt_comentario='".$txt_comentario."' and fec_comentario='".$fec_comentario."' and hor_comentario='".$hor_comentario."'");
//mysqli_select_db($conex, $database_conex);
//$Login=mysqli_query($conex,$query) or die(mysqli_error());
//$loginFoundUser = mysqli_num_rows($Login);

//if($loginFoundUser==1){

//    echo '3';
//}

//else {
if ((isset($_POST["agregar"])) && ($_POST["agregar"] == "1")) {
  $insertSQL = sprintf("INSERT INTO comentario (id_foro, id_participante, id_usuario, nom_comentario, ava_comentario, tip_usuario, txt_comentario, fec_comentario, hor_comentario, est_comentario) 
  VALUES ('$id_foro', '$id_participante', '$id_usuario', '$nom_comentario', '$ava_comentario', '$tip_usuario', '$txt_comentario', '$fec_comentario', '$hor_comentario', '$est_comentario')");
  $Result1 = mysqli_query($conex, $insertSQL) or die(mysqli_error());

if($Result1==true){ 
  echo '1';
} else { 
  echo '0';
}

}
//}
?>