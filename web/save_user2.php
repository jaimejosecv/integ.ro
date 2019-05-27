<?PHP

date_default_timezone_set('America/Bogota'); 

$hostname_localhost="localhost";
$database_localhost="teziocom_pdt";
$username_localhost="teziocom_pdt";
$password_localhost="Tezio159Pdt*";

$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);


$nombre=$_POST['nombre'];
$email=$_POST['email'];
$contras=$_POST['contras'];

$fecha = date('Y-m-d');		
$hora = date('H:i:sA'); 

//$link->query("INSERT INTO participante VALUES('', '$cc_participante', '$nom_participante', '$ape_participante', '$dir_participante', '$ema_participante', '$ava_participante', '$ima_participante', '$cla_participante', '$fec_participante', '$hor_participante', '1', '$sob_participante', '$nac_participante', '$pos_participante', '$car_participante', '$mov_participante')") or die(mysqli_error());

$link->query("INSERT INTO participante VALUES('', '0', '$nombre', ' ', ' ', '$email', 'avatar.jpg', 'fondo.jpg', '$contras', '$fecha', '$hora', '1', ' ', '$fecha', ' ', ' ', '0')") or die(mysqli_error());

header("location:cs18aso.php");

?>