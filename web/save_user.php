<?PHP

header('Content-Type: text/html; charset=UTF-8');

date_default_timezone_set('America/Bogota'); 

$hostname_localhost="localhost";
$database_localhost="cine";
$username_localhost="root";
$password_localhost="789789";

$link = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($link,$database_localhost);

mysqli_set_charset($link,'utf8');


$nombre=$_POST['nombre'];
$nickname=$_POST['nickname'];
$contras=$_POST['contras'];

$fecha = date('Y-m-d');		
$hora = date('H:i:sA'); 

$result1 = mysqli_query($link, "select id_usuario, nom_usuario, nickname, cla_usuario, ema_usuario, ava_usuario, ima_usuario, fec_usuario, hor_usuario FROM usuario where nickname='$nickname'");

$camp1=mysqli_fetch_array($result1);

if (mysqli_num_rows($result1)!=0){

header("location:cs16aso.php");

}else{

$link->query("INSERT INTO usuario VALUES('', '$nombre', '$nickname', '$contras', 'register@gmail.com', 'avatar.jpg', 'fondo.jpg', '$fecha', '$hora')") or die(mysqli_error());

header("location:cs18aso.php");

}

?>