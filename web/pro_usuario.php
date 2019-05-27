<?PHP
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

$usuario=$_POST['usuario'];
$contras=$_POST['contras'];

$resultacc = mysqli_query($link, "select id_usuario, nom_usuario, nickname, cla_usuario, ema_usuario, ava_usuario, ima_usuario, fec_usuario, hor_usuario from usuario where nom_usuario='$usuario' and cla_usuario='$contras'");

$camp=mysqli_fetch_array($resultacc);
$_SESSION["idusu"]=$camp["id_usuario"];
$_SESSION["usuar"]=$camp["nom_usuario"];
$_SESSION["nickname"]=$camp["nickname"];

if (mysqli_num_rows($resultacc)!=0){
header("location:panel/");

}else{


$resultacc = mysqli_query($link, "select id_participante,cc_participante,nom_participante,ape_participante,dir_participante,ema_participante,ava_participante,ima_participante,cla_participante,fec_participante,hor_participante,est_participante from participante where ema_participante='$email' and cla_participante='$contras' and est_participante='1'");

$camp=mysqli_fetch_array($resultacc);
$_SESSION["idusu"]=$camp["id_participante"];
$_SESSION["usuar"]=$camp["nom_participante"]." ".$camp["ape_participante"];
$_SESSION["ema_usu"]=$camp["ema_participante"];
$_SESSION["tipusuar"]="Participante";

if (mysqli_num_rows($resultacc)!=0){
header("location:panel/");

}else{

echo "
<script> 
alert('DATOS INCORRECTOS INTENTE NUEVAMENTE');
location.href='index.php?email=$_POST[email]'
</script>";

}
}

?>